<?php
	$album_css = $wpdb -> get_row
	(
		$wpdb -> prepare
		(
			'SELECT * FROM ' . gallery_bank_settings() . " WHERE album_id = %d",
			0
		)
	);
	function rgb2hex($R, $G, $B){
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
			<h5><?php _e( "Add New Album", gallery_bank ); ?></h5>
		</div>
	</div>
	<div class="body" style="margin:10px;">
		<form class="form-horizontal" id="add_new_album">
			<a class="btn btn-inverse" href="admin.php?page=gallery_bank"><?php _e( "Back to Album Overview", gallery_bank ); ?></a>
			<button type="submit" class="btn btn-primary" style="float:right">
				<?php _e( "Publish Album", gallery_bank ); ?>
			</button>
			<div class="separator-doubled"></div>
			<div class="message green" id="message" style="display: none;">
				<span>
					<strong><?php _e("Album published.Kindly wait for the redirect.", gallery_bank); ?></strong>
				</span>
			</div>
			<div class="row-fluid">
				<div class="span8">
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Album Details", gallery_bank ); ?></h5>
							</div>
						</div>
						<div class="body">
							<div class="control-group">
								<div class="cntrl">
									<input type="text" name="title" class="span12" value="" id="title" placeholder="<?php _e( "Enter your Album title here", gallery_bank);?>" />
								</div>
							</div>
							<div class="control-group">
							<?php 
								wp_editor("", $id = 'ux_description', $prev_id = 'title', $media_buttons = true, $tab_index = 1);
							?>
							</div>
						</div>
					</div>
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Upload Images", gallery_bank ); ?></h5>
							</div>
						</div>
						<div class="body">
							<div class="control-group">
								<a class="btn btn-info" id="upload_image_button" href=""><?php _e( "Upload Images to your Album ", gallery_bank ); ?></a>
							</div>
							<div class="control-group">
								<input type="checkbox" id="delete_selected" name="delete_selected" style="cursor: pointer;"/>
								<a class="btn btn-danger" onclick="delete_selected_images();" style="margin-left: 20px; cursor: pointer;">
									<?php _e( "Delete ", gallery_bank ); ?>
								</a>
							</div>
							<table class="table table-striped" id="add-album-data-table">
							</table>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e("Album Cover", gallery_bank); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#album_cover">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse in" id="album_cover">
							<div class="body">
								<div class="control-group">
									<img id="albumCoverImage" src="<?php echo GALLERY_BK_PLUGIN_URL .'/album-cover.png';?>"/>
								</div>
								<div class="control-group">
									<a class="btn btn-info" id="upload_cover_image_button" href=""><?php _e( "Set Cover Image ", gallery_bank ); ?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Short Codes For Page/Post", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#short_code">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse in " id="short_code">
							<div class="body">
								<div class="control-group">
									<label class="control-label" style="padding-top:3px !important"><?php _e( "All Albums", gallery_bank ); ?> : </label>
									<span class="label label-info">[gallery_bank_all_albums]</span>
								</div>
								<div class="control-group">
									<label class="control-label" style="padding-top:3px !important"><?php _e( "Single Album", gallery_bank ); ?> : </label>
									<span class="label label-info">[gallery_bank_album album_id=1]</span>
								</div>
								<div class="control-group">
									<label class="control-label" style="padding-top:3px !important"><?php _e( "Album with Cover", gallery_bank ); ?> : </label>
									<span class="label label-info">[gallery_bank_album_cover  album_id=1]</span>
								</div>
							</div>
						</div>
					</div>
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Album Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#album_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse in" id="album_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Settings", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="radio" id="GlobalSettings" checked="checked" name="DefaultSettings" onchange="checkDefaultSettings();" value="1" />
										<label style="margin-left: 3px;">
											<?php _e( "Global", gallery_bank );?>
										</label>
										<input type="radio" id="IndividualSettings" name="DefaultSettings" onchange="checkDefaultSettings();" value="0" style="margin-left: 10px;" />
										<label style="margin-left: 3px;">
											<?php _e( "Individual", gallery_bank );?>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="block well individual-settings">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Thumbnails Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#thumbnail_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse" id="thumbnail_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Thumbnail Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<?php
										if($image_content[1] == 1)
										{
											?>
											<input type="radio" id="ux_original_size" checked="checked" name="ux_image_size" onchange="checkThumbnailSettings()" value="1"/>
											<label style="margin-left: 3px;">
												<?php _e( "Original", gallery_bank );?>
											</label>
											<input type="radio" id="ux_custom_size" name="ux_image_size" onchange="checkThumbnailSettings()" value="0" style="margin-left: 10px;" />
											<label style="margin-left: 3px;">
												<?php _e( "Custom", gallery_bank );?>
											</label>
											<?php
										}
										else
										{
											?>
											<input type="radio" id="ux_original_size" name="ux_image_size" onchange="checkThumbnailSettings()" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Original", gallery_bank );?>
											</label>
											<input type="radio" id="ux_custom_size" checked="checked" name="ux_image_size" onchange="checkThumbnailSettings()" value="0" style="margin-left: 10px;" />
											<label style="margin-left: 3px;">
												<?php _e( "Custom", gallery_bank );?>
											</label>
											<?php
										}
										?>
									</div>
								</div>
								<div class="control-group" id="image_thumbnail_width">
									<label class="control-label"><?php _e( "Width", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_image_width" name="ux_image_width" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_width_value; ?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">px</span>
									</div>
								</div>
								<div class="control-group" id="image_thumbnail_height">
									<label class="control-label"><?php _e( "Height", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_image_height" name="ux_image_height" class="span9" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_height_value; ?>">
										<span style="padding-top:3px;float:left;margin-left:3%">px</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Images in Row", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_row_size" name="ux_hdn_row_size" onblur="set_text_value('image_in_row1')" onkeyup="set_text_value('image_in_row')" onkeypress="return OnlyNumbers(event)" value="<?php echo $images_in_row[1]; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(1 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Opacity", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_image_opacity" name="ux_hdn_image_opacity" onkeyup="set_text_value('image_opacity')" onblur="set_text_value('image_opacity')" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_opacity[1] * 100; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">%</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_image_border" name="ux_hdn_image_border" onblur="set_text_value('image_border_size')" onkeyup="set_text_value('image_border_size')" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_border_size_value; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Radius", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_image_radius" name="ux_hdn_image_radius" onblur="set_text_value('image_border_radius')" onkeyup="set_text_value('image_border_radius')" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_border_radius_value; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span9" name="border_color" id="border_color" value="<?php echo $image_border_color_value; ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="block well individual-settings">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Album Cover Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#album_cover_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse" id="album_cover_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Cover Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<?php
										if($cover_content[1] == 1)
										{
											?>
											<input type="radio" id="ux_original_cover_size" checked="checked" name="ux_cover_size" onchange="checkCoverSettings()" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Original", gallery_bank );?>
											</label>
											<input type="radio" id="ux_custom_cover_size" name="ux_cover_size" onchange="checkCoverSettings()" value="0" style="margin-left: 10px;" />
											<label style="margin-left: 3px;">
												<?php _e( "Custom", gallery_bank );?>
											</label>
											<?php
										}
										else
										{
											?>
											<input type="radio" id="ux_original_cover_size" name="ux_cover_size" onchange="checkCoverSettings()" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Original", gallery_bank );?>
											</label>
											<input type="radio" id="ux_custom_cover_size" checked="checked" name="ux_cover_size" onchange="checkCoverSettings()" value="0" style="margin-left: 10px;" />
											<label style="margin-left: 3px;">
												<?php _e( "Custom", gallery_bank );?>
											</label>
											<?php
										}
										?>
									</div>
								</div>
								<div class="control-group" id="image_cover_width">
									<label class="control-label"><?php _e( "Width", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_cover_width" name="ux_cover_width" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_width;?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">px</span>
									</div>
								</div>
								<div class="control-group" id="image_cover_height">
									<label class="control-label"><?php _e( "Height", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_cover_height" name="ux_cover_height" class="span9" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_height;?>">
										<span style="padding-top:3px;float:left;margin-left:3%">px</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Opacity", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_cover_opacity" name="ux_hdn_cover_opacity" onblur="set_text_value('cover_opacity')" onkeyup="set_text_value('cover_opacity')" onkeypress="return OnlyNumbers(event)" value="<?php echo $cover_opacity[1] * 100;?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">%</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_cover_border" name="ux_hdn_cover_border" onblur="set_text_value('cover_border_size')" onkeyup="set_text_value('cover_border_size')" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_border_size;?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Radius", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_cover_radius" name="ux_hdn_cover_radius" onblur="set_text_value('cover_border_radius')" onkeyup="set_text_value('cover_border_radius')" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_border_radius;?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span9" name="cover_border_color" id="cover_border_color" value="<?php echo $cover_border_color_value; ?>"  />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="block well individual-settings">
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
										<input type="text" class="span9" id="ux_hdn_lightbox_opacity" name="ux_hdn_lightbox_opacity" onblur="set_text_value('lightbox_opacity')" onkeyup="set_text_value('lightbox_opacity')" onkeypress="return OnlyNumbers(event)" value="<?php echo $overlay_opacity[1] * 100;?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">%</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_lightbox_border" name="ux_hdn_lightbox_border" onblur="set_text_value('lightbox_border')" onkeyup="set_text_value('lightbox_border')" onkeypress="return OnlyNumbers(event)" value="<?php echo $overlay_border_size_value;?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
								<label class="control-label"><?php _e( "Border Radius", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_lightbox_radius" name="ux_hdn_lightbox_radius" onblur="set_text_value('lightbox_radius')" onkeyup="set_text_value('lightbox_radius')" onkeypress="return OnlyNumbers(event)" value="<?php echo $overlay_border_radius_value; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(0 - 20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Text Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span9" name="lightbox_text_color" id="lightbox_text_color" value="<?php echo $lightbox_text_color_value;?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span9" name="overlay_border_color" id="overlay_border_color" value="<?php echo $overlay_border_color_value;?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Inline Background", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span9" name="inline_bg_color" id="inline_bg_color"  value="<?php echo $lightbox_inline_bgcolor_value; ?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Overlay Background", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" class="span9" name="overlay_background_color" id="overlay_background_color" value="<?php echo $overlay_bgcolor_value; ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="block well individual-settings" style="display: none;">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Slide Show Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#slide_show_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse" id="slide_show_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Auto Play", gallery_bank ); ?> : </label>
									<div class="controls">
										<?php
										if($auto_play[1] == 1)
										{
											?>
											<input type="radio" id="ux_enable_autoplay" checked="checked" name="ux_autoplay" onchange="slideShowSettings()" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Enable", gallery_bank );?>
											</label>
											<input type="radio" id="ux_disable_autoplay" name="ux_autoplay" onchange="slideShowSettings()" value="0" style="margin-left: 10px;" />
											<label style="margin-left: 3px;">
												<?php _e( "Disable", gallery_bank );?>
											</label>
										<?php
										}
										else 
										{
											?>
											<input type="radio" id="ux_enable_autoplay" name="ux_autoplay" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Enable", gallery_bank );?>
											</label>
											<input type="radio" id="ux_disable_autoplay" checked="checked" name="ux_autoplay" value="0" style="margin-left: 10px;" />
											<label style="margin-left: 3px;">
												<?php _e( "Disable", gallery_bank );?>
											</label>
											<?php
										}
										?>
									</div>
								</div>
								<div class="control-group" id="slideShowInterval" >
									<label class="control-label"><?php _e( "Interval", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_hdn_slide_interval" name="ux_hdn_slide_interval" onblur="set_text_value('slide')" onkeyup="set_text_value('slide')" onkeypress="return OnlyNumbers(event)" value="<?php echo $slide_interval[1]; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(0 - 15)</span>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="block well individual-settings">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Pagination Settings", gallery_bank );  ?></h5>
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
									<div class="controls">
										<?php
										if($pagination[1] == 1)
										{
											?>
											<input type="radio" id="ux_enable_paging" checked="checked" name="ux_paging" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Enable", gallery_bank );?>
											</label>
											<input type="radio" id="ux_disable_paging" name="ux_paging" value="0" style="margin-left: 10px;" />
											<label style="margin-left: 3px;">
												<?php _e( "Disable", gallery_bank );?>
											</label>
											
										<?php
										}
										else
										{
											?>
											<input type="radio" id="ux_enable_paging" name="ux_paging" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Enable", gallery_bank );?>
											</label>
											<input type="radio" id="ux_disable_paging" checked="checked" name="ux_paging" value="0" style="margin-left: 10px;" />
											<label style="margin-left: 3px;">
												<?php _e( "Disable", gallery_bank );?>
											</label>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</dvi>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	var arr =[];
	var ar = [];
	var thumb_array = [];
	var cover_array;
	jQuery(document).ready(function() 
	{
		checkCoverSettings();
		checkThumbnailSettings();
		jQuery(".individual-settings").attr("style","display:none");
		jQuery(".image_thumbnail").attr("style","display:none");
		jQuery(".image_cover").attr("style","display:none");
		oTable = jQuery('#add-album-data-table').dataTable
		({
			"bJQueryUI": false,
			"bAutoWidth": true,
			"sPaginationType": "full_numbers",
			"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
			"oLanguage": 
			{
				"sLengthMenu": "_MENU_"
			},
			"aaSorting": [[ 0, "asc" ]],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [0] },{ "bSortable": false, "aTargets": [0] }]
		});
		
		jQuery.fn.mColorPicker.defaults = {
			currentId: false,
			currentInput: false,
			currentColor: false,
			changeColor: false,
			color: false,
			imageFolder: '<?php echo GALLERY_BK_PLUGIN_URL; ?>/assets/js/colorpicker/images/'
			
		};
		
	});
	function checkDefaultSettings()
	{
		var ux_settings = jQuery('input:radio[name=DefaultSettings]:checked').val();
		if(ux_settings == 0)
		{
			jQuery(".individual-settings").attr("style","display:block");
		}
		else
		{
			jQuery(".individual-settings").attr("style","display:none");
		}
	}
	function checkThumbnailSettings()
	{
		var thumb_setting = jQuery('input:radio[name=ux_image_size]:checked').val();
		if(thumb_setting == 0)
		{
			jQuery('#image_thumbnail_width').css('display','block');
			jQuery('#image_thumbnail_height').css('display','block');
		}
		else
		{
			jQuery('#image_thumbnail_width').css('display','none');
			jQuery('#image_thumbnail_height').css('display','none');
		}
	}
	function checkCoverSettings()
	{
		var cover_setting = jQuery('input:radio[name=ux_cover_size]:checked').val();
		if(cover_setting == 0)
		{
			jQuery('#image_cover_width').css('display','block');
			jQuery('#image_cover_height').css('display','block');
		}
		else
		{
			jQuery('#image_cover_width').css('display','none');
			jQuery('#image_cover_height').css('display','none');
		}
	}
	var cover_file_frame;  
	jQuery('#upload_cover_image_button').live('click', function( event ){
		event.preventDefault();
		cover_file_frame = wp.media.frames.cover_file_frame = wp.media({
			title: jQuery( this ).data( 'uploader_title' ),
			button: {
				text: jQuery( this ).data( 'uploader_button_text' ),
			},
			multiple: false
		});
		cover_file_frame.on( 'select', function() {
			var selection = cover_file_frame.state().get('selection');
			selection.map( function( attachment ) {
				attachment = attachment.toJSON();
				jQuery("#albumCoverImage").attr('src', attachment.url);
				jQuery("#albumCoverImage").attr('width','250px');
				
				cover_array = attachment.url;
			});
		});
		cover_file_frame.open();
	});
	var count_images = 0;
	var file_frame;
	jQuery('#upload_image_button').live('click', function( event ){
		event.preventDefault();
		file_frame = wp.media.frames.file_frame = wp.media({
			title: jQuery( this ).data( 'uploader_title' ),
			button: {
				text: jQuery( this ).data( 'uploader_button_text' ),
			},
			multiple: true
		});
		file_frame.on( 'select', function() {
			var selection = file_frame.state().get('selection');
			selection.map( function( attachment ) {
				if(count_images < 10)
				{
					attachment = attachment.toJSON();
					var dynamicId = Math.floor((Math.random() * 1000)+1);
					thumb_array.push(attachment.url);
					arr.push(attachment.url);
					ar.push(dynamicId);
					var tr = jQuery("<tr></tr>");
					var td = jQuery("<td></td>");
					var main_div = jQuery("<div class=\"block\" id=\""+dynamicId+"\" >");
					var div = jQuery("<div class=\"block\" style=\"padding:6px 6px 0 0; width:2%; float:left\">");
					var checkbox = jQuery("<input type=\"checkbox\" value=\""+dynamicId+"\" style=\"cursor: pointer;\"/>");
					div.append(checkbox);
					div.append("</div>");
					td.append(div);
					var block = jQuery("<div class=\"block\" style=\"width:30%;float:left\">");
					var img = jQuery("<img class=\"imgHolder\" style=\"border:2px solid #e5e5e5;margin-top:10px;cursor: pointer;\" id=\"up_img\"/>");
					img.attr('src', attachment.url);
					img.attr('width', '150px');
					block.append(img);
					var del = jQuery("<br/><a class=\"imgHolder orange\" style=\"margin-left: 20px;cursor: pointer;\" id=\"del_img\" onclick=\"delete_pic("+dynamicId+")\"><img style=\"cursor: pointer;vertical-align:middle;\" src=\"<?php echo GALLERY_BK_PLUGIN_URL.'/assets/images/icons/color-16/cross.png'?>\">&nbsp; <span  style=\"cursor: pointer;vertical-align:middle;\"><?php _e("Remove Image",gallery_bank);?></span></a>");
					block.append(del);
					block.append("</div>");
					td.append(block);
					var block1 = jQuery("<div class=\"block\" style=\"width:66%;float:left\">");
					var box = jQuery("<div class=\"control-group\"><input type=\"text\" style=\"width=150%\" class=\"span12\" id=\"title_img_"+dynamicId+"\" placeholder=\"<?php _e( "Enter your Image Title", gallery_bank);?>\" /></div>");
					block1.append(box);
					var text = jQuery("<div class=\"control-group\"><textarea id=\"des_img_"+dynamicId+"\" rows=\"5\" placeholder=\"<?php _e( "Enter your Image Description", gallery_bank);?>\" style=\"width=150%\" class=\"span12\"></textarea></div>"); 
					block1.append(text);
					var url_check = jQuery("<div class=\"control-group\"><input type=\"checkbox\" id=\"url_check_"+dynamicId+"\" value=\"1\" style=\"cursor: pointer; margin-top:0px;\" onclick=\"chk_url_req("+dynamicId+")\"/>&nbsp;<span><?php _e( "Url to Redirect on click of an Image", gallery_bank );?></span></div>");
					block1.append(url_check);
					var url = jQuery("<div class=\"control-group\" id=\"url_div_"+dynamicId+"\" style=\"display:none;\"><input type=\"text\" style=\"width=100%\" class=\"span12\" id=\"url_"+dynamicId+"\" value=\"http://\" /></div>");
					block1.append(url);
					block1.append("</div>");
					main_div.append(div);
					main_div.append(block);
					main_div.append(block1);
					main_div.append("</div>");
					td.append(main_div);
					tr.append(td);
					oTable = jQuery('#add-album-data-table').dataTable();
					oTable.fnAddData([tr.html()]);
					count_images++;
				}
				
			});
		});
		file_frame.open();
	});
	function delete_pic(dynamicId)
	{
		bootbox.confirm("<?php _e( "Are you sure you want to delete this Image?", gallery_bank ); ?>", function(confirmed)
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
				jQuery("#" + dynamicId).remove();
				if(ar.indexOf(dynamicId) > -1) {
					var index = ar.indexOf(dynamicId);
					arr.splice(index, 1);
					ar.splice(index, 1);
					thumb_array.splice(index, 1);
					oTable = jQuery('#add-album-data-table').dataTable();
					oTable.fnDeleteRow(index);
					count_images--;
				}
			}
		});
	}
	function chk_url_req(dynamicId)
	{
		var url_checkbox=jQuery("#url_check_"+dynamicId).prop("checked");
		if(url_checkbox == true)
		{
			jQuery("#url_div_"+dynamicId).css('display','block');
		}
		else
		{
			jQuery("#url_div_"+dynamicId).css('display','none');
		}
	}
	jQuery("#add_new_album").validate
	({
		rules: 
		{
			title: "required",
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
				required : true,
				digits: true
			},
			ux_cover_height:
			{
				required : true,
				digits: true
			},
		},
		submitHandler: function(form)
		{
			if (jQuery("#wp-ux_description-wrap").hasClass("tmce-active"))
			{
				var uxDescription  = encodeURIComponent(tinyMCE.get('ux_description').getContent());
			}
			else
			{
				var uxDescription  = encodeURIComponent(jQuery('#ux_description').val());
			}
			var album_name = encodeURIComponent(jQuery('#title').val());
			jQuery.post(ajaxurl, jQuery(form).serialize() +"&album_name="+album_name+"&ux_description="+uxDescription+"&cover_array="+cover_array+"&param=add_new_album&action=album_gallery_library", function(data)
			{
				var album_id= jQuery.trim(data);
				var pic;
				var count = 0;
				if(arr.length > 0)
				{
					
						for(pic = 0; pic < arr.length; pic++ )
						{
							var path = arr[pic];
							var thumb = thumb_array[pic];
							var title = "";
							if(encodeURIComponent(jQuery("#title_img_" + ar[pic]).val()) != "undefined")
							{
								title = encodeURIComponent(jQuery("#title_img_" + ar[pic]).val());
							}
							var url_path = "";
							if(encodeURIComponent(jQuery("#url_" + ar[pic]).val()) != "undefined")
							{
								url_path = encodeURIComponent(jQuery("#url_" + ar[pic]).val());
							}
							var detail="";
							if(encodeURIComponent(jQuery("#des_img_" + ar[pic]).val()) != "undefined")
							{
								detail = encodeURIComponent(jQuery("#des_img_" + ar[pic]).val());
							}
							var checkbox_url = jQuery("#url_check_" +ar[pic]).prop("checked");
							jQuery.post(ajaxurl, "album_id="+album_id+"&title="+title+"&url_path="+url_path+"&detail="+detail+"&path="+path+"&thumb="+thumb+"&checkbox_url="+checkbox_url+"&param=add_pic&action=album_gallery_library", function(data)
							{
								jQuery('#message').css('display','block');
								count++;
								if(count == arr.length)
								{
									setTimeout(function()
									{
										jQuery('#message').css('display','none');
										window.location.href = "admin.php?page=gallery_bank";
									}, 2000);
								}
								
							});
							
						}
					
				}
				else
				{
					jQuery('#message').css('display','block');
					setTimeout(function()
					{
						jQuery('#message').css('display','none');
						window.location.href = "admin.php?page=gallery_bank";
					}, 2000);
				}
			});
		}
	});
	jQuery(function()
	{
		jQuery('#delete_selected').click(function(){
			var oTable = jQuery("#add-album-data-table").dataTable();
			var  checkProp = jQuery("#delete_selected").prop("checked");
			jQuery("input:checkbox", oTable.fnGetNodes()).each(function(){
				if(checkProp)
				{
					jQuery(this).attr('checked', 'checked');	
				}
				else
				{
					jQuery(this).removeAttr('checked');
				}
			});
		});
	});
	function delete_selected_images()
	{
		bootbox.confirm("<?php _e( "Are you sure you want to delete these Images?", gallery_bank ); ?>", function(confirmed)
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
				var oTable = jQuery("#add-album-data-table").dataTable();
				jQuery("input:checkbox:checked", oTable.fnGetNodes()).each(function(){
				var dynamicId = parseInt(this.checked? jQuery(this).val():"");
				jQuery("#" + dynamicId).remove();
					if(ar.indexOf(dynamicId) > -1){
						var index = ar.indexOf(dynamicId);
						arr.splice(index, 1);
						ar.splice(index, 1);
						thumb_array.splice(index, 1);
						oTable.fnDeleteRow(index);
						jQuery('#delete_selected').removeAttr('checked');
						count_images--;
					}
				});
			}
		});
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
	function set_text_value(text_type)
	{
		if(text_type == "image_in_row")
		{
			var val =jQuery("#ux_hdn_row_size").val();
			if(val > 20)
			{
				jQuery("#ux_hdn_row_size").val(20);
			}
			
		}
		if(text_type == "image_in_row1")
		{
			var val =jQuery("#ux_hdn_row_size").val();
			if(val > 20)
			{
				jQuery("#ux_hdn_row_size").val(20);
			}
			else if(val < 1)
			{
				jQuery("#ux_hdn_row_size").val(1);
			}
		}
		if(text_type == "image_opacity")
		{
			var val =jQuery("#ux_hdn_image_opacity").val();
			if(val > 100)
			{
				jQuery("#ux_hdn_image_opacity").val(100);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_image_opacity").val(jQuery("#ux_hdn_image_opacity").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_image_opacity").val(0);
			}
			
		}
		if(text_type == "image_border_size")
		{
			var val =jQuery("#ux_hdn_image_border").val();
			if(val > 20)
			{
				jQuery("#ux_hdn_image_border").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_image_border").val(jQuery("#ux_hdn_image_border").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_image_border").val(0);
			}
			
		}
		if(text_type == "image_border_radius")
		{
			var val =jQuery("#ux_hdn_image_radius").val();
			if(val > 20)
			{
				jQuery("#ux_hdn_image_radius").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_image_radius").val(jQuery("#ux_hdn_image_radius").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_image_radius").val(0);
			}
			
		}
		if(text_type == "cover_opacity")
		{
			var val =jQuery("#ux_hdn_cover_opacity").val();
			if(val > 100)
			{
				jQuery("#ux_hdn_cover_opacity").val(100);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_cover_opacity").val(jQuery("#ux_hdn_cover_opacity").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_cover_opacity").val(0);
			}
			
		}
		if(text_type == "cover_border_size")
		{
			var val =jQuery("#ux_hdn_cover_border").val();
			if(val > 20)
			{
				jQuery("#ux_hdn_cover_border").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_cover_border").val(jQuery("#ux_hdn_cover_border").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_cover_border").val(0);
			}
			
		}
		if(text_type == "cover_border_radius")
		{
			var val =jQuery("#ux_hdn_cover_radius").val();
			if(val > 20)
			{
				jQuery("#ux_hdn_cover_radius").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_cover_radius").val(jQuery("#ux_hdn_cover_radius").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_cover_radius").val(0);
			}
			
		}
		if(text_type == "lightbox_opacity")
		{
			var val =jQuery("#ux_hdn_lightbox_opacity").val();
			if(val > 100)
			{
				jQuery("#ux_hdn_lightbox_opacity").val(100);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_lightbox_opacity").val(jQuery("#ux_hdn_lightbox_opacity").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_lightbox_opacity").val(0);
			}
		}
		if(text_type == "lightbox_border")
		{
			var val =jQuery("#ux_hdn_lightbox_border").val();
			if(val > 20)
			{
				jQuery("#ux_hdn_lightbox_border").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_lightbox_border").val(jQuery("#ux_hdn_lightbox_border").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_lightbox_border").val(0);
			}
		}
		if(text_type == "lightbox_radius")
		{
			var val =jQuery("#ux_hdn_lightbox_radius").val();
			if(val > 20)
			{
				jQuery("#ux_hdn_lightbox_radius").val(20);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_lightbox_radius").val(jQuery("#ux_hdn_lightbox_radius").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_lightbox_radius").val(0);
			}
		}
		if(text_type == "slide")
		{
			var val =jQuery("#ux_hdn_slide_interval").val();
			if(val > 15)
			{
				jQuery("#ux_hdn_slide_interval").val(15);
			}
			else if(val > 0)
			{
				jQuery("#ux_hdn_slide_interval").val(jQuery("#ux_hdn_slide_interval").val().replace(/^0+/, ''));
			}
			else if(val == "")
			{
				jQuery("#ux_hdn_slide_interval").val(0);
			}
		}
	}
</script>