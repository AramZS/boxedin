<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<?php $options = get_option('responsive_theme_options'); ?>
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title(''); ?></title>
	
	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<!-- Included Foundation CSS Files -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
	<![endif]-->
	
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo $options['favicon']; ?>">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	
	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $options['favicon_med']; ?>" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $options['favicon_large']; ?>" />
	<link rel="apple-touch-icon" href="<?php echo $options['site_logo']; ?>" />
	
	<!-- Enable Startup Image for iOS Home Screen Web App -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

	<!-- Startup Image iPad Landscape (748x1024) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
	<!-- Startup Image iPad Portrait (768x1004) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
	<!-- Startup Image iPhone (320x460) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />
	
	<!-- If jQuery already load, remove the line -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.foundation.js"></script>
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<!-- Start the main container -->
	<div id="container" class="container" role="document">
		
		<!-- Row for blog navigation -->
		<div class="row">
			<header class="twelve columns" role="banner">
				<div class="reverie-header">
					
					<div id="logobox">
						<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name') ?>">
							<img class="mainlogo" src="<?php echo $options['site_logo']; ?>" <?php if (isset($options['site_logo_w'])){ echo 'width="' . $options['site_logo_w'] . 'px"'; }  if (isset($options['site_logo_w'])){ echo 'height="' . $options['site_logo_h'] . 'px"'; } echo 'alt="' . get_bloginfo('name') . '"'; ?>>
						</a>
					</div>
					
					<nav class="top-head-menu">
						<?php /*
							You can use Foundation Tabs to get a better responsive design.
							Our navigation menu. If one isn't filled out, wp_nav_menu falls
							back to wp_page_menu. The menu assigned to the primary position is
							the one used. If none is assigned, the menu with the lowest ID is
							used. */
							
							wp_nav_menu( array(
							'theme_location' => 'topmost_menu',
							'container' =>false,
							'menu_class' => '',
							'echo' => true,
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'depth' => 0,
							'items_wrap' => '<dl class="topmostmenu">%3$s</dl>',
							'walker' => new description_walker())
						); ?>
					</nav>
					
					<?php if($options['site_descrip'] == 0){ ?>
						<h4 class="subheader"><?php bloginfo('description'); ?></h4>
					<?php } ?>
					<div class="topborder"></div>
				</div>
				<nav role="navigation" class="mainnav">
					<?php /*
						You can use Foundation Tabs to get a better responsive design.
					    Our navigation menu. If one isn't filled out, wp_nav_menu falls
					    back to wp_page_menu. The menu assigned to the primary position is
					    the one used. If none is assigned, the menu with the lowest ID is
					    used. */
						
					    wp_nav_menu( array(
						'theme_location' => 'primary_navigation',
						'container' =>false,
						'menu_class' => '',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 1,
						'items_wrap' => '<dl class="nav hide-on-phones">%3$s</dl>',
						'walker' => new description_walker())
					); ?>
				</nav>
			</header>
		</div>
		
			<!--- Item top -->
			
			
		<?php if ((is_home()) && ($options['featuredh'] == 0) && (!(is_paged()))) { 
		

			$featCatOne = $options['featCatOne'];
			$featCatTwo = $options['featCatTwo'];
			$featCatThree = $options['featCatThree'];
			$featCatFour = $options['featCatFour'];
			$offset = 0;
			global $excludeset;
			$excludeset = array();
			
		
		?>
			<div class="row toparea featbox">
			
				<div class="two columns topfarleft featboxs">
				
					<div class="row topwidgetbox">
						
						<div class="twelve columns topwidget article">
							<?php
							
								if (is_cat_option_set($featCatOne)) {
								
									$featureQueryOne = new WP_Query( array('cat' => $featCatOne, 'showposts' => 1 ) );
								
								} else {
									$offset++;
									$featureQueryOne = new WP_Query( array('offset' => $offset, 'showposts' => 1 ) );
								
								}
								
								
								while ( $featureQueryOne->have_posts() ) : $featureQueryOne->the_post();
								
									?>
									<div class="topthumb">
										<a href="<?php the_permalink(); ?>"><?php 
										if (has_post_thumbnail()){
											
											the_post_thumbnail('square-thumb');
											
										} ?></a>
									</div>
									<div class="clear"></div>	
									<div class="topmeta">
										<?php
										echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s, %s.', 'reverie'), get_the_time('F j, Y'), get_the_time()) .'</time>';
										?>
									</div>									
									<div class="toptitle">
										<h4><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
									</div>
									<div class="topexcerpt">
										<?php
										//Add some filters here to change the excerpt as needed
										add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
										the_excerpt();
										remove_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
										?>
									</div>
									<div class="clear"></div>	
								
								<?php
								$excludeset[] = get_the_ID();
								endwhile;
								wp_reset_postdata();
								wp_reset_query();
							
							?>
						</div>
						
					</div>
					<div class="row topwidgetbox">
					
						<div class="twelve columns topwidget">
							<?php dynamic_sidebar("Home Header Far Left"); ?>
						
						</div>
						<div class="clear"></div>	
					</div>
					
				</div>
				<div class="six columns topleft featboxs">
				
					<div class="row topwidgetbox">
						
						<div class="twelve columns topwidget article">
							<?php
								if (is_cat_option_set($featCatTwo)) {
									
									$featureQueryTwo = new WP_Query( array('cat' => $featCatTwo, 'showposts' => 1, 'post__not_in' => $excludeset ) );
								
								} else {							
									$featureQueryTwo = new WP_Query( array('showposts' => 1) );
								}
								while ( $featureQueryTwo->have_posts() ) : $featureQueryTwo->the_post();
									?>
									<div class="toptitle">
										<h2 class="maintitle"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
									</div>									
									<div class="topthumb">
										<a href="<?php the_permalink(); ?>"><?php 
										if (has_post_thumbnail()){
											
											the_post_thumbnail('horizontal-thumb');
											
										} ?></a>
									</div>
									<div class="clear"></div>	
									<div class="topmeta">
										<?php
										echo '<span class="byline author vcard">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('id')) .'" rel="author" class="fn">'. get_the_author() .'</a></span>' . ' on ' . '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s, %s.', 'reverie'), get_the_time('F j, Y'), get_the_time()) .'</time>';
										?>
									</div>		
									<div class="topexcerpt">
										<?php
										//Add some filters here to change the excerpt as needed
										remove_filter('get_the_excerpt', 'wp_trim_excerpt');
										add_filter('get_the_excerpt', 'zs_killer_excerpt');
										the_excerpt();
										remove_filter('get_the_excerpt', 'zs_killer_excerpt');
										add_filter('get_the_excerpt', 'wp_trim_excerpt');
										?>
										<p class="readmoregraf"><a href="<?php the_permalink(); ?>">Read More from <?php the_title(); ?></a></p><!-- Excerpt -->
										<div class="clear"></div>	
									</div> 
									<div class="clear"></div>	
									<?php
								$excludeset[] = get_the_ID();	
								endwhile;
								wp_reset_postdata();
								wp_reset_query();
							?>
						</div>
						
					</div>
					<div class="clear"></div>	
				</div>
				<div class="two columns topright featboxs">
				
					<div class="row topwidgetbox">
						
						<div class="twelve columns topwidget article">
							<?php
								if (is_cat_option_set($featCatThree)) {
								
									$featureQueryThree = new WP_Query( array('cat' => $featCatThree, 'showposts' => 1, 'post__not_in' => $excludeset ) );
								
								} else {	
									$offset++;
									$featureQueryThree = new WP_Query( array('showposts' => 1, 'offset' => $offset) );
								
								}
								while ( $featureQueryThree->have_posts() ) : $featureQueryThree->the_post();
								
									?>
									<div class="topthumb">
										<a href="<?php the_permalink(); ?>"><?php 
										if (has_post_thumbnail()){
											
											the_post_thumbnail('square-thumb');
											
										} ?></a>
									</div>
									<div class="clear"></div>	
									<div class="topmeta">
										<?php
										echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s, %s.', 'reverie'), get_the_time('F j, Y'), get_the_time()) .'</time>';
										?>
									</div>											
									<div class="toptitle">
										<h4><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
									</div>
									<div class="topexcerpt">
										<?php
										//Add some filters here to change the excerpt as needed
										add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
										the_excerpt();
										remove_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
										?>
									</div>
									<div class="clear"></div>	
									<?php
								$excludeset[] = get_the_ID();
								endwhile;
								wp_reset_postdata();
								wp_reset_query();							
							?>
						</div>
						
					</div>
					<div class="row topwidgetbox">
					
						<div class="twelve columns topwidget">
							<?php dynamic_sidebar("Home Header Right"); ?>
						</div>
						<div class="clear"></div>	
					</div>				
				
				</div>
				<div class="two columns topfarright featboxs">
				
					<div class="row topwidgetbox">
						
						<div class="twelve columns topwidget article">
							<?php
								if (is_cat_option_set($featCatFour)) {
								
									$featureQueryFour = new WP_Query( array('cat' => $featCatFour, 'showposts' => 1, 'post__not_in' => $excludeset ) );
								
								} else {	
									$offset++;							
									$featureQueryFour = new WP_Query( array('showposts' => 1, 'offset' => $offset ) );
								}
								while ( $featureQueryFour->have_posts() ) : $featureQueryFour->the_post();
								
									?>
									<div class="topthumb">
										<a href="<?php the_permalink(); ?>"><?php 
										if (has_post_thumbnail()){
											
											the_post_thumbnail('square-thumb');
											
										} ?></a>
									</div>
									<div class="clear"></div>	
									<div class="topmeta">
										<?php
										echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s, %s.', 'reverie'), get_the_time('F j, Y'), get_the_time()) .'</time>';
										?>
									</div>											
									<div class="toptitle">
										<h4><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
									</div>
									<div class="topexcerpt">
										<?php
										//Add some filters here to change the excerpt as needed
										add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
										the_excerpt();
										remove_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
										?>
									</div> 
									<div class="clear"></div>	
									<?php
								$excludeset[] = get_the_ID();
								endwhile;
								wp_reset_postdata();
								wp_reset_query();							
							?>
						</div>
						
					</div>
					<div class="row topwidgetbox">
					
						<div class="twelve columns topwidget">
							<?php dynamic_sidebar("Home Header Far Right"); ?>
						</div>
						<div class="clear"></div>	
					</div>				
					
				</div>
			
			</div>
		<?php }
		
			//One day I will replace this with sweet sweet AJAX.
			//That day is not today. 
		
		if ((is_home()) && ($options['featuredh'] == 0) && ((is_paged()))) {
		
			$featCatOne = $options['featCatOne'];
			$featCatTwo = $options['featCatTwo'];
			$featCatThree = $options['featCatThree'];
			$featCatFour = $options['featCatFour'];
			$offset = 0;
			global $excludeset;
			$excludeset = array();
		
								if (is_cat_option_set($featCatOne)) {
								
									$featureQueryOne = new WP_Query( array('cat' => $featCatOne, 'showposts' => 1 ) );
								
								} else {
									$offset++;
									$featureQueryOne = new WP_Query( array('offset' => $offset, 'showposts' => 1 ) );
								
								}
								
								
								while ( $featureQueryOne->have_posts() ) : $featureQueryOne->the_post();
								
								$excludeset[] = get_the_ID();
								
								endwhile;
								wp_reset_postdata();
								wp_reset_query();
								if (is_cat_option_set($featCatTwo)) {
								
									$featureQueryTwo = new WP_Query( array('cat' => $featCatTwo, 'showposts' => 1 ) );
								
								} else {
									$offset++;
									$featureQueryTwo = new WP_Query( array('offset' => $offset, 'showposts' => 1 ) );
								
								}
								
								
								while ( $featureQueryTwo->have_posts() ) : $featureQueryTwo->the_post();
								
								$excludeset[] = get_the_ID();
								
								endwhile;
								wp_reset_postdata();
								wp_reset_query();
								if (is_cat_option_set($featCatThree)) {
								
									$featureQueryThree = new WP_Query( array('cat' => $featCatThree, 'showposts' => 1 ) );
								
								} else {
									$offset++;
									$featureQueryThree = new WP_Query( array('offset' => $offset, 'showposts' => 1 ) );
								
								}
								
								
								while ( $featureQueryThree->have_posts() ) : $featureQueryThree->the_post();
								
								$excludeset[] = get_the_ID();
								
								endwhile;
								wp_reset_postdata();
								wp_reset_query();
								if (is_cat_option_set($featCatFour)) {
								
									$featureQueryFour = new WP_Query( array('cat' => $featCatFour, 'showposts' => 1 ) );
								
								} else {
									$offset++;
									$featureQueryFour = new WP_Query( array('offset' => $offset, 'showposts' => 1 ) );
								
								}
								
								
								while ( $featureQueryFour->have_posts() ) : $featureQueryFour->the_post();
								
								$excludeset[] = get_the_ID();
								
								endwhile;
								wp_reset_postdata();
								wp_reset_query();								
		
		
		}
		
		
		?>
				<!-- Row for main content area -->
		<div id="main" class="row">