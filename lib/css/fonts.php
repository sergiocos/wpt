<?php
	header("Content-type: text/css");
	require_once('../../../../../wp-load.php');

	//fonts
	$google_font_1 = get_option(THEME_NAME."_google_font_1");
	$google_font_2 = get_option(THEME_NAME."_google_font_2");

	//font sizes
	$font_size_1 = get_option(THEME_NAME."_font_size_1");

	//line height
	$line_height_1 = get_option(THEME_NAME."_line_height_1");


?>

/* ==========================================================================
   Body
   ========================================================================== */
body {
	font-family: '<?php echo $google_font_1;?>', Geneva, sans-serif;
	font-size: <?php echo $font_size_1;?>px;
	line-height: <?php echo $line_height_1;?>px
}
/* ==========================================================================
   Headings, menu etc.
   ========================================================================== */
h1, h2, h3, h4, h5, h6, ul.primary-navigation a, .entry-meta, #sidebar ul.widget-social-profile li strong, .bx-caption, #wp-calendar .wp-header th.month-and-year, a.read-more,.weather-report .report-temp, .multiple-posts-title,ul.pagination, #copyright, #share-this-article .share-text, #post-controls a span, #rating-overview .rating-score, .reply a, .comment-meta span, .dropcap:first-letter, blockquote, .pullquote-left, .pullquote-right, #intro-block .button, .tag-list span, #featured-slider li .view-more-link, #wp-calendar caption {
	font-family: '<?php echo $google_font_2;?>', serif;
}
