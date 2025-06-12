<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table = 'elementos';

    use HasFactory;

    protected $fillable = [

        'nombre',
        'descripcion',
        'stock'
    ];
}
