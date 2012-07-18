jQuery(document).ready(function () {

	var slideHeight = 0;
	//Figure out the height of the nav and add to total height?
	jQuery('.featboxs').each(function (i) {
		var checkheight = jQuery(this).height();
		if (checkheight > slideHeight) { 
			slideHeight = checkheight; 
		}
					
	});	
	jQuery('.featboxs').each(function (i) {
	
		jQuery(this).height(slideHeight); 
	
	});
	var btncounter = 0;
	jQuery('.topmostmenu .menu-item').each(function (i) {
		btncounter++;
		jQuery(this).addClass("btn " + "btn-" + topmostmenuSize); 
			if(btncounter == 1) {
				jQuery(this).addClass("btn-" + topmostmenuOne); 
			}
			if(btncounter == 2) {
				jQuery(this).addClass("btn-" + topmostmenuTwo);  
			}
			if(btncounter > 2) {
				jQuery(this).addClass("btn-" + topmostmenuThree);  
			}
	});	
	
		var logowidth = jQuery('.mainlogo').width();
	
		var addedlogowidth = logowidth + 10;
		jQuery('.top-head-menu').css("margin-left",addedlogowidth);
		
		
    var children = $('.topmostmenu .menu-item');
	var itemSpace = 0;
	var itemHeight = 0;
	children.each(function(item){
		itemSpace += $(this).width();
		itemHeight = $(this).height();
	});
 	var margin = Math.floor(($('.topmostmenu').width() - itemSpace) / (children.size() - 1)) - 2;
 	children.each(function(item){
 		margin = margin - addedlogowidth;
   		if(item != 0) {
			$(this).css('margin-left', margin + 'px' );
   		}
	});
	

});