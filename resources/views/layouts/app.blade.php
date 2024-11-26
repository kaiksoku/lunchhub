<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qzS3HZZoabufLRen3Syp7EuybTzC2Qh38C7Lo8JNO6Ip8Kw5KHkTxIW+HfbF9ZaP" crossorigin="anonymous">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (incluye Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <!-- En la sección <head> -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('archivos/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('archivos/appblade.css') }}">
  
</head>
<body>

  <div class="d-flex">
    <!-- Incluye el sidebar -->
    @include('partials.sidebar')
    <div class="flex-grow-1">
      <!-- Incluye el navbar -->
      <div class="navbar-custom">
      @include('partials.navbar')
      </div>

      <!-- Tu contenido principal -->
      <div class="content-custom">
        @yield('content')
      </div>
    </div>
    
  </div>

  <!-- Bootstrap Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Justo antes de cerrar la etiqueta </body> -->
  <script src="{{ asset('adminlte/js/jquery.min.js') }}"></script>
  <script src="{{ asset('adminlte/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('archivos/tables/table.js') }}"></script>

</body>
</html>
