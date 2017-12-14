<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEntrenador')->unsigned();
            $table->foreign('idEntrenador')->references('id')->on('entrenador');
            $table->integer('numeroPokemon');
            $table->integer('idHabilidad1');
            $table->integer('idHabilidad2');
            $table->integer('idHabilidad3');
            $table->integer('idHabilidad4');
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
        Schema::drop('pokemon');
    }
}
