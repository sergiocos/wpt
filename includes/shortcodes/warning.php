<?php
	add_shortcode('alert', 'alert_handler');

	function alert_handler($atts, $content=null, $code="") {

		$return =  '<div class="notice '.$atts['type'].'">';
		$return.=  $content;
		$return.=  '</div>';

		return $return;
	}
?>