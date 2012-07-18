<?php

function extra_menu_setup() {

	register_nav_menu( 'topmost_menu', 'Topmost Menu'	);	
}
add_action('after_setup_theme', 'extra_menu_setup');

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

function jsvar_setup() {	
            $options = get_option('responsive_theme_options');
			$topmostsize = $options['btn_size'];
			$topmostone = $options['cta_color_one'];
			$topmosttwo = $options['cta_color_two'];
			$topmostthree = $options['cta_color_three'];
			?>
			<script type="text/javascript">
			/* <![CDATA[ */
			var topmostmenuSize = '<?php echo $topmostsize; ?>';
			var topmostmenuOne = '<?php echo $topmostone; ?>';
			var topmostmenuTwo = '<?php echo $topmosttwo; ?>';
			var topmostmenuThree = '<?php echo $topmostthree; ?>';
			/* ]]> */
			</script>
			<?php
}
			
add_action('wp_head', 'jsvar_setup', 2);

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'square-thumb', 800, 800, true );
	add_image_size( 'horizontal-thumb', 800, 600, true ); 
	add_image_size( 'article-thumb', 800, 400, true );
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
				wp_enqueue_script('infiniscroll', get_stylesheet_directory_uri() . '/js/jquery.infinitescroll.js', array('jquery'));
				wp_enqueue_script('scrollimp', get_stylesheet_directory_uri() . '/includes/scroll-imp.js', array('infiniscroll'));
				wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/bootstrap.js', array('jquery'));

		}

		add_action('wp_enqueue_scripts', 'jq_setup');
	} else {
			
		
		function jq_enqueue() {
		
						wp_dequeue_script( 'jquery' );
						wp_deregister_script( 'jquery' );
						wp_register_script('jquery', 'http://code.jquery.com/jquery-latest.min.js', '', '1.7.2');
						wp_enqueue_script('jquery');
						wp_enqueue_script('header-imp', get_stylesheet_directory_uri() . '/includes/header-imp.js', array('jquery'));
						wp_enqueue_script('infiniscroll', get_stylesheet_directory_uri() . '/js/jquery.infinitescroll.js', array('jquery'));
						wp_enqueue_script('scrollimp', get_stylesheet_directory_uri() . '/includes/scroll-imp.js', array('infiniscroll'));
						wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/bootstrap.js', array('jquery'));
						
		}
		add_action('wp_enqueue_scripts', 'jq_enqueue');
}

function font_setup() {	
			?>
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
				
					
			<?php
}
			
add_action('wp_head', 'font_setup');

function bootstrap_css() {
?>
	<link href='<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/bootstrap.css' rel='stylesheet' type='text/css'>
<!--	<link href='<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/bootstrap-responsive.css' rel='stylesheet' type='text/css'> -->
<?php
}
add_action('wp_head', 'bootstrap_css');

include ('htmlchecker.php');

function zs_killer_excerpt( $text ) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<p> <strong> <bold> <i> <em> <emphasis> <del> <h1> <h2> <h3> <h4> <h5> <a>');
		$excerpt_length = 250; //Would prefer a char count. Not sure how to do it. 
		$words = explode(' ', $text, $excerpt_length + 1);
//		if (count($words)> $excerpt_length) {
//		  array_pop($words);
//		  array_push($words, '...');
//		  $text = implode(' ', $words);
//		}
		//via http://wordpress.org/support/topic/limit-excerpt-length-by-characters
		$text = substr($text, 0, 910);
		$text = substr($text, 0, strripos($text, " "));
		$text = trim(preg_replace( '/\s+/', ' ', $text));
		$text .= '...';
	}

	$text = closetags($text);
	
return $text;
}

function zs_killer_shorter_excerpt( $text ) {
	global $post;
//	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<strong> <bold> <i> <em> <emphasis> <del> <h1> <h2> <h3> <h4> <h5> <a>');
		$excerpt_length = 300; //Would prefer a char count. Not sure how to do it. 
		$words = explode(' ', $text, $excerpt_length + 1);
//		if (count($words)> $excerpt_length) {
//		  array_pop($words);
//		  array_push($words, '...');
//		  $text = implode(' ', $words);
//		}
		//via http://wordpress.org/support/topic/limit-excerpt-length-by-characters
		if ((strlen($text)) > 160){ 
			$text = substr($text, 0, 160);
			$text = substr($text, 0, strripos($text, " "));	
		}
		$text = trim(preg_replace( '/\s+/', ' ', $text));
		$text .= '...';
//	}

	$text = closetags($text);
	
return $text;
}



?>