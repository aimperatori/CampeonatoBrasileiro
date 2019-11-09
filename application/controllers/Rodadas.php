<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rodadas extends CI_Controller  {
	
	public function index() {
		
		// CAMPEONATO
		$data['campeonato']['nome'] = 'Campeonato Brasilero';
		
		// RODADA
		$data['rodada'] = 1;
		
		// PARTIDAS
		
		// CASA
		$partida['time_casa']['nome'] = 'Gremio';
		$partida['time_casa']['cidade'] = 'Porto Alegre';
		$partida['time_casa']['gols'] = 2;
		
		// FORA
		$partida['time_fora']['nome'] = 'Flamengo';
		$partida['time_fora']['cidade'] = 'Rio de Janeiro';
		$partida['time_fora']['gols'] = 0;
		
		$i = 19;
		while ($i--) {
			$data['partidas'][] = $partida;
		}
		
		
		
		$this->template->show('rodadas', $data);
	}
}

