from django.db import migrations
from django.contrib.auth import get_user_model

def create_demo_user(apps, schema_editor):
    User = get_user_model()
    CompanyProfile = apps.get_model('core', 'CompanyProfile')
    
    # Créer l'utilisateur
    if not User.objects.filter(username='admin').exists():
        user = User.objects.create_user(
            username='admin',
            email='admin@oblink.fr',
            password='Admin2026!',
            first_name='Admin',
            last_name='OBLINK',
            is_staff=True,
            is_superuser=True
        )
        
        # Créer aussi un profil entreprise
        CompanyProfile.objects.create(
            user=user,
            company_name='OBLINK Admin',
            network_brand='Admin',
            subscription_tier='PREMIUM'
        )

class Migration(migrations.Migration):
    dependencies = [
        ('core', '0001_initial'),  # Ajustez selon votre dernière migration
    ]

    operations = [
        migrations.RunPython(create_demo_user),
    ]
