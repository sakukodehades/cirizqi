<?php
 
/**
 * Upload Class
 *
 * @subpackage	Controller
 * @link        http://www.kohaci.com/
 * @author	Freddy Yuswanto (freddy@lenteravision.com)
 */
 
class Upload extends CI_Controller {
 
    public function  __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
 
    public function index() {
        $this->load->view('upload_form') ;
    }
 
    public function do_upload() {
        $config['upload_path']	= "./uploads/real/";
        $config['allowed_types']= 'gif|jpg|png|jpeg';
        $config['max_size']     = '2000';
        $config['max_width']  	= '2000';
        $config['max_height']  	= '2000';
 
        $this->load->library('upload', $config);
 
        if ($this->upload->do_upload("photo")) {
            $data	 	= $this->upload->data();
 
            /* PATH */
            $source             = "./uploads/real/".$data['file_name'] ;
            $destination_thumb	= "./uploads/thumbnail/" ;
            $destination_medium	= "./uploads/medium/" ;
 
            // Permission Configuration
            chmod($source, 0777) ;
 
            /* Resizing Processing */
    	    // Configuration Of Image Manipulation :: Static
    	    $this->load->library('image_lib') ;
    	    $img['image_library'] = 'GD2';
    	    $img['create_thumb']  = TRUE;
    	    $img['maintain_ratio']= TRUE;
 
            /// Limit Width Resize
            $limit_medium   = 200 ;
            $limit_thumb    = 90 ;
 
            // Size Image Limit was using (LIMIT TOP)
            $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
 
            // Percentase Resize
            if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                $percent_medium = $limit_medium/$limit_use ;
                $percent_thumb  = $limit_thumb/$limit_use ;
            }
 
            //// Making THUMBNAIL ///////
	    $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
            $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
 
            // Configuration Of Image Manipulation :: Dynamic
            $img['thumb_marker'] = '_thumb-'.floor($img['width']).'x'.floor($img['height']) ;
            $img['quality']      = '100%' ;
            $img['source_image'] = $source ;
            $img['new_image']    = $destination_thumb ;
 
            // Do Resizing
            $this->image_lib->initialize($img);
            $this->image_lib->resize();
            $this->image_lib->clear() ;
 
            ////// Making MEDIUM /////////////
            $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
            $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
 
            // Configuration Of Image Manipulation :: Dynamic
            $img['thumb_marker'] = '_medium-'.floor($img['width']).'x'.floor($img['height']) ;
            $img['quality']      = '100%' ;
            $img['source_image'] = $source ;
            $img['new_image']    = $destination_medium ;
 
            // Do Resizing
            $this->image_lib->initialize($img);
            $this->image_lib->resize();
            $this->image_lib->clear() ;
        }
        else {
            echo "Failed!" ;
        }
    }
}
?>