<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library(array('auth','Datatables'));
		$this->load->helper('notif');
		$this->load->model(array('m_pembelian','m_suplier'));
		$this->template->title('Pembelian');
		$this->auth->logged_in();
        $this->template->set('top',$this->load->view('theme/top','',TRUE));
        $this->template->set('sidebar',$this->load->view('theme/sidebar','',TRUE));
	}

	function index(){

		$this->template->load('default','page/vpembelian');

	}

	public function transaksi()
	{
		$data['suplier'] = $this->m_suplier->get_all();
		$this->template->load('default','page/vtrpembelian',$data);
	}

	public function save_master(){

		$iduser = $this->session->userdata('userid');

		$last_id = $this->m_pembelian->save_master($iduser);

		echo json_encode(array('lastid'=>$last_id));
	}

	function save_detail(){

		$this->m_pembelian->save_detail();
	}

	function get_all(){
		$this->datatables->set_database('post');
		$this->datatables->select('mpembelian.noid,kode,tgl,msuplier.nama,totalqty,totalitem,total')
        ->from('mpembelian')
        ->join('msuplier','mpembelian.idsuplier=msuplier.noid','INNER')
        ->unset_column('mpembelian.noid')
        ->add_column('aksi',
        	'<button class="btn btn-xs btn-flat btn-primary" onclick="view($1)">
        	<i class="fa fa-search"></i></button> 
        	<button class="btn btn-xs btn-flat btn-success" onclick="edit($1)">
        	<i class="fa fa-edit"></i></button> 
        	<button class="btn btn-xs btn-flat btn-danger" onclick="delete($1)">
        	<i class="fa fa-times"></i></button>','mpembelian.noid');
        
        echo $this->datatables->generate();
	}
}