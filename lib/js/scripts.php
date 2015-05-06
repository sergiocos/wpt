<?php
	header("Content-type: text/javascript");
	require_once('../../../../../wp-load.php');

	//main slider settings
	$mainAuto = get_option ( THEME_NAME."_main_auto" );
	$mainMode = get_option ( THEME_NAME."_main_mode" );
	$mainCaption = get_option ( THEME_NAME."_main_caption" );

	//widget slider settings
	$widgetAuto = get_option ( THEME_NAME."_widget_auto" );
	$widgetMode = get_option ( THEME_NAME."_widget_mode" );
	$widgetCaption = get_option ( THEME_NAME."_widget_caption" );

	//post slider settings
	$postAuto = get_option ( THEME_NAME."_post_auto" );
	$postMode = get_option ( THEME_NAME."_post_mode" );

?>
	//form validation
	function validateName(fld) {
			
		var error = "";
				
		if (fld.value === '' || fld.value === '<?php _e("Nickname", THEME_NAME);?>' || fld.value === '<?php _e("First Name", THEME_NAME);?>') {
			error = "<?php _e( 'You didn\'t enter Your First Name.' , THEME_NAME );?>\n";
		} else if ((fld.value.length < 2) || (fld.value.length > 50)) {
			error = "<?php _e( 'First Name is the wrong length.' , THEME_NAME );?>\n";
		}
		return error;
	}
			
	function validateEmail(fld) {

		var error="";
		var illegalChars = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
				
		if (fld.value === "") {
			error = "<?php _e( 'You didn\'t enter an email address.' , THEME_NAME );?>\n";
		} else if ( fld.value.match(illegalChars) === null) {
			error = "<?php _e( 'The email address contains illegal characters.' , THEME_NAME );?>\n";
		}

		return error;

	}
			
	function validateMessage(fld) {

		var error = "";
				
		if (fld.value === '' || fld.value === '<?php _e("Message", THEME_NAME);?>') {
			error = "<?php _e( 'You didn\'t enter Your message.' , THEME_NAME );?>\n";
		} else if (fld.value.length < 3) {
			error = "<?php _e( 'The message is to short.' , THEME_NAME );?>\n";
		}

		return error;
	}

	function validateLastname(fld) {
			
		var error = "";

				
		if (fld.value === '' || fld.value === 'Nickname' || fld.value === 'Enter Your Name..' || fld.value === 'Your Name..') {
			error = "<?php _e( 'You didn\'t enter Your last name.' , THEME_NAME );?>\n";
		} else if ((fld.value.length < 2) || (fld.value.length > 50)) {
			error = "<?php  _e( 'Last Name is the wrong length.' , THEME_NAME );?>\n";
		}
		return error;
	}

	function validatePhone(fld) {
			
		var error = "";
		var illegalChars = /^\+?s*\d+\s*$/;

		if (fld.value === '') {
			error = "<?php _e( 'You didn\'t enter Your phone number.' , THEME_NAME );?>\n";
		} else if ( fld.value.match(illegalChars) === null) {
			error = "<?php _e( 'Please enter a valid phone number.' , THEME_NAME );?>\n";
		}
		return error;
	}

/*---------------------------------
  MAIN SLIDER
  ---------------------------------*/
jQuery("#featured-slider").bxSlider({
	useCSS: false,
	pagerCustom: "#featured-slider-pager",
	controls: false,
	autoHover: true,
	auto: <?php echo $mainAuto;?>,
	mode: "<?php echo $mainMode;?>", // horizontal, vertical, fade
	captions: <?php echo $mainCaption;?>,
	onSlideAfter: function(){
	    // do mind-blowing JS stuff here

        function playVideoYoutube(frame) {
	        frame.each(function(i) {
	            var func = this === frame ? 'playVideo' : 'pauseVideo';
	            this.contentWindow.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
	        });
	    }
        function playVideoVimeo(frame) {
		    frame.each( function() {
		      var url = jQuery(this).attr('src').split('?')[0];
		      this.contentWindow.postMessage(JSON.stringify({ method: 'pause' }), url);
		    });
	    }

	    jQuery("ul#featured-slider li").each(function( index ) {
		 	var element = jQuery(this).find("iframe");     
	        playVideoYoutube(element);
	        playVideoVimeo(element);
	        
		});


	},

});

jQuery("#featured-slider-pager a").click(function() {
	if(jQuery(this).hasClass("active")) {
		window.location=jQuery(this).attr("href"); 
	}
});


/*---------------------------------
  POST SLIDER
  ---------------------------------*/
jQuery(".slider ul").bxSlider({
	mode: "<?php echo $postMode;?>", // horizontal, vertical, fade
	captions: false,
	controls: false,
	auto: <?php echo $postAuto;?>
});


/*---------------------------------
  WIDGET SLIDER
  ---------------------------------*/
jQuery(".widget-slider ul").bxSlider({
	mode: "<?php echo $widgetMode;?>", // horizontal, vertical, fade
	pause: 3000,
	captions: <?php echo $widgetCaption;?>,
	controls: true,
	pager: false,
	auto: <?php echo $widgetAuto;?>,
	prevText: "&#xf053;",
	nextText: "&#xf054;"
});


