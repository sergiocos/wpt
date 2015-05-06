<?php
	add_shortcode('icon', 'icon_handler');

	function icon_handler($atts, $content=null, $code="") {
	
		return '<i class="'.$atts['style'].'"></i>';
	}

?>