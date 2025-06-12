<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->id('id_sede');
            $table->string('nombre_sede', 255);
            $table->string('direccion_sede', 255);
            $table->string('telefono', 20);
            $table->date('fecha_modificacion');
            $table->foreignId('municipio_id')->constrained('municipios', 'id_municipio');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sedes');
    }
}; 