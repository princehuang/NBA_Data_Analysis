<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pull_remote_sports_data extends MY_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('Model_nba_game_schedule');
	}
	
	public function index() {
		$view_data['title'] = 'Hello,NBA!';
		$this->load->view('main_view_page', $view_data);
	}
	
	public function pull_nba_game_schedule_data() {
		set_time_limit(0);
		$year = $this->input->get('year');
		if(empty($year)) {
			$year = date('Y', time());
		}
		
		// 获取NBA常规赛赛程表
		$base_url = 'https://api.sportsdatallc.org/nba-t3/zh/games/YEAR/reg/schedule.json?api_key=qdd3efc5q88kmjsxzeerp7ut';
		$url = str_replace('YEAR', $year, $base_url);
		$ret_reg_data = MY_Pull::curl_remote_data_by_get($url);
		$ret_reg_data_arr = json_decode($ret_reg_data,TRUE);
		if(isset($ret_reg_data_arr['warning']) || isset($ret_reg_data_arr['error'])) {
			echo isset($ret_reg_data_arr['warning'])?$ret_reg_data_arr['warning']:$ret_reg_data_arr['error']."<br>";
		}else{
			unset($ret_reg_data);
			$upsert_data = array();
			foreach($ret_reg_data_arr['games'] as $key=>$item) {
				$upsert_data[] = array(
					'league_id' => $ret_reg_data_arr['league']['id'],
					'league_name' => $ret_reg_data_arr['league']['name'],
					'season_id' => $ret_reg_data_arr['season']['id'],
					'season_year' => $ret_reg_data_arr['season']['year'],
					'season_type' => $ret_reg_data_arr['season']['type'],
					'game_id' => $item['id'],
					'game_status' => $item['status'],
					'game_scheduled_us' => date('Y-m-d H:i:s', strtotime($item['scheduled'])-12*3600),
					'game_scheduled_ch' => date('Y-m-d H:i:s', strtotime($item['scheduled'])),
					'home_team_id' => $item['home']['id'],
					'home_team_name' => $item['home']['name'],
					'away_team_id' => $item['away']['id'],
					'away_team_name' => $item['away']['name'],
				);
				unset($ret_reg_data_arr['games'][$key]);
			}

			$this->Model_nba_game_schedule->upsert_batch($upsert_data);
			unset($upsert_data);
			echo "成功获取NBA常规赛赛程表!"."<br>";
		}
		
		// 获取NBA季后赛赛程表
		$base_url = 'https://api.sportsdatallc.org/nba-t3/zh/games/YEAR/pst/schedule.json?api_key=qdd3efc5q88kmjsxzeerp7ut';
		$url = str_replace('YEAR', $year, $base_url);
		$ret_pst_data = MY_Pull::curl_remote_data_by_get($url);
		$ret_pst_data_arr = json_decode($ret_pst_data,TRUE);
		unset($ret_pst_data);
		if(isset($ret_pst_data_arr['warning']) || isset($ret_pst_data_arr['error'])) {
			echo isset($ret_pst_data_arr['warning'])?$ret_pst_data_arr['warning']:$ret_pst_data_arr['error']."<br>";
		}else{
			$upsert_data = array();
			foreach($ret_pst_data_arr['games'] as $key=>$item) {
				$upsert_data[] = array(
					'league_id' => $ret_pst_data_arr['league']['id'],
					'league_name' => $ret_pst_data_arr['league']['name'],
					'season_id' => $ret_pst_data_arr['season']['id'],
					'season_year' => $ret_pst_data_arr['season']['year'],
					'season_type' => $ret_pst_data_arr['season']['type'],
					'game_id' => $item['id'],
					'game_status' => $item['status'],
					'game_scheduled_us' => date('Y-m-d H:i:s', strtotime($item['scheduled'])-12*3600),
					'game_scheduled_ch' => date('Y-m-d H:i:s', strtotime($item['scheduled'])),
					'home_team_id' => $item['home']['id'],
					'home_team_name' => $item['home']['name'],
					'away_team_id' => $item['away']['id'],
					'away_team_name' => $item['away']['name'],
				);
				unset($ret_pst_data_arr['games'][$key]);
			}
		
			$this->Model_nba_game_schedule->upsert_batch($upsert_data);
			unset($upsert_data);
			echo "成功获取NBA季后赛赛程表!"."<br>";
		}
		
		// 获取NBA季前赛赛程表
		$base_url = 'https://api.sportsdatallc.org/nba-t3/zh/games/YEAR/pre/schedule.json?api_key=qdd3efc5q88kmjsxzeerp7ut';
		$url = str_replace('YEAR', $year, $base_url);
		$ret_pre_data = MY_Pull::curl_remote_data_by_get($url);
		$ret_pre_data_arr = json_decode($ret_pre_data,TRUE);
		unset($ret_pre_data);
		if(isset($ret_pre_data_arr['warning']) || isset($ret_pre_data_arr['error'])) {
			echo isset($ret_pre_data_arr['warning'])?$ret_pre_data_arr['warning']:$ret_pre_data_arr['error']."<br>";
		}else{
			$upsert_data = array();
			foreach($ret_pre_data_arr['games'] as $key=>$item) {
				$upsert_data[] = array(
					'league_id' => $ret_pre_data_arr['league']['id'],
					'league_name' => $ret_pre_data_arr['league']['name'],
					'season_id' => $ret_pre_data_arr['season']['id'],
					'season_year' => $ret_pre_data_arr['season']['year'],
					'season_type' => $ret_pre_data_arr['season']['type'],
					'game_id' => $item['id'],
					'game_status' => $item['status'],
					'game_scheduled_us' => date('Y-m-d H:i:s', strtotime($item['scheduled'])-12*3600),
					'game_scheduled_ch' => date('Y-m-d H:i:s', strtotime($item['scheduled'])),
					'home_team_id' => $item['home']['id'],
					'home_team_name' => $item['home']['name'],
					'away_team_id' => $item['away']['id'],
					'away_team_name' => $item['away']['name'],
				);
				unset($ret_pre_data_arr['games'][$key]);
			}
		
			$this->Model_nba_game_schedule->upsert_batch($upsert_data);
			unset($upsert_data);
			echo "成功获取NBA季前赛赛程表!"."<br>";
		}
	}
}