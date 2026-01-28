from django.core.management.base import BaseCommand
from django.contrib.auth import get_user_model
from core.models import CompanyProfile, Mission

User = get_user_model()


class Command(BaseCommand):
    help = 'Crée des missions de test pour OBLINK'

    def handle(self, *args, **options):
        self.stdout.write('🚀 Création des missions de test...\n')

        # Créer un utilisateur entreprise de test
        user, created = User.objects.get_or_create(
            username='test_company',
            defaults={
                'email': 'test@oblink.fr',
                'first_name': 'Optique',
                'last_name': 'Test'
            }
        )
        if created:
            user.set_password('test123')
            user.save()
            self.stdout.write(self.style.SUCCESS(f'✅ Utilisateur créé: {user.username}'))

        # Créer un profil entreprise
        company, created = CompanyProfile.objects.get_or_create(
            user=user,
            defaults={
                'company_name': 'Optique Vision Plus',
                'network_brand': 'Krys',
                'subscription_tier': 'PREMIUM'
            }
        )
        if created:
            self.stdout.write(self.style.SUCCESS(f'✅ Entreprise créée: {company.company_name}'))

        # Missions de test
        missions_data = [
            {
                'title': 'Remplacement Opticien Lunetier - Paris Centre',
                'description': 'Besoin urgent pour remplacement congé maladie. 3 jours. Magasin centre ville avec forte affluence.',
                'job_type': 'FREELANCE',
                'software_required': ['COSIUM'],
                'city': 'Paris',
                'is_active': True
            },
            {
                'title': 'Opticien Diplômé - Lyon Part-Dieu',
                'description': 'Renfort équipe été. Gestion clientèle et vente. Expérience contactologie souhaitée.',
                'job_type': 'CDI',
                'software_required': ['POLEYRE', 'IVOIR'],
                'city': 'Lyon',
                'is_active': True
            },
            {
                'title': 'Alternance BTS Opticien - Bordeaux',
                'description': 'Recherche alternant motivé pour rejoindre notre équipe. Formation assurée sur logiciel Osiris.',
                'job_type': 'ALTERNANCE',
                'software_required': ['OSIRIS'],
                'city': 'Bordeaux',
                'is_active': True
            },
            {
                'title': 'Opticien Remplaçant - Marseille',
                'description': 'Remplacement congés d\'été (juillet-août). Magasin quartier résidentiel.',
                'job_type': 'FREELANCE',
                'software_required': ['COSIUM'],
                'city': 'Marseille',
                'is_active': True
            },
            {
                'title': 'Responsable Magasin Optique - Toulouse',
                'description': 'CDI - Management équipe de 3 personnes. Expérience gestion de stock et relation fournisseurs.',
                'job_type': 'CDI',
                'software_required': ['POLEYRE'],
                'city': 'Toulouse',
                'is_active': True
            }
        ]

        created_count = 0
        for mission_data in missions_data:
            mission, created = Mission.objects.get_or_create(
                company=company,
                title=mission_data['title'],
                defaults=mission_data
            )
            if created:
                created_count += 1
                self.stdout.write(self.style.SUCCESS(f'✅ Mission créée: {mission.title}'))

        self.stdout.write(self.style.SUCCESS(f'\n🎉 {created_count} nouvelles missions créées!'))
        self.stdout.write(f'📊 Total missions en base: {Mission.objects.count()}')
