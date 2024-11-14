@extends('layouts.app')

@section('content')
<title>Usuarios</title>

@if(session('mensaje'))
    <div class="alert alert-success mensaje-alert">
        {{ session('mensaje') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mensaje-alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<head>
    <link rel="stylesheet" href="{{ asset('archivos/tables/table.css') }}">
</head>

<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <div class="d-flex align-items-center w-100">
                <h3 class="card-title mb-0">Registro de Usuarios</h3>
                <div class="ms-auto d-flex align-items-center">
                    <a href="{{route('register') }}" class="btn btn-success btn-sm ml-2">
                        Registrar un Usuario<i class="fa fa-fw fa-plus-circle pl-1"></i>
                    </a>
                </div>
            </div>
            <br>
            <div class="d-flex align-items-center justify-content-between">

                
                <!-- Barra de búsqueda -->
                <div class="ms-auto d-flex align-items-center">
                    <div class="input-group-wrapper">
                        <form action="#" method="GET" class="input-group" id="search-form">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" id="form1" name="search" class="form-control" placeholder="Buscar usuario" />
                            </div>
                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tabla-data" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Las filas de usuarios se agregarán aquí en el futuro -->
                        @foreach($usuarios as $usuario)
                        <tr>
                            <th scope="col">{{ $usuario->id }}</th>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                            @if($usuario->roles->isEmpty())
                                No asignado
                            @else
                                @foreach($usuario->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            @endif
                            </td>
                            <td style="display: flex; align-items: center;">
                                <a href="{{ route('usuarios.destroy', ['id' => $usuario->id])}}" onclick="return confirm('¿Estás seguro de que deseas eliminar usuario?');" 
                                data-toggle="tooltip" title="Eliminar este registro" style="margin: 0 10px;">
                                    <i class="text-danger far fa-trash-alt"></i>
                                </a>&nbsp;

                                <a href="{{ route('usuarios.edit', ['usuario' => $usuario->id]) }}" onclick="return confirm('¿Estás seguro de que deseas editar usuario?');"
                                data-toggle="tooltip" title="Editar este registro" style="margin: 0 10px;">
                                <i class="fa-regular fa-pen-to-square"></i>
                                </a>&nbsp;

                                <a href="" data-toggle="tooltip" title="Ver Detalles" style="margin: 0 10px;">
                                    <i class="fa-regular fa-eye" style="color: black"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
               <div class="d-flex justify-content-center mt-4">
                                        {{ $usuarios->links('pagination::bootstrap-4') }}
                                    </div>
            </div>
        </div>
        <script src="{{ asset('archivos/tables/table.js') }}"></script>
    </div>
</div>
@endsection
