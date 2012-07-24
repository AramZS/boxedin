<?php

//Based on code at http://wefunction.com/2008/10/tutorial-creating-custom-write-panels-in-wordpress/

$yt_link_new_meta_box =
	array(
		"youtubelink" => array(
		
			"name" => "youtubelink",
			"std" => "",
			"description" => "Add YouTube video ID (the part between 'v=' and '&'."
			)
	);

function yt_link_new_meta_boxes() {

	global $post, $yt_link_new_meta_box;
	foreach($yt_link_new_meta_box as $meta_box){
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
		
		if($meta_box_value == ""){
			$meta_box_value=$meta_box['std'];
		}
	

		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		echo'<p><input type="text" name="'.$meta_box['name'].'" value="'.$meta_box_value.'" size="80" /><br />';
		echo'<label for="'.$meta_box['name'].'">'.$meta_box['description'].'</label></p>';
		
	}
}

function yt_link_create_meta_box() {
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'yt_link_new_meta_box', 'Featured YouTube Video', 'yt_link_new_meta_boxes', 'post', 'normal', 'high' );
	}
}

function yt_link_save_postdata( $post_id ) {
	global $post, $yt_link_new_meta_box;

	foreach($yt_link_new_meta_box as $meta_box) {
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}

		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ))
			return $post_id;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		}

		$data = $_POST[$meta_box['name']];

		if(get_post_meta($post_id, $meta_box['name']) == "")
			add_post_meta($post_id, $meta_box['name'], $data, true);
		elseif($data != get_post_meta($post_id, $meta_box['name'], true))
			update_post_meta($post_id, $meta_box['name'], $data);
		elseif($data == "")
		delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
	}
}
add_action('admin_menu', 'yt_link_create_meta_box');
add_action('save_post', 'yt_link_save_postdata');

?>