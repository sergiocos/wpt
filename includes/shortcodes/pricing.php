<?php
	add_shortcode('pricing', 'pricing_handler');


	function pricing_handler($atts, $content=null, $code="") {

		/* title */
		$title = $atts["title"];
		/* price */
		$price = $atts["price"];
		/* text */
		$btnText = $atts["btntext"];
		/* subtitle */
		$subtitle = $atts["subtitle"];
		/* color */
		$color = $atts["color"];
		/* url */
		if(isset($atts["url"])) {
			$url_i = $atts["url"];
		} else {
			$url_i = "#";
		}
		/* Target */
		$target=$atts["target"];
		if(!isset($atts["target"]) || $atts["target"]=="blank") {
			$target="_blank";
		} else {
			$target="self";
		}

		/* Active */
		$active=$atts["active"];
		if(isset($atts["active"]) && $atts["active"]=="Yes") {
			$class=" active";
		} else {
			$class=false;
		}
		
		$content = explode(",", $content);
		$count = count($content);
		$i=1;
			$return= '<article class="hosting_banner'.$class.'">';
				$return.= '<div class="hosting_banner_inner">';
					$return.= '<h2>'.$title.'</h2>';
					$return.= '<h3>'.$price.' <span>'.$subtitle.'</span></h3>';

					foreach($content as $feature) {
						if ($i==$count) break;
						$return.="<p>".$feature."</p>";
						$i++;
					}

				if($btnText) {
					$return.= '<a href="'.$url_i.'" target="'.$target.'">'.$btnText.'</a>';
				}
			$return.= '<div class="clr"></div>';
			$return.= '</div>';
			$return.= '<div class="clr"></div>';
			$return.= '</article>';
		return $return;
	}

?>
