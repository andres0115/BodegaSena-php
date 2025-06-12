<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id('id_area');
            $table->string('nombre_area', 255);
            $table->string('estado', 50);
            $table->date('fecha_creacion');
            $table->date('fecha_modificacion');
            $table->foreignId('sede_id')->constrained('sedes', 'id_sede');
        });
    }

    public function down()
    {
        Schema::dropIfExists('areas');
    }
}; 