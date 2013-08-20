<?php
require 'base.php';
class Holder extends Base {
  public function search($current=0) {
  	$this->load->helper(array('url','pager'));
  	$this->load->library('pagination');

  	$config = get_pager_config(base_url('holder/search'));
  	$config['total_rows'] = 200;

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
  	$this->load->helper(array('form',"date"));
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
  				'holder_name'=>$this->input->post("holder_name"),
  				'data_status'=>'1',
  				'create_time'=>date('Y-m-d H:i:s'),
  				'update_time'=>date('Y-m-d H:i:s')
  		);
  		$this->db->insert("d_holder", $record);

  		$this->search();
  	}
  }
}
?>
