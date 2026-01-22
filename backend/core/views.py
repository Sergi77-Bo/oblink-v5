from rest_framework import viewsets, permissions, status
from rest_framework.response import Response
from rest_framework.decorators import action
from rest_framework.views import APIView
from django.http import HttpResponse
from reportlab.pdfgen import canvas
from reportlab.lib.pagesizes import A4
from .models import Mission, CandidateProfile, Application
from .serializers import MissionSerializer, CandidateSerializer, ApplicationSerializer
from .ai_service import OpticienAI

class MissionViewSet(viewsets.ModelViewSet):
    """
    API endpoint pour gérer les missions.
    Lecture publique, Écriture authentifiée uniquement.
    """
    queryset = Mission.objects.filter(is_active=True).order_by('-created_at')
    serializer_class = MissionSerializer
    permission_classes = [permissions.IsAuthenticatedOrReadOnly]

    @action(detail=False, methods=['get'], permission_classes=[permissions.IsAuthenticated])
    def mine(self, request):
        """Récupère uniquement les missions créées par le recruteur connecté"""
        try:
            company = request.user.company_profile
            missions = Mission.objects.filter(company=company).order_by('-created_at')
            serializer = self.get_serializer(missions, many=True)
            return Response(serializer.data)
        except Exception:
            return Response([], status=200)

    def perform_create(self, serializer):
        # Associe automatiquement la mission à l'entreprise de l'user connecté
        # Attention: crash si user n'a pas de company_profile (à gérer plus tard)
        serializer.save(company=self.request.user.company_profile)

class CandidateViewSet(viewsets.ModelViewSet):
    queryset = CandidateProfile.objects.all()
    serializer_class = CandidateSerializer
    permission_classes = [permissions.IsAuthenticated]

    def get_queryset(self):
        # Pour éviter que n'importe qui voie les profils des autres
        # On pourrait restreindre ici, mais pour l'instant on laisse tout.
        return super().get_queryset()

    @action(detail=False, methods=['get'])
    def me(self, request):
        # Renvoie le profil du user connecté
        profile, created = CandidateProfile.objects.get_or_create(user=request.user)
        serializer = self.get_serializer(profile)
        return Response(serializer.data)

class ApplicationViewSet(viewsets.ModelViewSet):
    queryset = Application.objects.all()  # Required for DRF router
    serializer_class = ApplicationSerializer
    permission_classes = [permissions.IsAuthenticated]

    def get_queryset(self):
        """
        Filtrage contextuel :
        - Le Candidat voit SES candidatures envoyées.
        - Le Recruteur voit les candidatures reçues sur SES offres.
        """
        user = self.request.user
        
        # Si c'est un candidat
        if hasattr(user, 'candidate_profile'):
            return Application.objects.filter(candidate=user.candidate_profile).order_by('-id')
        
        # Si c'est une entreprise
        if hasattr(user, 'company_profile'):
             return Application.objects.filter(mission__company=user.company_profile).order_by('-id')
             
        return Application.objects.none()

    def create(self, request, *args, **kwargs):
        # 1. Vérifier si l'utilisateur a un profil candidat
        try:
            candidate_profile = request.user.candidate_profile
        except CandidateProfile.DoesNotExist:
            return Response(
                {"error": "Vous devez créer un profil candidat avant de postuler."},
                status=status.HTTP_400_BAD_REQUEST
            )

        # 2. Vérifier s'il a déjà postulé pour éviter les doublons
        mission_id = request.data.get('mission')
        if Application.objects.filter(mission_id=mission_id, candidate=candidate_profile).exists():
            return Response(
                {"error": "Vous avez déjà postulé à cette offre."},
                status=status.HTTP_409_CONFLICT
            )

        # 3. Créer la candidature standard
        return super().create(request, *args, **kwargs)

    def perform_create(self, serializer):
        # Associe automatiquement le profil du user connecté
        serializer.save(candidate=self.request.user.candidate_profile)

class AcademyChatView(APIView):
    permission_classes = [permissions.IsAuthenticated]

    def post(self, request):
        message = request.data.get('message')
        context = request.data.get('context', 'GÉNÉRAL')
        
        if not message:
            return Response({"error": "Message vide"}, status=400)

        # Appel au service IA
        ai_response = OpticienAI.get_response(message, context)
        
        return Response({
            "response": ai_response,
            "role": "professor"
        })

class ContractGeneratorView(APIView):
    permission_classes = [permissions.AllowAny] # Public, pour attirer les leads

    def post(self, request):
        # Récupération des données du formulaire
        data = request.data
        freelance_name = data.get('freelance_name', '....................')
        client_name = data.get('client_name', '....................')
        tjm = data.get('tjm', '0')
        
        # Configuration de la réponse PDF
        response = HttpResponse(content_type='application/pdf')
        response['Content-Disposition'] = 'attachment; filename="contrat_remplacement.pdf"'

        # Création du PDF
        p = canvas.Canvas(response, pagesize=A4)
        width, height = A4
        
        # En-tête
        p.setFont("Helvetica-Bold", 20)
        p.drawString(50, height - 50, "CONTRAT DE REMPLACEMENT OPTIQUE")
        
        # Corps
        p.setFont("Helvetica", 12)
        y = height - 100
        
        p.drawString(50, y, f"ENTRE LES SOUSSIGNÉS :")
        y -= 30
        p.drawString(50, y, f"L'Opticien(ne) : {freelance_name}")
        y -= 20
        p.drawString(50, y, f"Ci-après dénommé(e) 'Le Remplaçant'")
        
        y -= 40
        p.drawString(50, y, f"ET :")
        y -= 20
        p.drawString(50, y, f"Le Magasin : {client_name}")
        y -= 20
        p.drawString(50, y, f"Ci-après dénommé(e) 'Le Client'")
        
        y -= 50
        p.drawString(50, y, "IL A ÉTÉ CONVENU CE QUI SUIT :")
        y -= 30
        p.drawString(50, y, f"Le Remplaçant effectuera une mission d'optique en boutique.")
        y -= 20
        p.drawString(50, y, f"Tarif journalier convenu : {tjm} € HT / jour.")
        y -= 20
        p.drawString(50, y, "Le présent contrat est régi par le Code de Commerce.")
        
        # Signatures
        y -= 100
        p.drawString(50, y, "Signature Remplaçant")
        p.drawString(350, y, "Signature Magasin")
        
        # Footer OBLINK
        p.setFont("Helvetica-Oblique", 10)
        p.drawString(50, 30, "Généré gratuitement via OBLINK - La plateforme des Opticiens.")
        
        p.showPage()
        p.save()
        return response
