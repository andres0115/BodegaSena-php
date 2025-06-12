<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('caracteristicas', function (Blueprint $table) {
            $table->id('id_caracteristica');
            $table->string('descripcion', 255);
            $table->foreignId('material_id')->constrained('materiales', 'id_material');
        });
    }

    public function down()
    {
        Schema::dropIfExists('caracteristicas');
    }
}; 