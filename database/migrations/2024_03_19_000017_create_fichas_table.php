<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->id('id_ficha');
            $table->string('estado', 50);
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_modificacion')->useCurrentOnUpdate()->nullable();
            $table->foreignId('usuario_id')->constrained('usuarios', 'id_usuario');
            $table->foreignId('programa_id')->constrained('programas', 'id_programa');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fichas');
    }
}; 