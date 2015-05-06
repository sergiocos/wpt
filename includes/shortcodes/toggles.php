<?php
	add_shortcode('toggles', 'toggles_handler');

	function toggles_handler($atts, $content=null, $code="") {

        $return =  '<div class="toggle">';
			$return.=  '<a class="toggle-title"><span></span>'.$atts["title"].'</a>';
			$return.=  '<div class="toggle-box">';
				$return.=  do_shortcode(stripslashes($content));
			$return.=  '</div>';
        $return.=  '</div>';

		return $return;
	}
?>