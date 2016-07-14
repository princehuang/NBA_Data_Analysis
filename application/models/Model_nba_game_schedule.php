<?php

class Model_nba_game_schedule extends MY_Model {
	const TABLE = 'nba_game_schedule';
	
	public function __construct() {
		parent::__construct();
		
		$this->_table_name = self::TABLE;
		
		$this->_keys = array(
			'league_id',
			'season_id',
			'game_id',
		);
		
		$this->_field_default_values = array(
			'league_name' => 0,
			'season_year' => 0,
			'season_type' => 0,
			'game_status' => 0,
			'game_scheduled_us' => 0,
			'game_scheduled_ch' => 0,
			'home_team_id' => 0,
			'home_team_name' => 0,
			'away_team_id' => 0,
			'away_team_name' => 0,
		);
		
		$this->_fields = array_merge($this->_keys, array_keys($this->_field_default_values));
	}
	
	public function test() {
		$db = $this->get_db();
		$db->select('*')
			->from(self::TABLE);
		return $db->get()->result_array();
	}
}

