<?php
global $wpdb;
global $current_user;
$current_user = wp_get_current_user();

	if(isset($_REQUEST["param"]))
	{
		if($_REQUEST["param"] == "update_global_settings")
		{
			
			$ux_thumbnail = intval($_REQUEST['ux_thumbnail']);
			$ux_cover_size = intval($_REQUEST['ux_cover_size']);
			$ux_autoplay = intval($_REQUEST['ux_slideshow']);
			$ux_paging = intval($_REQUEST['ux_paging']);
			
			$album_css = $wpdb->get_row
			(
				$wpdb->prepare
				(
					"SELECT * FROM ".gallery_bank_settings()." WHERE album_id = %d",
					0
				)
			);
			if($ux_thumbnail == 0)
			{
				$ux_image_size = "0;width:".intval($_REQUEST["ux_image_width"])."px; height:".intval($_REQUEST["ux_image_height"])."px";
			}
			else 
			{
				$ux_image_size = "1;width:160px;height:120px";
			}
			if($ux_cover_size == 0)
			{
				$ux_cover_size = "0;width:".intval($_REQUEST["ux_cover_width"])."px; height:".intval($_REQUEST["ux_cover_height"])."px";
			}
			else 
			{
				$ux_cover_size = "1;width:160px; height:120px";
			}
			$default_setting = "image_size:".$ux_image_size.";images_in_row:".intval($_REQUEST["ux_image_in_row_val"]).";image_opacity:".(doubleval($_REQUEST["ux_image_opacity_val"]) / 100).";image_border_size:".intval($_REQUEST["ux_image_border_val"])."px;image_border_radius:".intval($_REQUEST["ux_image_radius_val"])."px;image_border_color:".esc_attr($_REQUEST["ux_border_color"]).";/cover_size:".$ux_cover_size.";cover_opacity:".(doubleval($_REQUEST["ux_cover_opacity_val"]) / 100).";cover_border_size:".intval($_REQUEST["ux_cover_border_val"])."px;cover_border_radius:".intval($_REQUEST["ux_cover_radius_val"])."px;border_color:".esc_attr($_REQUEST["ux_cover_border_color"]).";/overlay_opacity:".(doubleval($_REQUEST["ux_lightbox_opacity_val"]) / 100).";overlay_border_size:".intval($_REQUEST["ux_lightbox_border_val"])."px;overlay_border_radius:".intval($_REQUEST["ux_lightbox_radius_val"])."px;text_color:".esc_attr($_REQUEST["ux_lightbox_text_color"]).";overlay_border_color:".esc_attr($_REQUEST["ux_overlay_border_color"]).";inline_bg_color:".esc_attr($_REQUEST["ux_inline_overlay_color"]).";overlay_bg_color:".esc_attr($_REQUEST["ux_overlay_bg_color"]).";/autoplay:". $ux_autoplay . ";slide_interval:".(intval($_REQUEST["ux_slide_val"])).";/pagination:".$ux_paging.";";
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".gallery_bank_settings()." SET setting_content = %s WHERE album_id = %d",
					$default_setting,
					0
				)
			);
			die();
		}
		else if($_REQUEST["param"] == "restore_settings")
		{
			$default_setting = "image_size:1;width:160px;height:120px;images_in_row:3;image_opacity:1;image_border_size:2px;image_border_radius:2px;image_border_color:rgb(0, 0, 0);/cover_size:1;width:160px;height:120px;cover_opacity:1;cover_border_size:2px;cover_border_radius:2px;border_color:rgb(0, 0, 0);/overlay_opacity:0.6;overlay_border_size:0px;overlay_border_radius:0px;text_color:rgb(0, 0, 0);overlay_border_color:rgb(255, 255, 255);inline_bg_color:rgb(255, 255, 255);overlay_bg_color:rgb(0, 0, 0);/autoplay:0;slide_interval:2;/pagination:1;";
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE ".gallery_bank_settings()." SET setting_content = %s WHERE album_id = %d",
					$default_setting,
					0
				)
			);
		
			die();
			
		}
			

	}	