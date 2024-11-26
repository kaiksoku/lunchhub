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

// Principal---------------------------------------------------------------------------------------------------------------------------------
Route::get('/', function () { return view('welcome'); })->name('welcome');  // Asigna el nombre 'welcome' a la ruta
Auth::routes(['register' => false]);
// Principal---------------------------------------------------------------------------------------------------------------------------------



//Administrador------------------------------------------------------------------------------------------------------------------------------
Route::resource('usuarios', UsuariosController::class)->only(['index', 'edit', 'update'])->middleware('can:Ver Usuarios')->names('usuarios');
Route::get('usuarios/eliminar/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
Route::get('usuarios/register', [RegisterController::class, 'show'])->middleware('auth')->middleware('can:Crear Usuario')->name('register');
Route::post('usuarios/create', [RegisterController::class, 'register'])->middleware('auth')->middleware('can:Crear Usuario')->name('register.create');

Route::get('roles', [RolesController::class, 'show'])->name('roles');
Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::post('roles/guardar', [RolesController::class, 'store'])->name('roles.guardar');
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

// Módulo categorias
Route::get('categoria', [CategoriaController::class, 'index'])->name('categoria');
Route::get('restaurantes/crear', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('restaurantes/guardar', [CategoriaController::class, 'store'])->name('categoria.guardar');
Route::get('restaurantes/editar', [CategoriaController::class, 'edit'])->name('categoria.edit');

// Módulo Restaurantes
Route::get('restaurantes', [RestaurantesController::class, 'show'])->name('restaurantes');


