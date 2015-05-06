<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	global $wp_query;


	$sidebar = get_post_meta( df_page_id(), THEME_NAME.'_sidebar_select', true );

	$weatherSet = get_option(THEME_NAME."_weather");

	$locationType = get_option(THEME_NAME."_weather_location_type");
	if($locationType == "custom") {
		$weather = DF_weather_forecast(str_replace(' ', '+', get_option(THEME_NAME."_weather_city")));
	} else {
		$weather = DF_weather_forecast($_SERVER['REMOTE_ADDR']);
	}


	if (function_exists("bp_current_component") && bp_current_component()) {
		$sidebar='buddypress_sidebar';
	}

	if ( !isset($sidebar) || $sidebar=='' || is_search() || is_category() || is_tax()) {
		$sidebar='default';
	}

?>
	<?php if($sidebar!="DFoff") { ?>
	  	<!-- Sidebar -->
	  	<div id="sidebar">
			<?php if($weatherSet=="on") { ?>
					<!-- Weather report -->
					<div class="widget">
					    <h3 class="widget-title"><?php _e("Weather Forecast", THEME_NAME);?></h3>
					    <div class="weather-report">
					    	<?php if(!isset($weather['error'])) { ?>
					    		<span class="report-city">
					    			<p><i class="icon-map-marker"></i><?php echo $weather['city'].', '.$weather['country'];?></p>
						            <strong><?php echo $weather['weatherDesc'];?></strong>
						        </span>
						        <div class="report-image">
						            <span class="report-temp"><?php echo $weather['temp_'.get_option(THEME_NAME."_temperature")];?></span>
						            <img src="<?php echo THEME_IMAGE_URL.$weather['image'];?>.png" class="report-image"/>
						        </div>

							<?php 
								} else {
									echo $weather['error'];
								} 
							?>
					    </div>
					</div>
			<?php } ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
			<?php endif; ?>
		<!-- END Sidebar -->
		</div>
	<?php } ?>
