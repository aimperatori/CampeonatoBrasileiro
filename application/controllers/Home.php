<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use application\models\Campeonato;

class Home extends CI_Controller {

	public function index()	{
		$this->template->show('home');
	}
}
