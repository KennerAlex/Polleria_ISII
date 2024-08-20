<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;
    public $table='trabajadores';
    public $timestamps=false;
    protected $fillable=['dni','nombre','apellidoPaterno','apellidoMaterno','sexo','direccion','telefono','celular','email','activo','eliminado'];
    
}
