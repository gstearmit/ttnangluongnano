<?php
	global $wpdb;
	$sql = "DROP TABLE " .gallery_bank_albums();
	$wpdb->query($sql);
	
	$sql = "DROP TABLE " .gallery_bank_pics();
	$wpdb->query($sql);
	
	$sql = "DROP TABLE " .gallery_bank_settings();
	$wpdb->query($sql);
	
?>