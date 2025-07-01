<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    public function run()
    {
        Rol::updateOrInsert(
            ['nombre_rol' => env('SEED_ROLE_ADMIN', 'Super Administrador')],
            [
                'descripcion' => 'Rol con todos los permisos',
                'estado' => true,
                'fecha_creacion' => now(),
                'fecha_modificacion' => now(),
            ]
        );
    }
} 