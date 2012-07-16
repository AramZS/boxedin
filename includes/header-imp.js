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

});