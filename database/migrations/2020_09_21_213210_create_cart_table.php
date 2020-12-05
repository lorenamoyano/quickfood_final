<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idCliente');
            $table->unsignedInteger('idCarta');
            $table->integer('cantidad');
            $table->timestamps();
        });

        Schema::table('cart', function (Blueprint $table){
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
        Schema::dropIfExists('pedido_carta');
    }
}
