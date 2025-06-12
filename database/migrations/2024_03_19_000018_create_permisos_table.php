<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id('id_permiso');
            $table->string('nombre', 255);
            $table->string('codigo_nombre', 100);
            $table->string('estado', 50);
            $table->date('fecha_creacion');
            $table->foreignId('modulo_id')->constrained('modulos', 'id_modulo');
            $table->foreignId('rol_id')->constrained('roles', 'id_rol');
            $table->string('tipo_permiso', 100);
            $table->date('fecha_modificacion');
        });
    }

    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}; 