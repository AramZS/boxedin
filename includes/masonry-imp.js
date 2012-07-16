jQuery(document).ready(function () {


  jQuery(function(){
    
    var container = jQuery('#container');
    
    container.imagesLoaded(function(){
      container.masonry({
        itemSelector: '.box',
        columnWidth: 100
      });
    });
    
    container.infinitescroll({
      navSelector  : '#post-nav',    // selector for the paged navigation 
      nextSelector : '.post-next a',  // selector for the NEXT link (to page 2)
      itemSelector : '.box',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'No more pages to load.',
          img: 'http://i.imgur.com/6RMhx.gif'
        }
      },
      // trigger Masonry as a callback
      function( newElements ) {
        // hide new items while they are loading
        var newElems = jQuery( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        newElems.imagesLoaded(function(){
          // show elems now they're ready
          newElems.animate({ opacity: 1 });
          container.masonry( 'appended', newElems, true ); 
        });
      }
    );
    
  });


});