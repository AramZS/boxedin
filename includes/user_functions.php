<?php

$sidebars = array('Home Header Far Left', 'Home Header Right', 'Home Header Far Right');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row topwidgets widget %2$s"><div class="sidebar-section twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

require ( get_template_directory() . '/includes/theme-options.php' );

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'square-thumb', 800, 800, true );
	add_image_size( 'horizontal-thumb', 800, 600, true ); //(hard cropped)
}

function custom_excerpt_length( $length ) {
	return 20;
}

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

$wpver = get_bloginfo('version');
$floatWPVer = floatval($wpver);

	//echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>';
	//Ref:WordPress Bible pg 90
	
if ($floatWPVer >= 3.4){

		function jq_setup() {
				
				wp_enqueue_script('jquery');
				wp_enqueue_script('header-imp', get_stylesheet_directory_uri() . '/includes/header-imp.js', array('jquery'));

		}

		add_action('wp_enqueue_scripts', 'jq_setup');
	} else {
			
		
		function jq_enqueue() {
		
						wp_dequeue_script( 'jquery' );
						wp_deregister_script( 'jquery' );
						wp_register_script('jquery', 'http://code.jquery.com/jquery-latest.min.js', '', '1.7.2');
						wp_enqueue_script('jquery');
						wp_enqueue_script('header-imp', get_stylesheet_directory_uri() . '/includes/header-imp.js', array('jquery'));
		
		}
		add_action('wp_enqueue_scripts', 'jq_enqueue');
}

?>