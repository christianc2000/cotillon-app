<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVencimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vencimientos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');//codigo lote del producto
            $table->unsignedInteger('cantidad');
            $table->date('fechaVencimiento');
            $table->boolean('vencido');
            $table->unsignedInteger('cantidadVencido')->default(0);
            $table->unsignedInteger('stock');
            $table->foreignId('producto_id')->references('id')->on('productos');
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
        Schema::dropIfExists('vencimientos');
    }
}
