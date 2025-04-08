@extends('layouts.app')

@section('content')
<title>Restaurantes</title>

<head>
    <link rel="stylesheet" href="{{ asset('archivos/tables/table.css') }}">
</head>

<div class="container-fluid">
    <div class="card card-outline card-success">
        <div class="card-header">
            <div class="d-flex align-items-center w-100">
                <h3 class="card-title mb-0">Registro de Restaurantes</h3>
                <div class="ms-auto d-flex align-items-center">
                    <a href="#" class="btn btn-success btn-sm ml-2">
                        Registrar un Restaurante<i class="fa fa-fw fa-plus-circle pl-1"></i>
                    </a>
                </div>
            </div>
            <br>
            <div class="d-flex align-items-center justify-content-between">
                <form class="d-flex align-items-center">
                    <div class="mr-2 d-flex align-items-center">
                        <span class="mr-1">Desde:</span>
                        <input type="date" class="form-control" required placeholder="Imprimir Desde">
                    </div>
                    <div class="mr-2 d-flex align-items-center">
                        <span class="mr-1">Hasta:</span>
                        <input type="date" class="form-control" required>
                    </div>
                    <div class="reporte-container">
                        <button type="button" class="btn btn-reporte">Reporte</button>
                        <div class="reporte-opciones">
                            <button type="submit" class="btn btn-1 ml-2"><i class="fa-regular fa-file-pdf"></i></button>
                            <button type="submit" class="btn btn-2 ml-2"><i class="fa-regular fa-file-excel"></i></button>
                        </div>
                    </div>
                </form>
                
                <!-- Barra de búsqueda -->
                <div class="ms-auto d-flex align-items-center">
                    <div class="input-group-wrapper">
                    <form action="{{ route('restaurantes') }}" method="GET" class="input-group" id="search-form">
                            <div class="form-outline">
                            <input type="search" id="form1" name="search" class="form-control" value="{{ request('search') }}" placeholder="Buscar en Restaurantes" />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Restaurante</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Horarios en que atiende</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($restaurantes as $restaurante)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                <td>{{ $restaurante->rest_nombre }}</td>
                <td>{{ $restaurante->rest_correo }}</td>
                <td>{{ $restaurante->rest_horarios }}</td>
                            <td style="display: flex; align-items: center;">
                                <a href="#" data-toggle="tooltip" title="Eliminar este registro" style="margin: 0 10px;">
                                    <i class="text-danger far fa-trash-alt"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="Editar este registro" style="margin: 0 10px;">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="Ver detalles" style="margin: 0 10px;">
                                    <i class="fa-regular fa-eye" style="color: black"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Agrega más filas si es necesario -->
                    </tbody>
                </table>
                
                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                                        {{ $restaurantes->links('pagination::bootstrap-4') }}
                                    </div>
            </div>
        </div>
        <script src="{{ asset('archivos/tables/table.js') }}"></script>
    </div>
</div>    
@endsection
