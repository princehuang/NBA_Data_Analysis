<? defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	</div>
	
	<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
	
	<script type="text/javascript">
		var menu_level2 = $(".admin-sidebar-list .am-active").text();
		var menu_level1 = $(".admin-sidebar-list .am-active").parents(".admin-parent").children(".am-cf").text();
		
		var breadcrumb_menu = " > " + menu_level2;
		
		if(menu_level1 !== "") {
			breadcrumb_menu = " > " + menu_level1 + breadcrumb_menu;
		}
		
		$("#breadcrumb_menu").text(breadcrumb_menu);
	</script>
</body>
</html>