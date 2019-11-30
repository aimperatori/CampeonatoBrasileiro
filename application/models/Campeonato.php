<?php

namespace application\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Campeonato extends Eloquent {

	const VITORIA = 3;
	const EMPATE = 1;
	const DERROTA = 0;

	public $table = 'campeonato';

}