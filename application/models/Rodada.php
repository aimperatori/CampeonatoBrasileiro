<?php

namespace application\models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as DB;

class Rodada extends Eloquent {

	public $table = 'rodada';

	public static function getRodadaCampeonato($id_campeonato, $num_rodada = 1) {
		return DB::table('rodada AS r')
		->join('rodadaPartida AS rp', 'r.id', '=', 'rp.id_rodada')
		->join('partida AS p', 'rp.id_partida', '=', 'p.id')
		->join('time AS tcasa', 'p.id_time_casa', '=', 'tcasa.id')
		->join('time AS tfora', 'p.id_time_fora', '=', 'tfora.id')
		->where('id_campeonato', '=', $id_campeonato)
		->where('num', '=', $num_rodada)
		->select('r.num', 'r.data AS data_rodada', 'tcasa.nome AS nome_time_casa', 'tcasa.cidade AS cidade_time_casa', 'p.golsTimeCasa AS gols_time_casa',
				'tfora.nome AS nome_time_fora', 'tfora.cidade AS cidade_time_fora', 'p.golsTimeFora AS gols_time_fora')
		->get();
	}

}