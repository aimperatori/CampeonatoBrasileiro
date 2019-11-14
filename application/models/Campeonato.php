<?php

namespace application\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Campeonato extends Eloquent {
	
	public $table = 'campeonato';
	
	public static function teste(){
		return 'foi';
	}
	
}