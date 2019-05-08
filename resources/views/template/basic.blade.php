<!doctype html>
<html lang="{{ app()->getLocale() }}" prefix="og:http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <title>wGlam</title>
    <meta property="og:title" content="myOutfit" />
    <meta property="og:type" content="image/jpeg" />
    <meta property="og:url" content="http://127.0.0.1:8000/item/55" />
    <meta property="og:image" content="{{ asset('/flequillo.jpg') }}" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c:300,400,500,700" rel="stylesheet"> 
    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
  <div class="container">
      <header class="main-header">
          <nav class="nav-logo-icon">
            <div class="cajalogo"> 
                <img src="{{ asset('/wGlam.png') }}" alt="wGlam"  class="logo">              
            </div>

            <div class="nav-iconos">
              @if(Auth::check())
                @if(Auth::user()->role === "adm") <a href="/adm/user">Adm</a> @endif
                <a href="/perfil/{{Auth::user()->id}}/edit" style="margin:10px;">{{Auth::user()->name}}</a>
                {{-- <a href="/perfil/{{Auth::user()->id}}/edit" style="margin:40px;color:black;">{{Auth::user()->name}}</a> --}}
                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                <a style="margin:5px 10px 5px 10px;">Plan{{Auth::user()->abono}}</a>
                {{-- <a style="margin:40px;color:black;">Plan {{Auth::user()->abono}}</a> --}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" style="margin:10px;">
                  {{ __('Logout') }}
                </a>
            
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                {{-- </div> --}}
              @else   
                <a href="{{ route('login') }}" style="margin:10px;">Login</a>
                <a href="{{ route('register') }}" style="margin:10px;">Register</a>    
              @endif
                {{-- <li><a href="/carro"><i class="fas fa-cart-arrow-down"></a></i></li> --}}
            </div>
          </nav>
    </header>
  </div>

    <main>
        @yield('content')
    </main>

    <footer class="indColumn">
      
      <div class="index" style="padding:10px;font-size:0.8em;">
        <!-- Sitio -->  
        <ul style="width:30vw; color:grey;border-right:solid lightgrey 1px;">
              <li ><a style="color:grey" href="/item">Home</a></li>                    
              <li ><a style="color:grey" href="/producto/shop">Shop</a></li>
              <li ><a style="color:grey" href="/guardarropa">FAQ</a></li> 
          </ul>
         <!-- Sitio -->  
         <ul style="width:30vw; color:grey;border-right:solid lightgrey 1px;">
            <li>Contacto Comercial</li>
            <li>Términos y Condiciones</li>   
        </ul> 
        <!-- Redes -->  
        <ul style="width:30vw; color:grey;">
            <li>Facebook</li>
            <li>Instagram</li>
            {{-- <li>Twitter</li>
            <li>Gmail</li> --}}
        </ul>   
      </div> 
      <div style="padding:30px;color:grey;font-size:0.8em;">
        <span >wGlam</span>
        <span>copyright | Todos los derechos reservados.</span>
      </div> 
    </footer>
    
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script> --}}
  {{-- </div> --}}
</body>
</html>
  