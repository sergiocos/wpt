<?php
	
	function different_themes_scripts() { 
		global $wp_styles, $wp_scripts;
		$banner_type = get_option ( THEME_NAME."_banner_type" );
		$layout = get_option ( THEME_NAME."_layout" );
		$menuStyle = get_option ( THEME_NAME."_menu_style" );

		$protocol = is_ssl() ? 'https' : 'http';
		
		//include google fonts
		$google_fonts = array();
		for($i=1; $i<=2; $i++) {
			if(get_option(THEME_NAME."_google_font_".$i)) {
				$google_fonts[] = get_option(THEME_NAME."_google_font_".$i);	
			}
			
		}
		$google_fonts = array_unique($google_fonts);
		$i=1;
		foreach($google_fonts as $google_font) {
			$protocol = is_ssl() ? 'https' : 'http';
			if($google_font && $google_font!="Verdana" ) {
				wp_enqueue_style( 'google-fonts-'.$i, $protocol."://fonts.googleapis.com/css?family=".str_replace(" ", "+", $google_font));
			}
			$i++;
		}


		
		wp_enqueue_style("main-style", THEME_CSS_URL."style.css", Array());
		wp_enqueue_style("layout", THEME_CSS_URL."layout.css", Array());
		wp_enqueue_style("fonts-stylesheet", THEME_CSS_URL."awesome.css", Array());
		wp_enqueue_style("lightbox", THEME_CSS_URL."lightbox.css", Array());
		wp_enqueue_style("grid", THEME_CSS_URL."grid.css", Array());

		wp_enqueue_style("fonts", THEME_CSS_URL."fonts.php", Array());
		wp_enqueue_style("df-dynamic-css", THEME_CSS_URL."dynamic-css.php", Array());
 		wp_enqueue_style("style", get_stylesheet_uri(), Array());
 		
		wp_enqueue_script("jquery");
		wp_enqueue_script("query-ui-core");
		wp_enqueue_script("jquery-ui-tabs");
		wp_enqueue_script("html5" , THEME_JS_URL."html5.js", Array('jquery'), "", false);
		$wp_scripts->add_data('html5', 'conditional', 'lt IE 9');


		if($banner_type && $banner_type!="off") {
			wp_enqueue_script("banner" , THEME_JS_URL."jquery.floating_popup.1.3.min.js", Array('jquery'), "1.0", true);
		}
		if (is_page_template ( 'template-contact.php' )) {
			wp_enqueue_script("contact" , THEME_JS_URL."jquery.contact.js", Array('jquery'), '', true);
		}

		if ($menuStyle=="on") {
			wp_enqueue_script("sticky" , THEME_JS_URL."jquery.sticky.js", Array('jquery'), '', true);
		}
		wp_enqueue_script("custom" , THEME_JS_URL."jquery.custom.js", Array('jquery'), '', true);
		wp_enqueue_script(THEME_NAME, THEME_JS_URL.THEME_NAME.".js", Array('jquery'), '', true);
		wp_enqueue_script("scripts" , THEME_JS_URL."scripts.php", Array('jquery'), '', true);
		wp_enqueue_script("flickr" , THEME_JS_URL."jquery.flickr.js", Array('jquery'), '', false);
		if (is_page_template ( 'template-gallery.php' )) {
			wp_enqueue_script("isotope" , THEME_JS_URL."jquery.isotope.js", Array('jquery'), '', true);
			wp_enqueue_script("gallery" , THEME_JS_URL."jquery.gallery.js", Array('jquery'), '', true);
			wp_enqueue_script("infinitescroll" , THEME_JS_URL."jquery.infinitescroll.min.js", Array('jquery'), '', true);
		} 

		wp_enqueue_script("df-gallery" , THEME_JS_URL."df_gallery.js", Array('jquery'), '', false);

		if ( is_singular() ) { wp_enqueue_script( "comment-reply" ); }


		wp_localize_script('custom','df',
			array(
				'adminUrl' => admin_url("admin-ajax.php"),
				'imageUrl' => THEME_IMAGE_URL,
				'cssUrl' => THEME_CSS_URL,
				'themeUrl' => THEME_URL
			)
		);
		
	}

	add_action( 'wp_enqueue_scripts', 'different_themes_scripts');
?>