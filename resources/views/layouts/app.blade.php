<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- En la sección <head> -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('archivos/sidenav.css') }}">
  <link rel="stylesheet" href="{{ asset('archivos/appblade.css') }}">
  
  <style>
.content-custom {
    margin-top: 66px; /* Ajuste para evitar que el contenido se solape con la navbar (66px considerando el padding de la navbar) */
    margin-left: 200px; /* Ajuste del margen izquierdo para que no se solape con la sidebar */
    padding: 30px; /* Espaciado interno */
}

  </style>
  
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
