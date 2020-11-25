<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepartidorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repartidor', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idReparto');
            $table->unsignedInteger('idCliente');
            $table->timestamps();
        });

        Schema::table('repartidor', function (Blueprint $table){
            $table->foreign('idReparto')->references('id')
                ->on('reparto')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('repartidor', function (Blueprint $table){
            $table->foreign('idCliente')->references('id')
                ->on('cliente')
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
        Schema::dropIfExists('repartidor');
    }
}
