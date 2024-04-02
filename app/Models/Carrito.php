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

    public static function agregarProductoAlCarrito(Request $request, Producto $producto)
    {
        // Crear un nuevo registro en la tabla carrito con los detalles del producto
        Carrito::create([
            'producto_id' => $producto->id,
            // Puedes agregar más campos aquí según sea necesario, como la cantidad
        ]);

        // Obtener los productos en el carrito para mostrarlos en la vista del carrito
        $carritoProductos = Carrito::with('producto')->get();

        // Redirigir a la vista del carrito y pasar los productos del carrito como datos
        return view('carrito', compact('carritoProductos'));
    }
}
