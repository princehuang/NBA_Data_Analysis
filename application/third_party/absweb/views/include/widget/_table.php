<!-- am-scrollable-horizontal和am-text-nowrap共同作用为响应式表格，能在如手机的小屏设备上支持水平滚动条 -->
<div class="am-scrollable-horizontal">
<?php
	$adjust_items[0] = $item_descs;
	foreach($items as $item) {
		$adjust_item = array();
		foreach(array_keys($item_descs) as $key) {
			if(!isset($item[$key])) {
				continue;
			}
			$adjust_item[$key] = $item[$key];
		}
		$adjust_items[] = $adjust_item;
	}
	$ci = &get_instance();
	$ci->load->library('table');
	$ci->table->set_template(array('table_open'=>'<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover  tablesorter" id="'.$table_id.'">'));
	echo $ci->table->generate($adjust_items);
?>
</div>