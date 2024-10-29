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
    /* Estilo para el logo */
    .logo-img {
      max-height: 35px; /* Ajusta el tamaño de tu logo */
    }

    /* Sidebar fija */
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      width: 200px; /* Ancho fijo para la sidebar */
      background-color: #343a40; /* Color oscuro de fondo */
      z-index: 1000; /* Asegura que esté por encima de otros elementos */
      padding-top: 56px; /* Espaciado para que no se solape con el navbar */
    }

    /* Navbar fija */
    .navbar-custom {
      position: fixed;
      top: 0;
      left: 200px; /* Asegura que el navbar no se solape con la sidebar */
      right: 0;
      z-index: 1050; /* Asegura que esté por encima de otros elementos */
      background-color: white;
      padding: 10px;
      height: 56px; /* Altura fija de la navbar */
    }

    /* Ajustes para el contenido principal */
    .content-custom {
      margin-top: 66px; /* Ajuste para evitar que el contenido se solape con la navbar (66px considerando el padding de la navbar) */
      margin-left: 200px; /* Ajuste del margen izquierdo para que no se solape con la sidebar */
      padding: 30px; /* Espaciado interno */
    }

    /* Contenedor que evita que la sidebar se mueva */
    .content-wrapper {
      margin-top: 66px; /* Ajuste del margen superior para que no se solape con el navbar */
      margin-left: 200px; /* Ajuste para el ancho de la sidebar */
      padding-right: 15px; /* Espaciado en el lado derecho */
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
