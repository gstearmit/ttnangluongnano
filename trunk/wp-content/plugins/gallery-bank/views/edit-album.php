<div class="block well" style="min-height:400px;">
	<div class="navbar">
		<div class="navbar-inner">
			<h5><?php _e( "Edit Album", gallery_bank ); ?></h5>
		</div>
	</div>
	<div class="body" style="margin:10px;">
		<form class="form-horizontal" id="edit_album">
			<a class="btn btn-inverse" href="admin.php?page=gallery_bank">
				<?php _e( "Back to Album Overview", gallery_bank ); ?>
			</a>
			<a class="btn btn-danger" href="#" onclick="delete_album();">
				<?php _e( "Delete Album", gallery_bank ); ?>
			</a>
			<button type="submit" class="btn btn-primary" style="float:right">
				<?php _e( "Update Album", gallery_bank ); ?>
			</button>
			<div class="separator-doubled"></div>
			<div class="message green" id="edit_message" style="display: none;">
				<span>
					<strong><?php _e("Album updated. Kindly wait for the redirect.", gallery_bank); ?></strong>
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
								<?php
							$album_id = $_GET["album_id"];
							$album = $wpdb->get_row
							(
								$wpdb->prepare
								(
								"SELECT * FROM ".gallery_bank_albums()." where album_id = %d",
								$album_id
								)
							);
							?>
							<div class="cntrl">
								<input type="text" name="title" class="span12" value="<?php echo stripcslashes(htmlspecialchars_decode($album->album_name)) ;?>" id="title" placeholder="<?php _e( "Enter your Album title here", gallery_bank);?>" />
							</div>
							</div>
							<input type="hidden" id="hidden_album_id" value="<?php echo $album_id;?>" />
							<div class="control-group">
							<?php 
							$content = stripslashes(htmlspecialchars_decode($album->description));
							wp_editor($content, $id = 'ux_edit_description', $prev_id = 'title', $media_buttons = true, $tab_index = 1);
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
								<a class="btn btn-info" id="upload_img_button" href=""><?php _e( "Upload Images to your Album ", gallery_bank ); ?></a>
							</div>
							<div class="control-group">
								<input type="checkbox" id="delete_selected" name="delete_selected" style=" cursor: pointer;"/>
								<a class="btn btn-danger" onclick="delete_selected_images();" style="margin-left: 20px; cursor: pointer;">
									<?php _e( "Delete ", gallery_bank ); ?>
								</a>
							</div>
							<table class="table table-striped" id="edit-album-data-table">
								<tbody>
								<?php
									$pic_detail = $wpdb->get_results
									(
										$wpdb->prepare
										(
											"SELECT * FROM ". gallery_bank_pics(). " WHERE album_id = %d order by sorting_order asc",
											$album_id
										)
									);
									$pics_count = count($pic_detail);
									for ($flag = 0; $flag < count($pic_detail); $flag++)
									{
										?>
										<tr>
											<td>
												<div class="block" id="<?php echo $pic_detail[$flag]->pic_id; ?>">
													<div class="block" style="padding:0px 6px 0px 0px; float: left; width: 2%;">
														<input type="checkbox" id="delete_image" name="delete_image" value="<?php echo $pic_detail[$flag]->pic_id; ?>" style="cursor: pointer;"/>
													</div>
													<div class="block" style="width:30%; float:left" >
														<img class="imgHolder" src="<?php echo stripcslashes($pic_detail[$flag]->thumbnail_url); ?>" style="border:3px solid #e5e5e5; cursor: pointer;" width="150px"/></br>
														<a class="imgHolder orange" style="margin-left:20px;" id="del_img" onclick="edit_delete_pic(<?php echo $pic_detail[$flag]->pic_id; ?>);">
															<img style="vertical-align:middle; cursor:pointer" src="<?php echo GALLERY_BK_PLUGIN_URL.'/assets/images/icons/color-16/cross.png'?>" alt="">&nbsp; 
															<span style="vertical-align:middle; cursor:pointer"><?php _e( "Remove Image", gallery_bank);?></span>
														</a>
													</div>
													<div class="block" style="width:66%; float:left;">
														<div class="control-group">
															<input style="width: 100%" class="span12" type="text" id="ux_edit_title_<?php echo $pic_detail[$flag]->pic_id ;?>" value= "<?php echo stripcslashes(htmlspecialchars($pic_detail[$flag]->title)) ;?>" placeholder="<?php _e( "Enter your Image Title", gallery_bank);?>" />
														</div>
														<div class="control-group" style="border-bottom: none !important;">
															<textarea style="width: 100%" class="span12" rows="5" id="ux_edit_desc_<?php echo $pic_detail[$flag]->pic_id ;?>" placeholder="<?php _e( "Enter your Image Description", gallery_bank);?>"><?php echo stripcslashes(htmlspecialchars($pic_detail[$flag]->description)) ;?></textarea>
														</div>
														<div class="control-group">
														<?php
														if($pic_detail[$flag]->check_url == 1)
														{
															?>
															<input type="checkbox" checked="checked" name="ux_edit_url_chk_<?php echo $pic_detail[$flag]->pic_id ;?>" onclick="chk_url_required();" id="ux_edit_url_chk_<?php echo $pic_detail[$flag]->pic_id ;?>" value="<?php echo $pic_detail[$flag]->check_url; ?>"/> 
															<label><?php _e(" Url to Redirect on click of an Image", gallery_bank);?></label>
															<?php
														}
														else
														{
															?>
															<input type="checkbox" name="ux_edit_url_chk_<?php echo $pic_detail[$flag]->pic_id ;?>" onclick="chk_url_required();" id="ux_edit_url_chk_<?php echo $pic_detail[$flag]->pic_id ;?>" value="<?php echo $pic_detail[$flag]->check_url; ?>"/> 
															<label><?php _e(" Url to Redirect on click of an Image", gallery_bank); ?></label>
															<?php
														}
														$domain = str_replace('http://http://', 'http://', $pic_detail[$flag]->url);
														?>
														</div>
														<div class="control-group" id="check_url_req_<?php echo $pic_detail[$flag]->pic_id ;?>">
															<input style="width: 100%" class="span12" type="text" id="ux_edit_url_<?php echo $pic_detail[$flag]->pic_id ;?>" value= "<?php echo $domain;?>" placeholder="<?php _e( "Enter URL", gallery_bank);?>" />
														</div>
														<input type="hidden" id="hidden_pic_id_<?php  echo $pic_detail[$flag]->pic_id; ?>" value="<?php echo $pic_detail[$flag]->pic_id ;?>" />
													</div>
												</div>
											</td>
										</tr>
										<?php
									}
								?>
								<div id="edit_media" class="content">
								</div>
								</tbody>
							</table>
							<input type="hidden" id="pics_count" name="pics_count" value="<?php echo $pics_count; ?>"/>
						</div>
					</div>
				</div>
				<?php
					function rgb2hex($R, $G, $B)
					{
						$R=dechex($R);
						If (strlen($R)<2)
						$R='0'.$R;
						$G=dechex($G);
						If (strlen($G)<2)
						$G='0'.$G;	
						$B=dechex($B);
						If (strlen($B)<2)
						$B='0'.$B;
						return '#' . $R . $G . $B;
					}
					$settings_count = $wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT count(setting_id) FROM ". gallery_bank_settings(),""
						)
					);
					$settings_count_album = $wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT album_settings FROM ". gallery_bank_settings(). " WHERE album_id = %d",
							$album_id
						)
					);
					$settings_cover = $wpdb->get_var
					(
						$wpdb->prepare
						(
							"SELECT album_cover FROM ". gallery_bank_settings(). " WHERE album_id = %d ",
							$album_id
						)
					);
					if($settings_count > 1)
					{
						$settings_content = $wpdb->get_row
						(
							$wpdb->prepare
							(
								"SELECT * FROM ". gallery_bank_settings(). " WHERE album_id = %d ",
								$album_id
							)
						);
					}
					else 
					{
						$settings_content = $wpdb->get_row
						(
							$wpdb->prepare
							(
								"SELECT * FROM ". gallery_bank_settings(). " WHERE album_id = %d ",
								0
							)
						);
					}
					$content = explode("/", $settings_content->setting_content);
					$image_settings = explode(";", $content[0]);
					$image_content = explode(":", $image_settings[0]);
					$image_width = explode(":", $image_settings[1]);
					$image_width_value = str_replace("px", "", $image_width[1]);
					$image_height = explode(":", $image_settings[2]);
					$image_height_value = str_replace("px", "", $image_height[1]);
					$images_in_row = explode(":", $image_settings[3]);
					$image_opacity = explode(":", $image_settings[4]);
					$image_opacity_value = $image_opacity[1] * 100;
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
					$cover_opacity_value = $cover_opacity[1] * 100;
					$cover_border_size = explode(":", $cover_settings[4]);
					$cov_border_size = str_replace("px", "", $cover_border_size[1]);
					$cover_border_radius = explode(":", $cover_settings[5]);
					$cov_border_radius = str_replace("px", "", $cover_border_radius[1]);
					$cover_border_color = explode(":", $cover_settings[6]);
					$cover_border_color_substring = explode(",", str_replace("rgb(", "", substr($cover_border_color[1], 0, -1)));	
					$cover_border_color_value = rgb2hex($cover_border_color_substring[0], $cover_border_color_substring[1], $cover_border_color_substring[2]);
					
					$lightbox_settings = explode(";", $content[2]);
					$overlay_opacity = explode(":", $lightbox_settings[0]);
					$overlay_opacity_value = $overlay_opacity[1] * 100;
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
				<div class="span4">
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Album Cover", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#edit_album_cover">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse in" id="edit_album_cover">
							<div class="body">
								<div class="control-group">
									<?php
										if(($settings_content->album_cover == "undefined") || ($settings_content->album_cover == ""))
										{
											?>
											<img id="edit_cover_image" src="<?php echo GALLERY_BK_PLUGIN_URL .'/album-cover.png';?>"/>
											<input type="hidden" id="hdn_album_cover" value="<?php echo $settings_cover; ?>" />
										<?php
										}
										else
										{
											?>
											<img id="edit_cover_image"  width="250px;" src="<?php echo $settings_cover;?>" />
											<input type="hidden" id="hdn_album_cover" value="<?php echo $settings_cover; ?>" />
										<?php
										}
										?>
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
									<a class="just-icon" data-toggle="collapse" data-target="#edit_shortcode">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse in " id="edit_shortcode">
							<div class="body">
								<div class="control-group">
									<label class="control-label" style="padding-top:3px !important"><?php _e( "All Albums", gallery_bank ); ?> : </label>
									<span class="label label-info">[gallery_bank_all_albums]</span>
								</div>
								<div class="control-group">
									<label class="control-label" style="padding-top:3px !important"><?php _e( "Single Album", gallery_bank ); ?> : </label>
									<span class="label label-info">[gallery_bank album_id=<?php echo $album_id; ?>]</span>
								</div>
								<div class="control-group">
									<label class="control-label" style="padding-top:3px !important"><?php _e( "Album with Cover", gallery_bank ); ?> : </label>
									<span class="label label-info">[gallery_bank_album_cover album_id=<?php echo $album_id; ?>]</span>
								</div>
							</div>
						</div>
					</div>
					<div class="block well">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Album Settings", gallery_bank );?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#edit_album_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="collapse in" id="edit_album_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Global Settings", gallery_bank ); ?> : </label>
									<div class="controls">
										<?php
										if($settings_count_album == 1)
										{
											?>
												<input type="radio" id="default_settings_enable" checked="checked" name="default_settings" value="1" onclick="check_default_settings();"/>
												<label style="margin-left: 3px;">
													<?php _e( "Global", gallery_bank ); ?>
												</label>
												<input type="radio" id="default_settings_disable" name="default_settings" value="0" onclick="check_default_settings();" style="margin-left: 10px;"/>
												<label style="margin-left: 3px;">
													<?php _e( "Individual", gallery_bank ); ?>
												</label>
											<?php
										}
										else
										{
											?>
												<input type="radio" id="default_settings_enable" name="default_settings" value="1" onclick="check_default_settings();"/>
												<label style="margin-left: 3px;">
													<?php _e( "Global", gallery_bank ); ?>
												</label>
												<input type="radio" id="default_settings_disable" name="default_settings" checked="checked" value="0" onclick="check_default_settings();" style="margin-left: 10px;"/>
												<label style="margin-left: 3px;">
													<?php _e( "Individual", gallery_bank ); ?>
												</label>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					if($settings_count_album == 1)
					{
						$class= "collapse";
						
					}
					else 
					{
						$class= "collapse in";
					}
					?>
					<div class="block well" id="edit_thumbnail_settings">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Thumbnails Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#editThumbnail_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="<?php echo $class;?>" id="editThumbnail_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Thumbnail Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<?php
										if($image_content[1] == 1)
										{
											?>
											<input type="radio" id="edit_thumbnail_enable" checked="checked" name="edit_thumbnail" onchange="check_thumbnail_settings()" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Original", gallery_bank ); ?>
											</label>
											<input type="radio" id="edit_thumbnail_disable" name="edit_thumbnail" onchange="check_thumbnail_settings()" value="0" style="margin-left: 10px;"/>
											<label style="margin-left: 3px;">
												<?php _e( "Custom", gallery_bank ); ?>
											</label>
											<?php
										}
										else
										{
											?>
											<input type="radio" id="edit_thumbnail_enable" name="edit_thumbnail" onchange="check_thumbnail_settings()" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Original", gallery_bank ); ?>
											</label>
											<input type="radio" id="edit_thumbnail_disable" checked="checked" name="edit_thumbnail" onchange="check_thumbnail_settings()" value="0" style="margin-left: 10px;"/>
											<label style="margin-left: 3px;">
												<?php _e( "Custom", gallery_bank ); ?>
											</label>
											<?php
										}
										?>
									</div>
								</div>
								<div class="control-group" id="edit_image_width">
									<label class="control-label"><?php _e( "Width", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_edit_image_width" name="ux_edit_image_width" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_width_value; ?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">px</span>
									</div>
								</div>
								<div class="control-group" id="edit_image_height">
									<label class="control-label"><?php _e( "Height", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_edit_image_height" name="ux_edit_image_height" class="span9" onkeypress="return OnlyNumbers(event)" value="<?php echo $image_height_value; ?>">
										<span style="padding-top:3px;float:left;margin-left:3%">px</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Images in Row", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_image_in_row_val" name="ux_image_in_row_val" class="span9" onkeyup="set_text_value('image_in_row')" onblur="set_text_value('image_in_row1')" onkeypress="return OnlyNumbers(event)" value="<?php echo $images_in_row[1]; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(1-20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Opacity", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_image_opacity_val" name="ux_image_opacity_val" onkeyup="set_text_value('thumb_opacity')" onblur="set_text_value('thumb_opacity')" onkeypress="return OnlyNumbers(event)" class="span9" value="<?php echo $image_opacity_value; ?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">%</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_image_border_val" name="ux_image_border_val" onblur="set_text_value('thumb_border_size')" onkeyup="set_text_value('thumb_border_size')" onkeypress="return OnlyNumbers(event)" class="span9" value="<?php echo $image_border_size_value; ?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">(0-20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Radius", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_image_radius_val" name="ux_image_radius_val" onblur="set_text_value('thumb_border_radius')" onkeyup="set_text_value('thumb_border_radius')" onkeypress="return OnlyNumbers(event)" class="span9" value="<?php echo $image_border_radius_value; ?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">(0-20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" name="ux_edit_border_color" id="ux_edit_border_color" class="span9" value="<?php echo $image_border_color_value; ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="block well" id="edit_cover_settings">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Album Cover Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#edit_album_cover_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="<?php echo $class;?>" id="edit_album_cover_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Cover Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<?php
										if($cover_content[1] == 1)
										{
											?>
											<input type="radio" id="edit_cover_size_enable" checked="checked" name="edit_cover_size" onchange="check_cover_settings()" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Original", gallery_bank ); ?>
											</label>
											<input type="radio" id="edit_cover_size_disable" name="edit_cover_size" onchange="check_cover_settings()" value="0" style="margin-left: 10px;"/>
											<label style="margin-left: 3px;">
												<?php _e( "Custom", gallery_bank ); ?>
											</label>
											<?php
										}
										else
										{
											?>
											<input type="radio" id="edit_cover_size_enable" name="edit_cover_size" onchange="check_cover_settings()" value="1" />
											<label style="margin-left: 3px;">
												<?php _e( "Original", gallery_bank ); ?>
											</label>
											<input type="radio" id="edit_cover_size_disable" checked="checked" name="edit_cover_size" onchange="check_cover_settings()" value="0" style="margin-left: 20px;"/>
											<label style="margin-left: 3px;">
												<?php _e( "Custom", gallery_bank ); ?>
											</label>
											<?php
										}
										?>
									</div>
								</div>
								<div class="control-group" id="edit_cover_width">
									<label class="control-label"><?php _e( "Width", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" class="span9" id="ux_edit_cover_width" name="ux_edit_cover_width" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_width;?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">px</span>
									</div>
								</div>
								<div class="control-group" id="edit_cover_height">
									<label class="control-label"><?php _e( "Height", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_edit_cover_height" name="ux_edit_cover_height" class="span9" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_height;?>">
										<span style="padding-top:3px;float:left;margin-left:3%">px</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Opacity", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_cover_opacity_val" name="ux_cover_opacity_val" class="span9" onblur="set_text_value('cover_opacity')" onkeyup="set_text_value('cover_opacity')" onkeypress="return OnlyNumbers(event)" value="<?php echo $cover_opacity_value;?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">%</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_cover_border_val" name="ux_cover_border_val" class="span9" onblur="set_text_value('cover_border_size')" onkeyup="set_text_value('cover_border_size')" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_border_size;?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">(0-20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Radius", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_cover_radius_val" name="ux_cover_radius_val" class="span9" onblur="set_text_value('cover_border_radius')" onkeyup="set_text_value('cover_border_radius')" onkeypress="return OnlyNumbers(event)" value="<?php echo $cov_border_radius;?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">(0-20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" name="ux_edit_cover_border_color" id="ux_edit_cover_border_color" class="span9" value="<?php echo $cover_border_color_value; ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="block well" id="edit_lightbox_settings">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Lightbox Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#editLightbox_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="<?php echo $class;?>" id="editLightbox_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Opacity", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_lightbox_opacity_val" name="ux_lightbox_opacity_val" onblur="set_text_value('lightbox_opacity')" onkeyup="set_text_value('lightbox_opacity')" onkeypress="return OnlyNumbers(event)" class="span9" value="<?php echo $overlay_opacity_value;?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">%</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Size", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_lightbox_border_val" name="ux_lightbox_border_val" onblur="set_text_value('lightbox_border')" onkeyup="set_text_value('lightbox_border')" onkeypress="return OnlyNumbers(event)" class="span9" value="<?php echo $overlay_border_size_value;?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">(0-20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Radius", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_lightbox_radius_val" name="ux_lightbox_radius_val" onblur="set_text_value('lightbox_radius')" onkeyup="set_text_value('lightbox_radius')"  onkeypress="return OnlyNumbers(event)" class="span9" value="<?php echo $overlay_border_radius_value; ?>"/>
										<span style="padding-top:3px;float:left;margin-left:3%">(0-20)</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Text Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" name="ux_edit_lightbox_text_color" id="ux_edit_lightbox_text_color" class="span9" value="<?php echo $lightbox_text_color_value;?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Border Color", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" name="ux_edit_overlay_border_color" id="ux_edit_overlay_border_color"class="span9" value="<?php echo $overlay_border_color_value;?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Inline Background", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" name="ux_edit_inline_overlay_color" id="ux_edit_inline_overlay_color" class="span9" value="<?php echo $lightbox_inline_bgcolor_value; ?>"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"><?php _e( "Overlay Background", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="color" name="ux_edit_overlay_bg_color" id="ux_edit_overlay_bg_color" class="span9" value="<?php echo $overlay_bgcolor_value; ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="block well" id="edit_slideshow_settings">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Slide Show Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#edit_slide_show_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="<?php echo $class;?>" id="edit_slide_show_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Auto Play", gallery_bank ); ?> : </label>
									<div class="controls">
										<?php
										if($auto_play[1] == 1)
										{
											?>
											<input type="radio" id="edit_slideshow_enable" checked="checked" name="edit_slideshow" value="1"/>
											<label style="margin-left: 3px;">
												<?php _e( "Enable", gallery_bank ); ?>
											</label>
											<input type="radio" id="edit_slideshow_disable" name="edit_slideshow" value="0" style="margin-left: 10px;"/>
											<label style="margin-left: 3px;">
												<?php _e( "Disable", gallery_bank ); ?>
											</label>
											<?php
										}
										else 
										{
											?>
											<input type="radio" id="edit_slideshow_enable" name="edit_slideshow" value="1"/>
											<label style="margin-left: 3px;">
												<?php _e( "Enable", gallery_bank ); ?>
											</label>
											<input type="radio" id="edit_slideshow_disable" checked="checked" name="edit_slideshow" value="0" style="margin-left: 10px;"/>
											<label style="margin-left: 3px;">
												<?php _e( "Disable", gallery_bank ); ?>
											</label>
											<?php
										}
										?>
									</div>
								</div>
								<div class="control-group" id="slide_settings">
									<label class="control-label"><?php _e( "Interval", gallery_bank ); ?> : </label>
									<div class="controls">
										<input type="text" id="ux_slide_val" name="ux_slide_val" onblur="set_text_value('slide')" onkeyup="set_text_value('slide')" onkeypress="return OnlyNumbers(event)" class="span9" value="<?php echo $slide_interval[1]; ?>" />
										<span style="padding-top:3px;float:left;margin-left:3%">(0-15)</span>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="block well" id="edit_pagination_settings">
						<div class="navbar">
							<div class="navbar-inner">
								<h5><?php _e( "Pagination Settings", gallery_bank ); ?></h5>
								<div class="nav pull-right">
									<a class="just-icon" data-toggle="collapse" data-target="#editPagination_settings">
										<i class="font-resize-vertical"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="<?php echo $class;?>" id="editPagination_settings">
							<div class="body">
								<div class="control-group">
									<label class="control-label"><?php _e( "Paging", gallery_bank ); ?> : </label>
									<div class="controls">
										<?php
										if($pagination[1] == 1)
										{
											?>
											<input type="radio" id="edit_paging_enable" checked="checked" name="edit_paging" value="1"/>
											<label style="margin-left: 3px;">
												<?php _e( "Enable", gallery_bank ); ?>
											</label>
											<input type="radio" id="edit_paging_disable" name="edit_paging" value="0" style="margin-left: 10px;"/>
											<label style="margin-left: 3px;">
												<?php _e( "Disable", gallery_bank ); ?>
											</label>
											<?php
										}
										else
										{
											?>
											<input type="radio" id="edit_paging_enable" name="edit_paging" value="1"/>
											<label style="margin-left: 3px;">
												<?php _e( "Enable", gallery_bank ); ?>
											</label>
											<input type="radio" id="edit_paging_disable" checked="checked" name="edit_paging" value="0" style="margin-left: 10px;"/>
											<label style="margin-left: 3px;">
												<?php _e( "Disable", gallery_bank ); ?>
											</label>
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
		</form>
	</div>
</div>
<script type="text/javascript">
	var arr = [];
	var ar = [];
	var array = [];
	var thumb_array = [];
	var cover_array;
	var del_ar = [];
	var array_existing = [];
	var array_new = [];
	var exist_array = [];
	jQuery(document).ready(function()
	{
		check_default_settings();
		check_thumbnail_settings();
		check_cover_settings();
		chk_url_required();
		check_url_req();
		jQuery('.hovertip').tooltip();
		oTable = jQuery('#edit-album-data-table').dataTable
		({
			"bJQueryUI": false,
			"bAutoWidth": true,
			"sPaginationType": "full_numbers",
			"bStateSave": true,
			"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
			"oLanguage": 
			{
				"sLengthMenu": "_MENU_"
			},
			"aaSorting": [[ 0, "desc" ]],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [0] },{ "bSortable": false, "aTargets": [0] }],
			"bSort": false
		});
		
		jQuery.fn.mColorPicker.defaults = {
			currentId: false,
			currentInput: false,
			currentColor: false,
			changeColor: false,
			color: false,
			imageFolder: '<?php echo GALLERY_BK_PLUGIN_URL; ?>/assets/js/colorpicker/images/'
			
		};
		jQuery(".dataTables_filter").css("margin-top", "24px");
		<?php
		for ($flag = 0; $flag < count($pic_detail); $flag++)
		{	
			?>
			array_existing[<?php echo $flag; ?>] = "<?php  echo $pic_detail[$flag]->pic_id; ?>";
			<?php
		}
		?>
	});
	jQuery(function()
	{  
		jQuery('#delete_selected').click(function()
		{
			var oTable = jQuery("#edit-album-data-table").dataTable();
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
	jQuery("#edit_album").validate
	({
		rules: 
		{
			title: "required",
			ux_edit_image_width: 
			{
				required: true,
				digits: true
			},
			ux_edit_image_height: 
			{
				required: true,
				digits: true
			},
			ux_edit_cover_width: 
			{
				required: true,
				digits: true
			},
			ux_edit_cover_height: 
			{
				required: true,
				digits: true
			}
		},
		submitHandler: function(form)
		{
			jQuery('#edit_message').css('display','block');
			var albumId = jQuery('#hidden_album_id').val();
			var title = encodeURIComponent(jQuery('#title').val());
			if (jQuery("#wp-ux_edit_description-wrap").hasClass("tmce-active"))
			{
				var uxeditdescription = encodeURIComponent(tinyMCE.get('ux_edit_description').getContent());
			}
			else
			{
				var uxeditdescription = encodeURIComponent(jQuery('#ux_edit_description').val());
			}
			var count_pic = arr.length;
			jQuery.post(ajaxurl, "id="+arr+"&count_pic="+count_pic+"&param=delete_pic&action=album_gallery_library", function(data)
			{	
			});
			<?php
			for ($flag = 0; $flag < count($pic_detail); $flag++)
			{
			?>
				var picId = <?php  echo $pic_detail[$flag]->pic_id; ?>;
				var edit_title = "";
				if(encodeURIComponent(jQuery("#ux_edit_title_" + picId).val()) != "undefined")
				{
					edit_title = encodeURIComponent(jQuery("#ux_edit_title_" + picId).val());
				}
				var edit_detail = "";
				if(encodeURIComponent(jQuery("#ux_edit_desc_" + picId).val()) != "undefined")
				{
					edit_detail = encodeURIComponent(jQuery("#ux_edit_desc_" + picId).val());
				}
				var url_path = "";
				if(encodeURIComponent(jQuery("#ux_edit_url_" + picId).val()) != "undefined")
				{
					url_path = encodeURIComponent(jQuery("#ux_edit_url_" + picId).val());
				}
				var id = jQuery("#<?php  echo $pic_detail[$flag]->pic_id; ?>").val();
				var chkbox_url = jQuery("#ux_edit_url_chk_<?php echo $pic_detail[$flag]->pic_id; ?>").prop("checked");
				if(typeof id != 'undefined')
				{
					jQuery.post(ajaxurl,"albumId="+albumId+"&picId="+picId+"&edit_title="+edit_title+"&edit_detail="+edit_detail+"&checkbox_url="+chkbox_url+"&edit_url_path="+url_path+"&param=update_pic&action=album_gallery_library", function(data)
					{
					});
				}
			<?php
			}
			?>
			var cover_image = "";
			if(cover_array == "")
			{
				cover_image = jQuery("#hdn_album_cover").val();
			}
			else
			{
				cover_image = cover_array;
			}
			jQuery.post(ajaxurl, jQuery(form).serialize() +"&edit_album_name="+title+"&albumId="+albumId+"&ux_edit_description="+uxeditdescription+"&cover_array="+cover_image+"&param=update_album&action=album_gallery_library", function(data)
			{
				var pics;
				var count = 0;
				if(array.length > 0)
				{
					for(pics = 0; pics < array.length; pics++ )
					{
						var pic_path = array[pics];
						var thumb = thumb_array[pics];
						var pic_title = "";
						if(encodeURIComponent(jQuery("#pic_title_" + ar[pics]).val()) != "undefined")
						{
							pic_title = encodeURIComponent(jQuery("#pic_title_" + ar[pics]).val());
						}
						var pic_detail = "";
						if(encodeURIComponent(jQuery("#pic_des_" + ar[pics]).val()) != "undefined")
						{
							pic_detail = encodeURIComponent(jQuery("#pic_des_" + ar[pics]).val());
						}
						if(encodeURIComponent(jQuery("#pic_url_" + ar[pics]).val()) != "undefined")
						{
							var pic_url1 = encodeURIComponent(jQuery("#pic_url_" + ar[pics]).val());
						}
						var chkbox = jQuery("#chk_url_" +ar[pics]).prop("checked");
						jQuery.post(ajaxurl, "album_id="+albumId+"&title="+pic_title+"&detail="+pic_detail+"&path="+pic_path+"&thumb="+thumb+"&checkbox_url="+chkbox+"&url_path="+pic_url1+"&param=add_pic&action=album_gallery_library", function(data)
						{
							count++;
							if(count == array.length)
							{
								setTimeout(function() 
								{
									jQuery('#edit_message').css('display','none');	
									window.location.href = "admin.php?page=gallery_bank";
								}, 2000);
							}
							
						});
					}
				}
				else
				{
					jQuery('#edit_message').css('display','block');
					setTimeout(function() 
					{
						jQuery('#edit_message').css('display','none');	
						window.location.href = "admin.php?page=gallery_bank";
					}, 3000);
				}
					
			});
		}
	});
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
				jQuery("#edit_cover_image").attr('src', attachment.url);
				jQuery("#edit_cover_image").attr('width','250px');
				cover_array = attachment.url;
			});
		});
		cover_file_frame.open();
	});
	function check_default_settings()
	{
		var edit_setting = jQuery('input:radio[name=default_settings]:checked').val();
		if(edit_setting == false)
		{
			jQuery('#edit_thumbnail_settings').css('display','block');
			jQuery('#edit_cover_settings').css('display','block');
			jQuery('#edit_slideshow_settings').css('display','block');
			jQuery('#edit_lightbox_settings').css('display','block');
			jQuery('#edit_pagination_settings').css('display','block');
		}
		else
		{
			jQuery('#edit_thumbnail_settings').css('display','none');
			jQuery('#edit_cover_settings').css('display','none');
			jQuery('#edit_slideshow_settings').css('display','none');
			jQuery('#edit_lightbox_settings').css('display','none');
			jQuery('#edit_pagination_settings').css('display','none');
		}
	}
	function check_thumbnail_settings()
	{
		var edit_thumb_setting = jQuery('input:radio[name=edit_thumbnail]:checked').val();
		if(edit_thumb_setting == false)
		{
			jQuery('#edit_image_width').css('display','block');
			jQuery('#edit_image_height').css('display','block');
		}
		else
		{
			jQuery('#edit_image_width').css('display','none');
			jQuery('#edit_image_height').css('display','none');
		}
	}
	function check_cover_settings()
	{
		var edit_cover_setting = jQuery('input:radio[name=edit_cover_size]:checked').val();
		if(edit_cover_setting == false)
		{
			jQuery('#edit_cover_width').css('display','block');
			jQuery('#edit_cover_height').css('display','block');
		}
		else
		{
			jQuery('#edit_cover_width').css('display','none');
			jQuery('#edit_cover_height').css('display','none');
		}
	}
	var file_frame;
	var images_count = jQuery("#pics_count").val();
	jQuery('#upload_img_button').live('click', function( event ){
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
				if(images_count < 10)
				{
					attachment = attachment.toJSON();
					var dynamicId = Math.floor((Math.random() * 1000)+1);
					thumb_array.push(attachment.url);
					array.push(attachment.url);
					ar.push(dynamicId);
					var tr = jQuery("<tr></tr>");
					var td = jQuery("<td></td>");
					var main_div = jQuery("<div class=\"block\" id=\""+dynamicId+"\" >");
					var chk_block = jQuery("<div class=\"block\" style=\"padding:6px 6px 0px 0px; width:2%;float:left\">");
					var check = jQuery("<input type=\"checkbox\" value=\""+dynamicId+"\" />");
					chk_block.append(check);
					chk_block.append("</div>");
					td.append(chk_block);
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
					var box = jQuery("<div class=\"control-group\"><input type=\"text\" class=\"span12\" id=\"pic_title_"+dynamicId+"\" placeholder=\"<?php _e( "Enter your Image Title", gallery_bank);?>\" /></div>");
					block1.append(box);
					var text = jQuery("<div class=\"control-group\"><textarea id=\"pic_des_"+dynamicId+"\" rows=\"5\"  placeholder=\"<?php _e( "Enter your Image Description", gallery_bank);?>\"  class=\"span12\"></textarea></div>"); 
					block1.append(text);
					block1.append("</div>");
					var checkboxes = jQuery("<div class=\"control-group\"><input type=\"checkbox\" value=\"1\" style=\"cursor: pointer; margin-top:0px;\" id=\"chk_url_"+dynamicId+"\" name=\"chk_url_"+dynamicId+"\" onclick=\"check_url_req("+dynamicId+")\">&nbsp;<span><?php _e( "Url to Redirect on click of an Image", gallery_bank );?></span></div>"); 
					block1.append(checkboxes);
					block1.append("</div>");
					var pic_url = jQuery("<div id=\"chk_url_req_"+dynamicId+"\" class=\"control-group\" style=\"display:none;\"><input type=\"text\" name=\"pic_url_"+dynamicId+"\" value=\"http://\" style=\"width=100%\" class=\"span12\" id=\"pic_url_"+dynamicId+"\"  placeholder=\"<?php _e( "Enter URL", gallery_bank);?>\"></div>"); 
					block1.append(pic_url);
					block1.append("</div>");
					main_div.append(chk_block);
					main_div.append(block);
					main_div.append(block1);
					main_div.append("</div>");
					td.append(main_div);
					tr.append(td);
					oTable = jQuery('#edit-album-data-table').dataTable();
					oTable.fnAddData([tr.html()]);
					array_new.push(dynamicId);
					images_count++;
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
				if(jQuery.inArray(dynamicId, array_new) > -1) {
					var index = parseInt(jQuery.inArray(dynamicId, array_new)) + parseInt(array_existing.length);
					oTable = jQuery('#edit-album-data-table').dataTable();
					oTable.fnDeleteRow(index);
					array.splice(jQuery.inArray(dynamicId, array_new), 1);
					ar.splice(jQuery.inArray(dynamicId, array_new), 1);
					thumb_array.splice(jQuery.inArray(dynamicId, array_new), 1);
					array_new.splice(jQuery.inArray(dynamicId, array_new), 1);
					images_count--;
					jQuery("#pics_count").val(images_count);
					
					
				}
			}
		});
	}
	function edit_delete_pic(pic_id)
	{
		bootbox.confirm("<?php _e("Are you sure you want to delete this Image?", gallery_bank); ?>", function(confirmed)
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
				if(jQuery.inArray(pic_id.toString(), array_existing) > -1)
				{
					var index = jQuery.inArray(pic_id.toString(), array_existing);
					oTable = jQuery('#edit-album-data-table').dataTable();
					oTable.fnDeleteRow(index);
					array_existing.splice(index, 1);
					arr.push(pic_id);
					images_count--;
					jQuery("#pics_count").val(images_count);
				}
			}
		});
	}
	function delete_album()
	{
		bootbox.confirm("<?php _e( "Are you sure you want to delete this Album?", gallery_bank ); ?>", function(confirmed)
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
				var album_id = jQuery('#hidden_album_id').val();
				jQuery.post(ajaxurl, "album_id="+album_id+"&param=delete_album&action=album_gallery_library", function(data)
				{
					window.location.href = "admin.php?page=gallery_bank";
				});
			}
		});
	}
	
	function delete_selected_images()
	{
		bootbox.confirm("<?php _e( "Are you sure you want to delete these Images", gallery_bank ); ?>", function(confirmed)
		{
			console.log("Confirmed: "+confirmed);
			if(confirmed == true)
			{
				var oTable = jQuery("#edit-album-data-table").dataTable();
				jQuery("input:checkbox:checked", oTable.fnGetNodes()).each(function()
				{
					var dynamicId = parseInt(this.checked? jQuery(this).val():"");
					jQuery("#" + dynamicId).remove();
					if(jQuery.inArray(dynamicId, array_new) > -1) {
						var index = parseInt(jQuery.inArray(dynamicId, array_new)) + parseInt(array_existing.length);
						oTable.fnDeleteRow(index);
						array.splice(jQuery.inArray(dynamicId, array_new), 1);
						ar.splice(jQuery.inArray(dynamicId, array_new), 1);
						thumb_array.splice(jQuery.inArray(dynamicId, array_new), 1);
						array_new.splice(jQuery.inArray(dynamicId, array_new), 1);
						images_count--;
						jQuery("#pics_count").val(images_count);
					}
					if(jQuery.inArray(dynamicId.toString(), array_existing) > -1)
					{
						var index = jQuery.inArray(dynamicId.toString(), array_existing);
						oTable.fnDeleteRow(index);
						array_existing.splice(index, 1);
						arr.push(dynamicId);
						images_count--;
						jQuery("#pics_count").val(images_count);
					}
					jQuery('#delete_selected').removeAttr('checked');
				});
			}
		});
	}
	function chk_url_required()
	{
		<?php
		for ($flag = 0; $flag < count($pic_detail); $flag++)
		{
		?>
			var chk_url = jQuery("#ux_edit_url_chk_<?php echo $pic_detail[$flag]->pic_id ;?>").prop("checked");
			if(chk_url == true)
			{
				jQuery('#check_url_req_<?php echo $pic_detail[$flag]->pic_id ;?>').css('display','block');
			}
			else
			{
				jQuery('#check_url_req_<?php echo $pic_detail[$flag]->pic_id ;?>').css('display','none');
			}
			<?php
		}
		?>
	}
	function check_url_req(dynamicId)
	{
		var check_url = jQuery("#chk_url_" + dynamicId).prop("checked");
		if(check_url == true)
		{
			jQuery('#chk_url_req_' + dynamicId).css('display','block');
		}
		else
		{
			jQuery('#chk_url_req_' + dynamicId).css('display','none');
		}
	}
</script>