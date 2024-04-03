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

}
