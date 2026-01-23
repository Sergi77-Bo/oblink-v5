from rest_framework import serializers
from django.contrib.auth.models import User
from .models import CandidateProfile, CompanyProfile, Mission, Application, Course

class UserSerializer(serializers.ModelSerializer):
    class Meta:
        model = User
        fields = ['id', 'username', 'email', 'first_name', 'last_name', 'groups']

class CompanySerializer(serializers.ModelSerializer):
    class Meta:
        model = CompanyProfile
        fields = ['id', 'company_name', 'network_brand', 'subscription_tier']

class CandidateSerializer(serializers.ModelSerializer):
    # On ajoute l'email de l'user lié pour l'affichage
    email = serializers.EmailField(source='user.email', read_only=True)

    class Meta:
        model = CandidateProfile
        fields = ['id', 'email', 'is_diploma_verified', 'software_skills', 'years_experience', 'is_freelance', 'daily_rate']

class MissionSerializer(serializers.ModelSerializer):
    # On imbrique les infos de l'entreprise pour éviter de faire 2 requêtes
    company = CompanySerializer(read_only=True)
    
    class Meta:
        model = Mission
        fields = '__all__'

class ApplicationSerializer(serializers.ModelSerializer):
    class Meta:
        model = Application
        fields = '__all__'
        read_only_fields = ['candidate', 'status']
