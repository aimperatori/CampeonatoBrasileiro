<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Time extends CI_Controller {

    public function __construct() 
	{
		parent::__construct();
        $this->load->model('Time');
	}
	
	public function index()	{
		$this->load->view('time');
		
	}
}