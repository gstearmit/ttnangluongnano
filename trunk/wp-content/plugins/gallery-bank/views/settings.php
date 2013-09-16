<?php
	$album_css = $wpdb -> get_row
	(
		$wpdb -> prepare
		(
			'SELECT * FROM ' . gallery_bank_settings() . " WHERE album_id = %d",
			0
		)
	);
	function rgb2hex($R, $G, $B) {
		$R = dechex($R);
		If (strlen($R) < 2)
			$R = '0' . $R;
		$G = dechex($G);
		If (strlen($G) < 2)
			$G = '0' . $G;
		$B = dechex($B);
		If (strlen($B) < 2)
			$B = '0' . $B;
		return '#' . $R . $G . $B;
	}
	$content = explode("/", $album_css -> setting_content);
	$image_settings = explode(";", $content[0]);
	$image_content = explode(":", $image_settings[0]);
	$image_width = explode(":", $image_settings[1]);
	$image_width_value = str_replace("px", "", $image_width[1]);
	$image_height = explode(":", $image_settings[2]);
	$image_height_value = str_replace("px", "", $image_height[1]);
	$images_in_row = explode(":", $image_settings[3]);
	$image_opacity = explode(":", $image_settings[4]);
	$image_border_size = explode(":", $image_settings[5]);
	$image_border_size_value = str_replace("px", "", $image_border_size[1]);
	$image_border_radius = explode(":", $image_settings[6]);
	$image_border_radius_value = str_replace("px", "", $image_border_radius[1]);
	$image_border_color = explode(":", $image_settings[7]);
	$image_border_color_substring = explode(",", str_replace("rgb(", "", substr($image_border_color[1], 0, -1)));	
	$image_border_color_value = rgb2hex($image_border_color_substring[0], $image_border_color_substring[1], $image_border_color_substring[2]);
	
	$cover_settings = explode(";", $content[1]);
	$cover_content = explode(":", $cover_settings[0]);
	$cover_width = explode(":", $cover_settings[1]);
	$cov_width = str_replace("px", "", $cover_width[1]);
	$cover_height = explode(":", $cover_settings[2]);
	$cov_height = str_replace("px", "", $cover_height[1]);
	$cover_opacity = explode(":", $cover_settings[3]);
	$cover_border_size = explode(":", $cover_settings[4]);
	$cov_border_size = str_replace("px", "", $cover_border_size[1]);
	$cover_border_radius = explode(":", $cover_settings[5]);
	$cov_border_radius = str_replace("px", "", $cover_border_radius[1]);
	$cover_border_color = explode(":", $cover_settings[6]);
	$cover_border_color_substring = explode(",", str_replace("rgb(", "", substr($cover_border_color[1], 0, -1)));	
	$cover_border_color_value = rgb2hex($cover_border_color_substring[0], $cover_border_color_substring[1], $cover_border_color_substring[2]);
	
	$lightbox_settings = explode(";", $content[2]);
	$overlay_opacity = explode(":", $lightbox_settings[0]);
	$overlay_border_size = explode(":", $lightbox_settings[1]);
	$overlay_border_size_value = str_replace("px", "", $overlay_border_size[1]);
	$overlay_border_radius = explode(":", $lightbox_settings[2]);
	$overlay_border_radius_value = str_replace("px", "", $overlay_border_radius[1]);
	$lightbox_text_color = explode(":", $lightbox_settings[3]);
	$lightbox_text_color_substring = explode(",", str_replace("rgb(", "", substr($lightbox_text_color[1], 0, -1)));	
	$lightbox_text_color_value = rgb2hex($lightbox_text_color_substring[0], $lightbox_text_color_substring[1], $lightbox_text_color_substring[2]);
	$overlay_border_color = explode(":", $lightbox_settings[4]);
	$overlay_border_color_substring = explode(",", str_replace("rgb(", "", substr($overlay_border_color[1], 0, -1)));	
	$overlay_border_color_value = rgb2hex($overlay_border_color_substring[0], $overlay_border_color_substring[1], $overlay_border_color_substring[2]);
	$lightbox_inline_bg_color = explode(":", $lightbox_settings[5]);
	$lightbox_bgcolor_inline_substring = explode(",", str_replace("rgb(", "", substr($lightbox_inline_bg_color[1], 0, -1)));	
	$lightbox_inline_bgcolor_value = rgb2hex($lightbox_bgcolor_inline_substring[0], $lightbox_bgcolor_inline_substring[1], $lightbox_bgcolor_inline_substring[2]);
	$lightbox_bg_color = explode(":", $lightbox_settings[6]);
	$overlay_bgcolor_color_substring = explode(",", str_replace("rgb(", "", substr($lightbox_bg_color[1], 0, -1)));	
	$overlay_bgcolor_value = rgb2hex($overlay_bgcolor_color_substring[0], $overlay_bgcolor_color_substring[1], $overlay_bgcolor_color_substring[2]);
	
	$slideshow_settings = explode(";", $content[3]);
	$auto_play = explode(":", $slideshow_settings[0]);
	$slide_interval = explode(":", $slideshow_settings[1]);
	
	$pagination_settings = explode(";", $content[4]);
	$pagination = explode(":", $pagination_settings[0]);
?>
<div class="block well" style="min-height:400px;">
	<div class="navbar">
		<div class="navbar-inner">
			<h5><?php _e( "Global Settings", gallery_bank ); ?></h5>
		</div>
	</div>
	<div class="body" style="margin:10px;">
		<form class="form-horizontal1" id="default_settings">
			<a class="btn btn-inverse" href="admin.php?page=gallery_bank"><?php _e( "Back to Album Overview", gallery_bank ); ?></a>
			<a class="btn btn-primary" style="cursor: pointer;margin-left: 20px;" onclick="restore_factory();"><?php _e( "Restore Settings", gallery_bank ); ?></a>
			<button type="submit" class="btn btn-primary" style="float:right">
				<?php _e( "Save and Submit Changes", gallery_bank ); ?>
			</button>
			<div class="separator-doubled"></div>
			<div class="message green" id="success_message" style="display: none;">
				<span>
					<strong><?php _e("Success! Settings have been saved.", gallery_bank); ?></strong>
				</span>
			</div>
			<div class="message green" id="success_message_resotre" style="display: none;">
				<span>
					<strong><?php _e("Success! Settings have been restored.", gallery_bank); ?></strong>
				</span>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="block well">
						
						<div class="navbar">
							<div class="handlediv" title="Click to toggle"></div>
							<div class="navbar-inner">
								
								<h5><?php _e( "Thumbnail Settings", gallery_bank ); ?></h5>
								 <div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#thumbnail_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse in" id="thumbnail_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Thumbnail Size", gallery_bank ); ?> : </label>
									<div class="controls on_off3">
										<div class="checkbox">
											<?php
											if($image_content[1] == 1)
											{
												?>
													<input type="radio" name="ux_thumbnail" value="1" checked="checked" onclick="check_thumbnail_settings();" /> <?php _e( "Original", gallery_bank ); ?> 
													<input type="radio" style="margin-left: 10px;" name="ux_thumbnail" value="0" onclick="check_thumbnail_settings();" /> <?php _e( "Custom", gallery_bank ); ?> 
												<?php
											}
											else
											{
												?>
													<input type="radio" name="ux_thumbnail" value="1" onclick="check_thumbnail_settings();" /> <?php _e( "Original", gallery_bank ); ?> 
													<input type="radio" style="margin-left: 10px;" name="ux_thumbnail" checked="checked"  value="0" onclick="check_thumbnail_settings();" /> <?php _e( "Custom", gallery_bank ); ?> 
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<div class="control-group" id="image_width">
									<label class="control-label"><?php _e( "Width", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_image_width" name="ux_image_width" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_width_value; ?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">px</span>
									</div>
								</div>
								<div class="control-group" id="image_height">
									<label class="control-label"><?php _e( "Height", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_image_height" name="ux_image_height" onkeypress="return OnlyNumbers(event)" class="span5" value="<?php echo $image_height_value; ?>">
										<span style="padding-top:3px;float:left;margin-left:2%">px</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Images in Row", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_image_in_row_val" onkeyup="set_text_value('image_in_row')" onblur="set_text_value('image_in_row1')" name="ux_image_in_row_val" onkeypress="return OnlyNumbers(event)" value="<?php echo $images_in_row[1]; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:2%">(1 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Opacity", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_image_opacity_val" onkeyup="set_text_value('thumb_opacity')" onblur="set_text_value('thumb_opacity')" name="ux_image_opacity_val" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_opacity[1] * 100; ?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">%</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_image_border_val" name="ux_image_border_val" onblur="set_text_value('thumb_border_size')" onkeyup="set_text_value('thumb_border_size')" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_border_size_value; ?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Radius", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_image_radius_val" name="ux_image_radius_val" onblur="set_text_value('thumb_border_radius')" onkeyup="set_text_value('thumb_border_radius')" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_border_radius_value; ?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span5" name="ux_border_color" id="ux_border_color" class="span6" value="<?php echo $image_border_color_value; ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Album Cover Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#cover_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse" id="cover_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Cover Size", gallery_bank ); ?> : </label>
									<div class="controls on_off3">
										<div class="checkbox">
										<?php
										if($cover_content[1] == 1)
										{
											?>
												<input type="radio" name="ux_cover_size" value="1" checked="checked" onclick="check_cover_settings();" /> <?php _e( "Original", gallery_bank ); ?> 
												<input type="radio" style="margin-left: 10px;" name="ux_cover_size" value="0" onclick="check_cover_settings();" /> <?php _e( "Custom", gallery_bank ); ?> 
											<?php
										}
										else
										{
											?>
												<input type="radio" name="ux_cover_size" value="1" onclick="check_cover_settings();" /> <?php _e( "Original", gallery_bank ); ?> 
												<input type="radio" style="margin-left: 10px;" name="ux_cover_size" checked="checked" value="0" onclick="check_cover_settings();" /> <?php _e( "Custom", gallery_bank ); ?> 
											<?php
										}
										?>
										</div>
									</div>
								</div>
								<div class="control-group" id="cover_width">
									<label class="control-label"><?php _e( "Width", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_cover_width" name="ux_cover_width" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_width;?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">px</span>
									</div>
								</div>
								<div class="control-group" id="cover_height">
									<label class="control-label"><?php _e( "Height", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_cover_height" name="ux_cover_height" onkeypress="return OnlyNumbers(event)" class="span5" value="<?php echo $cov_height;?>">
										<span style="padding-top:3px;float:left;margin-left:2%">px</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Opacity", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5"id="ux_cover_opacity_val" name="ux_cover_opacity_val" onblur="set_text_value('cover_opacity')" onkeyup="set_text_value('cover_opacity')" onkeypress="return OnlyNumbers(event)" value="<?php echo $cover_opacity[1] * 100 ;?>"/>
										<span style="padding-top:3px;float:left;margin-left:2%">%</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_cover_border_val" name="ux_cover_border_val" onblur="set_text_value('cover_border_size')" onkeyup="set_text_value('cover_border_size')" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_border_size;?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Radius", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_cover_radius_val" name="ux_cover_radius_val" onblur="set_text_value('cover_border_radius')" onkeyup="set_text_value('cover_border_radius')" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_border_radius;?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span5" name="ux_cover_border_color" id="ux_edit_border_color" value="<?php echo $cover_border_color_value; ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Lightbox Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#lightbox_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse" id="lightbox_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Opacity", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_lightbox_opacity_val" name="ux_lightbox_opacity_val" onblur="set_text_value('lightbox_opacity')" onkeyup="set_text_value('lightbox_opacity')"  onkeypress="return OnlyNumbers(event)" value="<?php echo $overlay_opacity[1] * 100;?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">%</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_lightbox_border_val" name="ux_lightbox_border_val" onblur="set_text_value('lightbox_border')" onkeyup="set_text_value('lightbox_border')" onkeypress="return OnlyNumbers(event)" value="<?php echo $overlay_border_size_value;?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Radius", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_lightbox_radius_val" name="ux_lightbox_radius_val" onblur="set_text_value('lightbox_radius')" onkeyup="set_text_value('lightbox_radius')"  onkeypress="return OnlyNumbers(event)"value="<?php echo $overlay_border_radius_value; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:2%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Text Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span5" name="ux_lightbox_text_color" id="ux_lightbox_text_color" class="span6" value="<?php echo $lightbox_text_color_value;?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span5" name="ux_overlay_border_color" id="ux_overlay_border_color" class="span6" value="<?php echo $overlay_border_color_value;?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Inline Background", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span5" class="span6" name="ux_inline_overlay_color" id="ux_inline_overlay_color" value="<?php echo $lightbox_inline_bgcolor_value; ?>"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Overlay Background", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span5" name="ux_overlay_bg_color" id="ux_overlay_bg_color" class="span6" value="<?php echo $overlay_bgcolor_value; ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Slide Show Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#slideshow_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse" id="slideshow_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Auto Play", gallery_bank ); ?> : </label>
									<div class="controls on_off4">
										<div class="checkbox">
											<?php
											if($auto_play[1] == 1)
											{
												?>
												<input type="radio" name="ux_slideshow" value="1" checked="checked" /> <?php _e( "Enable", gallery_bank ); ?>
												<input type="radio" style="margin-left: 10px;" name="ux_slideshow" value="0" /> <?php _e( "Disable", gallery_bank ); ?> 
												<?php
											}
											else 
											{
												?>
												<input type="radio" name="ux_slideshow" value="1"  /> <?php _e( "Enable", gallery_bank ); ?> 
												<input type="radio" style="margin-left: 10px;" name="ux_slideshow" checked="checked" value="0" /> <?php _e( "Disable", gallery_bank ); ?> 
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Interval", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span5" id="ux_slide_val" name="ux_slide_val" onblur="set_text_value('slide')" onkeyup="set_text_value('slide')" onkeypress="return OnlyNumbers(event)" value="<?php echo $slide_interval[1]; ?>" />
										<span style="padding-top:3px;float:left;margin-left:2%">(0 - 15)</span>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Pagination Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#pagination_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse" id="pagination_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Paging", gallery_bank ); ?> : </label>
									<div class="controls on_off4">
										<div class="checkbox">
											<?php
											if($pagination[1] == 1)
											{
												?>
												<input type="radio" name="ux_paging" value="1" checked="checked" /> <?php _e( "Enable", gallery_bank ); ?> 
												<input type="radio" style="margin-left: 10px;" name="ux_paging" value="0" /> <?php _e( "Disable", gallery_bank ); ?> 
												<?php
											}
											else
											{
												?>
												<input type="radio" name="ux_paging" value="1" /> <?php _e( "Enable", gallery_bank ); ?> 
												<input type="radio" style="margin-left: 10px;" name="ux_paging" value="0" checked="checked" /> <?php _e( "Disable", gallery_bank ); ?> 
												<?php
											}
											?>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function() 
	{
		check_thumbnail_settings();
		check_cover_settings();
		
	});
	
	jQuery("#default_settings").validate
	({
		rules:
		{
			ux_image_width:
			{
				required: true,
				digits: true
			},
			ux_image_height:
			{
				required: true,
				digits: true
			},
			ux_cover_width:
			{
				required: true,
				digits: true
			},
			ux_cover_height:
			{
				required: true,
				digits: true
			}
		},
		submitHandler: function(form)
		{
			jQuery.post(ajaxurl, jQuery(form).serialize() + "&param=update_global_settings&action=settings_gallery_library", function(data)
			{
				jQuery('#success_message').css('display','block');
				setTimeout(function()
				{
					jQuery('#success_message').css('display','none');
					window.location.href = "admin.php?page=settings";
				}, 2000);
			});
		}
	});
	function check_thumbnail_settings()
	{
		var thumb_setting = jQuery("input:radio[name=ux_thumbnail]:checked").val();
		if(thumb_setting == 0)
		{
			jQuery('#image_width').css('display','block');
			jQuery('#image_height').css('display','block');
		}
		else
		{
			jQuery('#image_width').css('display','none');
			jQuery('#image_height').css('display','none');
		}
	}
	function check_cover_settings()
	{
		var cover_setting = jQuery("input:radio[name=ux_cover_size]:checked").val();
		if(cover_setting == 0)
		{
			jQuery('#cover_width').css('display','block');
			jQuery('#cover_height').css('display','block');
		}
		else
		{
			jQuery('#cover_width').css('display','none');
			jQuery('#cover_height').css('display','none');
		}
	}
	function OnlyNumbers(evt) 
	{
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if ((charCode > 47 && charCode < 58) || charCode == 127 || charCode == 8) 
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	jQuery(document).ready(function(){
		
			jQuery.fn.mColorPicker.defaults = {
			currentId: false,
			currentInput: false,
			currentColor: false,
			changeColor: false,
			color: false,
			imageFolder: '<?php echo GALLERY_BK_PLUGIN_URL; ?>/assets/js/colorpicker/images/'
		};
	});
	function set_text_value(text_type)
	{
		if(text_type == "image_in_row")
		{
			var val =jQuery("#ux_image_in_row_val").val();
			if(val > 20)
			{
				jQuery("#ux_image_in_row_val").val(20);
			}
			
		}
		if(text_type == "image_in_row1")
		{
			var val =jQuery("#ux_image_in_row_val").val();
			if(val > 20)
			{
				jQuery("#ux_image_in_row_val").val(20);
			}
			else if(val < 1)
			{
				jQuery("#ux_image_in_row_val").val(1);
			}
		}
		if(text_type == "thumb_opacity")
		{
			var val =jQuery("#ux_image_opacity_val").val();
			if(val > 100)
			{
				jQuery("#ux_image_opacity_val").val(100);
			}
			else if(val > 0)
			{
				jQuery("#ux_image_opacity_val").val(jQuery("#ux_image_opacity_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_image_opacity_val").val(0);
			}
			
		}
		if(text_type == "thumb_border_size")
		{
			var val =jQuery("#ux_image_border_val").val();
			if(val > 20)
			{
				jQuery("#ux_image_border_val").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_image_border_val").val(jQuery("#ux_image_border_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_image_border_val").val(0);
			}
			
		}
		if(text_type == "thumb_border_radius")
		{
			var val =jQuery("#ux_image_radius_val").val();
			if(val > 20)
			{
				jQuery("#ux_image_radius_val").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_image_radius_val").val(jQuery("#ux_image_radius_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_image_radius_val").val(0);
			}
			
		}
		if(text_type == "cover_opacity")
		{
			var val =jQuery("#ux_cover_opacity_val").val();
			if(val > 100)
			{
				jQuery("#ux_cover_opacity_val").val(100);
			}
			else if(val > 0)
			{
				jQuery("#ux_cover_opacity_val").val(jQuery("#ux_cover_opacity_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_cover_opacity_val").val(0);
			}
			
		}
		if(text_type == "cover_border_size")
		{
			var val =jQuery("#ux_cover_border_val").val();
			if(val > 20)
			{
				jQuery("#ux_cover_border_val").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_cover_border_val").val(jQuery("#ux_cover_border_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_cover_border_val").val(0);
			}
			
		}
		if(text_type == "cover_border_radius")
		{
			var val =jQuery("#ux_cover_radius_val").val();
			if(val > 20)
			{
				jQuery("#ux_cover_radius_val").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_cover_radius_val").val(jQuery("#ux_cover_radius_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_cover_radius_val").val(0);
			}
			
		}
		if(text_type == "lightbox_opacity")
		{
			var val =jQuery("#ux_lightbox_opacity_val").val();
			if(val > 100)
			{
				jQuery("#ux_lightbox_opacity_val").val(100);
			}
			else if(val > 0)
			{
				jQuery("#ux_lightbox_opacity_val").val(jQuery("#ux_lightbox_opacity_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_lightbox_opacity_val").val(0);
			}
		}
		if(text_type == "lightbox_border")
		{
			var val =jQuery("#ux_lightbox_border_val").val();
			if(val > 20)
			{
				jQuery("#ux_lightbox_border_val").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_lightbox_border_val").val(jQuery("#ux_lightbox_border_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_lightbox_border_val").val(0);
			}
		}
		if(text_type == "lightbox_radius")
		{
			var val =jQuery("#ux_lightbox_radius_val").val();
			if(val > 20)
			{
				jQuery("#ux_lightbox_radius_val").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_lightbox_radius_val").val(jQuery("#ux_lightbox_radius_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_lightbox_radius_val").val(0);
			}
		}
		if(text_type == "slide")
		{
			var val =jQuery("#ux_slide_val").val();
			if(val > 15)
			{
				jQuery("#ux_slide_val").val(15);
			}
			else if(val > 0)
			{
				jQuery("#ux_slide_val").val(jQuery("#ux_slide_val").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_slide_val").val(0);
			}
			
		}

	}
	
	function restore_factory()
	{
		bootbox.confirm("<?php _e("Are you sure you want to restore settings ?", gallery_bank ); ?>", function(confirmed) 
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
				jQuery.post(ajaxurl, "param=restore_settings&action=settings_gallery_library", function(data)
				{
					jQuery('#success_message_resotre').css('display','block');
					setTimeout(function()
					{
						jQuery('#success_message_resotre').css('display','none');
						window.location.href = "admin.php?page=settings";
					}, 2000);
				});
				
			}
		});
	}
</script>