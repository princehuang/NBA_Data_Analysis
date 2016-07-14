<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ABS_View {
	public function __construct() {	
	}
	
	public function load_view($view_file, $params) {
		$ci = &get_instance();
		$ci->load->add_package_path(APPPATH.'third_party/absweb/', FALSE);
		$view = $ci->load->view($view_file, $params, TRUE);
		$ci->load->remove_package_path(APPPATH.'third_party/absweb/');
		return $view;
	}

	public function load_table_view($item_descs, $items, $table_id='') {
		return $this->load_view('include/widget/_table', array('item_descs'=>$item_descs, 'items'=>$items, 'table_id'=>$table_id));
	}
	
	public function load_sidebar_view($menus) {
		return $this->load_view('include/widget/_sidebar', array('menus'=>$menus));
	}
	
	public function load_modal_view($params) {
		return $this->load_view('include/widget/_modal', $params);
	}
}