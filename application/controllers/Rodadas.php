<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rodadas extends CI_Controller  {
	
	public function index() {

		$campeonato = Campeonato::find(1);
		$timeCasa = Time::find(1);
		$timeFora = Time::find(2);
		
		// CAMPEONATO
		$data['campeonato']['nome'] = $campeonato->nome;
		
		// RODADA
		$data['rodada'] = 1;
		
		// PARTIDAS
		
		// CASA
		$partida['time_casa']['nome'] = $timeCasa->nome;
		$partida['time_casa']['cidade'] = $timeCasa->cidade;
		$partida['time_casa']['gols'] = 2;
		
		// FORA
		$partida['time_fora']['nome'] = $timeFora->nome;
		$partida['time_fora']['cidade'] = $timeFora->cidade;
		$partida['time_fora']['gols'] = 0;
		
		$i = 19;
		while ($i--) {
			$data['partidas'][] = $partida;
		}
		
		
		
		$this->template->show('rodadas', $data);
	}
}

