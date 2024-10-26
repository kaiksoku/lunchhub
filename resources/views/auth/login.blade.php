@extends('layouts.login')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset('imagenes/welcome.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(15px); 
            z-index: -1;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
            width: 350px;
            height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centrado vertical */
            align-items: center; /* Centrado horizontal */
        }

        .form-group {
            width: 100%; /* Asegura que los inputs ocupen todo el ancho */
            margin-left: 1px;
        }

        .form-group .input-group {
            width: 100%; /* Asegura que los inputs ocupen todo el ancho */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            
        }


        /* Estilo para el botón fuera del login-container */
       .custom-button {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(255, 255, 255, 0.9)); /* Degradado */
    border: none;
    padding: 0; /* Quita el padding */
    border-radius: 0 0 25px 25px; /* Esquinas inferiores redondeadas */
    position: absolute; /* Posición absoluta */
    left: 50%; /* Centrar horizontalmente */
    transform: translateX(-50%); /* Centrar */
    top: 100%; /* Comenzar justo debajo del login-container */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Sombra más fuerte */
    cursor: pointer
    z-index: 0; /* Colocar detrás del contenedor */
    width: 250px; /* Ancho específico */
    height: 30px; /* Altura específica */
    display: flex; /* Usar flexbox */
    align-items: center; /* Centrar verticalmente el texto */
    justify-content: center; /* Centrar horizontalmente el texto */
    text-align: center; /* Asegurar el centrado del texto */
    color: black; /* Color del texto */
    font: small-caption;
    font-size: 11pt;
}

.custom-button:hover {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(255, 255, 255, 0.85)); /* Cambiar el degradado al pasar el ratón */
}
  .background: { rgba(255, 255, 255, 0.9);
        
  }     .input-group-text {
    display: flex;
    align-items: center; /* Centrar verticalmente el icono */
    padding: 10.5px; /* Ajusta el padding para que sea igual al del input */
}

.input-group .form-control {
    height: calc(2.25rem + 2px); /* Asegura que la altura del input sea igual al de input-group-text */
}
    </style>
      <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

</head>

<div class="full-width-section text-center">
    <img src="{{ asset('imagenes/user.png') }}" class="img-fluid" alt="Bienvenido" style="max-width: 12%; height: auto;">
</div>
<body> 
    <div class="row justify-content-center">
        <div class="login-container">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
<br>
<br>
<br>
                    <div class="row mb-3 form-group">
                        <div class="col-md-12"> <!-- Cambiado a 12 para ocupar todo el ancho -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-user"></i> <!-- Icono de usuario -->
                                    </span>
                                </div>
                                <input id="email" type="email" placeholder="Correo Electrónico" autocomplete="off" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3 form-group">
                        <div class="col-md-12"> <!-- Cambiado a 12 para ocupar todo el ancho -->
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-solid fa-lock"></i> <!-- Icono de usuario -->
                                    </span>
                                </div>
                                <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Botón fuera del login-container -->
                    <button type="submit" class="custom-button">
                        {{ __('INGRESAR') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
