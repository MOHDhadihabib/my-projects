from django.db import models

# Create your models here.

class Contact(models.Model):
      name=models.CharField(max_length=255)
      email= models.EmailField()
      subject = models.TextField()
      message = models.TextField()
      date = models.DateField()

      def __str__(self):
        return self.name