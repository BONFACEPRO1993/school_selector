<?php
// Users class module
class Users extends CI_Controller{

// main function of Users class
	public function index(){
		$this->login();

	}

	// function to create the login page
	public function login(){
		$data['title']='LOGIN';

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('users/login', $data);
		$this->load->view('templates/footer');
	}

	// function to logout from user profile
	public function logout(){
		$this->session->sess_destroy();
		redirect('Users/login');
	}

	// function to create the signup page
	public function signup(){
		$data['title']='SIGN UP';

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('users/signup', $data);
		$this->load->view('templates/footer');
	}


// function to validate entries entered in the login page
	public function login_validation(){
		$this->load->library('form_validation');

		// Pass data through form_validation function
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');

		// Check if validation rules have been fulfilled; if not return to login function
		if($this->form_validation->run() == FALSE){
				$this->login();
		}

		else{
			$data = array(
					'email' => $this->input->post('email'),'is_logged_in' =>1
				);

			//Create session for	user and redirect user to members function
			$this->session->set_userdata($data);
			redirect('Users/members');
		}
	}

	// function to validate entries in signup page
	public function signup_validation(){
		$this->load->library('form_validation');

		// Pass data through form_validation function
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.user_email]',
						array(
								'required'      => 'You have not provided %s.',
								'is_unique'     => 'This %s already exists.'
							));
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.user_name]|min_length[5]|max_length[12]',
		array(
								'required'      => 'You have not provided %s.',
								'is_unique'     => 'This %s already exists.'
							));
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', array('min_length' => 'Weak Password'));
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');

		// Check if validation rules have been fulfilled; if not return to login function
		if($this->form_validation->run() == FALSE){
			$this->signup();

		}

		else{

			//Generate random key
			$key = md5(uniqid());

			// Create email message to new user
			$this->load->library('email', array('mailtype'=> 'html') );

			$this->email->from('kcpereg@edu.co.ke',"KCPE-SCHOOL-SELECTION");
			$this->email->to($this->input->post('email'));
			$this->email->subject("CONFIRM YOUR REGISTRATION.");

			// Attack random key to message
			$message = "<p>Thank you for Signing up</p>";
			$message = "<p><a href='".base_url()."Users/register_user/$key'>Click here</a> to confirm your account</p>";

			$this->email->message($message);

			if($this->email->send(FALSE)){
				echo "Failed.";
			}

			else{
				echo "Email has been sent.";
			}
		}
	}

	//Call-back function called in login_validation function to compare email/username entered with one saved in db
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
		// Checks if user session is created; if not it redirects to restricted page
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

	//function called when user session is not created
	public function restricted(){
		$this->load->view('users/restricted');
	}

}



?>
