from django.shortcuts import render
from .models import *
from django.contrib import messages

def index(request):
    return render(request,"index.html")

def about_us(request):
    return render(request,"about_us.html")

def sign_up(request):
    return render(request,"sign_up.html")

def sign_in(request):
    return render(request,"sign_in.html")

def dashboard(request):
    return render(request,"dashboard.html")

def dashboard_add_property(request):
    return render(request,"dashboard_add_property.html")


def fetchregisterdata(request):
    name = request.POST.get("name")
    email = request.POST.get("email")
    phone = request.POST.get("phone")
    address = request.POST.get("address")
    password = request.POST.get("password")
    role = request.POST.get("role")

    profile_image = request.FILES["dp_image"]


    insertquery = register_model(name = name,email=email,phone=phone,address=address,password = password ,role = role,picture = profile_image)
    insertquery.save()
    return render(request,"sign_in.html")


def fetchlogindata(request):
    email = request.POST.get("email")
    password = request.POST.get("password")

    print(email)
    print(password)

    try:
        selectquery = register_model.objects.get(email=email,password=password)
        print(selectquery)
        print("success")

        request.session["log_id"] = selectquery.id
        request.session["log_name"] = selectquery.name
        request.session["log_email"] = selectquery.email

        usersessionid = request.session["log_id"]
        print("Session id :", usersessionid)

    except:
        selectquery = None


    if selectquery is not None:
        return render(request,"dashboard.html")
    else:
        messages.error(request,"Invalid Email or Password")


    return render(request,"sign_in.html")


# def logout(request):
#     try:
#         del request.session["log_id"]
#         del request.session["log_name"]
#         del request.session["log_email"]
#
#     except:
#         pass
#
#     return render(request,"index.html")












