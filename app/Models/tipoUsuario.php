<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoUsuario extends Model
{
    
    public $table='tipousuario';
    protected $fillable=['tipo', 'activo', 'eliminado'];
    public $timestamps=false;
    use HasFactory;
}
