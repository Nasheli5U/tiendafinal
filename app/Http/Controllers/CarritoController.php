<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;
use App\Models\InformacionEnvio; 
USE App\Models\Pedido;
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

    public function pagar(Request $request)
    {
        // Crear un nuevo pedido
        $pedido = new Pedido();
        
        // Crear una nueva instancia de InformacionEnvio con los datos del request
        $informacionEnvio = InformacionEnvio::create($request->all());
    
        // Guardar la información de envío asociada al pedido
        $pedido->informacion_envio()->associate($informacionEnvio);
        $pedido->save();


        // Obtener productos del carrito
        $productosCarrito = Carrito::all();
        foreach ($productosCarrito as $productoCarrito) {
            $pedido->productos()->attach($productoCarrito->producto_id, ['cantidad' => $productoCarrito->cantidad]);
        }
    
        // Guardar el pedido en la base de datos
        $pedido->save();
    
        // Limpiar el carrito
        Carrito::truncate(); // Esto eliminará todos los registros de la tabla 'carrito'
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('carrito')->with('success', '¡Pago exitoso! Pedido generado correctamente.');
    }
    
    public function obtenerCantidadCarrito()
    {
        // Lógica para obtener la cantidad de productos en el carrito
        $cantidad = Carrito::count();
    
        return $cantidad;
    }
    

    public function actualizarCantidad(Request $request, Carrito $carritoProducto)
{
    $request->validate([
        'cantidad' => 'required|numeric|min:1', // Validar que la cantidad sea un número mayor o igual a 1
    ]);

    $carritoProducto->update(['cantidad' => $request->cantidad]);

    // Recalcular el precio total del carrito
    $totalPrecio = 0;
    $carritoProductos = Carrito::with('producto')->get();
    foreach ($carritoProductos as $carritoProducto) {
        $totalPrecio += $carritoProducto->producto->precio * $carritoProducto->cantidad;
    }

    // Actualizar el precio total del carrito en la sesión (o en la base de datos, si es necesario)
    session(['totalPrecio' => $totalPrecio]);

    return redirect()->back()->with('success', 'Cantidad actualizada correctamente');
}

}
