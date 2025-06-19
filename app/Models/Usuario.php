<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'cedula',
        'email',
        'telefono',
        'direccion',
        'fecha_registro',
        'rol_id',
        'password',
        'api_token',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'id_rol');
    }
}