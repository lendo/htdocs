<?php
class Base extends CI_Controller {
	protected $data;

	function __construct() {
		parent::__construct();

		$this->data['base_url'] = $this->config->item('base_url');
		$this->data['bootstrap_css'] = $this->config->item('bootstrap_css');
		$this->data['bootstrap_custom_css'] = $this->config->item('bootstrap_custom_css');
		$this->data['bootstrap_js'] = $this->config->item('bootstrap_js');
		$this->data['font_css'] = $this->config->item('font_css');
		$this->data['font_ie7_css'] = $this->config->item('font_ie7_css');
		$this->data['boilerplate_main_css'] = $this->config->item('boilerplate_main_css');
		$this->data['boilerplate_normalize_css'] = $this->config->item('boilerplate_normalize_css');
		$this->data['boilerplate_jquery_js'] = $this->config->item('boilerplate_jquery_js');
		$this->data['boilerplate_modernizr_js'] = $this->config->item('boilerplate_modernizr_js');
		$this->data['boilerplate_main_js'] = $this->config->item('boilerplate_main_js');
		$this->data['boilerplate_plugin_js'] = $this->config->item('boilerplate_plugin_js');
	}
}
?>