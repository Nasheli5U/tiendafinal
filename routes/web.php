<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ContactController;


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
Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito');
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
Route::post('/productos', 'App\Http\Controllers\ProductoController@store')->name('productos.store');

// Ruta para mostrar el formulario de edición de producto
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

// Ruta para actualizar un producto en la base de datos
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');

// Ruta para eliminar un producto de la base de datos
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');


Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/profile', 'profile')->name('profile');

Route::post('/carrito/agregar/{producto}', [CarritoController::class, 'agregarProducto'])->name('carrito.agregar');
Route::delete('/carrito/{carritoProducto}', [CarritoController::class, 'eliminarProducto'])->name('carrito.eliminar');


Route::post('/carrito/pagar', [CarritoController::class, 'pagar'])->name('carrito.pagar');
Route::get('/carrito/cantidad', [CarritoController::class, 'cantidad'])->name('carrito.cantidad');


Route::post('/carrito/guardar-informacion-envio', 'CarritoController@guardarInformacionEnvio')->name('carrito.guardarInformacionEnvio');
Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos');

Route::put('/pedidos/{pedido}/actualizar-estado', [PedidosController::class, 'actualizarEstado'])->name('pedido.actualizar_estado');

Route::delete('/pedido/{pedido}/eliminar', [PedidosController::class, 'eliminar'])->name('pedido.eliminar');

Route::put('/carrito/{carritoProducto}', 'CarritoController@actualizarCantidad')->name('carrito.actualizarCantidad');


// Ruta para mostrar el formulario de edición del estado de un pedido
Route::get('/pedido/{pedido}/editar', [PedidosController::class, 'editarEstado'])->name('pedido.editar_estado');

Route::get('/contacto', [ContactController::class, 'showContactForm'])->name('contacto');
Route::post('/contacto', [ContactController::class, 'submitContactForm']);

// Ruta para actualizar el estado de un pedido
Route::put('/pedido/{pedido}/actualizar-estado', [PedidosController::class, 'actualizarEstado'])->name('pedido.actualizar_estado');