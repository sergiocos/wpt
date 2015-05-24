<?php

	// footer info
	$footerText = get_option ( THEME_NAME."_footer_text" );

	// pop up banner
	$banner_type = get_option ( THEME_NAME."_banner_type" );
	
	$banner_fly_in = get_option ( THEME_NAME."_banner_fly_in" );
	$banner_fly_out = get_option ( THEME_NAME."_banner_fly_out" );
	$banner_start = get_option ( THEME_NAME."_banner_start" );
	$banner_close = get_option ( THEME_NAME."_banner_close" );
	$banner_overlay = get_option ( THEME_NAME."_banner_overlay" );
	$banner_views = get_option ( THEME_NAME."_banner_views" );
	$banner_timeout = get_option ( THEME_NAME."_banner_timeout" );
	
	$banner_text_image_img = get_option ( THEME_NAME."_banner_text_image_img" ) ;
	$banner_image = get_option ( THEME_NAME."_banner_image" );
	$banner_text = stripslashes ( get_option ( THEME_NAME."_banner_text" ) );
	
	if ( $banner_type == "image" ) {
	//Image Banner
		$cookie_name = substr ( md5 ( $banner_image ), 1,6 );
	} else if ( $banner_type == "text" ) { 
	//Text Banner
		$cookie_name = substr ( md5 ( $banner_text ), 1,6 );
	} else if ( $banner_type == "text_image" ) { 
	//Image And Text Banner
		$cookie_name = substr ( md5 ( $banner_text_image_img ), 1,6 );
	} else {
		$cookie_name = "popup";
	}

	if ( !$banner_start) {
		$banner_start = 0;
	}
	
	if ( !$banner_close) {
		$banner_close = 0;
	}
	
	if ( $banner_overlay == "on") {
		$banner_overlay = "true";
	} else {
		$banner_overlay = "false";
	}
	

	?>
<!-- Footer -->
<!-- sergiu-mod: fb code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '-3780331-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=1376857139213767";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- sergiu-mod: end fb code -->
<div id="footer">
	<div class="container">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
		<?php endif; ?>
	</div>
</div>

<!-- Copyright -->
<div id="copyright">
    <div class="container">
    	<!-- Copyright block -->
      <div class="copyright-block">
        	<p>&copy; <?php echo date("Y");?> <a href="http://www.stiridb.ro/" target="_blank">stiriDB.ro</a>. <?php _e("All Rights Reserved.", THEME_NAME);?></p>
        	<p class="disclaimer">
        		<?php echo stripslashes($footerText);?>
        	</p>
      </div>
        <!-- Back to top -->
      <div id="back-to-top"><a><i class="icon-chevron-up"></i></a></div>
    </div>
</div>

<?php
			//pop up banner
			if ( $banner_type != "off" ) {
		?>
		
		<script type="text/javascript">
		<!--
		
		jQuery(document).ready(function($){
			$('#popup_content').popup( {
				starttime 			 : <?php echo $banner_start; ?>,
				selfclose			 : <?php echo $banner_close; ?>,
				popup_div			 : 'popup',
				overlay_div	 		 : 'overlay',
				close_id			 : 'baner_close',
				overlay				 : <?php echo $banner_overlay; ?>,
				opacity_level		 : 0.7,
				overlay_cc			 : false,
				centered			 : true,
				top	 		   		 : 130,
				left	 			 : 130,
				setcookie 			 : true,
				cookie_name	 		 : '<?php echo $cookie_name;?>',
				cookie_timeout 	 	 : <?php echo $banner_timeout; ?>,
				cookie_views 		 : <?php echo $banner_views ; ?>,
				floating	 		 : true,
				floating_reaction	 : 700,
				floating_speed 		 : 12,
				<?php 
					if ( $banner_fly_in != "off") { 
						echo "fly_in : true,
						fly_from : '".$banner_fly_in."', "; 
					} else {
						echo "fly_in : false,";
					}
				?>
				<?php 
					if ( $banner_fly_out != "off") { 
						echo "fly_out : true,
						fly_to : '".$banner_fly_out."', "; 
					} else {
						echo "fly_out : false,";
					}
				?>
				popup_appear  		 : 'show',
				popup_appear_time 	 : 0,
				confirm_close	 	 : false,
				confirm_close_text 	 : 'Do you really want to close?'
			} );
		});
		-->
		</script>
		<?php } ?>
		<?php wp_footer(); ?>
	</body>
</html>