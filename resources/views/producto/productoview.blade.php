@extends('layouts.app')

@section('content')
<title>Productos</title>

<head>
    <link rel="stylesheet" href="{{ asset('archivos/tables/table.css') }}">
</head>


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
<div class="container-fluid">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <div class="d-flex align-items-center w-100">
                                <h3 class="card-title mb-0">Registro de Productos</h3>
                                <div class="ms-auto d-flex align-items-center">
                                    <a href="{{ route('producto.create') }}" class="btn btn-success btn-sm ml-2">
                                        Registrar un Producto<i class="fa fa-fw fa-plus-circle pl-1"></i>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex align-items-center justify-content-between">
                                <form class="d-flex align-items-center" method="POST">
                                    @csrf
                                    <div class="mr-2 d-flex align-items-center">
                                        <span class="mr-1">Desde:</span>
                                        <input type="date" class="form-control" id="fechaDesde" name="fechaDesde" required placeholder="Imprimir Desde">
                                    </div>
                                    <div class="mr-2 d-flex align-items-center">
                                        <span class="mr-1">Hasta:</span>
                                        <input type="date" class="form-control" id="fechaHasta" name="fechaHasta" required>
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
                                    <form action="{{ route('producto') }}" method="GET" class="input-group" id="search-form">
                                        <div class="form-outline" data-mdb-input-init>
                                            <input type="search" id="form1" name="search" class="form-control" value="{{ request('search') }}" placeholder="Buscar producto" />
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
                                @if($productos->isEmpty())
                                    <p class="text-center">No hay resultados para "{{ request('search') }}"</p>
                                @else
                                    <table class="table table-striped table-hover" id="tabla-data" cellspacing="0">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Existencias</th>
                                                <th scope="col">Categoría</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                            <tr>
                                                <th scope="col">{{ $loop->iteration }}</th>
                                                <td>{{ $producto->prod_nombre }}</td>
                                                <td>{{ $producto->prod_cantidad }}</td>
                                                <td>{{ $producto->categoria->cat_nombre }}</td>
                                                <td>{{ $producto->prod_precio }}</td>
                                                <td style="display: flex; align-items: center;">
                                                    <a href="{{ route('producto.eliminar', ['id' => $producto->prod_id]) }}" 
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');" 
                                                    data-toggle="tooltip" title="Eliminar este registro" style="margin: 0 10px;">
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
                                        </tbody>
                                    </table>
                                    
                                    <!-- Enlaces de paginación -->
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $productos->links('pagination::bootstrap-4') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                     <script src="{{ asset('archivos/tables/table.js') }}"></script>
    </div>
</div>    
@endsection
