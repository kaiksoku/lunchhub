<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RestaurantesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\EmpleadosController;

// Principal---------------------------------------------------------------------------------------------------------------------------------
Route::get('/', function () { return view('welcome'); })->name('welcome');  // Asigna el nombre 'welcome' a la ruta
Auth::routes(['register' => false]);
// Principal---------------------------------------------------------------------------------------------------------------------------------



//Administrador------------------------------------------------------------------------------------------------------------------------------
Route::get('usuarios/create', [RegisterController::class, 'create'])->middleware('auth')->middleware('can:Crear Usuarios')->name('usuarios.create');
Route::resource('usuarios', UsuariosController::class)->only(['index', 'edit', 'update', 'show'])->middleware('can:Ver Usuarios')->names('usuarios');
Route::get('usuarios/eliminar/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
Route::post('usuarios/guardar', [RegisterController::class, 'register'])->middleware('auth')->middleware('can:Crear Usuarios')->name('register.guardar');

Route::get('roles', [RolesController::class, 'show'])->middleware('auth')->middleware('can:Ver Roles')->name('roles');
Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::post('roles/guardar', [RolesController::class, 'store'])->name('roles.guardar');
Route::get('roles/eliminar/{id}', [RolesController::class, 'destroy'])->name('roles.eliminar');

//Administrador------------------------------------------------------------------------------------------------------------------------------



// Inicia Rutas generales---------------------------------------------------------------------------------------------------------------------


// Módulo inicio de sesión
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('home', [HomeController::class, 'index'])->name('home');

// Módulo ventas 
Route::get('ventas', [VentasController::class, 'show'])->name('ventas');
Route::get('ventas/create', [VentasController::class, 'create'])->name('ventas.create');
Route::get('ventas/edit', [VentasController::class, 'edit'])->name('ventas.edit');

// Módulo productos 
Route::get('producto', [ProductoController::class, 'show'])->name('producto');
Route::get('producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::post('producto/guardar', [ProductoController::class, 'store'])->name('producto.guardar');
Route::get('producto/edit', [ProductoController::class, 'edit'])->name('producto.edit');
Route::get('producto/eliminar/{id}', [ProductoController::class, 'destroy'])->name('producto.eliminar');

// Módulo Restaurantes
Route::get('restaurantes', [RestaurantesController::class, 'show'])->name('restaurantes');
Route::get('restaurantes/crear', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('restaurantes/guardar', [CategoriaController::class, 'store'])->name('categoria.guardar');
Route::get('restaurantes/editar', [CategoriaController::class, 'edit'])->name('categoria.edit');

// Módulo Departamentos
Route::get('departamentos', [DepartamentosController::class, 'show'])->name('departamentos');


// Módulo Empleados
Route::get('empleados', [EmpleadosController::class, 'show'])->name('empleados');
Route::get('empleados/create', [EmpleadosController::class, 'create'])->name('empleados.create');
Route::post('empleados/store', [EmpleadosController::class, 'store'])->middleware('auth')->middleware('can:Crear Usuarios')->name('empleados.guardar');

Route::get('categoria/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');







