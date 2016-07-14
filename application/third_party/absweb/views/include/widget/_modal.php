<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
	<form action="<?=site_url($modal_url)?>" method="post" class="am-form">
		<div class="am-modal-dialog">
			<div class="am-modal-hd"><?=$modal_title?>
				<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
			</div>
			<div class="am-g">
				<?=$modal_body?>
			</div>
			<div class="am-modal-bd">
				<button type="button" class="am-btn am-btn-default" data-am-modal-close>关闭</button>
				<button type="submit" class="am-btn am-btn-primary">提交</button>
			</div>
		</div>
		
	</form>
</div>