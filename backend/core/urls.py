from django.urls import path, include
from rest_framework.routers import DefaultRouter
from .views import MissionViewSet, CandidateViewSet, ApplicationViewSet, AcademyChatView, ContractGeneratorView, ManageUserView, SeedDataView
from rest_framework_simplejwt.views import TokenObtainPairView, TokenRefreshView

router = DefaultRouter()
router.register(r'missions', MissionViewSet)
router.register(r'candidats', CandidateViewSet)
router.register(r'applications', ApplicationViewSet)

urlpatterns = [
    path('', include(router.urls)),
    path('academy/chat/', AcademyChatView.as_view(), name='academy-chat'),
    path('tools/generate-contract/', ContractGeneratorView.as_view(), name='generate-contract'),
    path('tools/seed-magic/', SeedDataView.as_view(), name='seed_data'),
    path('token/', TokenObtainPairView.as_view(), name='token_obtain_pair'),
    path('token/refresh/', TokenRefreshView.as_view(), name='token_refresh'),
    path('users/me/', ManageUserView.as_view(), name='manage_user'),
]
