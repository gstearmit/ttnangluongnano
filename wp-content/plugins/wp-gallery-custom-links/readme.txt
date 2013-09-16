=== WP Gallery Custom Links ===
Contributors: fourlightsweb
Donate link: http://www.fourlightsweb.com/wordpress-plugins/wp-gallery-custom-links/#donate
Tags: gallery links, gallery link, gallery
Requires at least: 3.3.2
Tested up to: 3.6.0
Stable tag: 1.9.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Specify custom links for WordPress gallery images (instead of attachment or file only).

== Description ==

= Overview =

If you've ever had a WordPress gallery of staff, product, or other images and needed
to link them to other pages but couldn't, this plugin is for you!
 
This plugin adds a "Gallery Link URL" field when editing images. If the image
is included in a gallery, the "Gallery Link URL" value will be used as the link on
the image instead of the raw file or the attachment post.  There are also several
additional options (see "Usage" below).

It's designed to work even if customizations have been made via the
post_gallery filter; instead of replacing the entire post_gallery function, it
calls the normal function and simply replaces the link hrefs in the generated
output. By default, any Lightbox or other onClick events on custom links
will be removed to allow them to function as regular links.

= Usage =

* See the custom fields added in the screenshots section at http://wordpress.org/extend/plugins/wp-gallery-custom-links/screenshots/.
* For each gallery image, you can specify a custom Gallery Link URL.
* Use "[none]" as the Gallery Link URL to remove the link for that gallery image.
* For each gallery image, you can select a Gallery Link Target ("Same Window" or "New Window").
* For each gallery image, you can select how to handle Lightbox and other onClick events ("Remove" or "Keep").
* Use `[gallery ignore_gallery_link_urls="true"]` to ignore the custom links on an entire gallery.
* Use `[gallery open_all_in_new_window="true"]` and `[gallery open_all_in_same_window="true"]` to open all images in an entire gallery in a new window/the same window, respectively.
* Use `[gallery preserve_click_events="true"]` to keep Lightbox or other onClick events on all custom-linked images in an entire gallery.
* Use `[gallery remove_links="true"]` to remove links on all images in an entire gallery.

= Hooks =

* Use "wpgcl_filter_raw_gallery_link_url" to filter the custom gallery link URLs as they come out of the database. Note that this may
include the value "[none]" if it has been entered to remove the link later on. Example:

`add_filter( 'wpgcl_filter_raw_gallery_link_url', 'my_gallery_link_url_filter', 10, 3 );
function my_gallery_link_url_filter( $link, $attachment_id, $post_id ) { return '/en/' . $link; }`

== Installation ==

1. Upload the 'wp-gallery-custom-links' folder to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= #1) Will this plugin work with my theme's galleries? =

Possibly.  WP Gallery Custom Links plugin was designed for use with 
1) WordPress's [gallery] shortcode and 2) images uploaded through the 
WordPress media manager. Some themes use these features, and others
have their own proprietary way of saving gallery images and drawing out the gallery.
Provided your theme meets the criteria above, the plugin should work with it.

= #2) Will this plugin work with NextGen galleries? =

No, this plugin is not compatible with NextGen galleries.  WP Gallery Custom Links was
designed for use with 1) WordPress's [gallery] shortcode and 2) images uploaded through the 
WordPress media manager.  NextGen galleries uses its own [nggallery] etc. shortcodes
that function outside of the WordPress [gallery] shortcode.

= #3) When I enable the plugin, the styling on my gallery changes. Why? =

The way the plugin works requires the gallery generation code to be run twice.  This
may result in it being labeled as "#gallery-2" instead of "#gallery-1." 
Check your HTML and CSS for these changes and adjust accordingly.

= #4) I'm not using the [gallery] shortcode, but I'd still like to use the custom link in my own gallery code.  How can I get the custom link? =

The custom links are stored as meta values for images, and can be accessed with the following:

`$custom_url = get_post_meta( $attachment_id, '_gallery_link_url', true );`

= #5) I've set my gallery to remove Lightbox effects, but they are still coming up, possibly with nothing in them. Why? =

There are many, many different themes and plugins that all have different
ways of doing Lightboxes, Shadowboxes, etc. - your site may need
some minor adjustments to how its javascripts are set up/ordered before it will be compatible.

It's likely your Lightbox javascript is running after the WP Gallery Custom Links javascript.
This may cause the Lightbox effect to be applied after the WP Gallery Custom Links
script attempts to remove it.

To fix this, first try checking your footer.php theme file and see if you find the
Lightbox &lt;script&gt; tag(s) to relocate to inside the &lt;head&gt; tags of header.php.  Since
the WP Gallery Custom Links javascript is set to go into the footer, this will help ensure the
other script runs first (and then WP Gallery Custom Links can turn off what it has turned on).
You will also want to double-check that your Lightbox still works in the places it needs to.

If the above script-moving solution doesn't look like an option, you can tell
WP Gallery Custom Links which Lightbox script it needs to wait to load before it can load (i.e. declare
a dependency).  It gets a little programmy, but you can follow these steps to do this:

* Google for "What's my ip?" to find your IP address
* Drop the following code into your theme's functions.php file (this will be temporary), replacing 111.111.111.111 with your own IP address (to help ensure only you see its output):
`if($_SERVER['REMOTE_ADDR'] == '111.111.111.111') {
	add_action('wp_footer', 'see_enqueued');
}
function see_enqueued( $handles = array() ) {
	global $wp_scripts;
	
	// scripts
	foreach ( $wp_scripts -> registered as $registered )
	$script_urls[ $registered -> handle ] = $registered -> src;
	
	// output of values
	$output = '';
	foreach ( $wp_scripts -> queue as $handle ) {
		if ( ! empty( $script_urls[ $handle ] ) )
			$output .= 'Handle: ' . $handle . ' - Script: ' . $script_urls[ $handle ] . '<br />';
	}
	echo $output;
}`
* Reload a page on your site and look near the bottom for the handle of your Lightbox script (I'll use "my-lightbox-js-handle" as an example), copy it, and remove the code from your functions.php file
* Open up wp-gallery-custom-links.php in the WP Gallery Custom Links plugin folder and look for this line:
	
`array( 'jquery' ),`

* Add your Lightbox script(s) handle to this line, so it now looks like:
	
`array( 'jquery', 'my-lightbox-js-handle' ),`

* Note that any updates to the plugin you do from this point on will need to have this change maintained.
* If you reload your gallery and view the page source, you should now see that the WP Gallery Custom Links javascript file comes after your Lightbox javascript file, and the Lightbox effect should now be removed from the gallery.

= #6) When I enable the plugin, nothing in my gallery changes, even though I have custom links set. Why? =

The first thing you probably want to check is that the hook that this plugin uses (the "post_gallery" filter) is being called.
Some themes and gallery plugins have code that replaces the default WordPress gallery code, and the post_gallery
filter gets left out, which means this plugin never gets called to do anything.  If you do a "View Source" on your gallery page
and see a javascript file named "wp-gallery-custom-links.js" being included, but items you know have custom links are not
using the custom links, try looking around in your theme/gallery plugin to see if the gallery shortcode is
being replaced, and if that function doesn't contain a reference to post_gallery, try adding this near the top of
the function (assumes the attributes variable passed to the shortcode function is named $attr):

`$output = apply_filters('post_gallery', '', $attr);
if ( $output != '' )
    return $output;`

== Screenshots ==

1. The additional WP Gallery Custom Link fields.

== Changelog ==

= 1.9.0 =
* By popular demand, moved the help notes under each field into tooltips so the form won't be so tall.
* The javascript that attempts to disable lightboxes now runs in window.onload in addition to document.ready.
Hopefully this will cut down on some of the issues where lightboxes keep popping up without having to mess
with javascript dependencies at the code level. Any other window.onload function should be preserved.
* Added a javascript function detect for jQuery's off() function, since it only came into existence in 1.7.
If off() isn't defined, unbind() is called instead.
* Resolved an issue where making an image have no link occasionally resulted in all previous images in the gallery
disappearing from the display.
* Added a translation for Polish, courtesy of Przemyslaw Trawicki (thanks!)

= 1.8.0 =
* By popular demand, added a new filter on each link value: wpgcl_filter_raw_gallery_link_url

= 1.7.1 =
* A few performance increases

= 1.7.0 =
* By popular demand, added support for the "open_all_in_new_window" and "open_all_in_same_window"
gallery shortcode attributes to set all images in a gallery to open in a new/the same window, respectively.
* By popular demand, made it so "Same Window" will set the target to "_self", thus
forcing the same window, instead of doing whatever the theme does by default.

= 1.6.1 =
* Fixed an issue where items with the same custom link were not having lightbox
removed properly
* Added support for the "ids" attribute added in WP 3.5
* Updated help text for the Gallery Link URL field 

= 1.6.0 =
* By popular demand, added the ability to remove links from individual images
or an entire gallery.

= 1.5.1 =
* Fixed a possible error with an undefined "preserve_click" variable.

= 1.5.0 =
* By popular demand, added support for Jetpack tiled galleries (and its use
of the Photon CDN for URLs).

= 1.4.0 =
* By popular demand, added an option to remove or keep Lightbox and other OnClick
events ("remove" by default).
* Added support for the "preserve_click_events" gallery shortcode attribute to
set all custom-linked images in a gallery to "preserve" its OnClick events.

= 1.3.0 =
* Added support for the "ignore_gallery_link_urls" gallery shortcode attribute to 
ignore custom links on a gallery and use the normal file/attachment setting.
* Added support for IDs in the "include" gallery shortcode attribute that aren't 
directly attached to the post.

= 1.2.2 =
* Moved javascript to a separate file so jquery could be required as a dependency.

= 1.2.1 =
* Fixed a bug where javascript hover effects were not working properly on images.

= 1.2.0 =
* By popular demand, added an option to open gallery image links in a new window.

= 1.1.2 =
* Added a check to prevent javascript from showing up in feeds.

= 1.1.1 =
* Fixed an error that occurred when an images were small enough to only have one size
* Tested with WordPress 3.4

= 1.1.0 =
* Added support for replacing links to all sizes of an uploaded image instead of the full version only
* Replaced lightbox removal with a more advanced javascript method

= 1.0.5 =
* Moving the $post_id code above first_call to avoid messing that up if a return does occur due to a missing post_id

= 1.0.4 =
* The "id" attribute of the gallery shortcode is now supported

= 1.0.3 =
* Added a check to return a simple space in the event $post is undefined

= 1.0.2 =
* Fixed an issue with two undefined variables

= 1.0.1 =
* Changed priority on post_gallery filter from 10 to 999 to help ensure it runs after anything else

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.9.0 =
* By popular demand, moved the help notes under each field into tooltips so the form won't be so tall.
* The javascript that attempts to disable lightboxes now runs in window.onload in addition to document.ready.
Hopefully this will cut down on some of the issues where lightboxes keep popping up without having to mess
with javascript dependencies at the code level. Any other window.onload function should be preserved.
* Added a javascript function detect for jQuery's off() function, since it only came into existence in 1.7.
If off() isn't defined, unbind() is called instead.
* Resolved an issue where making an image have no link occasionally resulted in all previous images in the gallery
disappearing from the display.
* Added a translation for Polish, courtesy of Przemyslaw Trawicki (thanks!)

= 1.8.0 =
* By popular demand, added a new filter on each link value: wpgcl_filter_raw_gallery_link_url

= 1.7.1 =
* A few performance increases

= 1.7.0 =
* By popular demand, added support for the "open_all_in_new_window" and "open_all_in_same_window"
gallery shortcode attributes to set all images in a gallery to open in a new/the same window, respectively.
* By popular demand, made it so "Same Window" will set the target to "_self", thus
forcing the same window, instead of doing whatever the theme does by default.

= 1.6.1 =
* Fixed an issue where multiple items with the same custom links were not having lightbox
removed properly
* Added support for the "ids" attribute added in WP 3.5
* Updated help text for the Gallery Link URL field 

= 1.6.0 =
* By popular demand, added the ability to remove links from individual images
or an entire gallery. 

= 1.5.1 =
* Fixed a possible error with an undefined "preserve_click" variable.

= 1.5.0 =
* By popular demand, added support for Jetpack tiled galleries (and its use
of the Photon CDN for URLs).

= 1.4.0 =
* By popular demand, added an option to remove or keep Lightbox and other OnClick
events ("remove" by default).
* Added support for the "preserve_click_events" gallery shortcode attribute to
set all custom-linked images in a gallery to "preserve" its OnClick events.

= 1.3.0 =
* Added support for the "ignore_gallery_link_urls" gallery shortcode attribute to 
ignore custom links on a gallery and use the normal file/attachment setting.
* Added support for IDs in the "include" gallery shortcode attribute that aren't 
directly attached to the post.

= 1.2.2 =
* Moved javascript to a separate file so jquery could be required as a dependency.

= 1.2.1 =
* Fixed a bug where javascript hover effects were not working properly on images.

= 1.2.0 =
* By popular demand, added an option to open gallery image links in a new window.

= 1.1.2 =
* Added a check to prevent javascript from showing up in feeds.

= 1.1.1 =
* Fixed an error that occurred when an images were small enough to only have one size
* Tested with WordPress 3.4

= 1.1.0 =
* Added support for replacing links to all sizes of an uploaded image instead of the full version only
* Replaced lightbox removal with a more advanced javascript method

= 1.0.5 =
* Moving the $post_id code above first_call to avoid messing that up if a return does occur due to a missing post_id

= 1.0.4 =
* The "id" attribute of the gallery shortcode is now supported

= 1.0.3 =
* Added a check to return a simple space in the event $post is undefined

= 1.0.2 =
* Fixed an issue with two undefined variables

= 1.0.1 =
* Changed priority on post_gallery filter from 10 to 999 to help ensure it runs after anything else

= 1.0.0 =
* Initial release