<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlato extends Model
{
    use HasFactory;
    public $table='tipo_platos';
    public $timestamps=false;
    protected $fillable=['descripcion','descripcion','activo','eliminado'];
    protected $guarded = [];

    public function platos(){
        return $this->hasMany(Plato::class);
    }
}
 