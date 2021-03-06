<?php /* If there are no posts to display, such as an empty archive page */ 
$options = get_option('responsive_theme_options');
	global $excludeset;
	global $page;
	global $wp_query;
			
//print '$GLOBALS = ' . var_dump($GLOBALS, true) . "\n";	
$postperpage = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (is_home()) {
	if (($options['featuredh'] == 0)) {
		query_posts(array('post__not_in' => $excludeset, 'paged' => $paged, 'showposts' => $postperpage  ));
		
//		$args = array_merge($wp_query->query, array('post__not_in' => $excludeset  ));
//		query_posts($args);
	
	}
?>
<?php if (!have_posts()) : ?>
	<div class="notice">
		<p class="bottom"><?php _e('Sorry, no results were found.', 'reverie'); ?></p>
	</div>
	<?php get_search_form(); ?>	
<?php endif; ?>
<div class="posts-boxed">

<?php /* Start loop */ $count = 1; ?>
<?php while (have_posts()) : the_post(); ?>

		<?php 
			
			if ($count == 1) {
			
				echo '<div class="homearticles row">';
			
			}
		
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('four columns'); ?>>
			<div class="article-container">
				<div class="thumb articlewrap"><center>
					<a href="<?php the_permalink(); ?>"><?php 
						if (has_post_thumbnail()){
												
							the_post_thumbnail('article-thumb');
												
						} ?>
					</a>
				</center></div>
				<header class="articlewrap">
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<div class="meta">
						<?php 
							echo '<span class="byline author vcard">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('id')) .'" rel="author" class="fn">'. get_the_author() .'</a></span>' . ' on ' . '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('%s, %s.', 'reverie'), get_the_time('F j, Y'), get_the_time()) .'</time>';
						?>
					</div>
				</header>
				<div class="entry-content articlewrap">
					<div class="excerptwrap"><?php
					//Add some filters here to change the excerpt as needed
	//				remove_filter('get_the_excerpt', 'wp_trim_excerpt');
					add_filter('get_the_excerpt', 'zs_killer_shorter_excerpt');
					the_excerpt();
					remove_filter('get_the_excerpt', 'zs_killer_shorter_excerpt');
	//				add_filter('get_the_excerpt', 'wp_trim_excerpt');
					?></div>
					
				<div class="clear"></div>	
				</div>
				<footer class="articlewrap">

					<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p class="taggraf"><?php the_tags('<span class="taggedwith">#</span>'); ?></p><?php } ?>
				</footer>
			</div>
		</article>	
	<?php 

			if ((($count % 3) == 0) && ($count != 1)){
			
				echo '</div><div class="row homearticles">';
			
			}

		$count++;



endwhile; // End the loop 
			

wp_reset_query();
if (($count % 3) != 0) {
	
	echo '</div>';
	
}



?>
</div>
<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav id="post-nav">
		<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
		<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
	</nav>
<?php endif; 

} 

else {

?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) : ?>
	<div class="notice">
		<p class="bottom"><?php _e('Sorry, no results were found.', 'reverie'); ?></p>
	</div>
	<?php get_search_form(); ?>	
<?php endif; ?>

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php reverie_entry_meta(); ?>
		</header>
		<div class="entry-content">
	<?php if (is_archive() || is_search()) : // Only display excerpts for archives and search ?>
		<?php the_excerpt(); ?>
	<?php else : ?>
		<?php the_content('Continue reading...'); ?>
	<?php endif; ?>
		</div>
		<footer>
			<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
		</footer>
		<div class="divider"></div>
	</article>	
<?php endwhile; // End the loop ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav id="post-nav">
		<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
		<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
	</nav>
<?php endif; 
}
?>
