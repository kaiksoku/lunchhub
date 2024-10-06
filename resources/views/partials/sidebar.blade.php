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
            background-color: #343a40; /* Color de fondo de la sidebar */
            padding: 20px; /* Espaciado interno */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5); /* Sombra para la sidebar */
            transition: width 0.3s; /* Transición suave */
        }
        .sidebar .navbar-brand {
            color: #ffffff; /* Color del texto del título */
            font-size: 1.5rem; /* Tamaño del texto */
            padding-bottom: 20px; /* Espaciado inferior */
            border-bottom: 2px solid #495057; /* Línea inferior */
            margin-bottom: 20px; /* Margen inferior para separación */
        }
        .sidebar a {
            color: white; /* Color del texto de los enlaces */
            padding: 10px; /* Espaciado interno para los enlaces */
            border-radius: 5px; /* Bordes redondeados */
            margin-bottom: 10px; /* Espaciado entre elementos */
            transition: background-color 0.3s; /* Transición suave */
            display: flex; /* Alinear iconos y texto */
            align-items: center; /* Centrar verticalmente */
        }
        .sidebar a:hover {
            background-color: #495057; /* Color de fondo en hover */
            color: white; /* Color del texto en hover */
        }
        .content {
            flex-grow: 1; /* El contenido ocupará el espacio restante */
            padding: 20px; /* Espaciado interno */
        }
        .sidebar.minimized {
            width: 60px; /* Ajusta el ancho cuando esté minimizada */
        }
        .sidebar.minimized .navbar-brand {
            display: none; /* Oculta el título cuando está minimizada */
        }
        .sidebar.minimized .nav-link {
            justify-content: center; /* Centra los iconos */
        }
        .sidebar.minimized .nav-link i {
            margin-right: 0; /* Elimina el margen derecho de los iconos */
        }.sidebar .nav-link {
    display: flex;
    justify-content: space-between; /* Para separar el texto del icono */
    align-items: center; /* Para alinear verticalmente */
}

.icon-right {
    margin-left: auto; /* Empuja el ícono hacia la derecha */
}

    </style>

<!--
<span class="icon-right"><i class="fa-regular fa-rectangle-list"></i></span>
--> 
</head>
<body>
    <div class="sidebar" id="mySidebar">
    <a href="{{ route('home') }}" class="navbar-brand">El Manantial</a>

        <nav class="nav flex-column">
            
            <a class="nav-link" href="#">Ventas <span class="icon-right"><i class="fa-solid fa-cart-shopping"></i></span></a>
            <a class="nav-link" href="#">Compras<span class="icon-right"><i class="fa-solid fa-truck"></i></span></a>
            <a class="nav-link" href="#">Productos<span class="icon-right"><i class="fa-solid fa-box-open"></i></span></a>
            <a class="nav-link active" href="#">Reportes<span class="icon-right"><i class="fa-regular fa-rectangle-list"></i></span></a>
            <a class="nav-link" href="#">Usuarios <span class="icon-right"><i class="fa-solid fa-circle-user"></i></span></a>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const sidebar = document.getElementById('mySidebar');

        // Función para verificar la URL actual y minimizar la sidebar
        function checkPage() {
            const currentPath = window.location.pathname;

            // Verifica si la URL es diferente de la página de inicio
            if (currentPath !== '/home') {
                sidebar.classList.add('minimized'); // Agrega la clase "minimized"
            } else {
                sidebar.classList.remove('minimized'); // Quita la clase "minimized"
            }
        }

        // Función para manejar la minimización y maximización de la sidebar
        sidebar.addEventListener('mouseenter', () => {
            sidebar.classList.remove('minimized'); // Quita la clase "minimized" al pasar el ratón
        });

        sidebar.addEventListener('mouseleave', () => {
            const currentPath = window.location.pathname;
            if (currentPath !== '/home') {
                sidebar.classList.add('minimized'); // Agrega la clase "minimized" al salir el ratón
            }
        });

        // Llama a la función al cargar la página
        window.onload = checkPage;
    </script>
</body>
</html>
