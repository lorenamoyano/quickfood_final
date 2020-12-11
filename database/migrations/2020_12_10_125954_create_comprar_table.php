<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprar', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idClien');
            $table->string('direccion');
            $table->boolean('repartido');
            $table->timestamps();
        });

        Schema::table('comprar', function (Blueprint $table){
            $table->foreign('idClien')->references('id')
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
        Schema::dropIfExists('comprar');
    }
}
