<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * CODEIGNITER template library
 *
 * @author  Jérôme Jaglale
 * @url     http://maestric.com/doc/php/codeigniter_template
 */
 
class Template
{
    var $template_data = array();
       
    function set($name, $value)
    {
      $this->template_data[$name] = $value;
    }
	  
	  function title($title)
	  {
            $this->template_data['title'] = $title;
	  }
	  
          function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
          {               
            $this->CI =& get_instance();
            $this->set('content', $this->CI->load->view($view, $view_data, TRUE));
            //$this->set('top',$this->CI->load->view('theme/top','',TRUE));
            //$this->set('footer',$this->CI->load->view('theme/footer','',TRUE));
            return $this->CI->load->view($template, $this->template_data, $return);
          }
}
 
/* End of file Template.php */
/* Location: ./application/libraries/Template.php */