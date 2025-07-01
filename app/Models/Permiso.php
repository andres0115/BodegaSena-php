<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $primaryKey = 'id_permiso';
    protected $fillable = [
        'nombre',
        'codigo_nombre',
        'estado',
        'puede_ver',
        'puede_crear',
        'puede_editar',
        'fecha_creacion',
        'modulo_id',
        'rol_id',
    ];
}
