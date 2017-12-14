<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batalla extends Model
{
	protected $table = 'batalla';
    //.
    public function entrenadorArtificial()
    {
        return $this->hasOne('App\Entrenador', 'id', 'idEntrenadorArtificial');
    }  
}
