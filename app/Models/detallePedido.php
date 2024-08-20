<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function plato(){
        return $this->hasOne(Plato::class, 'id', 'plato_id');
    }
}
