
 
	//http://imakewebthings.com/jquery-waypoints/#documentation
	jQuery('.pusher').waypoint(function() {
		
		var fromzshomeposts = fromzshomeposts + ',' + homepostsjs;
		var tozshomeposts = '<?php $fromjshomeposts = "' + fromzshomeposts + '"; ?>';
		jQuery('.pushed').append(tozshomeposts);
	});
	
	<script src="<?php echo get_stylesheet_directory_uri() . '/js/page-wrangler.js'; ?>"></script>
<div class="pusher"></div>
<?php

				$zshomeposts = array();
				global $zshomeposts;
				
				
				echo $fromjshomeposts;
				
				
				$receivedHomePosts = explode(",",$fromjshomeposts);
				$zshomeposts = $receivedHomePosts;
?>

		$zshomeposts[] = get_the_ID();
		print_r($zshomeposts);
		
	echo '<div class="pushed">';
	
				$tozshomeposts = implode(",",$zshomeposts);
				echo '<script type="text/javascript"> var homepostsjs = "0'. $tozshomeposts . '"; </script>';
	echo '</div>';