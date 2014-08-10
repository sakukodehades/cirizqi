<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth{

	protected $username;
	protected $password;
	protected $table;

	function __consturct(){
		$this->CI =& get_instance();

		$this->CI->load->database('default',TRUE);
	}
	function login($username,$password){

		$this->CI =& get_instance();

		$this->CI->load->database('post',TRUE);

		$data = array(
				'username' => $username,
				'password' => md5($password)
			);

		$query = $this->CI->db->get_where('users',$data);

		if($query->num_rows() != 1){

			return false;
		}else{

			$last_login = date("Y-m-d H:i:s");

			$data = array(
					'last_login' => $last_login
				);

			$this->CI->db->update('users', $data);

			$userid = $query->row()->userid;
			$session = array(
					'userid' 	=> $userid,
					'logged_in'	=> true
				);

			$this->CI->session->set_userdata($session);

			return true;
		}
	}

	function logged_in(){

		$this->CI =& get_instance();

		$check = $this->CI->session->userdata('userid') ? true : false;

		if($check == false){
			header('location: '.site_url('login'));
		}
	}

	function logout(){

		$this->CI =& get_instance();

		$this->CI->session->unset_userdata('userid');

		header('location: '.site_url('login'));
	}
}