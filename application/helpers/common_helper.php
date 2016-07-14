<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Pull {
	public static function curl_remote_data_by_get($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_TIMEOUT, 300);
		
		$ret_data = curl_exec($ch);
		if($ret_data === FALSE) {
			return json_encode(array('error'=>'curl拉取数据失败！','url'=>$url));
		}
		if(empty($ret_data)) {
			return json_encode(array('warning'=>'curl拉取数据的数据为空！','url'=>$url));
		}
		return $ret_data;
	}
}