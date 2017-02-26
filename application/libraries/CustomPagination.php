<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomPagination {

	public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->library('pagination');
    }

    private function normalPagination(){
		$config = array();

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="page"><span class="noradius grey-text text-darken-2 btn-sm">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="page"><span class="noradius grey-text text-darken-2 btn-sm">';
		$config['last_tag_close'] = '</span></li>';
		$config['next_link'] = 'Next <i class="fa fa-chevron-right" aria-hidden="true"></i>';
		$config['next_tag_open'] = '<li class="page"><span class="noradius grey-text text-darken-2 btn-sm">';
		$config['next_tag_close'] = '</span></li>';
		$config['prev_link'] = '<i class="fa fa-chevron-left" aria-hidden="true"></i> Prev';
		$config['prev_tag_open'] = '<li class="page"><span class="noradius grey-text text-darken-2 btn-sm">';
		$config['prev_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="active"><a href="" class="noradius grey darken-3 btn-sm" style="border:1px solid #333">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page"><span class="noradius grey-text text-darken-2 btn-sm">';
		$config['num_tag_close'] = '</span></li>';

		return $config;
    }

    public function createPagination($pagConfig){
    	$config = array();
        $config["base_url"] = "";
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
 		$config['num_links'] = 5;
 		$config['reuse_query_string'] = true;
		// $config["total_rows"] = 10;
 		
 		$pagConfig = array_replace($config, $this->normalPagination(),$pagConfig);
			
		$this->CI->pagination->initialize($pagConfig);
		return $this->CI->pagination->create_links();
    }


}