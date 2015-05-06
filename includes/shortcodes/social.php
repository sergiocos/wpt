<?php
	add_shortcode('social', 'social_handler');
	add_shortcode('account', 'social_handler');
	

	function social_handler($atts, $content=null, $code="") {

	
		if($code == "account") {
			/* Icon */
			$icon=$atts["icon"];
			return '<li class="'.$icon.'"><a href="'.$content.'" target="_blank"><i class="icon-'.$icon.'"></i></a></li>';
		} elseif($code == "social") {
			$content = '<ul class="social-icons">'.$content.'</ul>';
		}
		
		$content = do_shortcode($content);
		$content = remove_br($content);
		return $content;
	}
	
?>