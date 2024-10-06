@extends('layouts.app')

@section('content')
<style>
    /* Asegurando que la tabla tenga un diseño fijo */
    .table {
        table-layout: auto; /* Cambiado a auto para que se ajuste al contenido */
        width: 100%; /* Asegura que la tabla ocupe todo el ancho disponible */
    }

    /* Estableciendo un ancho mínimo para las columnas */
    .table th, .table td {
        /* Eliminar el ancho fijo para permitir que las columnas se ajusten dinámicamente */
        overflow: hidden; /* Evita que el contenido desborde */
        text-overflow: ellipsis; /* Agrega puntos suspensivos si el texto es demasiado largo */
        white-space: nowrap; /* Evita saltos de línea */
    }

    /* Asegura que cada columna ocupe el ancho disponible de manera equitativa */
    .table th, .table td {
        flex: 1; /* Permite que las columnas crezcan para ocupar el espacio disponible */
        min-width: 100px; /* Ancho mínimo para cada columna, ajusta según sea necesario */
    }

    /* Establece un ancho mínimo para la tabla */
    .table-responsive {
        min-width: 800px; /* Ajusta este valor según tus necesidades */
    }

    .card-body {
        min-height: 300px; /* Ajusta este valor según tus necesidades */
    }
</style>

<div class="container">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Registo de Productos</h3>
                            <div class="card-tools">
                                <a href="" class="btn btn-block btn-success btn-sm">
                                    Registrar un Producto<i class="fa fa-fw fa-plus-circle pl-1"></i></a>
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
                <th scope="col">{{ $loop->iteration }}</th> <!-- Muestra el número de la fila -->
                <td>{{ $producto->prod_nombre }}</td> <!-- Nombre del producto -->
                <td>{{ $producto->prod_cantidad }}</td> <!-- Cantidad -->
                <td>{{ $producto->categoria->cat_nombre }}</td> <!-- Nombre de la categoría usando la relación -->
                <td>{{ $producto->prod_precio }}</td> <!-- Precio -->
                <td>
                    <i class="fa-regular fa-trash-can"></i>&nbsp
                    <i class="fa-regular fa-pen-to-square"></i>&nbsp
                    <i class="fa-regular fa-eye"></i>
                </td> <!-- Opciones de acción -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection