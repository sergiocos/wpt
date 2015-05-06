<?php
	header("Content-type: text/css");
	require_once('../../../../../wp-load.php');
	
	$banner_type = get_option ( THEME_NAME."_banner_type" );

	$color_1 = get_option ( THEME_NAME."_color_1" );
	$color_2 = get_option ( THEME_NAME."_color_2" );
	$color_3 = get_option ( THEME_NAME."_color_3" );
	$color_4 = get_option ( THEME_NAME."_color_4" );
	$color_5 = get_option ( THEME_NAME."_color_5" );
	$color_6 = get_option ( THEME_NAME."_color_6" );
	$color_7 = get_option ( THEME_NAME."_color_7" );
	$color_8 = get_option ( THEME_NAME."_color_8" );
	$color_9 = get_option ( THEME_NAME."_color_9" );
	$color_10 = get_option ( THEME_NAME."_color_10" );
	$color_11 = get_option ( THEME_NAME."_color_11" );
	$color_12 = get_option ( THEME_NAME."_color_12" );
	$color_13 = get_option ( THEME_NAME."_color_13" );
	$color_14 = get_option ( THEME_NAME."_color_14" );
	$color_15 = get_option ( THEME_NAME."_color_15" );
	$color_16 = get_option ( THEME_NAME."_color_16" );
	$color_17 = get_option ( THEME_NAME."_color_17" );

	//body bg options
	$bodyBgType = get_option ( THEME_NAME."_body_bg_type" );
	$bodyPattern = get_option ( THEME_NAME."_body_pattern" );
	$bodyColor = get_option ( THEME_NAME."_body_color" );
	$bodyImage = get_option ( THEME_NAME."_body_image" );
	//slider bg options
	$sliderBgType = get_option ( THEME_NAME."_slider_bg_type" );
	$sliderPattern = get_option ( THEME_NAME."_slider_pattern" );
	$sliderColor = get_option ( THEME_NAME."_slider_color" );
	$sliderImage = get_option ( THEME_NAME."_slider_image" );	
	//intro text bg options
	$introBgType = get_option ( THEME_NAME."_intro_bg_type" );
	$introPattern = get_option ( THEME_NAME."_intro_pattern" );
	$introColor = get_option ( THEME_NAME."_intro_color" );
	$introImage = get_option ( THEME_NAME."_intro_image" );
	
	
?>



/* POPUP BANNER */

<?php
	if ( $banner_type == "image" ) {
	//Image Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:10003; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; z-index:10004; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo THEME_IMAGE_URL; ?>close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php
	} else if ( $banner_type == "text" ) {
	//Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:10003; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; max-width:700px; z-index:10004; border: 1px solid #000; background: #e5e5e5 url(<?php echo THEME_IMAGE_URL; ?>dotted-bg-6.png) 0 0 repeat; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; line-height: 24px; border: 1px solid #cccccc; -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; text-shadow: #fff 0 1px 0; }
		#popup center { display: block; padding: 20px 20px 20px 20px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo THEME_IMAGE_URL; ?>close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -12px; top: -12px; }
<?php 
	} else if ( $banner_type == "text_image" ) {
	//Image And Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:10003; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; z-index:10004; color: #000; font-size: 11px; font-weight: bold; }
		#popup center { padding: 15px 0 0 0; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo THEME_IMAGE_URL; ?>close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php } ?>

/* ==========================================================================
   Links colors
   ========================================================================== */
a {color:#<?php echo $color_1;?>}
/* ==========================================================================
   Background colors
   ========================================================================== */
#logo, .tagcloud a:hover, #wp-calendar caption, #carousel-container .bx-controls a:hover,.article-standard:hover .format-post, .article-vertical:hover .format-post,#footer .tagcloud a:hover, a.button.colored, input[type=submit].colored, input[type=reset].colored, input[type=button].colored, .tag-list ul a:hover, .photo-filters ul li a:hover, .photo-filters ul li a.selected-gallery-filter, .photo-stack a.prev:hover, .photo-stack a.next:hover {background-color:#<?php echo $color_2;?>}
/* ==========================================================================
   Rating stars color
   ========================================================================== */
.review-stars span.star-full, .review-stars span.star-empty, .review-stars span.star-half {color: #<?php echo $color_3;?>!important}

/* Background color for header, widget title, copyright, search button, slider container */
#header, #sidebar h3.widget-title, #copyright, ul.primary-navigation ul, .search-form input[type="submit"], #wp-calendar tfoot, #wp-calendar th, .widget-slider .bx-controls-direction
{background-color: #<?php echo $color_4;?>}

/* Background color for footer */
#footer {background-color: #<?php echo $color_5;?>}

/* Background hover color for menu links */
ul.primary-navigation a:hover, ul.primary-navigation a.current, ul.primary-navigation li:hover > a, ul.primary-navigation li.sfHover > a 
{background-color: rgba(<?php echo df_HexToRGB($color_6);?>, 0.1);}

/* Text color for menu links, search button */
ul.primary-navigation a, .search-form input[type="submit"] {color: rgba(<?php echo df_HexToRGB($color_7);?>, 0.5);}

/* Text hover and current color for menu links, search button */
ul.primary-navigation a:hover, ul.primary-navigation a.current, ul.primary-navigation li:hover > a {color:#<?php echo $color_8;?>;}

/* Text color for widget title, copyright block */
#sidebar h3.widget-title, #copyright, #wp-calendar tfoot {color:#<?php echo $color_9;?>;}

/* Border color for menu links */
ul.primary-navigation a, .widget-slider .bx-controls-direction a.bx-prev, .widget-slider .bx-controls-direction a.bx-next {border-color:#<?php echo $color_10;?>;}

/* ------- SLIDER ------ */

/* Background color for tabs container slider */
#featured-slider-pager, #slider-container .container {background-color: #<?php echo $color_11;?>}

/* Background color for tab link */
#featured-slider-pager a {background-color: #<?php echo $color_12;?>}

/* Background color for active tab link */
#featured-slider-pager a.active {background-color: rgba(<?php echo df_HexToRGB($color_13);?>, 0.1);}

/* Links and entry meta in slider tabs */
#featured-slider-pager h3, #featured-slider-pager a .entry-meta, #featured-slider-pager a .entry-meta .by-category:before, #featured-slider-pager a .entry-meta .by-view-number:before, #featured-slider-pager a .entry-meta .by-date:before, #featured-slider-pager a .entry-meta .by-author:before, #featured-slider-pager a .entry-meta .by-comments:before {color: rgba(<?php echo df_HexToRGB($color_14);?>, 0.5);}

/* Active links in slider tabs */
#featured-slider-pager a.active h3, #featured-slider-pager a.active > .entry-meta span, #featured-slider-pager a.active .entry-meta .by-category:before, #featured-slider-pager a.active .entry-meta .by-view-number:before, #featured-slider-pager a.active .entry-meta .by-date:before, #featured-slider-pager a.active .entry-meta .by-author:before, #featured-slider-pager a.active .entry-meta .by-comments:before {color:#<?php echo $color_15;?>;}

/* Border for tabs links */
#featured-slider-pager a {border-color:#<?php echo $color_16;?>;}

/* Background color for active tab link */
#featured-slider-pager a:hover {background-color: rgba(<?php echo df_HexToRGB($color_17);?>, 0.05);}

/* ==========================================================================
   Body
   ========================================================================== */
<?php if($bodyBgType=="pattern") { ?>
body { 
	background-color: #f1f1f1; 
	background-image: url(../img/patterns/<?php echo $bodyPattern;?>.png)
}
<?php } elseif($bodyBgType=="color") { ?>
body { 
	background-color: #<?php echo $bodyColor;?>; 
}
<?php } elseif($bodyBgType=="image") { ?>
body { 
	background-image: url(<?php echo $bodyImage;?>);
	background-attachment: fixed !important;
	background-size: cover !important;
	background-position:center;
}
<?php } ?>

/* ==========================================================================
   Slider carousel
   ========================================================================== */
<?php if($sliderBgType=="pattern") { ?>
#carousel-container {
	background-color: #f1f1f1; 
	background-image: url(../img/patterns/<?php echo $sliderPattern;?>.png)
}
<?php } elseif($sliderBgType=="color") { ?>
#carousel-container {
	background-color: #<?php echo $sliderColor;?>; 
}
<?php } elseif($sliderBgType=="image") { ?>
#carousel-container {
	background-image: url(<?php echo $sliderImage;?>);
	background-attachment:fixed;
	background-position:center;
}
<?php } ?>

/* ==========================================================================
   Intro block
   ========================================================================== */
<?php if($introBgType=="pattern") { ?>
#intro-block {
	background-color: #f1f1f1; 
	background-image: url(../img/patterns/<?php echo $introPattern;?>.png)
}
<?php } elseif($introBgType=="color") { ?>
#intro-block {
	background-color: #<?php echo $introColor;?>; 
}
<?php } elseif($introBgType=="image") { ?>
#intro-block {
	background-image: url(<?php echo $introImage;?>);
	background-attachment:fixed;
	background-position:center;
}
<?php } ?>
