<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('cbg');
            $table->string('pais');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('email');
            $table->string('password');
            $table->boolean('estado');
            $table->boolean('confirmoEmail');
            $table->string('confirm_token', 100);
            $table->integer('idEntrenador')->unsigned();
            $table->foreign('idEntrenador')->references('id')->on('entrenador');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario');
    }
}
