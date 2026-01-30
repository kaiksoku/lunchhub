@extends('layouts.app')

@section('content')

<style>
/* =====================================================
   FORMULARIO OPERATIVO – ESTILO SISTEMA PORTUARIO
   ===================================================== */

body {
    background-color: #f4f6f9;
}

.container-fluid {
    max-width: 96%;
}

/* Card */
.card {
    border-radius: 4px;
    box-shadow: 0 0 0 1px #ccc;
}

/* Header */
.card-header {
    padding: 6px;
    background: #e9ecef;
}

.card-header h4 {
    font-size: 14px;
    font-weight: 700;
    margin: 0;
}

/* Body */
.card-body {
    padding: 10px 40px;
}

/* Secciones */
.form-section {
    margin-bottom: 8px;
}

/* Títulos */
.form-section h6 {
    font-size: 11.5px;
    font-weight: 700;
    text-transform: uppercase;
    margin-bottom: 4px;
    padding-bottom: 2px;
    border-bottom: 1px solid #bbb;
    /*color: #1f4fd8;*/
    color: #1f7734ff;
}

/* Labels */
label {
    font-size: 10px;
    font-weight: 600;
    margin-bottom: 1px;
    color: #333;
}

/* Inputs ultra compactos */
.form-control,
.form-select {
    height: 17px !important;
    padding: 0 3px !important;
    font-size: 10px !important;
    line-height: 1.1 !important;
    border-radius: 2px !important;
}

/* Textarea */
textarea.form-control {
    min-height: 45px !important;
    padding: 3px !important;
}

/* Espaciado mínimo */
.row > [class*="col-"] {
    margin-bottom: 3px;
}

/* Footer */
.card-footer {
    padding: 8px;
    background: #f8f9fa;
}

.card-footer .btn {
    font-size: 12px;
    padding: 4px 18px;
    border-radius: 4px;
}
/* ===== FIX SELECT2 PARA FORMULARIO COMPACTO ===== */
.select2-container .select2-selection--single {
    height: 17px !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 17px !important;
    font-size: 10px !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 10px !important;
}
/* ===== LIMITE DE OPCIONES VISIBLES EN SELECT2 ===== */
.select2-results__options {
    max-height: 119px; /* 7 opciones aprox */
}
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

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
                        <input class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label>Fecha</label>
                        <input type="date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                    </div>
                    <div class="col-md-2">
                        <label>Hora</label>
                        <input type="time" class="form-control" value="{{ now()->format('H:i') }}">
                    </div>
                    <div class="col-md-2">
                        <label>Cabezal</label>
                        <input class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>Placa Cabezal</label>
                        <input class="form-control">
                    </div>
                </div>
            </div>
            {{-- ================= BLOQUE PRINCIPAL ================= --}}
            <div class="row">

                {{-- ===== COLUMNA IZQUIERDA ===== --}}
                <div class="col-md-3">
                    <div class="form-section">
                        <h6>Contenedor</h6>
                        <label>Contenedor</label><input class="form-control">
                        <label>Tipo Contenedor</label><input class="form-control">
                        <label>Naviera</label><input class="form-control">
                        <label>Setpoint</label><input class="form-control">
                        <label>Damper</label><input class="form-control">
                        <label>Sello Plástico</label><input class="form-control">
                        <label>Sello Botella</label><input class="form-control">
                    </div>
<br>
                    <div class="form-section">
                        <h6>Comercial</h6>
                        <label>Cliente</label><input class="form-control">
                        <label>Destino / Procedencia</label><input class="form-control">
                        <label>Conductor</label><input class="form-control">
                    </div>
                </div>
                <div class="col-md-1">
                </div>

                {{-- ===== COLUMNA CENTRAL ===== --}}
                <div class="col-md-3">

                    <div class="form-section">
                        <h6>Chassis</h6>
                        <label>Chassis</label><small id="chassis-feedback" style="font-size:10px;"></small>
                            <input
                                type="text"
                                id="chass_numero"
                                name="chass_numero"
                                class="form-control"
                                inputmode="numeric"
                                pattern="[0-9]*"
                                autocomplete="off"
                                required
                            >
                            
                        <label>Placa Chassis</label><input type="text" id="placa" name="chass_placa" class="form-control" readonly>
                        <label>PV Chassis</label><input class="form-control">
                        <label>Fecha PV</label><input type="date" class="form-control">
                        <label>Hubodómetro</label><input class="form-control">
                    </div>
<br>
                    <div class="form-section">
                        <h6>Llantas</h6>
                        <div class="row">
                            @for ($i = 1; $i <= 12; $i++)
                                <div class="col-6">
                                    <label>L{{ $i }}</label>
                                    <input class="form-control">
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
                        <label>Galones Ingreso</label><input class="form-control">
                        <label>Faltante</label><input class="form-control">
                    </div>

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
    class="btn btn-success"
    style="background-color:#1f7734ff; border-color:#1f7734ff;"
>
    GUARDAR
</button>


            <button type="button" class="btn btn-danger ml-3">CANCELAR</button>
        </div>

    </form>

</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('chass_numero');
    const feedback = document.getElementById('chassis-feedback');
    const btnGuardar = document.getElementById('btn-guardar');
    const inputPlaca = document.getElementById('placa');

    // Solo números
    input.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '');
        feedback.textContent = '';
        inputPlaca.value = '';
        btnGuardar.disabled = false;
    });

    function validarChassis() {
        const valor = input.value.trim();
        if (valor === '') return;

        fetch(`{{ route('validarchassis') }}?chass_numero=${valor}`)
            .then(res => res.json())
            .then(data => {

                switch (data.status) {

                    case 'valido':
                        feedback.textContent = '✔ Chassis válido';
                        feedback.style.color = 'green';
                        inputPlaca.value = data.placa ?? '';
                        btnGuardar.disabled = false;
                        break;

                    case 'taller':
                        feedback.textContent = '⚠ Chassis en taller';
                        feedback.style.color = 'orange';
                        inputPlaca.value = '';
                        btnGuardar.disabled = true;
                        break;

                    case 'no_existe':
                        feedback.textContent = '✖ Chassis no existe';
                        feedback.style.color = 'red';
                        inputPlaca.value = '';
                        btnGuardar.disabled = true;
                        break;
                }
            })
            .catch(() => {
                feedback.textContent = '';
                btnGuardar.disabled = true;
            });
    }

    input.addEventListener('blur', validarChassis);

    input.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            validarChassis();
        }
    });

});


document.addEventListener('DOMContentLoaded', function () {

    const genInput = document.getElementById('gen_numero');
    const genFeedback = document.getElementById('genset-feedback');
    const btnGuardar = document.getElementById('btn-guardar');

    // Solo números
    genInput.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '');
        genFeedback.textContent = '';
        btnGuardar.disabled = false;
    });

    function validarGenset() {
        const valor = genInput.value.trim();
        if (valor === '') return;

        fetch(`/ajax/validar-genset?gen_numero=${valor}`)
            .then(res => res.json())
            .then(data => {

                switch (data.status) {

                    case 'valido':
                        genFeedback.textContent = '✔ Genset válido';
                        genFeedback.style.color = 'green';
                        btnGuardar.disabled = false;
                        break;

                    case 'taller':
                        genFeedback.textContent = '⚠ Genset en taller';
                        genFeedback.style.color = 'orange';
                        btnGuardar.disabled = true;
                        break;

                    case 'no_existe':
                        genFeedback.textContent = '✖ Genset no existe';
                        genFeedback.style.color = 'red';
                        btnGuardar.disabled = true;
                        break;
                }
            })
            .catch(() => {
                genFeedback.textContent = '';
                btnGuardar.disabled = true;
            });
    }

    genInput.addEventListener('blur', validarGenset);

    genInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            validarGenset();
        }
    });

});
</script>






@endsection
