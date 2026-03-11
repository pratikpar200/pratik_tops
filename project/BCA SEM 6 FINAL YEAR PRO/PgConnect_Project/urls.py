"""
URL configuration for PgConnect_Project project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/5.1/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from PgConnect_App import views
from django.conf.urls.static import static
from django.conf import settings

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', views.index),
    path('sign_in',views.sign_in),
    path('sign_up',views.sign_up),
    path('dashboard',views.dashboard),
    path('about_us',views.about_us),
    path('dashboard_add_property',views.dashboard_add_property),
    path('fetchregisterdata',views.fetchregisterdata),
    path('fetchlogindata',views.fetchlogindata),
]+ static(settings.MEDIA_URL,document_root=settings.MEDIA_ROOT)
