<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
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
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	
	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/devices/reverie-icon.png" />
	
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
					<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
					<h4 class="subheader"><?php bloginfo('description'); ?></h4>
				</div>
				<nav role="navigation">
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
						'depth' => 0,
						'items_wrap' => '<dl class="nav hide-on-phones"><dt>Blog Menu:</dt>%3$s</dl>',
						'walker' => new description_walker())
					); ?>
				</nav>
			</header>
		</div>
		
		<!-- Row for main content area -->
		<div id="main" class="row">
		
			<!--- Item top -->
			
			
			
			<div class="row toparea">
			
				<div class="two columns topfarleft">
				
					<div class="row topwidgetbox">
						
						<div class="twelve columns topwidget">
							<?php
							
								$featureQueryOne = new WP_Query( array('offset' => 1, 'cat' => 4, 'posts_per_page' => 1 ) );
								
								while ( $featureQueryOne->have_posts() ) : $featureQueryOne->the_post();
								
									?><div class="toptitle">
										<h2><?php echo the_title(); ?></h2>
									</div>
									<div class="topthumb">
										<?php 
										if (has_post_thumbnail()){
											
											the_post_thumbnail();
											
										} ?>
									</div>
									<div class="topexcerpt">
										<?php
										//Add some filters here to change the excerpt as needed
										the_excerpt();
										?>
									</div>
								
								
								endwhile;
							
							?>
						</div>
						
					</div>
					<div class="row topwidgetbox">
					
						<div class="twelve columns topwidget">
							<?php dynamic_sidebar("Home Header Far Left"); ?>
						</div>
					
					</div>
				
				</div>
				<div class="six columns topleft">
				
					<div class="row topwidgetbox">
						
						<div class="twelve columns topwidget">
							<?php
							
								$featureQueryTwo = new WP_Query( array( 'cat' => 4 ) );
								
								while ( $featureQueryTwo->have_posts() ) : $featureQueryTwo->the_post();
								
									echo the_title();
								
								endwhile;
							
							?>
						</div>
						
					</div>
					<div class="row topwidgetbox">
					
						<div class="twelve columns topwidget">
							<?php dynamic_sidebar("Home Header Far Left"); ?>
						</div>
					
					</div>
				
				</div>
				<div class="two columns topright">
				
					<div class="row topwidgetbox">
						
						<div class="twelve columns topwidget">
							<?php
							
								$featureQueryThree = new WP_Query( array('offset' => 2, 'cat' => 4 ) );
								
								while ( $featureQueryThree->have_posts() ) : $featureQueryThree->the_post();
								
									echo the_title();
								
								endwhile;
							
							?>
						</div>
						
					</div>
					<div class="row topwidgetbox">
					
						<div class="twelve columns topwidget">
							<?php dynamic_sidebar("Home Header Far Left"); ?>
						</div>
					
					</div>				
				
				</div>
				<div class="two columns topfarright">
				
					<div class="row topwidgetbox">
						
						<div class="twelve columns topwidget">
							<?php
							
								$featureQueryFour = new WP_Query( array('offset' => 3, 'cat' => 4 ) );
								
								while ( $featureQueryFour->have_posts() ) : $featureQueryFour->the_post();
								
									echo the_title();
								
								endwhile;
							
							?>
						</div>
						
					</div>
					<div class="row topwidgetbox">
					
						<div class="twelve columns topwidget">
							<?php dynamic_sidebar("Home Header Far Left"); ?>
						</div>
					
					</div>				
				
				</div>
			
			</div>
			