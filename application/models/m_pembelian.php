<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pembelian extends CI_Model{

	
	function __construct(){
		$this->load->database('post',TRUE);
	}

	function save_master($iduser){

		$kode		= $this->input->post('kode');
		$tgl		= $this->input->post('tgl');
		$idsuplier 	= $this->input->post('suplier');
		$totalqty	= $this->input->post('tot-qty');
		$totalitem	= $this->input->post('tot-item');
		$total 		= $this->input->post('tot-hrg');


		$data = array(
				'noid' 		=> null,
				'kode' 		=> $kode,
				'tgl'		=> $tgl,
				'idsuplier'	=> $idsuplier,
				'totalqty'	=> $totalqty,
				'totalitem'	=> $totalitem,
				'total'		=> $total,
				'iduser'	=> $iduser
		);

		$this->db->insert('mpembelian',$data);
		return $this->db->insert_id();
	}

	function save_detail(){

		$post 	= $this->input->post('data');
		$idbeli = $this->input->post('idpembelian');

		foreach($post as $key => $value){
			
			$data = array(
				'noid' 			=> null,
				'idpembelian'	=> $idbeli,
				'idbrg'			=> $value[0],
				'namabrg'		=> $value[1],
				'qty'			=> $value[2],
				'harga'			=> $value[3],
				'subtotal'		=> $value[4]
			);

			$this->db->insert('mpembeliandetail',$data);
		}
	}
}