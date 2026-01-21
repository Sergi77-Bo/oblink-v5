from django.contrib import admin
from .models import CandidateProfile, CompanyProfile, Mission, Application, Course, Lesson

admin.site.register(CandidateProfile)
admin.site.register(CompanyProfile)
admin.site.register(Mission)
admin.site.register(Application)
admin.site.register(Course)
admin.site.register(Lesson)
