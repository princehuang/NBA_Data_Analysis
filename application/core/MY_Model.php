<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('common');
		$this->load->helper('my_config');
	}
	
	public function get_db() {
		return $this->load->database('default',TRUE);
	}
	
	public function upsert_batch($data, $only_update_keys='') {
		$filted = array();
		
		foreach($data as $row) {
			$keys = $this->_keys_prepared($row);
			if($keys === false) {
				return;
			}
			
			$filted_data = $keys;
			
			foreach($this->_field_default_values as $field=>$default_value) {
				$filted_data[$field] = array_key_exists($field, $row) ? $row[$field] : $default_value;
			}
			
			$filted[] = $filted_data;
		}
		
		if(empty($only_update_keys))
			$only_update_keys = $this->_fields;
		
		$db = $this->get_db();
		$db->save_queries = FALSE;
		$db->insert_on_duplicate_update_batch($this->_table_name, $filted, $only_update_keys);
	}
	
	protected function _keys_prepared($data) {
		$wheres = array();
		foreach($this->_keys as $key_field) {
			if(!array_key_exists($key_field, $data)) {
				return false;
			}
			$wheres[$key_field] = $data[$key_field];
		}
		return $wheres;
	}
}
