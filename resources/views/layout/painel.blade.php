<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author">
    <meta name="generator" content="Hugo 0.87.0">
    <link rel="icon" href="{{asset('imgs/icon-top.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Painel Administrativo sistema Evolutec.</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="manifest" href="{{asset('manifest.json')}}">

    <style>
      #map{
        height: 100%;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

  </head>
<body>

<header class="navbar navbar-dark sticky-top flex-md-nowrap pt-0 pb-0 ml-5 shadow" style="background-color: #030585;">
  <img src="{{asset('imgs/logo-top.png')}}" class="" width='auto' height='93px'>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <p><h5 class="text-white">Você está logado como: {{ Auth::user()->name }}</h5></p>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="btn btn-sm btn-outline-secondary">Logout</button>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

            <form id="logout-form" action="" method="POST" class="d-none">
                @csrf
            </form>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-4">
        <br><br><br><br>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{route('welcome')}}">
                <span data-feather="home"></span>
                Painel principal
              </a>
            </li>
          </ul>
          <button class="btn mt-1 btn-secondary btn-sm rounded w-100 text-left" onclick="Mudarestado('cadastros')">
            <span data-feather="chevrons-right"></span>Cadastros <span data-feather="chevron-down"></span>
          </button>
          <br>
          <ul class="nav flex-column" id="cadastros" style="display: none;">
            <li class="nav-item">
              <a class="nav-link" href="{{route('pacientes.index')}}">
                <span data-feather="list"></span>
                Pacientes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('profissionais.index')}}">
                <span data-feather="list"></span>
                Profissionais
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('avds.index')}}">
                <span data-feather="list"></span>
                Avds
              </a>
            </li>
          </ul>
        </div>
      </nav>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        @yield('content')

    </main>
  </div>
</div>


    <!--
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script>
      feather.replace()
    </script>

    <!-- Gráficos
    <script src="{{asset('js/Chart.min.js.transferir')}}"></script>
    -->
    <script>

    function Mudarestado(el) {  
      var display = document.getElementById(el).style.display;
      if (display == "none")
        document.getElementById(el).style.display = 'block';
      else
        document.getElementById(el).style.display = 'none';
    }

      
    </script>

    

  </body>
</html>




