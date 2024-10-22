from django.shortcuts import render,HttpResponse
from home.models import Contact
from datetime import datetime

def index(request):
    return render(request, 'index.html')

def about(request):
    return render(request, 'about.html')

def resume(request):
    return render(request, 'resume.html')

def contact(request):
    if request.method == "POST":
        name=request.POST.get("name")
        email=request.POST.get("email")
        subject=request.POST.get("subject")
        message=request.POST.get("message")
        obj = Contact(name=name , email=email , subject=subject , message=message , date=datetime.today())
        obj.save()
        HttpResponse("message send succeessfully")
    return render(request, 'contact.html')
