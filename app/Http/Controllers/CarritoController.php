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

    // Inicializar el total de precios y cantidad de productos
    $totalPrecio = 0;
    $totalCantidad = $carritoProductos->count();

    // Calcular el total de los precios de los productos en el carrito
    foreach ($carritoProductos as $carritoProducto) {
        $totalPrecio += $carritoProducto->producto->precio;
    }

    // Mostrar la vista del carrito con los productos y el total de precios
    return view('carrito', compact('carritoProductos', 'totalPrecio', 'totalCantidad'));
}



    public function eliminarProducto(Carrito $carritoProducto)
    {
        // Aquí puedes implementar la lógica para eliminar el producto del carrito
        $carritoProducto->delete();

        // Redirigir a alguna vista o ruta después de eliminar el producto del carrito
        return redirect()->route('carrito')->with('success', 'Producto eliminado del carrito correctamente.');
    }

    public function pagar()
    {
        // Vaciar el carrito eliminando todos los productos
        Carrito::truncate();

        // Redirigir a alguna vista o ruta después de pagar y vaciar el carrito
        return redirect()->route('carrito')->with('success', '¡Pago exitoso! Carrito vaciado.');
    }
    public function obtenerCantidadCarrito()
    {
        // Lógica para obtener la cantidad de productos en el carrito
        $cantidad = Carrito::count();
    
        return $cantidad;
    }
    

}
