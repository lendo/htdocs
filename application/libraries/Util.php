<?php
class Util {
	function fill_static_res($data, $config) {
		$data['base_url'] = $config->item('base_url');
		$data['bootstrap_css'] = $config->item('bootstrap_css');
		$data['bootstrap_js'] = $config->item('bootstrap_js');
		$data['button_css'] = $config->item('button_css');
		$data['button_font_css'] = $config->item('button_font_css');
		$data['boilerplate_main_css'] = $config->item('boilerplate_main_css');
		$data['boilerplate_normalize_css'] = $config->item('boilerplate_normalize_css');
		$data['boilerplate_jquery_js'] = $config->item('boilerplate_jquery_js');
		$data['boilerplate_modernizr_js'] = $config->item('boilerplate_modernizr_js');
		$data['boilerplate_main_js'] = $config->item('boilerplate_main_js');
		$data['boilerplate_plugin_js'] = $config->item('boilerplate_plugin_js');

		return $data;
	}
}
?>