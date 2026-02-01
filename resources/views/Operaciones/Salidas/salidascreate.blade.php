@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('archivos/despacho/formdespacho.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
</head>


<div class="container-fluid">
<div class="card card-outline card-success">

    {{-- ================= HEADER ================= --}}
    <div class="card-header text-center">
        <h4>REGISTRO DE SALIDA DE EQUIPO | PUERTO BARRIOS</h4>
    </div>

    <form method="POST">
        @csrf

        <div class="card-body">

            {{-- ================= DATOS GENERALES ================= --}}
            <div class="form-section">
                <h6>Datos Generales</h6>
                <div class="row">
                    <div class="col-md-2">
                        <label>Recinto</label>
                        <input
                            type="text"
                            class="form-control"
                            value="{{ auth()->user()->Nombre_Recinto->reci_nombre ?? '' }}"
                            readonly
                        >
                    </div>
                    <div class="col-md-2">
                        <label>Boleta / EIR</label>
                        <input type="number" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>Fecha</label>
                        <input type="date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                    </div>
                    <div class="col-md-2">
                        <label>Hora</label>
                        <input type="time" id="hora" class="form-control" value="">
                    </div>
                    <div class="col-md-2">
                        <label>Cabezal</label>
                        <input class="form-control"
                                required
                                pattern="(\d+|AGREGADO)"
                                title="Ingrese solo números o la palabra AGREGADO"
                                style="text-transform: uppercase;">
                    </div>
                    <div class="col-md-2">
                        <label>Placa Cabezal</label>
                        <input 
                            id="placa_cabezal"
                            name="placa_cabezal"
                            class="form-control"
                            maxlength="8"
                            pattern="[A-Z]{1}-[0-9]{3}[A-Z]{3}"
                            placeholder="C-123ABC"
                            style="text-transform: uppercase;"
                            required
                        >

                    </div>
                </div>
            </div>
            {{-- ================= BLOQUE PRINCIPAL ================= --}}
            <div class="row">

                {{-- ===== COLUMNA IZQUIERDA ===== --}}
                <div class="col-md-3">
                    <div class="form-section">
                        <h6>Contenedor</h6>
                        <label>Contenedor</label>
                        <input id="contenedor" class="form-control"
                            pattern="[A-Za-z]{4}[0-9]{7}"
                            title="4 letras y 7 números">

                        <label>Tipo Contenedor</label>
                        <input id="tipo" class="form-control">

                        <label>Naviera</label>
                        <input id="naviera" class="form-control">

                        <label>Setpoint</label>
                        <input id="setpoint" class="form-control">

                        <label>Damper</label>
                        <input id="damper" class="form-control">

                        <label>Sello Plástico</label>
                        <input id="sello_plastico" class="form-control">

                        <label>Sello Botella</label>
                        <input id="sello_botella" class="form-control">

                    </div>
                        <br>
                    <div class="form-section">
                        <h6>Comercial</h6>
                        <label>Contenido</label><input class="form-control" required>
                        <label>Cliente</label><input class="form-control">
                        <label>Destino / Procedencia</label><input class="form-control">
                        <label>Conductor</label><input class="form-control" required>
                    </div>
                </div>
                <div class="col-md-1">
                </div>

                {{-- ===== COLUMNA CENTRAL ===== --}}
                <div class="col-md-4">

                    <div class="form-section">
                        <h6>Chassis</h6>
                        <label>Chassis</label><small id="chassis-feedback" style="font-size:10px;"></small>
                            <input
                                type="text"
                                id="chass_numero"
                                name="mov_chassis"
                                class="form-control"
                                inputmode="numeric"
                                pattern="[0-9]*"
                                autocomplete="off"
                                required
                            >
                            
                        <label>Placa Chassis</label><input type="text" id="placa" name="chass_placa" class="form-control" readonly>
                        <label>PV Chassis</label><input class="form-control">
                        <label>Fecha PV</label><input type="date" class="form-control">
                        <label>Hubodómetro</label><input class="form-control" type="number">
                    </div>
                    <br>
                    <div class="form-section">
                        <h6>Llantas</h6>
                        <div class="row">
                            @for ($i = 1; $i <= 12; $i++)
                            <div class="col-4">
                                <label>Llanta {{ $i }}</label>
                                <input 
                                    name="mov_llanta{{ $i }}" 
                                    class="form-control" 
                                    type="number"
                                    min="0"
                                    max="999999"
                                    step="1"
                                >
                            </div>
                            <div class="col-2">
                                <label></label>
                                <input 
                                    name="mov_llanta{{ $i }}" 
                                    class="form-control" 
                                    type="number"
                                    min="0"
                                    max="999999"
                                    step="1"
                                    oninput="if(this.value.length>2) this.value=this.value.slice(0,2);"
                                >
                            </div>
                        @endfor
                        </div>
                    </div>

                </div>
                <div class="col-md-1">
                </div>

                {{-- ===== COLUMNA DERECHA ===== --}}
                <div class="col-md-3">

                    <div class="form-section">
                        <h6>Genset / Motor</h6>
                        <label>Genset</label>
                        <small id="genset-feedback" style="font-size:10px;"></small>
                        <input
                            type="text"
                            id="gen_numero"
                            name="gen_numero"
                            class="form-control"
                            inputmode="numeric"
                            pattern="[0-9]*"
                            autocomplete="off">

                        <label>PV Genset</label><input class="form-control">
                        <label>Fecha PV</label><input type="date" class="form-control">
                        <label>Horómetro Salida</label><input class="form-control">
                        <label>Horómetro Ingreso</label><input class="form-control">
                    </div>

                    <div class="form-section">
                        <h6>Combustible</h6>
                        <label>Galones Salida</label><input class="form-control">
                        <label>Faltante</label><input class="form-control">
                    </div>
                    <br>
                    <div class="form-section">
                        <h6>Interchange</h6>
                        <label>Condicionista</label><input class="form-control">
                        <label>Digitador</label><input class="form-control">
                        <label>Movimiento</label><input value="Salida"class="form-control" readonly>
                    </div>

                </div>

            </div>
            {{-- ================= OBSERVACIONES ================= --}}
            <div class="form-section">
                <h6>Observaciones</h6>
                <textarea class="form-control"></textarea>
            </div>

        </div>

        {{-- ================= FOOTER ================= --}}
        <div class="card-footer text-center">
            <button
                id="btn-guardar"
                type="submit"
                class="btn btn-success"
                style="background-color:#1f7734ff; border-color:#1f7734ff;"
                onclick="validarHora(event)">GUARDAR
            </button>



            <button type="button" class="btn btn-danger ml-3">CANCELAR</button>
        </div>

    </form>

 <!--Se define la ruta aquí porque los archivos .js externos NO procesan Blade.Blade solo funciona en archivos .blade.php, 
por lo que las rutasde Laravel deben pasarse desde el HTML al JavaScript para poder usarlasen peticiones fetch sin errores.-->

<script>
    window.routes = {
        validarChassis: "{{ route('validarchassis') }}"
    };
</script>

<script src="{{ asset('archivos/despacho/formdespacho.js') }}" defer></script>

</div>
</div>


@endsection
