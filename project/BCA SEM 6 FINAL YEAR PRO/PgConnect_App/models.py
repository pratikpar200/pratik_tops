from django.db import models
from django.utils.safestring import mark_safe

# Create your models here.

class register_model(models.Model):
    name =models.CharField(max_length=30)
    email = models.EmailField()
    phone = models.BigIntegerField(null=True)
    address = models.TextField(null=True)
    password = models.CharField(max_length=6)
    role = models.CharField(max_length=20)
    picture = models.ImageField(upload_to='photos')

    def user_picture(self):
        return mark_safe('<img src="{}" width="100"/'.format(self.picture.url))

    user_picture.allow_tag = True

    def __str__(self):
        return self.name


