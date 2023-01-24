<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cantidadUnitario');
            $table->date('fecha_finalizado')->nullable();
            $table->boolean('finalizado')->default(false);
          //  $table->string('tipoUbicacion');//R,T
            $table->foreignId('producto_id')->references('id')->on('productos');
            $table->foreignId('ubicacion_id')->references('id')->on('ubicacions');
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
        Schema::dropIfExists('ubicacion_productos');
    }
}
