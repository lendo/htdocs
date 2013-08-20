<?php
class Test extends CI_Controller {
	var $base;
	var $css;
	
	function Test(){
		parent::__construct();
		$this->base = $this->config->item('base_url');
		$this->css = $this ->config->item('css');
		$this->load->database();
	}
	
	public function say() {
		$data['css'] = $this->css;
		$data['base'] = $this->base;
		$data['title'] = "欢迎来到第一个页面！";
		$data['text'] = "你好，游客！";
		
		$this->load->library('menu');
		$data['menu'] = $this->menu->show();
		
		$record = array(
			'site_url'=>'http://www.qq.com',
			'site_name'=>'腾讯',
			'user_name'=>'lendo',
			'pwd'=>'111111',
		);
		$this->db->insert("sites", $record);
		
		$this->db->from("sites");
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		$data['result'] = $query->result();
		
		$this->load->view('test_view', $data);
	}
}
?>