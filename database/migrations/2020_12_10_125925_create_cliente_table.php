<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 250);
            $table->string('apellido1', 100);
            $table->string('apellido2', 100)->nullable();
            $table->string('DNI', 9)->unique();
            $table->string('telefono', 9)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 300);
            $table->string('ciudad', 50);
            $table->unsignedInteger('perfil');
            $table->string('avatar', 255)->nullable();
            $table->timestamps();
            $table->rememberToken();
        });

        Schema::table('cliente', function (Blueprint $table){
            $table->foreign('perfil')->references('id')
                ->on('tipo')
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
        Schema::dropIfExists('cliente');
    }
}
