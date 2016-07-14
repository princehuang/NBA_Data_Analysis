<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport_main extends MY_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->layout = 'layout/main';
		$this->layout_data['sidebar_file'] = 'main';
	}
	
	public function index() {
		$view_data['title'] = 'Hello,NBA!';
		$this->load->view('main_view_page', $view_data);
	}
	
	public function nba_game_main() {
		
		$view_data = array();
		$this->render("main_view_page", $view_data);
	}
}