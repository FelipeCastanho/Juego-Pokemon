<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
	protected $table = 'entrenador';
    //

    public function scopeEntrenadorNickname($query, $nickname){
    	return $query->where('nickname', $nickname);
    }
}
