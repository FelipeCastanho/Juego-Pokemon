<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPokemon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('Pokemon', function ($table) {
            $table->dropColumn('idHabilidad1');
            $table->dropColumn('idHabilidad2');
            $table->dropColumn('idHabilidad3');
            $table->dropColumn('idHabilidad4');

            $table->String('nombreHabilidad1')->after('numeroPokemon');
            $table->String('nombreHabilidad2')->after('nombreHabilidad1');
            $table->String('nombreHabilidad3')->after('nombreHabilidad2');
            $table->String('nombreHabilidad4')->after('nombreHabilidad3');
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
