<?php

class DF_Tabs {

	static $shortcodeCount;
	static $shortcodeData;
	static $currentTab;

	/**
	 * init function.
	 * 
	 * @access public
	 * @static
	 * @return void
	 */
	static function init() {

		add_shortcode( 'tab', array(__CLASS__, 'tab_shortcode' ) );
		add_shortcode( 'tabs', array(__CLASS__, 'tabs_shortcode' ) );

		self::$shortcodeCount = 0;
		
	}
	
	/**
	 * tab_shortcode function.
	 * 
	 * @access public
	 * @static
	 * @param mixed $atts
	 * @param mixed $content
	 * @return void
	 */
	public static  function tab_shortcode( $atts, $content ) {
		extract(shortcode_atts(array('title' => null,), $atts) );
	
		self::$shortcodeData[  self::$currentTab ][] = array( 'title' => $title);
		self::$shortcodeCount++;

		return '<div id="tabs'.self::$shortcodeCount.'-html">'.stripslashes($content).'</div>';
		
	}
	
	
	/**
	 * tabs_shortcode function.
	 * 
	 * @access public
	 * @static
	 * @param mixed $atts
	 * @param mixed $content
	 * @return void
	 */
	public static function tabs_shortcode( $atts, $content ) {
		$tabContent = do_shortcode( $content );

		$return='<div class="tab-container">';
			$return.='<ul class="etabs">';
				$counter = 1;
				foreach( self::$shortcodeData[self::$currentTab] as $val ):
					$return.='<li class="tab"><a href="#tabs'.$counter.'-html">'.$val['title'].'</a></li>'; 
				$counter++;
				endforeach;
				
			$return.='</ul>';
			$return.='<div class="panel-container">';
				$return.=do_shortcode(stripslashes($tabContent));
			$return.='</div>';
		$return.='</div>';
		return $return;
	}
	

}
// lets play
DF_Tabs::init();
?>