<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatallaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batalla', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEntrenadorHumano')->unsigned();
            $table->foreign('idEntrenadorHumano')->references('id')->on('entrenador');
            $table->integer('idEntrenadorArtificial')->unsigned();
            $table->foreign('idEntrenadorArtificial')->references('id')->on('entrenador');
            $table->dateTime('fecha');
            $table->string('resultado');
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
        Schema::drop('batalla');
    }
}
