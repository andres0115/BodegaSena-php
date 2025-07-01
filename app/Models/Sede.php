<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $primaryKey = 'id_sede';
    protected $fillable = [
        'nombre_sede',
        'direccion_sede',
        'estado',
        'fecha_creacion',
        'fecha_modificacion',
        'centro_id',
    ];

    public function centro()
    {
        return $this->belongsTo(Centro::class, 'centro_id', 'id_centro');
    }

    public function areas()
    {
        return $this->hasMany(Area::class, 'sede_id', 'id_sede');
    }
}
