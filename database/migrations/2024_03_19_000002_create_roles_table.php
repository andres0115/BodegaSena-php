<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_rol');
            $table->string('nombre_rol', 100);
            $table->text('descripcion');
            $table->string('estado', 50);
            $table->date('fecha_creacion');
            $table->date('fecha_modificacion');
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}; 