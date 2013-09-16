<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
    <?php if(is_home()) 
       { ?>
		<script src='<?php echo bloginfo('template_directory'); ?>/js/easyAccordion.js'></script>
	   <!-- <script src="<?php echo bloginfo('template_directory'); ?>/js/utility.js"></script>-->
	    <script src="<?php echo bloginfo('template_directory'); ?>/js/tooltips.js"></script>
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/featured.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/gioithieu.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/home_sweets.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/home_sweets_adv.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/homesweets_dathang.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/home_sweets_catalogue.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/can_ho_tieu_chaun.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/tinh_nang_noi_bat.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/thi_truong_dia_phuong_buoi_sang.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/Ho_tay_cuoi_tuan.css" />
	 
	   
	        <!-- Add jQuery library -->
			<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/lib/jquery-1.10.1.min.js"></script>

			<!-- Add mousewheel plugin (this is optional) -->
			<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/lib/jquery.mousewheel-3.0.6.pack.js"></script>

			<!-- Add fancyBox main JS and CSS files -->
			<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/source/jquery.fancybox.js?v=2.1.5"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />

			<!-- Add Button helper (this is optional) -->
			<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
			<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

			<!-- Add Thumbnail helper (this is optional) -->
			<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
			<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

			<!-- Add Media helper (this is optional) -->
			<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	    

			<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			/***** neu la home thay bang anh **************/
			$('#chinh_images').addClass('anh_home');

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : true,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}

		
	</style>

  <?php } ?>

    <?php if(is_page())
       {  ?>
          
        <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/gioithieu.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/home_sweets.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/home_sweets_adv.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/homesweets_dathang.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/home_sweets_catalogue.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/can_ho_tieu_chaun.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/tinh_nang_noi_bat.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/thi_truong_dia_phuong_buoi_sang.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/Ho_tay_cuoi_tuan.css" />
	    <script src="<?php echo bloginfo('template_directory'); ?>/js/faqs.js"></script>
    <?php }?>

    <?php if(is_single()) 
     { ?>
        <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/comments.css" />
        <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/gioithieu.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/home_sweets.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/home_sweets_adv.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/homesweets_dathang.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/home_sweets_catalogue.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/can_ho_tieu_chaun.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/tinh_nang_noi_bat.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/thi_truong_dia_phuong_buoi_sang.css" />
	    <link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/Ho_tay_cuoi_tuan.css" />
    <?php }?>
</head>

<body <?php body_class(); ?>>
	<div id='bg_top'>
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div id='ket_noi_sosial'>
			<a href="https://www.facebook.com/pages/SweetHome-Apartments-for-rent-in-Hanoi/314537781916504"></a>
		</div>
		<div id='ket_noi_tw'>
			<a href="https://www.facebook.com/pages/SweetHome-Apartments-for-rent-in-Hanoi/314537781916504"></a>
		</div>
		<div id="searchBox">
                <?php get_search_form(); ?>
        </div>
	</div><!--id='bg_top'-->
	
	<div id="page-wrap">

		<div id="header">
			<!-- slide anh chay o day -->
			<?php //echo do_shortcode('[slider]');?>
			<?php //echo do_shortcode('[wowslider id="1"]');?>
			<?php //wowslider(1); ?>
			<div id='chinh_images'>
				<?php 
				
				   if (function_exists ('show_nivo_slider') and (!is_home())) {
				         show_nivo_slider ();
				         } 
				 ?> 
			</div> <!-- id='chinh_images -->

		</div>
        <div id="top-bar" class="group">
          <div id='top-menu-bar'>	
            <?php wp_nav_menu(array('menu'=>'Page Menu', 'container'=>'')); ?>
          </div> 
            
        </div><!--end top-bar-->