<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InserirResultados extends CI_Controller  {

	public function index() {
		$this->template->show('inserir_resultado');
	}

	public function save() {

		var_dump($this->input->post());

		echo 'salva a partida';
// 		$this->template->show('inserir_resultado');

	}

}

