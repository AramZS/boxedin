<aside id="sidebar" class="four columns" role="complementary">
<?php if (is_single()) { ?>		
		<div id="sidebar-top-container" class="aside main-aside">

			<div id="sharebox" class="row">
					<div class="social-centerer row">
						<div class="twelve columns">
							<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" show_faces="false" width="290" action="recommend" font=""></fb:like>
						</div>
					</div>
					<br />
					<div class="social-centerer row">
						<div class="stumble-button socialtab four columns">
							<script src="http://www.stumbleupon.com/hostedbadge.php?s=2"></script>
						</div>
						
						<div class="plus-button socialtab four columns">
							<g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone>
						</div>
					
						<div class="facebook-button socialtab four columns">
							<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="nitemaremodenet">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
						</div>
					</div>
			</div>	

				<?php
					global $post;
					$post_id = $post;
					$authpostid = $post->ID;
					$getauthorid = $post->post_author;
					
					$authorquery = new WP_Query( array ( 'author' => $getauthorid, 'posts_per_page' => 1, 'post__not_in' => array( $authpostid ),  'post_type' => array( 'post' ) ) );
					while ( $authorquery->have_posts() ) : $authorquery->the_post();
					
						?>
			
			<div id="bonusbox" class="row">
						
						<div id="bonuscontainer" class="twelve columns">
						
							<h5>More by <a href="<?php echo get_site_url(); ?>/author/<?php the_author_meta('user_nicename'); ?>/" rel="author" alt="<?php the_author(); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></h5>
						
							<a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark" alt="<?php the_title_attribute(); ?>">	<div class="bonustable">
							<table class="navzero">
							<tbody class="navzero">
							<tr class="navzero">
								<td class="navzero" valign="top">
									<h4><span><a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark" alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span></h4>
								</td>
								<td class="navzero" valign="top">
									<div id="bonuscontent">
										<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
											<?php the_post_thumbnail( 'square-thumb' ); ?>
										</a>
										<?php } else { ?>
										
										<?php } ?> <!-- Thumbnail -->
									</div>
								</td>
							</tr>
							</tbody>
							</table>
							</div></a>
							<div id="bonuscomments">
								<span><?php comments_popup_link( 'No comments yet.', 'One comment', '% comments', 'comments-link', 'Responses are off for this post'); ?></span>
							</div>
						</div>
						

				
			</div>
			
						<?php
						
						
					endwhile;
					wp_reset_query();
					wp_reset_postdata();
				
				?>
			
	</div>
	<?php } ?>
	<div class="sidebar-box">
		<?php dynamic_sidebar("Sidebar"); ?>
	</div>
</aside><!-- /#sidebar -->