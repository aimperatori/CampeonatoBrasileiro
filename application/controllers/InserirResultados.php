<?php

use application\models\Campeonato;
use application\models\Rodada;
use application\models\Partida;

defined('BASEPATH') OR exit('No direct script access allowed');

class InserirResultados extends CI_Controller  {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index() {
		$id_campeonato = $this->input->get('campeonato');

		// pega id campeonato para setar select
		$data['idCampeonatoSelected'] = $id_campeonato;

		// lista todos os campeonatos do usuario
		$data['campeonatos'] = Campeonato::where('id_admin', '=', 1)->get();

		// get rodada atual
		$data['rodada_atual'] = Rodada::getRodadaAtual($id_campeonato);

		$data['partidas'] = Partida::getPartidasNaoDisputadas($id_campeonato, $data['rodada_atual']);

		$this->template->show('inserir_resultado', $data);
	}

	public function save() {
		$post = $this->input->post();

		$data = array(
				'golsTimeCasa' => $post['gols_time_casa'],
				'golsTimeFora' => $post['gols_time_fora'],
				'disputada' => Partida::JA_DISPUTADA
		);

		$partida = Partida::find($post['id_partida']);
		if(is_null($partida)){
			throw new Exception('Partida não encontrada');
		}

		$partida->fill($data);

		$partida->save();

		// redireciona pro index
		header('Location: /inserirResultados?campeonato='.$post['id_campeonato']);
	}

}

