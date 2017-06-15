<script type="text/javascript">

	jQuery(document).ready(function(){
	
		// Navigation Tooltips
		//	jQuery('#navigation a').hover(function(){
		//		jQuery(this).siblings('.nav-tooltip-outer').delay(200).fadeIn(300);
		//		}, function(){
		//			jQuery(this).siblings('.nav-tooltip-outer').fadeOut(300);
		//		});
		
		// Fade In on Scroll
		jQuery(window).scroll(function(){
			jQuery('.fadein').each(function(i){
				var bottom_of_object = jQuery(this).offset().top + jQuery(this).outerHeight();
				var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();
				if(bottom_of_window > bottom_of_object){
					jQuery(this).animate({'opacity':'1','filter':'alpha(opacity=100)'}, 500);
				}
			});
		});
		
		// Login Overlay Screen
		jQuery('#login-button').on('click', function(e){
			jQuery('#login').fadeIn();
			e.preventDefault();
		});
		jQuery('#login .close-button').on('click', function(){
			jQuery('#login').fadeOut();
		});
		jQuery('#login .background').on('click', function(){
			jQuery('#login').fadeOut();
		});
		jQuery(document).keyup(function(e){
			if(e.which == 27) {
				jQuery('#login').fadeOut();
			}
		});
		
		// Agent Contact Overlay Screen
		jQuery('.agent-contact').on('click', function(e){
			var agentid = jQuery(this).attr('id');
			jQuery('#agent-contact .form-container').hide();
			jQuery('#agent-contact').find("." + agentid).show();
			jQuery('#agent-contact').fadeIn();
			e.preventDefault();
		});
		jQuery('#agent-contact .close-button').on('click', function(){
			jQuery('#agent-contact').fadeOut();
		});
		jQuery('#agent-contact .background').on('click', function(){
			jQuery('#agent-contact').fadeOut();
		});
		jQuery(document).keyup(function(e){
			if(e.which == 27) {
				jQuery('#agent-contact').fadeOut();
			}
		});
		
		// Mobile Navigation Menu
		jQuery('#nav-mobile').on('click', function(){
			if(jQuery('#navigation ul').hasClass('nav-show')) {
				jQuery('#navigation ul').removeClass('nav-show');
			} else {
				jQuery('#navigation ul').addClass('nav-show');
			}
		});
		jQuery('#navigation ul a').on('click', function(){
			jQuery('#navigation ul').removeClass('nav-show');
		});
		
		// Quick Property Search
		jQuery('#quick-search-button').on('click', function(){
			if(jQuery(this).hasClass('qs-open')) {
				jQuery(this).removeClass('qs-open');
				jQuery('#listing-search table').hide();
			} else {
				jQuery(this).addClass('qs-open');
				jQuery('#listing-search table').show();
			}
		});
		
		// Agent Contact Buttons
		jQuery('.agent-links a img.expand').on('click', function(e){
			if(jQuery(this).parent().hasClass('button-expand')){
				jQuery(this).parent().removeClass('button-expand');
				jQuery(this).parent().siblings().find('img').fadeTo('slow',1);
			} else {
				jQuery(this).parent().parent().find('a').removeClass('button-expand');
				jQuery(this).parent().addClass('button-expand');
				jQuery(this).fadeTo('slow',1);
				jQuery(this).parent().siblings().find('img').fadeTo('slow',0.3);
			}
			e.preventDefault();
		});
		jQuery('.agent-links a img.normal').on('click', function(e){
			jQuery(this).parent().parent().find('a').removeClass('button-expand');
			jQuery(this).parent().parent().find('img').fadeTo('slow',1);
		});
		
		// Mobile Agents Tabs
		jQuery('#mobile-agents-tabs h4').first().addClass('active');
		jQuery('#mobile-agents-tabs .laurel').on('click', function(e){
			if(jQuery(this).hasClass('active')){
				
			} else {
				jQuery(this).siblings().removeClass('active');
				jQuery(this).addClass('active');
			}
			jQuery('ul.agents-list-laurel').show();
			jQuery('ul.agents-list-hattiesburg').hide();
		});
		jQuery('#mobile-agents-tabs .hattiesburg').on('click', function(e){
			if(jQuery(this).hasClass('active')){
				
			} else {
				jQuery(this).siblings().removeClass('active');
				jQuery(this).addClass('active');
			}
			jQuery('ul.agents-list-hattiesburg').show();
			jQuery('ul.agents-list-laurel').hide();
		});
		
		// Resources Tabs
		jQuery('.resource-link').first().addClass('resource-active');
		jQuery('.resource-link').on('click', function(e){
			var resourceid = jQuery(this).attr('id');
			jQuery(this).siblings().removeClass('resource-active');
			jQuery(this).addClass('resource-active');
			jQuery('#resources-tabs .resource-content').hide();
			jQuery('#resources-tabs').find("." + resourceid).show();
			e.preventDefault();
		});
		
		// Resource Sub Tabs
		jQuery('.resource-sub-nav ul').each(function(){
			jQuery(this).find('li:first').addClass('tab-active');
		});
		jQuery('.resource-sub-nav ul li').on('click', function(e){
			var tabid = jQuery(this).attr('id');
			jQuery(this).siblings().removeClass('tab-active');
			jQuery(this).addClass('tab-active');
			jQuery('.resource-sub-tab').find("." + tabid).show();
			jQuery('.resource-sub-tab').find("." + tabid).siblings().hide();
			e.preventDefault();
		});
		
		// Cycle Plugin
		jQuery('#slideshow').cycle({
			speed:3000,
			fx:'fadeout'
		});
		jQuery('#history').cycle({
			speed:3000,
			manualSpeed:300,
			fx:'fadeout',
			manualFx:'scrollHorz',
			timeout:6000,
			pauseOnHover:true
		});
		jQuery('#agent').cycle({
			manualSpeed:300,
			fx:'scrollHorz',
			manualFx:'scrollHorz',
			timeout:0,
			pauseOnHover:true
		});
		
	});
	
	// Show All Agents
	jQuery(window).resize(function(){
		if(jQuery('.about-agents').width() > 699) {
			jQuery('ul.agents-list').show();
		}
	});
	jQuery(window).resize(function(){
		if(jQuery('.about-agents').width() < 700) {
			if(jQuery('#mobile-agents-tabs .laurel').hasClass('active')) {
				jQuery('ul.agents-list-laurel').show();
				jQuery('ul.agents-list-hattiesburg').hide();
			}
			if(jQuery('#mobile-agents-tabs .hattiesburg').hasClass('active')) {
				jQuery('ul.agents-list-hattiesburg').show();
				jQuery('ul.agents-list-laurel').hide();
			}
		}
	});
	
	// Fade Slideshow Caption
	var fadeStart=0, fadeUntil=300, fading=jQuery('.slide-description');
	jQuery(window).bind('scroll', function(){
		var offset = jQuery(document).scrollTop(), opacity=0;
		if(offset<=fadeStart){
			opacity=1;
		} else if(offset<=fadeUntil){
			opacity=1-offset/fadeUntil;
		}
		fading.css('opacity', opacity);
	});

	// Smooth Scroll to Home Screen on Navigation Click
	jQuery('#logo').on('click', function(){
		jQuery('html,body').animate({
			scrollTop:0
		}, 500);
		return false;
	});
	
	// Highlight Navigation on Scroll
	var sections = jQuery('.page-section'), nav = jQuery('#header'), nav_height = nav.outerHeight();
	jQuery(window).on('scroll', function(){
		var cur_pos = jQuery(this).scrollTop();
		sections.each(function(){
			var top = jQuery(this).offset().top - nav_height - 20,
			bottom = top + jQuery(this).outerHeight();
			if(cur_pos >= top && cur_pos <= bottom) {
				nav.find('li').removeClass('active');
				nav.find('.mobile-page span').removeClass('active');
				sections.removeClass('active');
				jQuery(this).addClass('active');
				nav.find('li.' + jQuery(this).attr('id')).addClass('active');
				nav.find('.mobile-page span.' + jQuery(this).attr('id')).addClass('active');
			}
		});
	});
	
	// Smooth Scroll on Navigation Click
	nav.find('#navigation a').on('click', function(){
		var $el = jQuery(this),
		id = $el.attr('href');
		jQuery('html,body').animate({
			scrollTop: jQuery(id).offset().top - nav_height
		}, 500);
		return false;
	});
	
</script>