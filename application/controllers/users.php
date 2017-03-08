<?php

class Users extends CI_Controller{
	public function index(){
		$this->login();

	}

	public function login(){
		$data['title']='login';

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('users/login', $data);
		$this->load->view('templates/footer');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Users/login');
	}


	public function login_validation(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');

		if($this->form_validation->run() == FALSE){
			$this->login();
		}

		else{
			$data = array(
					'email' => $this->input->post('email'),'is_logged_in' =>1
				);
			$this->session->set_userdata($data);
			redirect('Users/members');
		}
	}

	public function validate_credentials(){
		$this->load->model('model_users');

		if($this->model_users->can_log_in()==FALSE){
			$this->form_validation->set_message('validate_credentials', 'Incorrect Username/Password.');
			return FALSE;
		}

		else{
			return TRUE;
		}
	}


	public function members(){

		if($this->session->userdata('is_logged_in') == FALSE){
			redirect('Users/restricted');
		}

		else {
			$data['title']='Profile';

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('users/profile', $data);
			$this->load->view('templates/footer');
		}

	}

	public function restricted(){
		$this->load->view('users/restricted');
	}

}



?>
