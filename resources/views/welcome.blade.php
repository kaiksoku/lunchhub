<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Fuente personalizada de Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

  <style>
    /* Estilo personalizado para la página */
    body {
      font-family: 'Poppins', sans-serif;
    }

    /* Sección de imagen y título */
    .full-width-section {
      background-color: #f8f9fa; /* Color gris claro */
      width: 100%; /* Extiende el contenedor al 100% del ancho de la pantalla */
      padding: 2rem 0; /* Espaciado arriba y abajo */
      text-align: center;
    }

    /* Estilo del título */
    .titulo {
      font-size: 2.5rem; /* Tamaño de fuente */
      font-weight: bold;
      color: #333;
      margin-bottom: 1.5rem;
    }

    /* Ajuste de tamaño de la imagen */
    .full-width-section img {
      max-width: 58%; /* Ajuste del ancho de la imagen al 80% del contenedor */
      height: auto;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="bg-dark p-4">
        <h5 class="text-white h4">Bienvenido al Sistema de Tienda El Manantial.</h5>
        <span class="text-muted">Debe iniciar sesión para comenzar a trabajar.</span>
      </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Botones -->
      <div class="ml-auto d-flex">
        <a href="{{ route('login') }}" class="btn btn-outline-light mr-2">Iniciar sesión</a> <!-- Botón a la izquierda -->
        <!--<a href="{{ route('register') }}" class="btn btn-outline-light">Registrarse</a> Botón a la derecha -->
      </div>
    </nav>
  </div>

  <!-- Main content -->
  <div class="full-width-section">
    <!-- Texto "Tienda el Manantial" centrado -->
    <h1 class="titulo">Tienda El Manantial</h1>
    <!-- Imagen ajustada -->
    <img src="{{ asset('imagenes/welcome.jpg') }}" class="img-fluid" alt="Bienvenido">
  </div>

  <!-- Scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- jQuery completo -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
