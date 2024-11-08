<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-JWm/o52r/h6wSm9MfbHca6XQ0C47eH1UZjNOQi0h8cZh5XYvOT5DKgGsNhg9X2G2mF+xmdA9mjL3h7EF7XOdOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="sidebar" id="mySidebar">
        <a href="{{ route('home') }}" class="navbar-brand">
            <span class="link-text">El Manantial&nbsp </span>
            <img src="{{ asset('imagenes/LogoTienda.png') }}" class="img-fluid" alt="Bienvenido" style="max-width: 20%; height: auto;">
        </a>
        <br>
        <nav class="nav flex-column">
            <a class="nav-link {{ Request::is('ventas') ? 'active' : '' }}" href="{{ route('ventas') }}">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="link-text">Ventas</span>
            </a>
            <a class="nav-link" href="#">
                <i class="fa-solid fa-truck"></i>
                <span class="link-text">Compras</span>
            </a>

            <!-- Enlace Inventario con submenú colapsable -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#inventoryMenu" role="button" aria-expanded="{{ Request::is('producto*') || Request::is('categoria*') ? 'true' : 'false' }}" aria-controls="inventoryMenu">
                    <i class="fa-solid fa-warehouse"></i>
                    <span class="link-text">Inventario</span>
                    <i class="fa-solid fa-arrow-down-short-wide icon-right icon-down"></i>
                </a>
                <div class="collapse {{ Request::is('producto*') || Request::is('categoria*') ? 'show' : '' }}" id="inventoryMenu">
                    <ul class="nav flex-column ml-3">
                    @can('producto')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('producto*') ? 'active' : '' }}" href="{{ route('producto') }}">
                                <i class="fa-solid fa-box-open"></i>
                                <span class="link-text">Productos</span>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('categoria*') ? 'active' : '' }}" href="{{ route('categoria') }}">
                                <i class="fa-solid fa-tags"></i>
                                <span class="link-text">Categorías</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <a class="nav-link" href="#">
                <i class="fa-regular fa-rectangle-list"></i>
                <span class="link-text">Reportes</span>
            </a>
            @can('usuarios')
            <li class="nav-item">
            <a class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">
                <i class="fa-solid fa-circle-user"></i>
                <span class="link-text">Usuarios</span>
            </a>
            </li>
            @endcan
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
