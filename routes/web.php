<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');  // Asigna el nombre 'welcome' a la ruta


Route::get('register', [RegisterController::class, 'show'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('home', [HomeController::class, 'show'])->name('home');

Route::get('ventas', [VentasController::class, 'show'])->name('ventas');

Route::get('producto', [ProductoController::class, 'show'])->name('producto');
Route::get('producto.create', [ProductoController::class, 'create'])->name('producto.create');
Route::post('producto.guardar', [ProductoController::class, 'store'])->name('producto.guardar');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
