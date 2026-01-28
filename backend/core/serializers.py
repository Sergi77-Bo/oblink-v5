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
    # Nested company serializer
    company = CompanySerializer(read_only=True)
    
    # CamelCase fields for frontend compatibility
    jobType = serializers.CharField(source='job_type', read_only=True)
    softwareRequired = serializers.JSONField(source='software_required', read_only=True)
    
    # Geolocation fields
    latitude = serializers.SerializerMethodField()
    longitude = serializers.SerializerMethodField()

    class Meta:
        model = Mission
        fields = [
            'id',
            'title',
            'description',
            'city',
            'jobType',
            'softwareRequired',
            'company',
            'latitude',
            'longitude',
            'created_at',
        ]

    def _get_location(self, obj):
        # Guard against missing GeoDjango location field in SQLite dev setups
        return getattr(obj, 'location', None)

    def get_latitude(self, obj):
        location = self._get_location(obj)
        return location.y if location else None

    def get_longitude(self, obj):
        location = self._get_location(obj)
        return location.x if location else None

class ApplicationSerializer(serializers.ModelSerializer):
    class Meta:
        model = Application
        fields = '__all__'
        read_only_fields = ['candidate', 'status']
