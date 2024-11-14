@extends('layouts.app')

@section('content')
<head>
    <style>
    .container {
        width: 900px;
        margin-left: 100px;
    }
    </style>

<link rel="stylesheet" href="{{ asset('archivos/fieldset.css') }}">
</head>


<div class="container">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Editar Usuario<small></small></h3>
            <div class="card-tools">
                <a href="{{ route('usuarios.index') }}" class="btn btn-block btn-info btn-sm">
                    Volver al Listado<i class="fas fa-arrow-circle-left pl-1"></i>
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}" class="form-horizontal" autocomplete="off">
            @csrf
            @method('PUT') <!-- Indica que es una actualización -->
            
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-12 col-lg-4 control-label text-sm-left text-lg-left">Nombre de Usuario</label>
                    <div class="col-sm-12 col-lg-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $usuario->name) }}" required autocomplete="off" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-12 col-lg-4 control-label text-sm-left text-lg-left">Correo Electrónico</label>
                    <div class="col-sm-12 col-lg-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $usuario->email) }}" required autocomplete="off">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-12 col-lg-4 control-label text-sm-left text-lg-left">Contraseña (Dejar en blanco si no deseas cambiarla)</label>
                    <div class="col-sm-12 col-lg-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-sm-12 col-lg-4 control-label text-sm-left text-lg-left">Confirmar Contraseña</label>
                    <div class="col-sm-12 col-lg-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="off">
                    </div>
                </div>
            </div>

            <fieldset class="border p-2 col-sm-12 col-lg-12 custom-fieldset">
    <legend class="w-auto custom-legend">Asignación de Roles</legend>
    <br>

    <div class="form-group row justify-content-center">
        <label class="col-sm-12 col-lg-2 control-label text-sm-left text-lg-right requerido">Rol</label>
        <div class="col-sm-12 col-lg-4">
            <select name="role_id" class="form-control select2" required>
    @if($usuario->roles->isEmpty())
        <option value="" disabled selected class="placeholder-option">
            - No Asignado -
        </option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ (old('role_id') == $role->id) ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    @else
        @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ ($usuario->roles->first()->id == $role->id) ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    @endif
</select>
            </select>
        </div>
    </div>
</fieldset>


            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 text-center">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

