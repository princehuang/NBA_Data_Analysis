<?php
	$menus[] = array(
		'desc' => '数据汇报',
		'active_pattern' => '/boss\/(welcome|daily_report|big_view|user_view)/i',
		'icon' => 'am-icon-line-chart',
		'level2_menus' => array(
			array(
				'desc' => $layout['left_menu_desc']['game_schedule_overview'],
				'url' => 'boss/welcome/view',
				'active_pattern' => '/boss\/welcome\/view/i',
				'icon' => '',
			),
		),
	);
	
	echo $this->abs_view->load_sidebar_view($menus);