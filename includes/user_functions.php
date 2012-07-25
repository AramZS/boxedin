<?php

function extra_menu_setup() {

	register_nav_menu( 'topmost_menu', 'Topmost Menu'	);	
}
add_action('after_setup_theme', 'extra_menu_setup');

//Via http://www.wpbeginner.com/wp-themes/how-to-add-facebook-open-graph-meta-data-in-wordpress-themes/
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		//This takes the standard output used for notifying browsers what language your page is in
		// and adds in the Facebook tags, since all that info goes into the HTML tag. 
		return $output . ' xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

$sidebars = array('Home Header Far Left', 'Home Header Right', 'Home Header Far Right');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row topwidgets widget %2$s"><div class="sidebar-section twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

register_sidebar(array('name'=> 'Header Widget',
		'id' => 'header-widget',
		'description' => 'Widget space in the header, good for candidate verticals. Fill with linked images. Do not use title. Max height: 136px.',
		'before_widget' => '<div class="header-inner-widget">',
		'after_widget' => '</div>',
		'before_title' => '<span class="none">',
		'after_title' => '</span>'
));

require ( get_template_directory() . '/includes/theme-options.php' );
require ( get_template_directory() . '/includes/youtubemetabox.php' );

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



function zs_show_youtube_link( $youtubelink ) {

	
//	$wp_embed = new WP_Embed();
//	$post_embed = $wp_embed->run_shortcode('[embed]$ytlink[/embed]');
//	echo do_shortcode('[youtube="http://www.youtube.com/watch?v=bDOYN-6gdRE"]');
	
//	$embeder = '[embed]http://www.youtube.com/watch?v=bDOYN-6gdRE[/embed]';
//	$embed = apply_filters('the_content', $embeder);

	$embed = '<object><param name="movie" value="http://www.youtube.com/v/';
	$embed .= $youtubelink;
	$embed .= '?version=3&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/';
	$embed .= $youtubelink;
	$embed .= '?version=3&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true"></embed></object>';
	return $embed;


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
				wp_enqueue_script('header-imp', get_stylesheet_directory_uri() . '/includes/header-imp.js', array('fitvid'));
				wp_enqueue_script('infiniscroll', get_stylesheet_directory_uri() . '/js/jquery.infinitescroll.js', array('jquery'));
				wp_enqueue_script('scrollimp', get_stylesheet_directory_uri() . '/includes/scroll-imp.js', array('infiniscroll'));
				wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/bootstrap.js', array('jquery'));
				wp_enqueue_script('fitvid', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array('jquery'));
				
		}

		add_action('wp_enqueue_scripts', 'jq_setup');
	} else {
			
		
		function jq_enqueue() {
		
						wp_dequeue_script( 'jquery' );
						wp_deregister_script( 'jquery' );
						wp_register_script('jquery', 'http://code.jquery.com/jquery-latest.min.js', '', '1.7.2');
						wp_enqueue_script('jquery');
						wp_enqueue_script('header-imp', get_stylesheet_directory_uri() . '/includes/header-imp.js', array('fitvid'));
						wp_enqueue_script('infiniscroll', get_stylesheet_directory_uri() . '/js/jquery.infinitescroll.js', array('jquery'));
						wp_enqueue_script('scrollimp', get_stylesheet_directory_uri() . '/includes/scroll-imp.js', array('infiniscroll'));
						wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/bootstrap.js', array('jquery'));
						wp_enqueue_script('fitvid', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array('jquery'));
						
		}
		add_action('wp_enqueue_scripts', 'jq_enqueue');
}

function ajaxery() {


	
}
add_action('wp_footer', 'ajaxery');

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

function user_gen_css() {
?>
	<style type="text/css" media="screen">
		<?php
		
		
		
		?>
	</style>
<?php
}
add_action('wp_head', 'user_gen_css');


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
		$excerpt_length = 300; 
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

function is_cat_option_set($catoption) {

	$default_cat = get_option('default_category');
	if (($catoption != $default_cat) && ($catoption != '') && ($catoption > 0)) {
	
		return TRUE;
	
	} else {
	
		return FALSE;
	
	}

}
function store_post_IDs($postID, $thearray) {

	$thearray[] = $postID;
	return $thearray;
	

} 


?>