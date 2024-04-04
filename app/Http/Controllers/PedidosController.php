<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido; // Asegúrate de importar el modelo Pedido

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all(); // Obtener todos los pedidos desde la base de datos
        return view('pedidos', compact('pedidos')); // Pasar los pedidos a la vista
    }
    public function actualizarEstado(Request $request, Pedido $pedido)
    {
        // Validar los datos del formulario
        $request->validate([
            'estado' => 'required|in:preparado,en_camino,entregado', // Validar que el estado sea uno de los valores permitidos
        ]);
        // Actualizar el estado del pedido
        $pedido->estado = $request->estado;
        $pedido->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'Estado del pedido actualizado correctamente.');
    }

    public function eliminar(Pedido $pedido)
    {
        // Lógica para eliminar el pedido
        $pedido->delete();

        return redirect()->back()->with('success', '¡Pedido eliminado correctamente!');
    }

    public function editarEstado(Pedido $pedido)
    {
        
        // Retornar la vista para editar el estado del pedido
        return view('editar_estado', compact('pedido'));
    }

  

}

