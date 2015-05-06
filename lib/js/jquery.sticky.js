jQuery(function($) {
	var sticky_navigation_offset_top = $('#sticky-container').offset().top;
	var sticky_navigation = function(){
		var scroll_top = $(window).scrollTop();		
		if (scroll_top > sticky_navigation_offset_top) { 
			$('#sticky-container').css({ 'position': 'fixed', 'top':0, 'left':0});
			$('body.logged-in #sticky-container').css({ 'position': 'fixed', 'top':28, 'left':0 });
			$('body.admin-bar #sticky-container').css({ 'position': 'fixed', 'top':28, 'left':0 });
		} else {
			$('#sticky-container').css({ 'position': 'relative', 'top':0 });
		}   
	};	
	sticky_navigation();	
	$(window).scroll(function() {
		 sticky_navigation();
	});	
});