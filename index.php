<?php get_header(); ?>
<?php
	if (is_home()) {
?>
		
		<!-- Row for main content area -->
		<div id="content" class="twelve columns" role="main">
	
			<div class="post-box">
				<?php 
				get_template_part('loop', 'index');				
				?>
			</div>
			
		</div><!-- End Content row -->
	
	<?php } else { ?>

		<!-- Row for main content area -->
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<?php get_template_part('loop', 'index'); ?>
			</div>

		</div><!-- End Content row -->
		
		<?php
			get_sidebar(); 
		}
		?>
	</div>
<?php get_footer(); ?>