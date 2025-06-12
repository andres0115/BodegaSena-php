<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id('id_inventario');
            $table->integer('stock');
            $table->foreignId('material_id')->constrained('materiales', 'id_material');
            $table->foreignId('sitio_id')->constrained('sitios', 'id_sitio');
            $table->date('fecha_modificacion');
            $table->foreignId('categoria_id')->constrained('categorias_elementos', 'id_categoria_elemento');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventario');
    }
}; 