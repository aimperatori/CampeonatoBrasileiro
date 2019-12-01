<?php

namespace application\models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class Partida extends Eloquent {

	const NAO_DISPUTADA = 0;
	const JA_DISPUTADA = 1;

	public $timestamps = false;
	protected $table = 'partida';

	protected $primaryKey = 'id';

	protected $fillable = [
			'golsTimeCasa',
			'golsTimeFora',
			'id_time_casa',
			'id_time_fora',
			'disputada'
	];

	public static function getPartidasNaoDisputadas($id_campeonato, $num_rodada) {
		return DB::table('partida AS p')
		->join('rodadaPartida AS rp', 'p.id', '=', 'rp.id_partida')
		->join('rodada AS r', 'rp.id_rodada', '=', 'r.id')
		->join('time AS tcasa', 'p.id_time_casa', '=', 'tcasa.id')
		->join('time AS tfora', 'p.id_time_fora', '=', 'tfora.id')
		->join('campeonato AS c', 'r.id_campeonato', '=', 'c.id')
		->where('r.id_campeonato', '=', $id_campeonato)
		->where('r.num', '=', $num_rodada)
		->where('p.disputada', '=', self::NAO_DISPUTADA)
		->where('id_admin', '=', 1) // ver admin
		->select('p.id AS id_partida', 'r.num',
				'tcasa.id AS id_time_casa', 'tcasa.nome AS nome_time_casa',
				'tfora.id AS id_time_fora', 'tfora.nome AS nome_time_fora')
		->get();
	}

	public function time_casa() {
		return $this->belongsTo('application\models\Time', 'id_time_casa');
	}

	public function time_fora() {
		return $this->belongsTo('application\models\Time', 'id_time_fora');
	}

	public function rodada() {
		return $this->belongsToMany('application\models\Rodada', 'rodadaPartida', 'id_partida', 'id_rodada');
	}

}
