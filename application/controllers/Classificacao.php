<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classificacao extends CI_Controller {

	public function index()	{
		$id_campeonato = $this->input->get('campeonato');

		$data['classificacao'] = '';

		$this->template->show('classificacao', $data);
	}

}
