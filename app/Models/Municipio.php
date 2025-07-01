<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $primaryKey = 'id_municipio';
    protected $fillable = [
        'nombre_municipio',
        'estado',
        'fecha_creacion',
        'fecha_modificacion',
    ];
}
