<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-JWm/o52r/h6wSm9MfbHca6XQ0C47eH1UZjNOQi0h8cZh5XYvOT5DKgGsNhg9X2G2mF+xmdA9mjL3h7EF7XOdOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            display: flex;
            margin: 0;
        }
        .sidebar {
            height: 100vh; /* Altura completa */
            width: 200px; /* Ancho ajustado de la sidebar */
            background-color: #343a40; /* Color de fondo de la sidebar */
            padding: 20px; /* Espaciado interno */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5); /* Sombra para la sidebar */
        }
        .sidebar .navbar-brand {
            color: #ffffff; /* Color del texto del título */
            font-size: 1.25rem; /* Tamaño del texto reducido */
            padding: 10px 0; /* Espaciado superior e inferior ajustado */
            border-bottom: 2px solid #495057; /* Línea inferior */
            margin: 0 10px; /* Margen a los lados reducido */
        }
        .sidebar a {
            color: white; /* Color del texto de los enlaces */
            padding: 10px; /* Espaciado interno para los enlaces */
            border-radius: 5px; /* Bordes redondeados */
            margin-bottom: 10px; /* Espaciado entre elementos */
            transition: background-color 0.3s; /* Transición suave */
            display: flex; /* Alinear iconos y texto */
            align-items: center; /* Centrar verticalmente */
            overflow: hidden;
        }
        .sidebar a:hover {
            background-color: #495057; /* Color de fondo en hover */
            color: white; /* Color del texto en hover */
        }
        .content {
            flex-grow: 1; /* El contenido ocupará el espacio restante */
            padding: 20px; /* Espaciado interno */
        }
        .sidebar .nav-link {
            display: flex;
            justify-content: flex-start; /* Alinear el icono y el texto al inicio */
            align-items: center; /* Alinear verticalmente */
        }
        .sidebar .nav-link i {
            margin-right: 10px; /* Espacio entre el icono y el texto */
        }
        .icon-right {
            margin-left: auto; /* Empuja el ícono hacia la derecha */
        }
        .sidebar .span
            margin-left: 5px; /* Empuja el ícono hacia la derecha */
        }
    </style>
</head>
<body>
    <div class="sidebar" id="mySidebar">
        <a href="{{ route('home') }}" class="navbar-brand">
            <span class="link-text">El Manantial </span>
            <img src="{{ asset('imagenes/LogoTienda.png') }}" class="img-fluid" alt="Bienvenido" style="max-width: 20%; height: auto;"> <!-- Ajusta el tamaño de la imagen -->
        </a>
        <br>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('ventas') }}">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="link-text">Ventas</span>
            </a>
            <a class="nav-link" href="#">
                <i class="fa-solid fa-truck"></i>
                <span class="link-text">Compras</span>
            </a>
            <a class="nav-link" href="{{ route('producto') }}">
                <i class="fa-solid fa-box-open"></i>
                <span class="link-text">Productos</span>
            </a>
            <a class="nav-link" href="#">
                <i class="fa-regular fa-rectangle-list"></i>
                <span class="link-text">Reportes</span>
            </a>
            <a class="nav-link" href="#">
                <i class="fa-solid fa-circle-user"></i>
                <span class="link-text">Usuarios</span>
            </a>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
