<?php
 
/*
Plugin Name: Bản Đô Google Map Máy Bán Hàng .Net Shore Code
Plugin URI: http://maybanhang.net
Description: Google maps Shortcode
Version: 2.0
Author URI: http://maybanhang.net
*/
 
function iz_google_maps($atts, $content=null) {
    extract(shortcode_atts(array(
        'title' => 'máy bán hàng .net',
        'address' => '19, Duy Tân, Dịch Vọng, Hà Nội, Việt Nam',
        'width' =>'202',
        'hieght'=>'253'
    ),$atts));
    return "<h2>{$title}</h2>
    <img src='http://maps.google.com/maps/api/staticmap?zoom=14&size={$width}x{$hieght}&sensor=false&center={$address}' alt='my location' />";
}
 
add_shortcode('google_map','iz_google_maps');
 
?>