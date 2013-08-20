<?php
require 'base.php';
class Holder extends Base {
  public function search($current=0) {
  	$this->load->helper(array('url'));
  	$this->load->library('pagination');

  	$config['base_url'] = base_url('holder/search');
  	$config['total_rows'] = 200;
  	$config['per_page'] = 20;
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

  	$this->pagination->initialize($config);
		$this->data['pager'] = $this->pagination->create_links();

    $this->load->view('holder_view', $this->data);
  }

  public function add() {
  	$this->load->helper(array('form'));
  	$this->load->library('form_validation');
  	$this->load->view('holder_view_add', $this->data);
  }

  public function save() {
  	$this->load->helper(array('form'));
  	$this->load->library('form_validation');

  	$config = array(
  			array(
  					'field'   => 'holder_name',
  					'label'   => '股东名称',
  					'rules'   => 'trim|required|max_length[125]|xss_clean'
  			)
  	);

  	$this->form_validation->set_rules($config);
  	$this->form_validation->set_error_delimiters('', '<br/>');

  	if($this->form_validation->run() == FALSE) {
  		$this->load->view('holder_view_add', $this->data);
  	} else {
  		$this->load->database();

  		$record = array(
  				'holder_name'=>$_POST["holder_name"],
  				'data_status'=>'1',
  				'create_time'=>date('Y-M-D H:i:s'),
  				'update_time'=>date('Y-M-D H:i:s')
  		);
  		$this->db->insert("d_holder", $record);
  	}
  }
}
?>
