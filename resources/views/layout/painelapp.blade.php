<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author">
    <link rel="icon" href="{{asset('imgs/icon-top.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login sistema Evolutec</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/service-worker.js') }}" defer></script>

<!-- PWA -->
    <link rel="app-touch-icon" href="{{ asset('imgs/logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    
    

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

      body{
        background-color: #F9FEFF;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
<body >

        
        @yield('content')
        @yield('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Importe a biblioteca JavaScript do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

      <!-- PWA -->
    <script src="{{ asset('/sw.js') }}" defer></script>
    <script>
      if (!navigator.serviceWorker.controller){
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
          console.log("ServiceWorker inserido: " + reg.scope);
        });
      }
    </script>
  </body>
</html>




