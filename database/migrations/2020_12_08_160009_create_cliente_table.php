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
            $table->string('api_token' , 32);
            $table->string('ciudad', 50);
            $table->string('perfil' , 10);
            $table->string('avatar', 255);
            $table->timestamps();
            $table->rememberToken();
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
