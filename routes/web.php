<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\CarritoController;

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




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/almacen', [HomeController::class, 'almacen'])->name('almacen');
Route::get('/carrito', [HomeController::class, 'carrito'])->name('carrito');
Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware(['guest'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware(['guest'])
    ->name('password.email');

Route::post('/login', [AuthLoginController::class, 'login'])->name('login');


use App\Http\Controllers\ProductoController;

// Ruta para mostrar el formulario de creación de producto
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');

// Ruta para almacenar un nuevo producto en la base de datos
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

// Ruta para mostrar el formulario de edición de producto
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

// Ruta para actualizar un producto en la base de datos
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');

// Ruta para eliminar un producto de la base de datos
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');


Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/profile', 'profile')->name('profile');

Route::post('/carrito/agregar/{producto}', [CarritoController::class, 'agregarProducto'])->name('carrito.agregar');
