// JavaScript Document


jQuery(document).ready(function(jQuery){
"use strict";
//  Settings Panel 
	jQuery('.open-buttton').click(function(){
	
		if(jQuery('.open-buttton').hasClass('closed')){
			jQuery(this).parent('.settings-panel').stop().animate({left:225},400);
			jQuery(this).removeClass('closed').addClass('opened');
		} else {
			jQuery(this).parent('.settings-panel').stop().animate({left:0},400);
			jQuery(this).removeClass('opened').addClass('closed');
		}
	});


// Bacground Patterns and Background Colour 
	
jQuery('.settings-panel .bg_patterns ul li').click(function(){
		var thisBGimg = jQuery(this).css('background-image');
		jQuery('body').css('background-image', thisBGimg);
		jQuery('body').css('background-repeat', "repeat");
	});

jQuery('.color').click(function(){
		var thisBGcol = jQuery(this).css('background-color');
		jQuery('body').css('background-color', thisBGcol);
	});
	
		jQuery('.settings-panel .card_patterns ul li').click(function(){
		var thisBGcol = jQuery(this).css('background-color');
		var thisBGimg = jQuery(this).css('background-image');
		jQuery('.content_pat_bg').css('background-image', thisBGimg);
		jQuery('.content_pat_bg').css('background-color', thisBGcol);
	});
	
		 jQuery("ul.c_patterns li").click(function () {
			 var myClass = jQuery(this).attr("class");
			if(myClass == 'default'){
			jQuery('#color').attr('href','style.html');
					jQuery("#logo").attr("src","assets/images/logo.html");
		}else if(myClass == 'c1'){
		jQuery('#color').attr('href','assets/css/colors/color1.css');
		jQuery("#logo").attr("src","assets/images/c1.html");
			} else if(myClass == 'c2'){
		jQuery('#color').attr('href','assets/css/colors/color2.css');
				jQuery("#logo").attr("src","assets/images/c2.html");
			} else if(myClass == 'c3'){
		jQuery('#color').attr('href','assets/css/colors/color3.css');
						jQuery("#logo").attr("src","assets/images/c3.html");
			} else if(myClass == 'c4'){
		jQuery('#color').attr('href','assets/css/colors/color4.css');
								jQuery("#logo").attr("src","assets/images/c4.html");
			} else if(myClass == 'c5'){
		jQuery('#color').attr('href','assets/css/colors/color5.css');
								jQuery("#logo").attr("src","assets/images/c5.html");
			} else if(myClass == 'c6'){
		jQuery('#color').attr('href','assets/css/colors/color6.css');
		jQuery("#logo").attr("src","assets/images/c6.html");
			} else if(myClass == 'c7'){
		jQuery('#color').attr('href','assets/css/colors/color7.css');
		jQuery("#logo").attr("src","assets/images/c7.html");
			} else if(myClass == 'c8'){
		jQuery('#color').attr('href','assets/css/colors/color8.css');
								jQuery("#logo").attr("src","assets/images/c8.html");
			} else if(myClass == 'c9'){
		jQuery('#color').attr('href','assets/css/colors/color9.css');
								jQuery("#logo").attr("src","assets/images/c9.html");
			} else if(myClass == 'c10'){
		jQuery('#color').attr('href','assets/css/colors/color10.css');
								jQuery("#logo").attr("src","assets/images/c10.html");
			} else if(myClass == 'c11'){
		jQuery('#color').attr('href','assets/css/colors/color11.css');
								jQuery("#logo").attr("src","assets/images/c11.html");
			
			} else if(myClass == 'c12'){
		jQuery('#color').attr('href','assets/css/colors/color12.css');
								jQuery("#logo").attr("src","assets/images/c12.html");
			
			} else if(myClass == 'c13'){
		jQuery('#color').attr('href','assets/css/colors/color13.css');
								jQuery("#logo").attr("src","assets/images/c13.html");
			 
			} else if(myClass == 'c14'){
		jQuery('#color').attr('href','assets/css/colors/color14.css');
								jQuery("#logo").attr("src","assets/images/c14.html");
			 
			} else if(myClass == 'c15'){
		jQuery('#color').attr('href','assets/css/colors/color15.css');
								jQuery("#logo").attr("src","assets/images/c15.html");
			 
			} else if(myClass == 'c16'){
		jQuery('#color').attr('href','assets/css/colors/color16.css');
								jQuery("#logo").attr("src","assets/images/c16.html");
			
			} else if(myClass == 'c17'){
		jQuery('#color').attr('href','assets/css/colors/color17.html');
								jQuery("#logo").attr("src","assets/images/c17.html");
			
			} else if(myClass == 'c18'){
		jQuery('#color').attr('href','assets/css/colors/color18.html');
								jQuery("#logo").attr("src","assets/images/c18.html");
		
			} else if(myClass == 'c19'){
		jQuery('#color').attr('href','assets/css/colors/color19.html');
								jQuery("#logo").attr("src","assets/images/c19.html");
			} 

			
	});
	// Heading  Font and CSS Changes 
	
	jQuery('#cfont').change(function(){
		var fontName = jQuery('#cfont').val();
		if(fontName == 'default'){
			jQuery('#customFont').attr('href','css/typography.html');
		}else if(fontName == 'cardo'){
			jQuery('#customFont').attr('href','css/cardo.html');
			} else if(fontName == 'IMFell'){
			jQuery('#customFont').attr('href','css/IMFell.html');
		} else if(fontName == 'Josefin'){
			jQuery('#customFont').attr('href','css/Josefin.html');
		}  else if(fontName == 'OpenSansCondensed'){
			jQuery('#customFont').attr('href','css/OpenSansCondensed.html');
		}   else if(fontName == 'OpenSans'){
			jQuery('#customFont').attr('href','css/OpenSans.html');
		} else if(fontName == 'Vollkorn'){
			jQuery('#customFont').attr('href','css/Vollkorn.html');
		} else if(fontName == 'DroidSans'){
			jQuery('#customFont').attr('href','css/DroidSans.html');
		}
		else if(fontName == 'cabin'){
			jQuery('#customFont').attr('href','css/cabin.html');
		}else {
			jQuery('#customFont').attr('href','css/typography.html');
		}
	});
	
	
// Content Font and CSS Changes 
	jQuery('.open-buttton1').click(function(){
	
		if(jQuery('.open-buttton1').hasClass('closed')){
			jQuery(this).parent('.settings-panel1').stop().animate({left:225},400);
			jQuery(this).removeClass('closed').addClass('opened');
		} else {
			jQuery(this).parent('.settings-panel1').stop().animate({left:0},400);
			jQuery(this).removeClass('opened').addClass('closed');
		}
	});
	
	});
	
jQuery('.settings-panel1 .bg_patterns ul li').click(function(){
		var thisBGimg = jQuery(this).css('background-image');
		jQuery('body').css('background-image', thisBGimg);
				jQuery('body').css('background-repeat', "repeat");

	});


// Card Pattern changes  Patterns and Background Colour 
	
	jQuery('.settings-panel1 .card_patterns ul li').click(function(){
		var thisBGcol = jQuery(this).css('background-color');
		var thisBGimg = jQuery(this).css('background-image');
		jQuery('.content_pat_bg').css('background-image', thisBGimg);
		jQuery('.content_pat_bg').css('background-color', thisBGcol);
	});
	
		 jQuery("ul.c_patterns li").click(function () {
			 var myClass = jQuery(this).attr("class");
			if(myClass == 'default'){
			jQuery('#color').attr('href','assets/css/style.css');
					
		}else if(myClass == 'c1'){
		jQuery('#color').attr('href','assets/css/colors/color1.css');
		
			} else if(myClass == 'c2'){
		jQuery('#color').attr('href','assets/css/colors/color2.css');
				jQuery("#logo").attr("src","assets/images/c2.html");
			} else if(myClass == 'c3'){
		jQuery('#color').attr('href','assets/css/colors/color3.css');
						jQuery("#logo").attr("src","assets/images/c3.html");
			} else if(myClass == 'c4'){
		jQuery('#color').attr('href','assets/css/colors/color4.css');
								jQuery("#logo").attr("src","assets/images/c4.html");
			} else if(myClass == 'c5'){
		jQuery('#color').attr('href','assets/css/colors/color5.css');
								jQuery("#logo").attr("src","assets/images/c5.html");
			} else if(myClass == 'c6'){
		jQuery('#color').attr('href','assets/css/colors/color6.css');
		jQuery("#logo").attr("src","assets/images/c6.html");
			} else if(myClass == 'c7'){
		jQuery('#color').attr('href','assets/css/colors/color7.css');
		jQuery("#logo").attr("src","assets/images/c7.html");
			} else if(myClass == 'c8'){
		jQuery('#color').attr('href','assets/css/colors/color8.css');
								jQuery("#logo").attr("src","assets/images/c8.html");
			} else if(myClass == 'c9'){
		jQuery('#color').attr('href','assets/css/colors/color9.css');
								jQuery("#logo").attr("src","assets/images/c9.html");
			} else if(myClass == 'c10'){
		jQuery('#color').attr('href','assets/css/colors/color10.css');
								jQuery("#logo").attr("src","assets/images/c10.html");
			} else if(myClass == 'c11'){
		jQuery('#color').attr('href','assets/css/colors/color11.css');
								jQuery("#logo").attr("src","assets/images/c11.html");
			
			} else if(myClass == 'c12'){
		jQuery('#color').attr('href','assets/css/colors/color12.css');
								jQuery("#logo").attr("src","assets/images/c12.html");
			
			} else if(myClass == 'c13'){
		jQuery('#color').attr('href','assets/css/colors/color13.css');
								jQuery("#logo").attr("src","assets/images/c13.html");
			 
			} else if(myClass == 'c14'){
		jQuery('#color').attr('href','assets/css/colors/color14.css');
								jQuery("#logo").attr("src","assets/images/c14.html");
			 
			} else if(myClass == 'c15'){
		jQuery('#color').attr('href','assets/css/colors/color15.css');
								jQuery("#logo").attr("src","assets/images/c15.html");
			 
			} else if(myClass == 'c16'){
		jQuery('#color').attr('href','assets/css/colors/color16.css');
								jQuery("#logo").attr("src","assets/images/c16.html");
			
			} else if(myClass == 'c17'){
		jQuery('#color').attr('href','assets/css/colors/color17.html');
								jQuery("#logo").attr("src","assets/images/c17.html");
			
			} else if(myClass == 'c18'){
		jQuery('#color').attr('href','assets/css/colors/color18.html');
								jQuery("#logo").attr("src","assets/images/c18.html");
		
			} else if(myClass == 'c19'){
		jQuery('#color').attr('href','assets/css/colors/color19.html');
								jQuery("#logo").attr("src","assets/images/c19.html");
			} 
			
	});
	
