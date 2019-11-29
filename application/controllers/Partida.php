<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partida extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
        $this->load->model('Partida');
	}

	public function index()	{
		$this->template->show('partidas');
	}

}
