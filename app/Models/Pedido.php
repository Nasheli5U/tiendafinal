<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';

    public function informacion_envio()
    {
        return $this->belongsTo(InformacionEnvio::class, 'informacion_envio_id');
    }
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto')->withPivot('cantidad');
    }
}
