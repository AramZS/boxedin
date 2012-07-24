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
	//based from http://pastebin.com/XJD98sj9
		var logowidth = jQuery('.mainlogo').width();
	
		var addedlogowidth = logowidth + 10;
		jQuery('.top-head-menu').css("margin-left",addedlogowidth);
		jQuery('.subheader').css("margin-left",addedlogowidth);
		jQuery('.mainnav').css("margin-left",addedlogowidth);
		jQuery('.header-widget').css("margin-left",addedlogowidth);
		var underlapwidth = logowidth - 20;
		jQuery('.topborder').css("margin-left",underlapwidth);
		
		
    var children = jQuery('.topmostmenu .menu-item');
	
	var itemSpaceP = 0;
	var itemHeightP = 0;
	children.each(function(item){
		var widthP = (jQuery(this).width());
			widthP = parseInt(widthP);
		var plP = (jQuery(this).css('padding-left').replace('px',''));
			plP = parseInt(plP);
		var prP = (jQuery(this).css('paddingRight').replace('px',''));
			prP = parseInt(prP);
		var brP = (jQuery(this).css('border-right').replace('px',''));
			brP = parseInt(brP);
		var blP = (jQuery(this).css('border-left').replace('px',''));
			blP = parseInt(blP);			
		//alert( width+pl+pr+br+bl );
		itemSpaceP += (widthP+plP+prP+brP+blP);
		itemHeightP = jQuery(this).height();
		//alert(bl);
	});
	
 	var marginP = Math.floor((jQuery('.topmostmenu').width() - itemSpaceP) / (children.size())) + 4;
	//Why isn't marginP the entire value of the remaining space? I have no idea.
	//If you want the buttons to be smaller, just multiply marginP by .8 (for 80% of the available registering space)
	//Or whatever percentage you'd prefer. 
	var padding = (marginP)/2;
	//alert(padding);
 	children.each(function(item){
 		
   		
			$(this).css('padding-left', padding + 'px' );
			$(this).css('padding-right', padding + 'px' );
   		
	});
	
	
	var itemSpace = 0;
	var itemHeight = 0;
	children.each(function(item){
		var width = (jQuery(this).width());
			width = parseInt(width);
		var pl = (jQuery(this).css('padding-left').replace('px',''));
			pl = parseInt(pl);
		var pr = (jQuery(this).css('paddingRight').replace('px',''));
			pr = parseInt(pr);
		var br = (jQuery(this).css('border-right').replace('px',''));
			br = parseInt(br);
		var bl = (jQuery(this).css('border-left').replace('px',''));
			bl = parseInt(bl);			
		//alert( width+pl+pr+br+bl );
		itemSpace += (width+pl+pr+br+bl);
		itemHeight = jQuery(this).height();
		//alert(bl);
	});
	
 	var margin = Math.floor((jQuery('.topmostmenu').width() - itemSpace) / (children.size() - 1)) - 4;
	margin = margin;
	//alert(children.size());
 	children.each(function(item){
 		margin = margin;
   		if(item != 0) {
			$(this).css('margin-left', margin + 'px' );
   		}
	});
	
	var childrenC = jQuery('.header-widget-inner .header-cat-item');
	
	var itemSpaceC = 0;
	var itemHeightC = 0;
	childrenC.each(function(item){
		var widthC = (jQuery(this).width());
			widthC = parseInt(widthC);
		var plC = (jQuery(this).css('padding-left').replace('px',''));
			plC = parseInt(plC);
		var prC = (jQuery(this).css('paddingRight').replace('px',''));
			prC = parseInt(prC);
		var brC = (jQuery(this).css('border-right').replace('px',''));
			brC = parseInt(brC);
		var blC = (jQuery(this).css('border-left').replace('px',''));
			blC = parseInt(blC);			
		//alert( width+pl+pr+br+bl );
		itemSpaceC += (widthC+plC+prC+brC+blC);
		itemHeightC = jQuery(this).height();
		//alert(bl);
	});
	
 	var marginC = Math.floor((jQuery('.header-widget-inner').width() - itemSpaceC) / (childrenC.size() - 1)) - 4;
	marginC = marginC;
	//alert(children.size());
 	childrenC.each(function(item){
 		marginC = marginC;
   		if(item != 0) {
			$(this).css('margin-left', marginC + 'px' );
   		}
	});
	

});