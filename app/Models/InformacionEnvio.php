<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class InformacionEnvio extends Model
{
    use HasFactory;
    protected $table = 'informacion_envios';

    protected $fillable = [
        'direccion',
        'pais',
        'departamento',
        'ciudad',
        'referencias',
        'ruc'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
