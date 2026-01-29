from django.db import models
from django.contrib.auth import get_user_model
# JSONField is compatible with SQLite (unlike ArrayField which is PG only)
from django.db.models import JSONField 

User = get_user_model()

# --- CONSTANTES ---
SOFTWARE_CHOICES = [
    ('COSIUM', 'Cosium'),
    ('POLEYRE', 'Poleyre'),
    ('IVOIR', 'Ivoirnet'),
    ('OSIRIS', 'Osiris'),
]

JOB_TYPES = [
    ('CDI', 'CDI'),
    ('FREELANCE', 'Freelance'),
    ('ALTERNANCE', 'Alternance'),
]

# --- PROFILS ---
class CandidateProfile(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE, related_name='candidate_profile')
    is_diploma_verified = models.BooleanField(default=False)
    # Changed to JSONField for SQLite compatibility
    software_skills = JSONField(default=list, blank=True)
    is_freelance = models.BooleanField(default=False)
    has_equipment = models.BooleanField(default=False) # Mallette
    mobility_radius_km = models.PositiveIntegerField(default=30)
    years_experience = models.PositiveIntegerField(default=0)
    daily_rate = models.PositiveIntegerField(default=0, help_text="Tarif journalier en euros")


    class Meta:
        verbose_name = "Profil Candidat"
        verbose_name_plural = "Profils Candidats"

    def __str__(self): return f"Candidat: {self.user.email}"

class CompanyProfile(models.Model):
    SUBSCRIPTION_TIERS = [('FREE', 'Découverte'), ('PREMIUM', 'Premium'), ('CORP', 'Corporate')]
    user = models.OneToOneField(User, on_delete=models.CASCADE, related_name='company_profile')
    company_name = models.CharField(max_length=255)
    network_brand = models.CharField(max_length=100, blank=True)
    subscription_tier = models.CharField(max_length=20, choices=SUBSCRIPTION_TIERS, default='FREE')

    class Meta:
        verbose_name = "Profil Entreprise"
        verbose_name_plural = "Profils Entreprises"

    def __str__(self): return self.company_name

# --- MARKETPLACE ---
class Mission(models.Model):
    company = models.ForeignKey(CompanyProfile, on_delete=models.CASCADE)
    title = models.CharField(max_length=200)
    description = models.TextField()
    job_type = models.CharField(max_length=20, choices=JOB_TYPES)
    # Changed to JSONField for SQLite compatibility
    software_required = JSONField(default=list, blank=True)
    city = models.CharField(max_length=100)
    is_active = models.BooleanField(default=True)
    created_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        verbose_name = "Mission"
        verbose_name_plural = "Missions"
        ordering = ['-created_at']

class Application(models.Model):
    STATUS_CHOICES = [('PENDING', 'En attente'), ('ACCEPTED', 'Accepté'), ('REJECTED', 'Refusé')]
    mission = models.ForeignKey(Mission, on_delete=models.CASCADE)
    candidate = models.ForeignKey(CandidateProfile, on_delete=models.CASCADE)
    status = models.CharField(max_length=20, choices=STATUS_CHOICES, default='PENDING')
    
    class Meta:
        verbose_name = "Candidature"
        verbose_name_plural = "Candidatures"
        unique_together = ('mission', 'candidate')

# --- ACADEMY ---
class Course(models.Model):
    title = models.CharField(max_length=200)
    category = models.CharField(max_length=50) # BTS_U4, VAE...

    class Meta:
        verbose_name = "Cours"
        verbose_name_plural = "Cours"

class Lesson(models.Model):
    course = models.ForeignKey(Course, on_delete=models.CASCADE)
    title = models.CharField(max_length=200)
    content_text = models.TextField(blank=True)
    video_url = models.URLField(blank=True)

    class Meta:
        verbose_name = "Leçon"
        verbose_name_plural = "Leçons"
