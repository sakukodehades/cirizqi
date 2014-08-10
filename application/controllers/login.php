<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->library('auth');
	}


	public function index()
	{
		$data['username'] = '';
		$data['password'] = '';
		$this->load->view('page/login',$data);
	}

	public function check(){

		$this->form_validation->set_rules('username','Username','trim|required|xss_clean|callback_usercheck');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_error_delimiters('<p class="text-red">','</p>');

		if($this->form_validation->run() == FALSE){

			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');

			$this->load->view('page/login',$data);
		}else{

			redirect('test');

		}
	}

	function usercheck($username){

		$pass = $this->input->post('password');

		$auth = $this->auth->login($username,$pass);

		if($auth == false){

			$this->form_validation->set_message('usercheck','invalid username or password');

			return false;
		}else{

			return true;
		}
	}

	function logout(){

		$this->auth->logout();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */