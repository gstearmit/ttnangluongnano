<?php
global $wpdb;
global $current_user;
$current_user = wp_get_current_user();
if (!current_user_can("edit_posts") && ! current_user_can("edit_pages"))
{
	return;
}
else
{
	if(isset($_REQUEST["param"]))
	{
		if($_REQUEST["param"] == "add_new_album")
		{
			$ux_album_name = htmlspecialchars(esc_attr($_REQUEST["album_name"]));
			$ux_desciption = html_entity_decode(esc_attr($_REQUEST["ux_description"]));
			$cover = esc_attr($_REQUEST["cover_array"]);
			if(isset($_REQUEST['DefaultSettings']))
			{
				$ux_settings = intval($_REQUEST['DefaultSettings']);
			}
			else
			{
				$ux_settings = 0;
			}
			if(isset($_REQUEST['ux_image_size']))
			{
				$ux_thumbnail = intval($_REQUEST['ux_image_size']);
			}
			else
			{
				$ux_thumbnail = 0;
			}
			if(isset($_REQUEST['ux_cover_size']))
			{
				$ux_cover = intval($_REQUEST['ux_cover_size']);
			}
			else
			{
				$ux_cover = 0;
			}
			if(isset($_REQUEST['ux_autoplay']))
			{
				$ux_autoplay = intval($_REQUEST['ux_autoplay']);
			}
			else
			{
				$ux_autoplay = 0;
			}
			if(isset($_REQUEST['ux_paging']))
			{
				$ux_paging = intval($_REQUEST['ux_paging']);
			}
			else
			{
				$ux_paging = 0;
			}
			if($ux_thumbnail == 1)
			{
				$image_size = "1;width:160px; height:120px";
			}
			else 
			{
				$image_size = "0;width:".intval($_REQUEST["ux_image_width"])."px; height:".intval($_REQUEST["ux_image_height"])."px";
			}
			if($ux_cover == 1)
			{
				$cover_size = "1;width:160px; height:120px";
			}
			else 
			{
				$cover_size = "0;width:".intval($_REQUEST["ux_cover_width"])."px; height:".intval($_REQUEST["ux_cover_height"])."px";
			}
			$wpdb->query
			(
				$wpdb->prepare
				(
					"INSERT INTO ".gallery_bank_albums()."(album_name, description, album_date, author)
					VALUES(%s, %s, CURDATE(), %s)",
					$ux_album_name,
					$ux_desciption,
					$current_user->display_name
				)
			);
			echo $EventLastId=$wpdb->insert_id;
			$settings = "image_size:".$image_size.";images_in_row:".intval($_REQUEST["ux_hdn_row_size"]).";image_opacity:".(doubleval($_REQUEST["ux_hdn_image_opacity"]) / 100).";image_border_size:".intval($_REQUEST["ux_hdn_image_border"])."px;image_border_radius:".intval($_REQUEST["ux_hdn_image_radius"])."px;image_border_color:".esc_attr($_REQUEST["border_color"]).";/cover_size:".$cover_size.";cover_opacity:".(doubleval($_REQUEST["ux_hdn_cover_opacity"]) / 100).";cover_border_size:".intval($_REQUEST["ux_hdn_cover_border"])."px;cover_border_radius:".intval($_REQUEST["ux_hdn_cover_radius"])."px;border_color:".esc_attr($_REQUEST["cover_border_color"]).";/overlay_opacity:".(doubleval($_REQUEST["ux_hdn_lightbox_opacity"]) / 100).";overlay_border_size:".intval($_REQUEST["ux_hdn_lightbox_border"])."px;overlay_border_radius:".intval($_REQUEST["ux_hdn_lightbox_radius"])."px;text_color:".esc_attr($_REQUEST["lightbox_text_color"]).";overlay_border_color:".esc_attr($_REQUEST["overlay_border_color"]).";inline_bg_color:".esc_attr($_REQUEST["inline_bg_color"]).";overlay_bg_color:".esc_attr($_REQUEST["overlay_background_color"]).";/autoplay:". $ux_autoplay . ";slide_interval:".(intval($_REQUEST["ux_hdn_slide_interval"])).";/pagination:".$ux_paging.";";
			if($cover == "undefined")
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"INSERT INTO ".gallery_bank_settings()."(album_id, album_settings, setting_content)
						VALUES(%d, %d, %s)",
						$EventLastId,
						$ux_settings,
						$settings
					)
				);
			}
			else
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"INSERT INTO ".gallery_bank_settings()."(album_id, album_settings, setting_content,album_cover)
						VALUES(%d, %d, %s, %s)",
						$EventLastId,
						$ux_settings,
						$settings,
						$cover
					)
				);
			}
			die();
		}
		elseif($_REQUEST["param"] == "update_album")
		{
			$albumId = intval($_REQUEST["albumId"]);
			$ux_edit_album_name = htmlspecialchars(esc_attr($_REQUEST["edit_album_name"]));
			$ux_edit_desciption = html_entity_decode(esc_attr($_REQUEST["ux_edit_description"]));
			$edit_cover = esc_attr($_REQUEST["cover_array"]);
			if(isset($_REQUEST['default_settings']))
			{
				$ux_edit_settings = intval($_REQUEST['default_settings']);
			}
			else
			{
				$ux_edit_settings = 0;
			}
			if(isset($_REQUEST['edit_thumbnail']))
			{
				$ux_edit_thumbnail = intval($_REQUEST['edit_thumbnail']);
			}
			else
			{
				$ux_edit_thumbnail = 0;
			}
			if(isset($_REQUEST['edit_cover_size']))
			{
				$ux_edit_cover_size = intval($_REQUEST['edit_cover_size']);
			}
			else
			{
				$ux_edit_cover_size = 0;
			}
			if(isset($_REQUEST['edit_slideshow']))
			{
				$ux_edit_autoplay = intval($_REQUEST['edit_slideshow']);
			}
			else
			{
				$ux_edit_autoplay = 0;
			}
			if(isset($_REQUEST['edit_paging']))
			{
				$ux_edit_paging = intval($_REQUEST['edit_paging']);
			}
			else
			{
				$ux_edit_paging = 0;
			}
			if($ux_edit_thumbnail == 0)
			{
				$ux_edit_thumb_size = "0;width:".intval($_REQUEST["ux_edit_image_width"])."px; height:".intval($_REQUEST["ux_edit_image_height"])."px";
			}
			else 
			{
				$ux_edit_thumb_size = "1;width:160px; height:120px";
			}
			if($ux_edit_cover_size == 0)
			{
				$edit_cover_size = "0;width:".intval($_REQUEST["ux_edit_cover_width"])."px; height:".intval($_REQUEST["ux_edit_cover_height"])."px";
			}
			else 
			{
				$edit_cover_size = "1;width:160px; height:120px";
			}
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE " .gallery_bank_albums(). " SET album_name = %s, description = %s WHERE album_id = %d",
					$ux_edit_album_name,
					$ux_edit_desciption,
					$albumId
				)
			);
			$new_settings = "image_size:".$ux_edit_thumb_size.";images_in_row:".intval($_REQUEST["ux_image_in_row_val"]).";image_opacity:".doubleval($_REQUEST["ux_image_opacity_val"] / 100).";image_border_size:".intval($_REQUEST["ux_image_border_val"])."px;image_border_radius:".intval($_REQUEST["ux_image_radius_val"])."px;image_border_color:".esc_attr($_REQUEST["ux_edit_border_color"]).";/cover_size:".$edit_cover_size.";cover_opacity:".doubleval($_REQUEST["ux_cover_opacity_val"] / 100).";cover_border_size:".intval($_REQUEST["ux_cover_border_val"])."px;cover_border_radius:".intval($_REQUEST["ux_cover_radius_val"])."px;border_color:".esc_attr($_REQUEST["ux_edit_cover_border_color"]).";/overlay_opacity:".doubleval($_REQUEST["ux_lightbox_opacity_val"] / 100).";overlay_border_size:".intval($_REQUEST["ux_lightbox_border_val"])."px;overlay_border_radius:".intval($_REQUEST["ux_lightbox_radius_val"])."px;text_color:".esc_attr($_REQUEST["ux_edit_lightbox_text_color"]).";overlay_border_color:".esc_attr($_REQUEST["ux_edit_overlay_border_color"]).";inline_bg_color:".esc_attr($_REQUEST["ux_edit_inline_overlay_color"]).";overlay_bg_color:".esc_attr($_REQUEST["ux_edit_overlay_bg_color"]).";/autoplay:". $ux_edit_autoplay . ";slide_interval:".(intval($_REQUEST["ux_slide_val"])).";/pagination:".$ux_edit_paging.";";
			if($edit_cover == "undefined")
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"UPDATE ".gallery_bank_settings()." SET setting_content = %s, album_settings = %d WHERE album_id = %d",
						$new_settings,
						$ux_edit_settings,
						$albumId
					)
				);
			}
			else
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"UPDATE ".gallery_bank_settings()." SET setting_content = %s, album_settings = %d, album_cover = %s WHERE album_id = %d",
						$new_settings,
						$ux_edit_settings,
						$edit_cover,
						$albumId
					)
				);
			}
			die();
		}
		else if($_REQUEST['param'] == "Delete_album")
		{
			$album_id = intval($_REQUEST['album_id']);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM ".gallery_bank_pics()." WHERE album_id = %d",
						$album_id
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM ".gallery_bank_albums()." WHERE album_id = %d",
						$album_id
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM ".gallery_bank_settings()." WHERE album_id = %d",
						$album_id
					)
				);
			
			die();
		}
		else if($_REQUEST["param"] == "add_pic")
		{
			$ux_path = esc_attr($_REQUEST["path"]);
			$ux_albumid = intval($_REQUEST["album_id"]);
			$ux_title = html_entity_decode($_REQUEST["title"]);
			$ux_url_path = html_entity_decode($_REQUEST["url_path"]);
			$ux_detail = html_entity_decode($_REQUEST["detail"]);
			$thumbnail_url = esc_attr($_REQUEST["thumb"]);
			$ux_checkbox = esc_attr($_REQUEST["checkbox_url"]);
			if($ux_checkbox == "true")
			{
				$url_checkbox = 1;
			}
			else
			{
				$url_checkbox = 0;
			}
			$wpdb->query
			(
				$wpdb->prepare
				(
					"INSERT INTO ".gallery_bank_pics()."(album_id,pic_path,thumbnail_url,title,description,url,check_url,date)
					VALUES(%d,%s,%s,%s,%s,%s,%d,CURDATE())",
					$ux_albumid,
					$ux_path,
					$thumbnail_url,
					$ux_title,
					$ux_detail,
					$ux_url_path,
					$url_checkbox
				)
			);
			$pic_id = $wpdb->insert_id;
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE " .gallery_bank_pics(). " SET sorting_order = %d WHERE pic_id = %d",
					$pic_id,
					$pic_id
				)
			);
			die();
		}
		else if($_REQUEST["param"] == "update_pic")
		{
			$pic_id = intval($_REQUEST['picId']);
			$albumId = intval($_REQUEST['albumId']);
			$edit_title = html_entity_decode($_REQUEST['edit_title']);
			$edit_detail = html_entity_decode($_REQUEST['edit_detail']);
			$chkbox = esc_attr($_REQUEST['checkbox_url']);
			$ux_edit_url = html_entity_decode($_REQUEST["edit_url_path"]);
			if($chkbox == "true")
			{
				$url_chkbox = 1;
			}
			else
			{
				$url_chkbox = 0;
			}
			$wpdb->query
			(
				$wpdb->prepare
				(
					"UPDATE " .gallery_bank_pics(). " SET title = %s, description= %s,url = %s, check_url = %d WHERE pic_id = %d",
					$edit_title,
					$edit_detail,
					$ux_edit_url,
					$url_chkbox,
					$pic_id
				)
			);
			
			die();
		}
		else if($_REQUEST['param'] == "delete_pic")
		{
			$picture_id = $_REQUEST['id'];
			$count_pic = intval($_REQUEST['count_pic']);
			$pic_id =  (explode(",",$picture_id));
			for($flag = 0; $flag < $count_pic; $flag++ )
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM ".gallery_bank_pics()." WHERE pic_id = %d",
						$pic_id[$flag]
					)
				);
			}
			die();
		}
		else if($_REQUEST['param'] == "delete_album")
		{
			$album_id = intval($_REQUEST['album_id']);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"DELETE FROM ".gallery_bank_pics()." WHERE album_id = %d",
					$album_id
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"DELETE FROM ".gallery_bank_settings()." WHERE album_id = %d",
					$album_id
				)
			);
			$wpdb->query
			(
				$wpdb->prepare
				(
					"DELETE FROM ".gallery_bank_albums()." WHERE album_id = %d",
					$album_id
				)
			);
			die();
		}
		
		else if($_REQUEST["param"] == "reorderControls")
		{
			
			$updateRecordsArray = $_POST['recordsArray'];
			$listingCounter = 1;
			foreach ($updateRecordsArray as $recordIDValue)
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"UPDATE ".gallery_bank_pics()." SET sorting_order = %d WHERE pic_id = %d",
						$listingCounter,
						$recordIDValue
					)
				);
				$listingCounter = $listingCounter + 1;	
			}
			die();
		}
		else if($_REQUEST["param"] == "reorderRows")
		{
			$images_in_row = intval($_REQUEST['images_in_row']);
			$row_images_id = explode("/",esc_attr($_REQUEST['row_id_images']));
			$updateRecordsArray = $_POST['row'];
			$listingCounter = 1;
			$string_ids = "";
			foreach ($updateRecordsArray as $recordIDValue)
			{
				$count = 0;
				$count1 = 0;
				for($flag = 0; $flag < $images_in_row; $flag++)
				{
					if($count == 0)
					{
						$wpdb->query
						(
							$wpdb->prepare
							(
								"UPDATE ".gallery_bank_pics()." SET sorting_order = %d WHERE pic_id = %d",
								$listingCounter,
								$recordIDValue
							)
						);
						$listingCounter = $listingCounter + 1;	
						$count++;
					}
					else if($count == $images_in_row)
					{
						$count = 0;
					}
					else 
					{
						if($count1 == 0)
						{
							for($flag1 = 0; $flag1 < count($row_images_id); $flag1++)
							{
								$single_id = explode("-", $row_images_id[$flag1]);
								if($recordIDValue == $single_id[0])
								{
									$string_ids = $row_images_id[$flag1];
								}
							}
							$id_to_update = explode("-",$string_ids);
							for($flag2 = 1; $flag2 < count($id_to_update); $flag2++)
							{
								$wpdb->query
								(
									$wpdb->prepare
									(
										"UPDATE ".gallery_bank_pics()." SET sorting_order = %d WHERE pic_id = %d",
										$listingCounter,
										$id_to_update[$flag2]
									)
								);
								$listingCounter = $listingCounter + 1;	
							}
							$count1++;
							
						}
						$count++;
					}
				}
				
			}
			die();
			
		}
		else if($_REQUEST['param'] == "reorder_td_controls")
		{
			$updateRecordsArray = $_POST['recordsArray'];
			$arr_sorting_orders = array();
			$row_images_id = explode("/",esc_attr($_REQUEST['row_id_images']));
			$record_val = "";
			foreach ($updateRecordsArray as $recordIDValue)
			{
				$record_val .= $recordIDValue . ",";
				$sorting_numbers = $wpdb->get_var
				(				
					$wpdb->prepare
					(
						"SELECT sorting_order FROM ".gallery_bank_pics() . " WHERE pic_id = %d",
						$recordIDValue
					)
				);
				array_push($arr_sorting_orders, $sorting_numbers);
			}
			$flag = 0;
			sort($arr_sorting_orders);
			$string_ids = "";
			$new_string = "";
			foreach ($updateRecordsArray as $recordIDValue)
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"UPDATE ".gallery_bank_pics()." SET sorting_order = %d WHERE pic_id = %d",
						$arr_sorting_orders[$flag],
						$recordIDValue
					)
				);
				$new_string .= "-" . $recordIDValue;
				for($flag1 = 0; $flag1 < count($row_images_id); $flag1++)
				{
					$single_id = explode("-", $row_images_id[$flag1]);
					if($recordIDValue == $single_id[0])
					{
						$string_ids = $row_images_id[$flag1];
						
					}
				}
				
				$flag++;
			}
			
			$new_string = substr($new_string, 1);
			$string_to_replace = esc_attr($_REQUEST['row_id_images']);
			$string_to_postback = str_replace($string_ids, $new_string , $string_to_replace);
			echo $record_val . "_" . $string_to_postback;
			die();
		}
		else if($_REQUEST['param'] == "delete_all_albums")
		{
			$album = $wpdb->get_results
			(
				$wpdb->prepare
				(
					"SELECT * FROM ".gallery_bank_albums(),""
				)
			);
			for($flag=0; $flag < count($album); $flag++)
			{
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM ".gallery_bank_pics()." WHERE album_id = %d",
						$album[$flag]->album_id
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM ".gallery_bank_settings()." WHERE album_id = %d",
						$album[$flag]->album_id
					)
				);
				$wpdb->query
				(
					$wpdb->prepare
					(
						"DELETE FROM ".gallery_bank_albums()." WHERE album_id = %d",
						$album[$flag]->album_id
					)
				);
			}
			die();
		}
	}
}
?>