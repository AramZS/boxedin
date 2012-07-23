jQuery(document).ready(function () {

 
    var container = jQuery('.post-box');
    
    container.infinitescroll({
      navSelector  : '#post-nav',    // selector for the paged navigation 
      nextSelector : '.post-previous a',  // selector for the NEXT link (to page 2)
      itemSelector : '.posts-boxed',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'No more pages to load.',
          img: 'wp-content/themes/boxedin/images/ajax-loader.gif'
        }
      }
    
	
	);
	


});