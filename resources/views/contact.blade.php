@extends('app')
@section('content')
<!doctype html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Welcome | Contact Us </title>
<style>
        body{

        background-image: url("https://images.unsplash.com/photo-1545529468-42764ef8c85f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1173&q=80"); /* Kullanılacak Görsel */
         background-color: rgb(184, 94, 78); /* Görsel Çalışmassa Arkaplan Rengi */
         
         background-repeat: repeat; /* Resmi tekrarlama */
         background-size: cover; /* resmi ekranı kaplayacak hale getir. */
       
       }
       .section_title{
            margin-top: 10mm;
            
       }
        .centered-text{
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <br>
    <a href="tel:+1234567890">123-456-7890</a> <br>
    <a href="https://api.whatsapp.com/send?phone=905345678998&text=Bilgi%20ve%20Randevu%20almak%20istiyorum" class="float" target="_blank">
    <i class="fa fa-whatsapp">Randevu Almak İstiyorum - (whatsapp hattı) </i> <br> <br> <br>
    </a>
    <div class="centered-text" >
        <iframe src="https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d49142.62688472339!2d27.864368642012742!3d39.66289679687586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!3e3!4m5!1s0x14b6ff9d1ff4bdf7%3A0x940e17cf2557610f!2sPa%C5%9Fa%20Alan%C4%B1%2C%20Ya%C5%9Fam%20Veteriner%20Klini%C4%9Fi%2C%20Melih%20Kotanca%20Cd.%20124.%20Sokak%20No%3A%2023%2F1%2C%2010020%20Karesi%2FBal%C4%B1kesir!3m2!1d39.662845999999995!2d27.9055733!4m4!1s0x14b6ff9d1ff4bdf7%3A0x940e17cf2557610f!3m2!1d39.662845999999995!2d27.9055733!5e0!3m2!1str!2str!4v1692009914919!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>

</html>
@endsection