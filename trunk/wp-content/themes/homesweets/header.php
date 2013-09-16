<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php elegant_canonical(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/colorpicker.css" type="text/css" media="screen" />

<?php 
 if (is_home()) {
?>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/featured_2.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/gioithieu.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/home_sweets.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/home_sweets_adv.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/homesweets_dathang.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/home_sweets_catalogue.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/can_ho_tieu_chaun.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/tinh_nang_noi_bat.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/thi_truong_dia_phuong_buoi_sang.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/Ho_tay_cuoi_tuan.css" />
<?php
 }
?>
 <?php if(is_page())
       {  ?>
          
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/gioithieu.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/home_sweets.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/home_sweets_adv.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/homesweets_dathang.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/home_sweets_catalogue.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/can_ho_tieu_chaun.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/tinh_nang_noi_bat.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/thi_truong_dia_phuong_buoi_sang.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/Ho_tay_cuoi_tuan.css" />
        <!-- <script src="<?php echo bloginfo('template_directory'); ?>/js/faqs.js"></script>-->
    <?php }?>

    <?php if(is_single()) 
     { ?>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/comments.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/gioithieu.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/home_sweets.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/home_sweets_adv.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/homesweets_dathang.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/home_sweets_catalogue.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/can_ho_tieu_chaun.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/tinh_nang_noi_bat.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/thi_truong_dia_phuong_buoi_sang.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/Ho_tay_cuoi_tuan.css" />
    <?php }?>

<link href='http://fonts.googleapis.com/css?family=Calibri:regular,bold' rel='stylesheet' type='text/css'/>
<!--<script src="http://ajax.Googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->

<!-- <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />-->
<link rel="ico" type="image/ico" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6style.css" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script type="text/javascript">DD_belatedPNG.fix('img#logo, span.overlay, a.zoom-icon, a.more-icon, #menu, #menu-right, #menu-content, ul#top-menu ul, #menu-bar, .footer-widget ul li, span.post-overlay, #content-area, .avatar-overlay, .comment-arrow, .testimonials-item-bottom, #quote, #bottom-shadow, #quote .container');</script>
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie7style.css" />
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie8style.css" />
<![endif]-->
<script type="text/javascript">
	document.documentElement.className = 'js';
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <div id='bg_top'>
        <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
        <!--
        <div id='logo_home_sew'>
             <a href="<?php bloginfo('url'); ?>">
                <?php $logo = (get_option('chameleon_logo') <> '') ? get_option('chameleon_logo') : get_bloginfo('template_directory').'/images/logo.png'; ?>
                <img src="<?php echo esc_url($logo); ?>" alt="" id="logo"/>
            </a>
        </div><!-- id='logo_home_sew -->

         <div id="additional-info">
                <div id="et-social-icons">
                    <?php
                        $et_rss_url = get_option('chameleon_rss_url') <> '' ? get_option('chameleon_rss_url') : get_bloginfo('comments_rss2_url');
                        if ( get_option('chameleon_show_twitter_icon') == 'on' ) $social_icons['twitter'] = array('image' => get_bloginfo('template_directory') . '/images/twitter.png', 'url' => get_option('chameleon_twitter_url'), 'alt' => 'Twitter' );
                        if ( get_option('chameleon_show_rss_icon') == 'on' ) $social_icons['rss'] = array('image' => get_bloginfo('template_directory') . '/images/rss.png', 'url' => $et_rss_url, 'alt' => 'Rss' );
                        if ( get_option('chameleon_show_facebook_icon') == 'on' ) $social_icons['facebook'] = array('image' => get_bloginfo('template_directory') . '/images/facebook.png', 'url' => get_option('chameleon_facebook_url'), 'alt' => 'Facebook' );
                        $social_icons = apply_filters('et_social_icons', $social_icons);
                        if ( !empty($social_icons) ) {
                            foreach ($social_icons as $icon) {
                                echo "<a href='" . esc_url($icon['url']) . "' target='_blank'><img alt='" . esc_attr($icon['alt']) . "' src='" . esc_url($icon['image']) . "' /></a>";
                            }
                        }
                    ?>
                </div><!-- id="et-social-icons" -->

                <div id="search-form">
                    <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
                        <input type="text" value="<?php esc_attr_e('Tìm kiếm...', 'Chameleon'); ?>" name="s" id="searchinput" />
                        <input type="image" src="<?php bloginfo('template_directory'); ?>/images/search_btn.png" id="searchsubmit" />
                    </form>
                </div> <!-- end #search-form -->
            </div> <!-- end #additional-info -->
    </div><!--id='bg_top'-->
    
    <div id="page-wrap">

        <div id="header" class="clearfix">
            <div id='chinh_images'>
                <?php // anh silde chay o day ?>
                
                    <?php if ( get_option('chameleon_featured') == 'on' ) get_template_part('includes/featured'); ?>    
                
            </div> <!-- id='chinh_images -->

        </div>
        <div id="top-bar" class="group">
          <div id='top-menu-bar'>   
            
            
            <?php do_action('et_header'); ?>

            <?php $menuClass = 'menu';
            $menuID = 'menu-page-menu';
            $primaryNav = '';
            if (function_exists('wp_nav_menu')) {
                $primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) );
            };
            if ($primaryNav == '') { ?>
                <ul id="<?php echo esc_attr($menuID); ?>" class="<?php echo esc_attr($menuClass); ?>">
                    <?php if (get_option('chameleon_home_link') == 'on') { ?>
                        <li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home','Chameleon') ?></a></li>
                    <?php }; ?>

                    <?php show_page_menu($menuClass,false,false); ?>
                    <?php show_categories_menu($menuClass,false); ?>
                </ul> <!-- end ul#nav -->
            <?php }
            else echo($primaryNav); ?>
          </div> <!-- id='top-menu-bar'-->
            
        </div><!--end top-bar-->
 <div id="page-info">

	<?php //do_action('et_header_top'); ?>
		