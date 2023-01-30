<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('imagen');
            $table->string('contenido');
            $table->unsignedInteger('stock')->nullable();
            //$table->unsignedInteger('stockReservaUnitario')->nullable();
            $table->boolean('contenedor');
            $table->foreignId('tematica_id')->references('id')->on('tematicas');
            $table->foreignId('tipo_producto_id')->references('id')->on('tipo_productos');
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
        Schema::dropIfExists('productos');
    }
}
