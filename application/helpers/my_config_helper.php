<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Config {
	public static function get_my_config($config_file, $config_item) {
		$CI =& get_instance();
		$CI->config->load($config_file);
		return $CI->config->item($config_item);
	}
}