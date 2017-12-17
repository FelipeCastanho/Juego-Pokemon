<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdArtificial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('EntrenadorArtificial', function ($table) {
            $table->dropColumn('dificultad');
            $table->integer('idDueno')->unsigned()->after('id');
            $table->foreign('idDueno')->references('id')->on('entrenador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
