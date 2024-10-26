@extends('layouts.app')

@section('content')
<title>Productos</title>

<head>
    <!-- Llamar al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('archivos/estilos.css') }}">
    <!-- Llamar al archivo JavaScript -->
    <script src="{{ asset('archivos/funciones.js') }}"></script>
</head>

<div class="container-fluid"> <!-- Elimina el "container" aquí -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
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
                                        <input type="date" class="form-control" id="fechaDesde" name="fechaDesde" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Imprimir Desde'" placeholder="Imprimir Desde">
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
                                <div class="ms-auto d-flex align-items-center">
                                    <div class="input-group-wrapper">
                                        <div class="input-group">
                                            <div class="form-outline" data-mdb-input-init>
                                                <input type="search" id="form1" class="form-control" />
                                            </div>
                                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
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
                                            <td>
                                                <i class="fa-regular fa-trash-can"></i>&nbsp;
                                                <i class="fa-regular fa-pen-to-square"></i>&nbsp;
                                                <i class="fa-regular fa-eye"></i>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- .card -->
                </div> <!-- .col-lg-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid interno -->
    </section> <!-- .content -->
</div> <!-- .container-fluid principal -->
@endsection
