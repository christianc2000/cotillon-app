<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenedorProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenedor_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cantidadProducto');
            $table->foreignId('producto_id')->references('id')->on('productos');
            $table->foreignId('contenedor_id')->references('id')->on('contenedors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenedor_productos');
    }
}
