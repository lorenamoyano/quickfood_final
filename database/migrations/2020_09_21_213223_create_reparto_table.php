<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepartoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idCliente');
            $table->unsignedInteger('idPedido');
            $table->boolean('recogida' , 1);
            $table->timestamps();
        });

        Schema::table('reparto', function (Blueprint $table){
            $table->foreign('idCliente')->references('id')
                ->on('cliente')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('reparto', function (Blueprint $table){
            $table->foreign('idPedido')->references('id')
                ->on('pedido')
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
        Schema::dropIfExists('reparto');
    }
}
