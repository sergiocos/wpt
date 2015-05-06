<?php

	$logo = get_option(THEME_NAME.'_logo');			
	//search
	$search = get_option(THEME_NAME.'_search');	

	//social buttons	
	$twitter = get_option(THEME_NAME.'_twitter');		
	$facebook = get_option(THEME_NAME.'_facebook');		
	$dribbble = get_option(THEME_NAME.'_dribbble');		
	$linkedin = get_option(THEME_NAME.'_linkedin');		
	$pinterest = get_option(THEME_NAME.'_pinterest');		
	$googleplus = get_option(THEME_NAME.'_googleplus');		

	//homepage slider
	$homeSlider = get_post_meta(df_page_id(), THEME_NAME."_slider_type", true);
	//home header texts
	$headerText = get_post_meta(df_page_id(), THEME_NAME."_header_text", true);

	//menu style
	$menuStyle = get_option ( THEME_NAME."_menu_style" );

	


?>
<div id="top-bar">
	<?php 
		
		if ( function_exists( 'register_nav_menus' )) {
			$args = array(
				'container' => '',
				'theme_location' => 'top-menu',
				"link_before" => '',
				"menu_class" => 'top-menu',
				"link_after" => '' ,
				'items_wrap' => '<ul class="%2$s">%3$s</ul>',
				'depth' => 1,
				"echo" => false
			);
								
			if(has_nav_menu('top-menu')) {
				echo add_menu_arrows(wp_nav_menu($args));		
			} 
		}
	?>
	<!-- Social icons -->
	<ul class="social-icons">
    	<?php if($twitter) { ?><li class="twitter"><a href="<?php echo $twitter;?>" target="_blank" class="social-icon" title="<?php _e("Twitter", THEME_NAME);?>"><i class="icon-twitter"></i></a></li><?php } ?>
        <?php if($facebook) { ?><li class="facebook"><a href="<?php echo $facebook;?>" target="_blank" class="social-icon" title="<?php _e("Facebook", THEME_NAME);?>"><i class="icon-facebook"></i></a></li><?php } ?>
        <?php if($dribbble) { ?><li class="dribbble"><a href="<?php echo $dribbble;?>" target="_blank" class="social-icon" title="<?php _e("Dribbble", THEME_NAME);?>"><i class="icon-dribbble"></i></a></li><?php } ?>
        <?php if($linkedin) { ?><li class="linkedin"><a href="<?php echo $linkedin;?>" target="_blank" class="social-icon" title="<?php _e("Linkedin", THEME_NAME);?>"><i class="icon-linkedin"></i></a></li><?php } ?>
        <?php if($pinterest) { ?><li class="pinterest"><a href="<?php echo $pinterest;?>" target="_blank" class="social-icon" title="<?php _e("Pinterest", THEME_NAME);?>"><i class="icon-pinterest"></i></a></li><?php } ?>
        <?php if($googleplus) { ?><li class="google-plus"><a href="<?php echo $googleplus;?>" target="_blank" class="social-icon" title="<?php _e("Google+", THEME_NAME);?>"><i class="icon-google-plus"></i></a></li><?php } ?>
    </ul>
</div>

<?php if($menuStyle=="on") { ?>
<div id="sticky-container">
<?php } ?>
	<!-- Header -->
	<div id="header">
	    <!-- Logo -->
	    <?php if($logo) { ?> 
		    <div id="logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo $logo;?>" alt="<?php echo get_bloginfo('name');?>">
				</a>  
			</div>
		 <?php } else { ?>
			<div id="logo">
	    		<a href="<?php echo home_url(); ?>">
		       	 	<h1 class="site-title"><?php echo get_bloginfo('name');?></h1>
		       	</a>
	        </div>
		 <?php } ?>
	    <!-- Navigation -->
	    <div class="menu-wrap">
	        <a class="click-to-open-menu"><i class="icon-reorder"></i></a>
			<?php 
				
				if ( function_exists( 'register_nav_menus' )) {
					$args = array(
						'container' => '',
						'theme_location' => 'main-menu',
						"link_before" => '',
						"menu_class" => 'main_nav',
						"link_after" => '' ,
						'items_wrap' => '<ul class="primary-navigation %2$s">%3$s</ul>',
						'depth' => 3,
						"echo" => false
					);
										
					if(has_nav_menu('main-menu')) {
						echo add_menu_arrows(wp_nav_menu($args));		
					} else {
						echo "<ul class=\"primary-navigation\"><li class=\"navi-none\"><a href=\"".admin_url("nav-menus.php") ."\">Please set up ".THEME_FULL_NAME." menu!</a></li></ul>";
					}
				}
			?>

	    </div>
	    <?php if($search=="on") { ?>
		    <!-- Search bar -->
		    <form method="get" name="searchform" action="<?php echo home_url();?>" id="search-box">
		        <input type="text" name="s" class="search-field" placeholder="<?php _e("Search...", THEME_NAME);?>"/>
		        <a href="javascript:void(0);" onclick="document.getElementById('search-box').submit();"><i class="icon-search"></i></a>
		    </form>
		<?php } ?>
	</div>
<?php if($menuStyle=="on") { ?>
	</div>
<?php } ?>
	
<?php if (is_page_template ( 'template-homepage.php' ) && $homeSlider=="tab slider") { ?>
	<?php
		$args=array(
			'posts_per_page'	=>  5, 
			'order'	=> 'DESC',
			'orderby'	=> 'date',
			'meta_key'	=> THEME_NAME.'_main_slider',
			'meta_value'	=> 'yes',
			'post_type'	=> 'post',
			'ignore_sticky_posts '	=> 1,
			'post_status '	=> 'publish'
		);
		$my_query = new WP_Query($args);

	?>
	<!-- Main slider -->
	<div id="slider-container">
	    <div class="container">
	        <!-- Slides MUST BE 5 -->
	        <ul id="featured-slider">
	        	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	        		<?php
	        			$image = get_post_thumb($my_query->post->ID,800,500,THEME_NAME.'_slider_image'); 
	        			$video = get_post_meta( $my_query->post->ID, THEME_NAME."_video", true );
	        		?>
	        		<?php if(!$video) { ?>
	            		<li>
	            			<a href="<?php the_permalink();?>">
	            				<img src="<?php echo $image['src'];?>" title="<?php the_title();?>"/>
	            			</a>
	            		</li>
	            	<?php } else { ?>
	            		<li><?php echo df_get_video_embed($video,800,500);?></li>
	            	<?php } ?>
	            <?php endwhile; ?>
	            <?php endif; ?>
	        </ul>
	        <!-- Tabs for slides MUST BE 5 -->
	        <div id="featured-slider-pager">
	        	<?php $counter = 0;?>
	        	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	        		<?php 
	        			$image = get_post_thumb($my_query->post->ID,60,60,THEME_NAME.'_slider_image');  

					    //get post rating
					    $stars = df_avarage_rating($my_query->post->ID);
	        		?>
		            <a data-slide-index="<?php echo $counter;?>" href="<?php the_permalink();?>">
		                <img src="<?php echo $image['src'];?>" alt="<?php the_title();?>"/>
		                <h3><?php the_title();?></h3>
		                <div class="entry-meta">
		                    <?php 
		                        if(is_array($stars)) {
		                            df_rating_html($stars);
		                        } 
		                     ?>
		                    <div class="description-em">
			                    <span class="by-date"><?php the_time('j F, Y');?></span>
		                    </div>
		                </div>
		            </a>
	            <?php $counter++; ?>
	            <?php endwhile; ?>
	            <?php endif; ?>
	        </div>
	    </div>
	</div>
<?php } else if(is_page_template ( 'template-homepage.php' ) && $homeSlider=="featured carousel") { ?>
	<?php
		$args=array(
			'posts_per_page'	=>  10, 
			'order'	=> 'DESC',
			'orderby'	=> 'date',
			'meta_key'	=> THEME_NAME.'_main_slider',
			'meta_value'	=> 'yes',
			'post_type'	=> 'post',
			'ignore_sticky_posts '	=> 1,
			'post_status '	=> 'publish'
		);
		$my_query = new WP_Query($args);

	?>
<!-- Featured carousel -->
<div id="carousel-container">
	<div id="featured-carousel">
		<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
    		<?php 
			    //get post rating
			    $stars = df_avarage_rating($my_query->post->ID);
    		?>
	    	<!-- Article carousel -->
	        <div class="article-standard">
	            <?php 
	            	global $DF_carousel;
	            	$DF_carousel = true;
	            		get_template_part(THEME_LOOP."image"); 
	            	$DF_carousel = false
	            ?>
	            <div class="entry-content">
	                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	                <?php 
	                    if(is_array($stars)) {
	                        df_rating_html($stars);
	                    } 
	                 ?>
		            <?php 
		                add_filter('excerpt_length', 'new_excerpt_length_10');
		                the_excerpt();
		            ?>
	                <a href="<?php the_permalink();?>" class="read-more"><?php _e("Read more", THEME_NAME);?></a>
	                <div class="entry-meta">
                        <span class="by-category">
							<?php 
								$postCategories = wp_get_post_categories( $my_query->post->ID );
								$catCount = count($postCategories);
								$i=1;
								foreach($postCategories as $c){
									$cat = get_category( $c );
									$link = get_category_link($cat->term_id);
								?>
									<a href="<?php echo $link;?>">
										<?php echo $cat->name;?>
									</a>
									<?php if($catCount!=$i) { echo ", "; } ?> 
								<?php
									$i++;
								}
							?>
                        </span>
	                    <?php if ( comments_open() ) { ?>
	                        <span class="by-comments">
	                            <a href="<?php the_permalink();?>#comments"><?php comments_number("0","1","%"); ?></a>
	                        </span>
	                    <?php } ?>
	                </div>
	            </div>
	        </div>
        <?php endwhile; ?>
        <?php endif; ?>
	</div>
</div>

<?php } ?>

<?php if (is_page_template ( 'template-homepage.php' ) && $headerText) { ?>
	<!-- Intro block -->
	<div id="intro-block">
	    <div class="container">
	    	<?php echo do_shortcode(wpautop(stripslashes($headerText)));?>
	    </div>
	</div>
<?php } ?>