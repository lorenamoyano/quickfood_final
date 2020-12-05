<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idCliente');
            $table->unsignedInteger('idCar');
            $table->boolean('pago');
            $table->date('fecha');
            $table->timestamps();
        });

        Schema::table('pedido', function (Blueprint $table){
            $table->foreign('idCliente')->references('id')
                ->on('cliente')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('pedido', function (Blueprint $table){
            $table->foreign('idCar')->references('id')
                ->on('carta')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
