<?php

namespace application\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Admin extends Eloquent {

	public $timestamps = false;
	protected $table = 'admin';

	protected $primaryKey = 'id';

	protected $fillable = [
		'login',
		'senha'
	];

}
