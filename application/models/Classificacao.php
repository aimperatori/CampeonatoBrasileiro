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
		'vitoria',
		'empate',
		'derrota',
		'id_campeonato',
		'id_rodada'
	];

	public static function getClassificacaoCampeonato($id_campeonato) {

		return DB::table('classificacao AS c')
 		->join('classificacaoTime AS ct', 'c.id', '=', 'ct.id_classificacao')
 		->join('time AS t', 'ct.id_time', '=', 't.id')
 		->join('campeonato AS camp', 'c.id_campeonato', '=', 'camp.id')
 		->where('c.id_campeonato', '=', $id_campeonato)
 		->where('camp.id_admin', '=', 1)
// 		->orderBy('c.id_rodada', 'DESC')
		->orderBy(DB::raw('MAX(c.pontuacao)')	, 'DESC')
 		->orderBy(DB::raw('MAX(c.golsFeitos) - MAX(c.golsSofridos)'), 'DESC')
 		->orderBy(DB::raw('MAX(c.golsFeitos)'), 'DESC')
 		->groupBy('ct.id_time')
// 		->having(DB::raw('MAX(c.id_rodada)'))
 		->take(20)
 		->select('c.id', 't.nome', DB::raw('MAX(c.vitoria+c.empate+c.derrota) AS partidas'), DB::raw('MAX(c.vitoria) AS vitoria'), DB::raw('MAX(c.empate) AS empate'), DB::raw('MAX(c.derrota) AS derrota'), DB::raw('MAX(c.pontuacao) AS pontuacao'), DB::raw('MAX(c.golsSofridos) AS golsSofridos'), DB::raw('MAX(c.golsFeitos) AS golsFeitos'))
 		->get();
	}

	public static function getClassificacaoTime($id_campeonato, $id_time){

		return DB::table('classificacao AS c')
		->join('classificacaoTime AS ct', 'c.id', '=', 'ct.id_classificacao')
		->join('time AS t', 'ct.id_time', '=', 't.id')
		->join('campeonato AS camp', 'c.id_campeonato', '=', 'camp.id')
		->where('c.id_campeonato', '=', $id_campeonato)
		->where('t.id', '=', $id_time)
		->where('camp.id_admin', '=', 1) // ver admin
		->orderBy('c.id_rodada', 'DESC')
		->select('c.id', 'c.pontuacao', 'c.vitoria', 'c.empate', 'c.derrota', 'c.golsSofridos', 'c.golsFeitos', 'c.status')
		->first();

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
