<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if ( ! function_exists('get_pager_config')) {
		function get_pager_config($url, $per_page = 10) {
      $config['base_url'] = $url;
	  	$config['per_page'] = $per_page;
	  	$config['first_link'] = '首页';
	  	$config['last_link'] = '末页';
	  	$config['next_link'] = '下页';
	  	$config['prev_link'] = '上页';
	  	$config['full_tag_open'] = '<div class="pagination pull-right"><ul>';
	  	$config['full_tag_close'] = '</ul></div>';

	  	$config['first_tag_open'] = '<li>';
	  	$config['first_tag_close'] = '</li>';
	  	$config['last_tag_open'] = '<li>';
	  	$config['last_tag_close'] = '</li>';
	  	$config['next_tag_open'] = '<li>';
	  	$config['next_tag_close'] = '</li>';
	  	$config['prev_tag_open'] = '<li>';
	  	$config['prev_tag_close'] = '</li>';
	  	$config['cur_tag_open'] = '<li class="disabled"><span>';
	  	$config['cur_tag_close'] = '</span></li>';
	  	$config['num_tag_open'] = '<li>';
	  	$config['num_tag_close'] = '</li>';

      return $config;
    }
	}
?>