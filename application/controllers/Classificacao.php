<?php

use application\models\Campeonato;
use application\models\Classificacao;

defined('BASEPATH') OR exit('No direct script access allowed');

class Classificacao extends CI_Controller {

	public function index()	{
		$id_campeonato = $this->input->get('campeonato');

		$data['campeonato'] = Campeonato::find($id_campeonato);


		// FAZER

		$data['classificacao'] = '';


		echo '<pre>';
		var_dump($data); die();

		$this->template->show('classificacao', $data);
	}



}
