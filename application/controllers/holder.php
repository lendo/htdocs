<?php
require 'base.php';
class Holder extends Base {
  public function search($current=0) {
  	$this->load->library("session");
  	$this->session->set_userdata(array('site'=>'uumind.com'));
  	
  	$this->load->helper(array('form'));

  	$this->load->helper(array('url','pager'));
  	$this->load->library('pagination');
  	$this->load->database();

  	$page_size = 10;
  	$this->db->select('id,holder_name');
  	$this->db->from('d_holder');
  	$this->db->where('data_status', 1);
  	$this->db->order_by("id", "desc");
  	$this->db->limit($page_size, $current);
  	$query = $this->db->get();
  	$this->data['result'] = $query->result();

  	$this->db->from('d_holder');
  	$this->db->where('data_status', 1);
  	$query_count = $this->db->count_all_results();

  	$config = get_pager_config(base_url('holder/search'), $page_size);
  	$config['total_rows'] = $query_count;

  	$this->pagination->initialize($config);
		$this->data['pager'] = $this->pagination->create_links();

		$this->data['current'] = $current;

    $this->load->view('holder_view_search', $this->data);
  }

  public function add($current=0) {
  	$this->load->helper(array('form'));
  	$this->load->library('form_validation');

  	if(isset($current) && $current>0) {
  		$this->data['current'] = $current;
  	} else {
  		$this->data['current'] = 0;
  	}

  	$this->load->view('holder_view_add', $this->data);
  }

  public function save($current=0) {
  	if(isset($current) && $current>0) {
  		$this->data['current'] = $current;
  	} else {
  		$this->data['current'] = 0;
  	}


  	$this->load->helper(array('form',"date","url"));
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

  		if(isset($current) && $current>0) {
  			redirect('holder/search/'.$current);
  		} else {
  			redirect('holder/search');
  		}
  	}
  }

  public function edit($id=0,$current=0) {
  	$this->load->helper(array('url','form'));
  	$this->load->library('form_validation');

  	if(isset($current) && $current>0) {
  		$this->data['current'] = $current;
  	} else {
  		$this->data['current'] = 0;
  	}

		if(isset($id) && $id>0) {
			$this->load->database();
			$this->db->select('id,holder_name');
			$this->db->from('d_holder');
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get();
			$this->data['id'] = $query->row()->id;
			$this->data['holder_name'] = $query->row()->holder_name;

			$this->load->view('holder_view_edit', $this->data);
		} else {
			if(isset($current) && $current>0) {
  			redirect('holder/search/'.$current);
  		} else {
  			redirect('holder/search');
  		}
		}
  }

  public function update($current=0) {
  	$this->load->helper(array('form',"date","url"));
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
  		// 跳转到编辑页面
  		if(isset($current) && $current>0) {
  			$this->edit($this->input->post("id"), $current);
  		} else {
  			$this->edit($this->input->post("id"));
  		}
  	} else {
  		$this->load->database();

  		$record = array(
  				'holder_name'=>$this->input->post("holder_name"),
  				'update_time'=>date('Y-m-d H:i:s')
  		);

  		$this->db->where('id',$this->input->post("id"));
			$this->db->update('d_holder',$record);

  		if(isset($current) && $current>0) {
  			redirect('holder/search/'.$current);
  		} else {
  			redirect('holder/search');
  		}
  	}
  }

  public function delete($id=0, $current=0) {
  	$this->load->helper(array('url'));

  	if(isset($id) && $id>0) {
  		$this->load->database();
  		$this->db->where('id', $id);
			$this->db->delete('d_holder');
  	}

  	if(isset($current) && $current>0) {
  		redirect('holder/search/'.$current);
  	} else {
  		redirect('holder/search');
  	}
  }
}
?>
