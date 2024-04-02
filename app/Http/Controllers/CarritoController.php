<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;

class CarritoController extends Controller
{
    protected $table = 'carrito';

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    public function agregarProducto(Request $request, Producto $producto)
    {
        // Lógica para agregar el producto al carrito
        $carrito = new Carrito();
        $carrito->producto_id = $producto->id;
        $carrito->save();

        // Obtener todos los productos en el carrito para mostrarlos en la vista del carrito
        $carritoProductos = Carrito::with('producto')->get();

        // Redirigir a la vista del carrito y pasar los productos del carrito como datos
        return view('carrito', compact('carritoProductos'));
    }
}
