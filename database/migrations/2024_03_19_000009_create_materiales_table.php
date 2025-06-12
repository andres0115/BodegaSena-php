<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id('id_material');
            $table->string('codigo_serie', 100);
            $table->string('nombre_material', 255);
            $table->text('descripcion_material');
            $table->string('numero_ingreso', 100);
            $table->integer('cantidad_disponible');
            $table->string('estado', 50);
            $table->date('fecha_vencimiento');
            $table->foreignId('tipo_material_id')->constrained('tipo_materiales', 'id_tipo_material');
        });
    }

    public function down()
    {
        Schema::dropIfExists('materiales');
    }
}; 