<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		$this->home();
	}
	
	public function home()
	{
		$this->load->model('model_counties');

		$data['counties'] = $this->model_counties->getCountyInfo();

		$this->load->view('welcome_message', $data);
	}
}
