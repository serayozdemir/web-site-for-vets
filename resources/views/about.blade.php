@extends('app')
@section('content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Welcome | About Us</title>
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
    </style>
    
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container">
                    <div class="section_title" style="font-family: monospace"><h1>Biz Kimiz</h1></div>
                    <p class="section_title">Karşıkaya Yaşam Veteriner Kliniği Veteriner Hekimi Kurucu Doruk GÜROL yönetiminde, minik dostlarımızın ve onların ailelerinin gerçekten güvenebileceği, 
                    her imkana ulaşabilecekleri, sıkıntılarına ve hastalıklarına en doğru ve uygun tedavi ve çözüm yolları sunabileceğimiz, kendilerini özel hissedebilecekleri 
                    bir aile ortamı sunmaktır.</p>
                
                <p>Veteriner Hekimi <b>Doruk GÜROL</b></p>
                </div>
            </div>
        </div>
 
        <div class="row milestones_row">
            <div class="col">
                        <div id="dis_bolme">
                                <div class="ic_bolme">
                                <div class="e">
                                <a href="#">
                                    <div><img src="resources/img/veteriner-icon.png"></div>
                                    <div class="milestone_title_ku">Vet. Hekimi <br>Doruk GÜROL</div>
                                </a>
                                <div class="milestone_text">
                                    <a href="#"></a>
                                    <p>
                                        <a href="#"></a>
                                        <a href="https://www.facebook.com/karsiyakayasamveterinerklinigi/"><i class="fa fa-facebook fa-2x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <i class="fa fa-instagram fa-2x"></i>
                                    </p>
                                </div>
                                
                                </div>
                                </div>


                        </div>

            </div>
        </div>
    </div>

        
          
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
@endsection