<?php

namespace application\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Campeonato extends Eloquent {

	const VITORIA = 3;
	const EMPATE = 1;
	const DERROTA = 0;

	public $timestamps = false;
	protected $table = 'campeonato';

	protected $primaryKey = 'id';

	protected $fillable = [
			'nome',
			'descricao',
			'dataFim',
			'dataInicio',
			'emDisputa',
			'id_admin'
	];

	public function admin() {
		return $this->belongsTo('application\models\Admin', 'id_admin');
	}

}
