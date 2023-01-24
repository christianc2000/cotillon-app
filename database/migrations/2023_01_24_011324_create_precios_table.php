<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio',8,2);
            $table->date('fecha_finalizado')->nullable();
            $table->boolean('habilitado')->default(true);
            $table->string('tipoPrecio',1);//U,C
            $table->foreignId('producto_id')->nullable()->references('id')->on('productos');
            $table->foreignId('contenedor_producto_id')->nullable()->references('id')->on('contenedor_productos');
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
        Schema::dropIfExists('precios');
    }
}
