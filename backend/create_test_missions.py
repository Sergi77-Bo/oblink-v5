"""
Script pour créer des missions de test dans la base de données OBLINK.
À exécuter avec: python manage.py shell < create_test_missions.py
"""

from django.contrib.auth import get_user_model
from core.models import CompanyProfile, Mission

User = get_user_model()

# Créer un utilisateur entreprise de test si nécessaire
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
    print(f"✅ Utilisateur créé: {user.username}")

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
    print(f"✅ Entreprise créée: {company.company_name}")

# Créer des missions de test
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
        print(f"✅ Mission créée: {mission.title}")

print(f"\n🎉 {created_count} missions créées avec succès!")
print(f"📊 Total missions en base: {Mission.objects.count()}")
