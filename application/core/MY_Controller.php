<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	protected $layout = 'layout/main';
	protected $layout_data = array(
		'title' => 'NBA',
		'description' => 'NBA Data Analysis',
	);
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->helper('my_config');
		
		$this->load->add_package_path(APPPATH.'third_party/absweb/', FALSE);
		$this->load->library('abs_view');
		$this->load->library('abs_form_builder');
		$this->load->remove_package_path(APPPATH.'third_party/absweb/');
	}
	
	public function render($view_file, $view_data, $layout_data = array()) {
		$layout_data = empty($layout_data) ? $this->layout_data : $layout_data;
		$this->lang->load('left','chinese');
		$left_menu_desc = $this->lang->line('left_menu');
		$layout_data['left_menu_desc'] = $left_menu_desc;
		$data['content'] = $this->load->view($view_file, $view_data, TRUE);
		$data['layout'] = $layout_data;
		$this->load->view($this->layout, $data);
	}
}