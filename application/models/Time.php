<?php

namespace application\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Time extends Eloquent {

	public $timestamps = false;
	protected $table = 'time';

	protected $primaryKey = 'id';

	protected $fillable = [
			'nome',
			'cidadae',
			'estado',
	];

	public function classificacao() {
		return $this->belongsToMany('application\models\Classificacao', 'classificacaoTime', 'id_time', 'id_classificacao');
	}

}
