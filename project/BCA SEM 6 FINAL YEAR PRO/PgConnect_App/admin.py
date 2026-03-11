from django.contrib import admin
from .models import *


# Register your models here.

class showregister(admin.ModelAdmin):
    list_display = ["id","name","email","phone","address","password","role","user_picture"]

admin.site.register(register_model,showregister)
