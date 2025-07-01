<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    protected $primaryKey = 'id_tipo_material';
    protected $fillable = [
        'tipo_elemento',
        'estado',
        'fecha_creacion',
        'fecha_modificacion',
    ];
}
