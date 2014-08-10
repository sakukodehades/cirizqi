<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->output->enable_profiler(false);
		$this->load->library('auth');
		$this->load->helper('notif');
	}

	public function index()
	{
			$this->auth->logged_in();
            // set variabel $title 
            $this->template->title('Test Page');
	 
            // load file view 'index.php' yang ada di folder 'views/admin/' ke dalam 'template.php'
            $this->template->set('top',$this->load->view('theme/top','',TRUE));
            $this->template->set('sidebar',$this->load->view('theme/sidebar','',TRUE));
            $this->template->load('default','page/test');
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */