<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id('id_movimiento');
            $table->string('estado', 50);
            $table->integer('cantidad');
            $table->date('fecha_creacion');
            $table->date('fecha_modificacion');
            $table->foreignId('tipo_movimiento_id')->constrained('tipos_movimiento', 'id_tipo_movimiento');
            $table->foreignId('material_id')->constrained('materiales', 'id_material');
        });
    }

    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}; 