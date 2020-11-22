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
        Schema::create('pedidocarta', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idCarta');
            $table->timestamps();
        });

        Schema::table('pedido', function (Blueprint $table){
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
        Schema::dropIfExists('pedidocarta');
    }
}
