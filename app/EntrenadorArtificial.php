<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntrenadorArtificial extends Model
{
	protected $table = 'EntrenadorArtificial';
    //
    public function entrenador(){
    	return $this->hasOne('App\Entrenador', 'id', 'idEntrenador');
    }
}
