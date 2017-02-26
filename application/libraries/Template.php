<?php
/**
 * @author radith
 * @description this class to load view in general (view template)
 * @version 1.0
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {

	/**
	 * @author dedy ismanto
	 * @description : create default template page
	 */
	
	function __construct(){
	
		$this->CI =& get_instance();
		$this->CI->load->library('session');
		$this->CI->load->Model('AccessModel');
	}

	var $template_data = array();	
	
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $data = array(), $return = FALSE)
		{               
			
			// $this->CI =& get_instance();
			// $this->CI->load->Model('AccessModel');

			if($this->CI->session->userdata('uId')) :

				define('CLIENTID',$this->CI->session->userdata('uClientId'));
				define('CLIENTKEY',$this->CI->session->userdata('uClientKey'));
				define('COMPANYNAME',$this->CI->session->userdata('uCompany'));
				$data['accessMenus'] = $this->CI->AccessModel->finalUserAccess($this->CI->session->userdata('uAccess'));

				$this->set('contents', $this->CI->load->view($view, $data, TRUE));
				return $this->CI->load->view($template, $this->template_data, $return);
				
			else:
			
				redirect(BASEURL.'login','refresh');

			endif;
				

		}
}
