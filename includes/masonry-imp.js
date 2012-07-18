jQuery(document).ready(function () {


  jQuery(function(){
    
    var container = jQuery('.post-box');
    
    container.infinitescroll({
      navSelector  : '#post-nav',    // selector for the paged navigation 
      nextSelector : '.post-previous a',  // selector for the NEXT link (to page 2)
      itemSelector : '.homearticles',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'No more pages to load.',
          img: 'http://i.imgur.com/6RMhx.gif'
        }
      }
    );
    
  });


});