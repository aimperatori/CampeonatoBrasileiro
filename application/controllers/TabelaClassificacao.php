<?php

use application\models\Campeonato;
use application\models\Classificacao;
use application\models\ClassificacaoTime;

defined('BASEPATH') OR exit('No direct script access allowed');

class TabelaClassificacao extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index($id_campeonato = null) {
		if(is_null($id_campeonato)){
			$id_campeonato = $this->input->get('campeonato');
		}

		$data['campeonato'] = Campeonato::find($id_campeonato);

		$data['classificacao'] = Classificacao::getClassificacaoCampeonato($id_campeonato);

		$this->template->show('classificacao', $data);
	}

}
