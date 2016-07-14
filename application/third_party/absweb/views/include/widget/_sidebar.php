<? defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $ci = &get_instance(); ?>

<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
	<div class="am-offcanvas-bar admin-offcanvas-bar">
		<ul class="am-list admin-sidebar-list">
			<? foreach($menus as $menu_index => $menu) { ?>
				<? if(empty($menu['level2_menus'])) { ?>
					<li>
						<a href="<?=base_url() . $menu['url']?>"><span class="<?=$menu['icon']?>"></span> <?=$menu['desc']?></a>
					</li>
				<? } else { ?>
					<li class="admin-parent">
						<a class="am-cf <?php if(preg_match($menu['active_pattern'], $ci->uri->uri_string())) echo 'am-collapsed'?>" data-am-collapse="{target: '#collapse-nav-<?=$menu_index?>'}">
							<span class="<?=$menu['icon']?>"></span> <?=$menu['desc']?> <span class="am-icon-angle-right am-fr am-margin-right"></span>
						</a>
						<ul class="am-list am-collapse admin-sidebar-sub <?php if(preg_match($menu['active_pattern'], $ci->uri->uri_string())) echo 'am-in'?>" id="collapse-nav-<?=$menu_index?>">
							<? foreach($menu['level2_menus'] as $level2_menu) { ?>
							<li>
								<a href="<?=base_url() . $level2_menu['url']?>" <? if(preg_match($level2_menu['active_pattern'], $ci->uri->uri_string())) echo 'class="am-active"'; ?>><span class="<?=$level2_menu['icon']?>"> <?=$level2_menu['desc']?></span></a>
							</li>
							<? } ?>
						</ul>
				<? } ?>
			<? } ?>
		</ul>
		<!--sidebar在window版本上会出现右侧滚动条，加上此div后解决-->
		<div class="am-panel"></div>
	</div>
</div>
