<!-- Sidebar HTML -->
<head>
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (incluye Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>


<div class="sidebar">
<a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center justify-content-center" style="height: auto; padding: 0; margin: 0; position: relative; top: -35px;">
    <img src="{{ asset('imagenes/marca.png') }}" class="img-fluid" alt="Bienvenido" style="max-width: 85%; height: auto; display: block; filter: drop-shadow(0px 6px 10px rgba(0, 0, 0, 0.4));">
</a>


  <ul>
    <li><a href="#"><i class="fa-solid fa-border-all icon"></i>&nbsp Dashboard</a></li>

    <li class="nav-item">
            <a class="nav-link {{ Request::is('categoria*') ? 'active' : '' }}" href="{{ route('categoria.edit') }}">
            <i class="fa-regular fa-bell icon"></i></i>
                <span class="link-text">&nbsp Mis Solicitudes</span>
            </a>
    </li>
    
    <li class="nav-item">
            <a class="nav-link {{ Request::is('restaurantes*') ? 'active' : '' }}" href="{{ route('restaurantes') }}">
            <i class="fa-solid fa-shop icon"></i></i>
                <span class="link-text">Restaurantes</span>
            </a>
    </li>
    @can('Ver Roles')
    <li><a href="#"><i class="fa-solid fa-book icon"></i>&nbsp Autorizaciones</a></li>
@endcan
    


<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#Personal" role="button" 
       aria-expanded="{{ Request::is('empleados*') || Request::is('departamentos*') ? 'true' : 'false' }}" 
       data-bs-target="#Personal">
       <i class="fa-solid fa-users icon"></i>
        <span class="link-text">&nbsp Personal</span>
        <i class="fa-solid fa-arrow-down-short-wide icon-right icon-down"></i>
    </a>
    <div class="collapse {{ Request::is('empleados*') || Request::is('departamentos*') ? 'show' : '' }}" id="Personal">
        <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('empleados*') ? 'active' : '' }}" href="{{ route('empleados') }}">
                <i class="fa-solid fa-user icon"></i>
                    <span class="link-text">&nbsp Empleados</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('departamentos*') ? 'active' : '' }}" href="{{ route('departamentos') }}">
                <i class="fa-regular fa-building icon"></i>
                    <span class="link-text" style="font-size: 14px">&nbspDepartamentos</span>
                </a>
            </li>

        </ul>
    </div>
    
</li>

<li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Administracion" role="button" 
            aria-expanded="{{ Request::is('usuarios*') || Request::is('roles*') ? 'true' : 'false' }}" 
            data-bs-target="#Administracion">
            <i class="fa-solid fa-sliders icon"></i>
                <span class="link-text">&nbsp Administracion</span>
                <i class="fa-solid fa-arrow-down-short-wide icon-right icon-down"></i>
            </a>
                <div class="collapse {{ Request::is('usuarios*') || Request::is('roles*') ? 'show' : '' }}" id="Administracion">
        <ul class="nav flex-column ml-3">

            @can('Ver Usuarios')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">  
                <i class="fa-solid fa-user-pen icon"></i>
                    <span class="link-text">&nbsp Usuarios</span>
                </a>
            </li>
            @endcan

            @can('Ver Roles')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('roles*') ? 'active' : '' }}" href="{{ route('roles') }}">
                <i class="fa-solid fa-users-gear icon"></i>
                    <span class="link-text">&nbsp Roles</span>
                </a>
            </li>
            @endcan

        </ul>
    </div>
</li>

  </ul>
</div>