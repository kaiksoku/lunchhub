@extends('layouts.app')

@section('content')

<!-- Sidebar HTML -->
<div class="sidebar">
  <h2>LunchHub</h2>
  <ul>
    <li class="active"><a href="#">Dashboard</a></li>
    <li><a href="#">Solicitar Comida</a></li>
    <li><a href="#">Departamentos</a></li>
    <li><a href="#">Reportes</a></li>
    <li><a href="#">Configuración</a></li>
  </ul>
</div>

<!-- Estilos CSS -->
<style>
  .sidebar {
    background-color: #7AC142; Verde inspirado en el borde del logo */
    width: 250px;
    padding: 15px;
    color: white;
  }

  .sidebar h2 {
    color: #D92F24; /* Rojo inspirado en el logo */
    text-align: center;
    margin-bottom: 20px;
  }

  .sidebar ul {
    list-style-type: none;
    padding: 0;
  }

  .sidebar ul li {
    margin: 10px 0;
  }

  .sidebar ul li a {
    color: #ffffff;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 5px;
  }

  .sidebar ul li.active a,
  .sidebar ul li a:hover {
    background-color: #F7D117; /* Amarillo para resaltar */
    color: #D92F24; /* Rojo para el texto */
  }
</style>


@endsection