<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GerarPartidasCampeonato extends CI_Controller {

	public function index() {

		$obj = new GeraPartidasCampeonato();
		$obj->createAll();

	}

}
