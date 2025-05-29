<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

        protected $fillable = [
        'tema',
        'descripcion',
        'area',
        'fecha_registro',
        'fecha_cierre',
        'estado',
        'observaciones',
        'usuario_ext',
    ];
}
