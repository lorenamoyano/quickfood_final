<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidocartaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_carta', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idCliente');
            
        });

        Schema::table('pedido_carta', function (Blueprint $table){
            $table->foreign('idPedido')->references('id')
                ->on('pedido')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('pedido_carta', function (Blueprint $table){
            $table->foreign('idCarta')->references('id')
                ->on('carta')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_carta');
    }
}
