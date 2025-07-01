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
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_modificacion')->useCurrentOnUpdate()->nullable();
            $table->foreignId('usuario_id')->constrained('usuarios', 'id_usuario');
            $table->foreignId('tipo_movimiento_id')->constrained('tipos_movimiento', 'id_tipo_movimiento');
            $table->foreignId('material_id')->constrained('materiales', 'id_material');
            $table->foreignId('sitio_id')->constrained('sitios', 'id_sitio');
        });
    }

    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}; 