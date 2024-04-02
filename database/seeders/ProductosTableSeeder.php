<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear un producto predeterminado
        Producto::create([
            'nombre' => 'Producto predeterminado',
            'descripcion' => 'Descripción del producto predeterminado.',
            'precio' => 10.99,
            // Puedes agregar más campos aquí según sea necesario
        ]);
    }
}
