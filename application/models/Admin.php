<?php

// MODEL CARREGADA PELO AUTOLOAD DO COMPOSER

namespace application\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Admin extends Eloquent {
	
	public $table = 'admin';
	
	public static function teste(){
		return 'foi porra';
	}
	
}


	
