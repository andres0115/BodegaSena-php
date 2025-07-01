<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;

class UsuarioAdminSeeder extends Seeder
{
    public function run()
    {
        $rol = Rol::where('nombre_rol', env('SEED_ROLE_ADMIN', 'Super Administrador'))->first();

        Usuario::updateOrInsert(
            ['email' => 'triana@gmail.com'],
            [
                'nombre' => 'felipe',
                'apellido' => 'triana',
                'edad' => 20,
                'cedula' => '1000000000',
                'password' => Hash::make('triana'),
                'telefono' => '3000000000',
                'rol_id' => $rol->id_rol ?? 1,
                'estado' => true,
                'fecha_registro' => now(),
                'imagen' => 'assets/img/default.png',
            ]
        );
    }
} 