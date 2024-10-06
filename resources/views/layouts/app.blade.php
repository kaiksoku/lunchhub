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

  <!-- Estilos personalizados -->
  <style>
    .logo-img {
      max-height: 35px; /* Ajusta el tamaño de tu logo */
    }
    .sidebar-dark-primary {
      background-color: #343a40; /* Color oscuro de fondo */
    }
    .navbar-custom {
      position: fixed; /* Cambiado a fixed para que se ajuste al ancho de la pantalla */
      top: 0; /* Asegura que esté en la parte superior */
      left: 200px; /* Mantiene el margen izquierdo correspondiente a la sidebar */
      right: 0; /* Alinea a la derecha */
      z-index: 1000; /* Asegúrate de que esté por encima de otros elementos */
      background-color: white; /* Asegúrate de que el fondo sea blanco o el que desees */
      padding: 10px; /* Espaciado interno */
    }
    .content-custom {
      margin-top: 56px; /* Ajusta el margen superior para que no se solape con el navbar */
      margin-left: 0px; /* Ajusta el margen izquierdo para mover el contenido más a la izquierda */
      margin-right: 15px; /* Espaciado en el lado derecho */
      padding: 0px; /* Espaciado interno del contenido */
    }
    .content-wrapper {
      margin-top: 56px; /* Ajusta el margen superior para que no se solape con el navbar */
      margin-left: 0px; /* Ajusta el margen izquierdo para mover el contenido más a la izquierda */
      margin-right: 15px; /* Espaciado en el lado derecho */
    }
    .sidebar {
      width: 200px; /* Ancho fijo para la sidebar */
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

</body>
</html>
