<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categorias_elementos', function (Blueprint $table) {
            $table->id('id_categoria_elemento');
            $table->string('nombre_categoria', 255);
            $table->string('estado', 50);
            $table->date('fecha_creacion');
            $table->date('fecha_modificacion');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorias_elementos');
    }
}; 