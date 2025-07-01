<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $primaryKey = 'id_inventario';
    protected $fillable = [
        'stock',
        'placa_sena',
        'descripcion',
        'sitio_id',
    ];
}
