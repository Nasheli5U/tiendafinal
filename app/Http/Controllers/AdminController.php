<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importa el modelo Producto


class AdminController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
    return view('admin', compact('productos'));
        
    
    }
}
