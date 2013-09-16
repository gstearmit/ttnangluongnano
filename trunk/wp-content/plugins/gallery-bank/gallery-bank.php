<?php
/*
 Plugin Name: Gallery Bank Standard Version
 Plugin URI: http://gallery-bank.com
 Description: Gallery Bank is an interactive WordPress photo gallery plugin, best fit for creative and corporate portfolio websites.
 Author: Gallery-Bank
 Version: 2.0.11
 Author URI: http://gallery-bank.com
*/
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//   D e f i n e     CONSTANTS //////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (!defined('GALLERY_DEBUG_MODE'))    define('GALLERY_DEBUG_MODE',  false );
	if (!defined('GALLERY_BK_FILE'))       define('GALLERY_BK_FILE',  __FILE__ );
	if (!defined('GALLERY_CONTENT_DIR'))      define('GALLERY_CONTENT_DIR', ABSPATH . 'wp-content');
	if (!defined('GALLERY_CONTENT_URL'))      define('GALLERY_CONTENT_URL', site_url() . '/wp-content');
	if (!defined('GALLERY_PLUGIN_DIR'))       define('GALLERY_PLUGIN_DIR', GALLERY_CONTENT_DIR . '/plugins');
	if (!defined('GALLERY_PLUGIN_URL'))       define('GALLERY_PLUGIN_URL', GALLERY_CONTENT_URL . '/plugins');
	if (!defined('GALLERY_BK_PLUGIN_FILENAME'))  define('GALLERY_BK_PLUGIN_FILENAME',  basename( __FILE__ ) );
	if (!defined('GALLERY_BK_PLUGIN_DIRNAME'))   define('GALLERY_BK_PLUGIN_DIRNAME',  plugin_basename(dirname(__FILE__)) );
	if (!defined('GALLERY_BK_PLUGIN_DIR')) define('GALLERY_BK_PLUGIN_DIR', GALLERY_PLUGIN_DIR.'/'.GALLERY_BK_PLUGIN_DIRNAME );
	if (!defined('GALLERY_BK_PLUGIN_URL')) define('GALLERY_BK_PLUGIN_URL', site_url().'/wp-content/plugins/'.GALLERY_BK_PLUGIN_DIRNAME );
	if (!defined('gallery_bank')) define('gallery_bank', 'gallery-bank');

/*************************************************************************************/
if(file_exists(GALLERY_BK_PLUGIN_DIR. '/lib/gallery-bank-class.php'))
{
	 require_once(GALLERY_BK_PLUGIN_DIR. '/lib/gallery-bank-class.php');
}
/*************************************************************************************/
function plugin_install_script_for_gallery_bank()
{
	include_once GALLERY_BK_PLUGIN_DIR .'/install-script.php';	
}
/*************************************************************************************/
function plugin_uninstall_script_for_gallery_bank()
{
	include_once GALLERY_BK_PLUGIN_DIR .'/uninstall-script.php';	
}
/*************************************************************************************/
function plugin_load_textdomain()
{
	if( function_exists( 'load_plugin_textdomain' ) )
	{
		load_plugin_textdomain(gallery_bank, false, GALLERY_BK_PLUGIN_DIRNAME .'/languages');
	}
}
/*************************************************************************************/
add_action('plugins_loaded', 'plugin_load_textdomain');
register_activation_hook(__FILE__,'plugin_install_script_for_gallery_bank');
/*************************************************************************************/
?>