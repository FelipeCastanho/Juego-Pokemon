<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
	protected $table = 'pokemon';
    //

    public function scopeEntrenadorPokemon($query, $id){
    	return $query->where('idEntrenador', $id);
    }
}
