<?php

class Counties extends CI_Controller{
	public function index(){

		$data['title']='counties';

		$this->load->model('model_counties');
		$data['counties'] = $this->model_counties->getCountyInfo();
		// print_r($data['counties']);

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('results/counties', $data);
		$this->load->view('templates/footer');
	}

}

?>
