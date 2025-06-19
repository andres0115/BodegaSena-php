<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->integer('edad');
            $table->string('cedula', 20);
            $table->string('email', 255)->unique();
            $table->string('telefono', 20);
            $table->string('direccion', 255);
            $table->date('fecha_registro');
            $table->foreignId('rol_id')->constrained('roles', 'id_rol');
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}; 