<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Carrito extends Model
{
    use HasFactory;
    protected $table = 'carrito'; // Especifica el nombre de la tabla correctamente

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
