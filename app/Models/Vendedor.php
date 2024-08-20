<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    public $table="vendedores";

    protected $guarded=[];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

}
