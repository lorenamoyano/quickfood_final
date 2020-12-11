<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlergenoscartaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergenos_carta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idCarta');
            $table->unsignedInteger('idAlergeno');
            $table->timestamps();
        });

        Schema::table('alergenos_carta', function (Blueprint $table){
            $table->foreign('idCarta')->references('id')
                ->on('carta')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('alergenos_carta', function (Blueprint $table){
            $table->foreign('idAlergeno')->references('id')
                ->on('alergenos')
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
        Schema::dropIfExists('alergenos_carta');
    }
}
