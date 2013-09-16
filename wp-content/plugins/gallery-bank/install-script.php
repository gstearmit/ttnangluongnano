<?php
global $wpdb;
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
if (count($wpdb->get_var('SHOW TABLES LIKE "' . gallery_bank_albums() . '"')) == 0)
{
	$sql = 'CREATE TABLE ' . gallery_bank_albums() . '(
	album_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	album_name VARCHAR(100) NOT NULL,
	author VARCHAR(100) NOT NULL,
	album_date DATE,
	description TEXT NOT NULL,
	PRIMARY KEY (album_id)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . gallery_bank_pics() . '"')) == 0)
{
	$sql = 'CREATE TABLE ' .gallery_bank_pics() . '(
	pic_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	album_id INTEGER(10) UNSIGNED NOT NULL,
	pic_path TEXT NOT NULL,
	title VARCHAR(100) NOT NULL,
	description TEXT NOT NULL,
	thumbnail_url TEXT NOT NULL,
	sorting_order INTEGER(20),
	date DATE,
	url VARCHAR(250) NOT NULL,
	check_url INTEGER(10) NOT NULL,
	PRIMARY KEY(pic_id)		 
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . gallery_bank_settings() . '"')) == 0)
{
	$sql = 'CREATE TABLE ' .gallery_bank_settings() . '(
	setting_id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	album_id INTEGER(10) NOT NULL,
	album_settings INTEGER(1) NOT NULL,
	setting_content TEXT NOT NULL,
	album_cover TEXT NOT NULL, 
	PRIMARY KEY (setting_id)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
	dbDelta($sql);
	$default_setting = "image_size:1;width:160px;height:120px;images_in_row:3;image_opacity:1;image_border_size:2px;image_border_radius:2px;image_border_color:rgb(0, 0, 0);/cover_size:1;width:160px;height:120px;cover_opacity:1;cover_border_size:2px;cover_border_radius:2px;border_color:rgb(0, 0, 0);/overlay_opacity:0.6;overlay_border_size:0px;overlay_border_radius:0px;text_color:rgb(0, 0, 0);overlay_border_color:rgb(255, 255, 255);inline_bg_color:rgb(255, 255, 255);overlay_bg_color:rgb(0, 0, 0);/autoplay:0;slide_interval:2;/pagination:0;";
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO ".gallery_bank_settings()."(album_id, album_settings, setting_content)
			VALUES(%d, %d, %s)",
			0,
			1,
			$default_setting
		)
	);
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . gallery_bank_albums() . '"')) != 0)
{
	$check = $wpdb->get_results
	(
		$wpdb->prepare
		(
			"Select * FROM " . gallery_bank_albums(),""
		)
	);
	function HexToRGBA($img_color) 
	{
		$hex = ereg_replace("#", "", $img_color);
		$color = array();
		 
		if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		}
		else if(strlen($hex) == 6) {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		return $r.",".$g.",".$b;
	}
	for($flag = 0; $flag < count($check);$flag++)
	{
		$column = $wpdb->get_var
		(
			$wpdb->prepare
			(
				"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'thumbnail_enable'",""
			)
		);
		if($column != "")
		{
			$check_pics = $wpdb->get_var
			(
				$wpdb->prepare
				(
					"Select thumbnail_url FROM " . gallery_bank_pics()." where album_id = %d and album_cover = %d",
					$check[$flag]->album_id,
					"1"
				)
			);
		
			if($check[$flag]->thumbnail_enable == 1 || $check[$flag]->border_enable == 1 || $check[$flag]->slideshow == 1)
			{
				if($check[$flag]->thumbnail_enable == 1)
				{
					$setting_content=0;
					$thumbnail=0;
				}
				else
				{
					$setting_content=0;
					$thumbnail=1;
				}
				
			}
			else
			{
				$setting_content=1;
				$thumbnail=1;
			}
		
		}
		
		$check_album_id = $wpdb->get_var
		(
			$wpdb->prepare
			(
				"Select count(album_id) FROM " . gallery_bank_settings()." where album_id = %d",
				$check[$flag]->album_id
			)
		);
		
		if($check_album_id == 0)
		{
			
			if($check[$flag]->images_in_row == "")
			{
				$images_row = 3;
			}
			else 
			{
				$images_row = $check[$flag]->images_in_row;
			}
			$default_setting = "image_size:".$thumbnail.";width:".$check[$flag]->image_width.";height:".$check[$flag]->image_height.";images_in_row:".$images_row.";image_opacity:1;image_border_size:".$check[$flag]->border_width."px;image_border_radius:2px;image_border_color:rgb(".HexToRGBA($check[$flag]->border_color).")/cover_size:1;width:160px;height:120px;cover_opacity:1;cover_border_size:2px;cover_border_radius:2px;border_color:rgb(0, 0, 0);/overlay_opacity:0.6;overlay_border_size:0px;overlay_border_radius:0px;text_color:rgb(0, 0, 0);overlay_border_color:rgb(255, 255, 255);inline_bg_color:rgb(255, 255, 255);overlay_bg_color:rgb(0, 0, 0);/autoplay:".$check[$flag]->slideshow.";slide_interval:".$check[$flag]->slideshow_interval.";/pagination:1;";
			$wpdb->query
			(
				$wpdb->prepare
				(
					"INSERT INTO ".gallery_bank_settings()."(album_id, album_settings, setting_content,album_cover)
					VALUES(%d, %d, %s, %s)",
					$check[$flag]->album_id,
					$setting_content,
					$default_setting,
					$check_pics
				)
			);
			
		}
	}
}
if (count($wpdb->get_var('SHOW TABLES LIKE "' . gallery_bank_albums() . '"')) != 0)
{
	
	$check = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'thumbnail_enable'",""
		)
	);
	if($check != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_albums() . " DROP thumbnail_enable ",""
			)
		);
	}
	
	$check1 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'image_width'",""
		)
	);
	
	if($check1 != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_albums() . " DROP image_width ",""
			)
		);
	}
	
	$check2 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'image_height'",""
		)
	);
	
	if($check2 != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_albums() . " DROP image_height ",""
			)
		);
	}
	
	$check3 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'border_enable'",""
		)
	);
	
	if($check3 != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_albums() . " DROP border_enable ",""
			)
		);
	}
	
	$check4 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'border_width'",""
		)
	);
	if($check4 != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_albums() . " DROP border_width ",""
			)
		);
	}
	
	$check5 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'border_color'",""
		)
	);
	
	if($check5 != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_albums() . " DROP border_color ",""
			)
		);
	}
	
	$check6 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'slideshow'",""
		)
	);
	if($check6 != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_albums() . " DROP slideshow ",""
			)
		);
	}
	$check7 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'slideshow_interval'",""
		)
	);
	if($check7 != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_albums() . " DROP slideshow_interval ",""
			)
		);
	}
	$check8 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_albums() . " LIKE 'images_in_row'",""
		)
	);
	if($check8 != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_albums() . " DROP images_in_row ",""
			)
		);
	}
	$check9 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_pics() . " LIKE 'album_cover'",""
		)
	);
	if($check9 != "")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_pics() . " DROP album_cover ",""
			)
		);
	}
	$check10 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_pics() . " LIKE 'sorting_order'",""
		)
	);
	if($check10 != "sorting_order")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_pics() . " ADD sorting_order INTEGER(10) NOT NULL",""
			)
		);
	}
	$check11 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_pics() . " LIKE 'url'",""
		)
	);
	if($check11 != "url")
	{
		$wpdb->query
		(
		
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_pics() . " ADD url VARCHAR(250) NOT NULL",""
			)
		);
		$wpdb->query
		(
			$wpdb->prepare
			(
				"UPDATE ".gallery_bank_pics()." set url = %s",
				"http://"
			)
		);
	}
	$check12 = $wpdb->get_var
	(
		$wpdb->prepare
		(
			"SHOW COLUMNS FROM " . gallery_bank_pics() . " LIKE 'check_url'",""
		)
	);
	if($check12 != "check_url")
	{
		$wpdb->query
		(
			$wpdb->prepare
			(
				"ALTER TABLE " . gallery_bank_pics() . " ADD check_url INTEGER(10) NOT NULL",""
			)
		);
	}
}
?>