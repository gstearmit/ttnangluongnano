<div class="block well" >
	<div class="navbar">
		<div class="navbar-inner">
			<h5><?php _e( "Re-order Images", gallery_bank ); ?></h5>
		</div>
	</div>
	<div class="body" style="margin:10px;">
		<a class="btn btn-inverse" href="admin.php?page=gallery_bank"><?php _e( "Back to Album Overview", gallery_bank ); ?></a>
		<?php
		$album_name = $wpdb->get_results
		(
			$wpdb->prepare
			(
				"SELECT * FROM ".gallery_bank_albums(),""
			)
		);
		?>
		<label class="control-label" style="margin:0px 0px 0px 20px;"><?php _e( "Select Album", gallery_bank ); ?> : </label>
				<select id="ux_album_name" name="ux_album_name" onchange = album_name(); style="width: 200px;">
						<option value="0"><?php _e("Select Album" , gallery_bank);?></option>
						<?php
						for($flag = 0;$flag < count($album_name); $flag++)
						{
						?>
						<option value="<?php echo $album_name[$flag]->album_id ;?>"><?php echo stripslashes(htmlspecialchars_decode($album_name[$flag]->album_name)) ;?></option>
						<?php
						}
						?>
					</select>
					<div class="separator-doubled"></div>
		<div id="albums_sorting_data">
		</div>
	</div>
</div>
<style>
	img:hover
	{
		cursor:move;
	}
</style>
<script type="text/javascript">
	function album_name()
	{
		var id = jQuery("#ux_album_name").val();
		
		jQuery.post(ajaxurl,"id="+id+"&param=album_sorting&action=image_sorting_library",function(data)
		{
			jQuery("#albums_sorting_data").html(data);
		});
	}
</script>