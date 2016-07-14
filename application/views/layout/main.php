<? defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('include/_header'); ?>
<? $this->load->view("include/sidebar/{$layout['sidebar_file']}");?>

<div class="admin-content">
	<div class="am-cf am-padding">
	    <div class="am-fl am-cf">
			<span class="am-icon-home am-icon-sm" id=""><font id="breadcrumb_menu"></font></span>
		</div>
	 </div>
	 <?=$content?>
</div>

<? $this->load->view('include/_footer');?>