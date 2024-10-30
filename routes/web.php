<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\CategoriaController;

// Principal--------------------------------------------------------------------------------------

Route::get('/', function () {
    return view('welcome');
})->name('welcome');  // Asigna el nombre 'welcome' a la ruta

// Inicia Rutas de Administrador------------------------------------------------------------------
Route::resource('usuarios', UsuariosController::class)->only(['index', 'edit', 'update', 'destroy'])->names('usuarios');
Route::get('register', [RegisterController::class, 'show'])->middleware('auth')->name('register');
Route::post('register/create', [RegisterController::class, 'register'])->middleware('auth')->name('register.create');


// ------------------------------------------------------------------------------------------------

// Inicia Rutas generales--------------------------------------------------------------------------

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('ventas', [VentasController::class, 'show'])->name('ventas');

Route::get('producto', [ProductoController::class, 'show'])->name('producto');
Route::get('producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::post('producto/guardar', [ProductoController::class, 'store'])->name('producto.guardar');
Route::get('producto/eliminar/{id}', [ProductoController::class, 'destroy'])->name('producto.eliminar');

Route::get('categoria', [CategoriaController::class, 'index'])->name('categoria');
Route::get('categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('categoria/guardar', [CategoriaController::class, 'store'])->name('categoria.guardar');


Auth::routes(['register' => false]);

