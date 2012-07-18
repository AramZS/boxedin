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
			if(btncounter = 1) {
				jQuery(this).addClass("btn-" + topmostmenuOne); 
			}
			if(btncounter = 2) {
				jQuery(this).addClass("btn-" + topmostmenuTwo);  
			}
			if(btncounter > 2) {
				jQuery(this).addClass("btn-" + topmostmenuThree);  
			}
	});	
	
		var logowidth = jQuery('.mainlogo').width();
	
		var addedlogowidth = logowidth + 10;
		jQuery('.top-head-menu').css("margin-left",addedlogowidth);
	

});