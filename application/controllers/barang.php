<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library(array('auth','Datatables'));
		$this->load->helper('notif');
		$this->load->model('m_barang');
		$this->template->title('Barang');
		$this->auth->logged_in();
		 // load file view 'index.php' yang ada di folder 'views/admin/' ke dalam 'template.php'
        $this->template->set('top',$this->load->view('theme/top','',TRUE));
        $this->template->set('sidebar',$this->load->view('theme/sidebar','',TRUE));
	}

	public function index()
	{
			
        $this->template->load('default','page/vbarang');
	}


	function get_all(){
		$this->datatables->set_database('post');
		$this->datatables->select('noid,kode,nama,satuan,harga')
        ->unset_column('noid')
        ->from('mbarang')
        ->add_column('aksi',
        	'<button class="btn btn-xs btn-flat btn-primary btnbrg-view">
        	<i class="fa fa-search"></i></button> 
        	<button class="btn btn-xs btn-flat btn-success btnbrg-edit">
        	<i class="fa fa-edit"></i></button> 
        	<button class="btn btn-xs btn-flat btn-danger btnbrg-del" id=$1>
        	<i class="fa fa-times"></i></button>','noid');
        
        echo $this->datatables->generate();
	}

	function add()
	{
		$this->form_validation->set_rules('kd-barang','Kode Barang','trim|required|xss_clean');
		$this->form_validation->set_rules('nm-barang','Nama Barang','trim|required|xss_clean');
		$this->form_validation->set_rules('satuan','Satuan','trim|required|xss_clean');
		$this->form_validation->set_rules('harga','Harga','trim|required|numeric|xss_clean');
		$this->form_validation->set_error_delimiters('<p class="text-red">','</p>');

		if($this->form_validation->run() == FALSE){

			echo json_encode(array(
					'status' 		=> 'error',
					'error_kode'	=> form_error('kd-barang'),
					'error_nama'	=> form_error('nm-barang'),
					'error_satuan'	=> form_error('satuan'),
					'error_harga'	=> form_error('harga')
				)
			);	
		}else{

			$id = $this->input->post('id-barang');

			if(!empty($id)){
				$msg = notif('success','berhasil update barang');
				echo json_encode(array('status'=>'success','msg'=>$msg));
				$this->m_barang->update();
			}else{
				$this->m_barang->add();
				$msg = "Berhasil Menambah Data";
				echo json_encode(array('status'=>'success','msg'=>$msg));
			}
		}
			
	}

	function get_list(){

		if ( !isset($_GET['term']) )
   		exit;
   		$term = $_REQUEST['term'];
        $data = array();
        $rows = $this->m_barang->get_data($term);
            foreach( $rows as $row )
            {
                $data[] = array(
                    'label' => $row->kode.'| '. $row->nama,
                    'id'	=> $row->noid,
                    'kode'  => $row->kode,
                    'harga'	=> $row->harga,
                    'value' => $row->nama);   // here i am taking name as value so it will display name in text field, you can change it as per your choice.
            }
        echo json_encode($data);
	}

	function delete(){
		$kode = $_GET['id'];
		if(!empty($kode)){
			$this->m_barang->delete_row($kode);
			$notif = "Berhasil Menghapus data";
			echo json_encode(array('status'=>'success','msg'=>$notif));
		}else if(empty($kode)){
			$notif = "Ada Kesalahan";
			echo json_encode(array('status'=>'error','msg'=>$notif));
		}
	}
}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */