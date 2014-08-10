<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_barang extends CI_Model{

	protected $tbl = 'mbarang';

	function __construct(){
		$this->load->database('post',TRUE);
	}

	function add(){

		$kdbarang		= $this->input->post('kd-barang');
		$nmbarang		= $this->input->post('nm-barang');
		$satuan			= $this->input->post('satuan');
		$harga			= $this->input->post('harga');

		$data = array(
				'noid' 	=> null,
				'kode'	=> $kdbarang,
				'nama'	=> $nmbarang,
				'satuan'=> $satuan,
				'harga'	=> $harga	
			);

		$this->db->insert($this->tbl,$data);
	}


	function get_data($term){

		 $sql = $this->db->query('select * from mbarang where kode like "'. mysql_real_escape_string($term) .'%" order by nama asc limit 0,10');

 		return $sql ->result();

	}

	function delete_row($kode){
		$this->db->delete($this->tbl,array('kode'=>$kode));
		return;
	}
}