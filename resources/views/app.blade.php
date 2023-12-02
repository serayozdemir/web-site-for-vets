
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Welcome</title>
   <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

  @stack('styles')
  </head>
  <body>
       
        <div class="content">
            <ul class="nav justify-content-center" >
            <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
            
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ route('welcome') }}">Anasayfa<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('about') }}">Hakkımızda</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('product.index') }}">Ürünlerimiz</a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hizmetlerimiz
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('generalExamination') }}">Genel Muayene</a>
                        <a class="dropdown-item" href="{{ route('vaccine') }}">Aşı</a>
                        <a class="dropdown-item" href="{{ route('microchipApplication')}}">Mikroçip Uygulaması</a>
                      </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">İletişim</a>
                    </li>
                    @guest
                      <li class="nav-item mr-2"><a href="{{ route('auth.login') }}" class="btn btn-outline-secondary">Giriş Yap</a></li>
                      <li class="nav-item"><a href="{{ route('auth.register') }}" class="btn btn-outline-primary">Kayıt Ol</a></li>
                    @else
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="{{ route('user-profile-information.edit') }}">Ayarlar</a>
                          <a class="dropdown-item" href="{{ route('product.create') }}">Yeni Ürün Ekle</a>
                          <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="dropdown-item">Çıkış</button>
                          </form>
                        </div>
                      </li>
                    @endguest
                </div>
                  </ul>
                  
                </div>
              </nav>
        </ul>

            @yield('content')
        </div>
         @stack('scripts')
          
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>