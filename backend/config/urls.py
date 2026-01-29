from django.contrib import admin
from django.urls import path, include

urlpatterns = [
    path('oblink-secure-admin/', admin.site.urls),  # Custom admin URL for security
    path('api/', include('core.urls')),
]
