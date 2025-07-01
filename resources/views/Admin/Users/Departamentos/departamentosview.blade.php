@extends('layouts.app')

@section('content')
<title>Departamentos</title>

<head>
    <link rel="stylesheet" href="{{ asset('archivos/tables/table.css') }}">
    <link rel="stylesheet" href="{{ asset('archivos/tables/alerts.css') }}">
</head>

@if(session('mensaje'))
    <div class="mensaje-alert success">
        {{ session('mensaje') }}
    </div>
@endif

@if($errors->any())
    <div class="mensaje-alert danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <div class="d-flex align-items-center w-100">
                <h3 class="card-title mb-0">Listado de Departamentos</h3>
                <div class="ms-auto d-flex align-items-center">
                    <a href="{{route('departamentos.create') }}" class="btn btn-success btn-sm ml-2">
                        Registrar un departamento <i class="fa fa-fw fa-plus-circle pl-1"></i>
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
                                <input type="search" id="form1" name="search" class="form-control" placeholder="Buscar departamentos" />
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
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Las filas de departamentos se agregarán aquí en el futuro -->
                        @foreach($departamentos as $departamento)
                        <tr>
                            <th scope="col">{{ $departamento->dep_id }}</th>
                            <td>{{ $departamento->dep_nombre }}</td>
                            <td>{{ $departamento->dep_descripcion }}</td>
                            <td style="display: flex; align-items: center;">
                                <a href="{{ route('departamentos.eliminar', ['id' => $departamento->dep_id])}}" onclick="return confirm('¿Estás seguro de que deseas eliminar este Departamento?');" 
                                   data-toggle="tooltip" title="Eliminar este Departamento" style="margin: 0 10px;">
                                    <i class="text-danger far fa-trash-alt"></i>
                                </a>&nbsp;
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-4">
                    {{ $departamentos->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
        <script src="{{ asset('archivos/tables/table.js') }}"></script>
    </div>
</div>
@endsection
