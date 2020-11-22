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
            $table->unsignedInteger('idCarta');
            $table->integer('cantidad');
            $table->float('total');
            $table->timestamps();
        });

        Schema::table('pedido_carta', function (Blueprint $table){
            $table->foreign('idCliente')->references('id')
                ->on('cliente')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('pedido_carta', function (Blueprint $table){
            $table->foreign('idCarta')->references('id')
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
