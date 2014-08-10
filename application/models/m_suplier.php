<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_suplier extends CI_Model{

	protected $tbl = 'msuplier';

	function __construct(){
		$this->load->database('post',TRUE);
	}


	function get_all(){

		return $this->db->get($this->tbl)->result();
	}
}