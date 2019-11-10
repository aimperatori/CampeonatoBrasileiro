<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campeonatos extends CI_Controller {
	
	public function index()	{
		
		$data['campeonatos'][] = array(
					'nome' => 'campeonato brasileiro',
					'descricao' => 'descrica .........'
		);
		
		$this->template->show('campeonatos', $data);
	}
	
}
