<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carrito; // Importa el modelo Producto

class HomeController extends Controller
{
    public function index()
{
    // Obtener todos los productos desde la base de datos
    $productos = Producto::all();

    // Obtener la cantidad de productos en el carrito
    $cantidadCarrito = app('App\Http\Controllers\CarritoController')->obtenerCantidadCarrito();

    // Pasar los datos de productos y del carrito a la vista home
    return view('home', compact('productos', 'cantidadCarrito'));
}


    public function almacen()
    {
        return view('almacen');
    }

    public function carrito()
    {
        return view('carrito');
    }

    public function contacto()
    {
        return view('contacto');
    }


}
