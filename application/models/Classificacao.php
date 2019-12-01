<?php

namespace application\models;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Classificacao extends Eloquent {

	public $timestamps = false;
	protected $table = 'classificacao';

	protected $primaryKey = 'id';

	protected $fillable = [
			'status',
			'pontuacao',
			'golsSofridos',
			'golsFeitos',
			'id_campeonato',
			'id_rodada'
	];

	public function getClassificacaoCampeonato($id_campeonato) {

		// FAZER

	}

	public static function getClassificacaoTime($id_campeonato, $id_time){

		return DB::table('classificacao AS c')
		->join('classificacaoTime AS ct', 'c.id', '=', 'ct.id_classificacao')
		->join('time AS t', 'ct.id_time', '=', 't.id')
		->join('campeonato AS camp', 'c.id_campeonato', '=', 'camp.id')
		->where('c.id_campeonato', '=', $id_campeonato)
		->where('t.id', '=', $id_time)
		->where('camp.id_admin', '=', 1) // ver admin
		->select('c.id', 'c.pontuacao', 'c.golsSofridos', 'c.golsFeitos', 'c.status')
		->get();

	}

	public function campeonato() {
		return $this->belongsTo('application\models\Campeonato', 'id_campeonato');
	}

	public function rodada() {
		return $this->belongsTo('application\models\Rodada', 'id_rodada');
	}

	public function time() {
		return $this->belongsToMany('application\models\Time', 'classificacaoTime', 'id_classificacao', 'id_time');
	}

}
