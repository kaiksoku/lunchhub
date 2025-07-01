@extends('layouts.app')

@section('content')
<title>Solicitudes</title>

<head>
    <link rel="stylesheet" href="archivos/tables/table.css">
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
                <h3 class="card-title mb-0">Registro de Solicitudes</h3>
                <div class="ms-auto d-flex align-items-center">
                    <a href="{{ route('solicitudes.create') }}" class="btn btn-success btn-sm ml-2">
                        Registrar una Solicitud<i class="fa fa-fw fa-plus-circle pl-1"></i>
                    </a>
                </div>
            </div>
            <br>
            <div class="d-flex align-items-center justify-content-between">
                <form class="d-flex align-items-center">
                    <div class="mr-2 d-flex align-items-center">
                        <span class="mr-1">Desde:</span>
                        <input type="date" class="form-control" required placeholder="Desde">
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
                        <form class="input-group" id="search-form">
                            <div class="form-outline">
                                <input type="search" id="form1" class="form-control" placeholder="Buscar en Solicitudes" />
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
                <style>
                    .tabla-ajustada {
                        font-size: 12px;
                        table-layout: auto;
                        white-space: nowrap;
                    }

                    .tabla-ajustada th, .tabla-ajustada td {
                        padding: 4px 8px;
                    }

                    @media print {
                        .tabla-ajustada thead {
                            background-color: #f2f2f2 !important;
                        }
                        .tabla-ajustada th, .tabla-ajustada td {
                            border: 1px solid #aaa !important;
                            padding: 4px 8px !important;
                        }
                        body {
                            -webkit-print-color-adjust: exact;
                            print-color-adjust: exact;
                        }
                    }
                </style>

                <table class="table table-striped table-hover tabla-ajustada" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>Código</th>
                            <th>Solicitante</th>
                            <th>Departamento</th>
                            <th>Tiempo de Comida</th>
                            <th>Fecha Solicitud</th>
                            <th>Valor del Vale</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitudes as $index => $solicitud)
                            @php
                                $platos = $detalles->where('det_solicitud', $solicitud->soli_id)->count();
                            @endphp
                            <tr>
                                <td>{{ $solicitud->soli_boleta }}</td>
                                <td>{{ $solicitud->usuario->name }}</td>
                                <td>{{ $solicitud->usuario->Nombre_Departamento->dep_nombre ?? 'Sin departamento' }}</td>
                                <td>{{ $solicitud->soli_tiempo }}</td>
                                <td>{{ $solicitud->soli_generacion }}</td>
                                <td>{{ $platos }} {{ $platos == 1 ? 'Plato' : 'Platos' }} - Q {{ $platos * 25 }}</td>
                                <td style="display: flex; align-items: center;">
                                    <a href="{{ route('solicitudes.eliminar', $solicitud->soli_id) }}" onclick="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?');" title="Eliminar esta solicitud" style="margin: 0 10px;">
                                        <i class="text-danger far fa-trash-alt"></i>
                                    </a>
                                    <a href="#" title="Editar esta solicitud" style="margin: 0 10px;">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('solicitudes.detalle', $solicitud->soli_id) }}" title="Ver detalles" target="_blank" style="margin: 0 10px;">
                                        <i class="fa-regular fa-eye" style="color: black"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginación simulada -->
                <div class="d-flex justify-content-center mt-4">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <script src="archivos/tables/table.js"></script>
    </div>
</div>
@endsection
