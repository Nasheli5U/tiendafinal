<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;

class CarritoController extends Controller
{
    protected $table = 'carrito';

    public function agregarProducto(Request $request, Producto $producto)
    {
        // Lógica para agregar el producto al carrito
        $carrito = new Carrito();
        $carrito->producto_id = $producto->id;
        $carrito->save();

        // Redirigir a la vista del carrito
        return redirect()->route('carrito');
    }

    public function verCarrito()
    {
        // Obtener todos los productos en el carrito para mostrarlos en la vista del carrito
        $carritoProductos = Carrito::with('producto')->get();

        // Mostrar la vista del carrito con los productos
        return view('carrito', compact('carritoProductos'));
    }
}
