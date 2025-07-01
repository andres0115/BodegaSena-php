<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $primaryKey = 'id_modulo';
    protected $fillable = [
        'ruta',
        'descripcion_ruta',
        'mensaje_cambio',
        'imagen',
        'estado',
        'es_submenu',
        'modulo_padre',
        'fecha_creacion',
        'fecha_modificacion',
    ];
}
