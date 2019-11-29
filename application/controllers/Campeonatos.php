<?php
use application\models\Admin;
use application\models\campeonato;

defined('BASEPATH') OR exit('No direct script access allowed');

class Campeonatos extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
        $this->load->model('Campeonato');
	}
	
	public function index()	{
		
		$data['campeonatos'] = Campeonato::all();
		
		$this->template->show('campeonatos', $data);
	}
	
}
