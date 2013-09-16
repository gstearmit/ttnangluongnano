<?php
if ( function_exists('register_sidebar') ) {
	/*
    register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
    ));
    */
	// dang ki 1 sibar ben trai 
	register_sidebar(array(
    		'name' => 'Left Sidebar',
    		'id'   => 'left-sidebar',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
	// dang ki 1 sibar ben phai 
	register_sidebar(array(
    		'name' => 'Right Sidebar',
    		'id'   => 'right-sidebar',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
	
	
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div> <!-- end .footer-widget -->',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
    ));
	
	register_sidebar(array(
		'name' => 'Homepage',
		'before_widget' => '<div id="%1$s" class="main-widget %2$s">',
		'after_widget' => '</div> <!-- end .main-widget -->',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
    ));
} 
?>