<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tipoPlato(){
        return $this->belongsTo(TipoPlato::class);
    }

    public function detallePedido(){
        return $this->hasMany(DetallePedido::class,'plato_id','id');
    }
}
