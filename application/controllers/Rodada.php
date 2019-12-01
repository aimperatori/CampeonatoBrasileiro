<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use application\models\Campeonato;
use application\models\Rodada as Rodadas;

class Rodada extends CI_Controller  {

	public function __construct()
	{
		parent::__construct();
//         $this->load->model('Rodada');
	}

	public function index($id_campeonato = null, $num_rodada = null) {
		if(is_null($id_campeonato)){
			$id_campeonato = $this->input->get('campeonato');
		}
		if(is_null($num_rodada)){
			$num_rodada = $this->input->get('rodada');
		}

		if(!$num_rodada){
			$num_rodada = 1;
		}

		$data['campeonato'] = Campeonato::find($id_campeonato);
		$data['rodada'] = $num_rodada;
		$data['partidas'] = Rodadas::getRodadaCampeonato($id_campeonato, $num_rodada);

		$this->template->show('rodadas', $data);
	}
}

