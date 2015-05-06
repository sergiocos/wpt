<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* -------------------------------------------------------------------------*
 * 							HOMEPAGE LATEST ARTICLES						*
 * -------------------------------------------------------------------------*/
 
	function homepage_news_block($blockType, $blockId,$blockInputType) {
		global $post;
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		if($cat) {
			$pageColor = df_title_color($cat, "category", false);
			$link = get_category_link($cat);
		} else {
			$pageColor = df_title_color(get_option('page_for_posts'),'page', false);
			$link = get_page_link(get_option('page_for_posts'));
		}

		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'showposts' => $count,
			'ignore_sticky_posts' => "1"
		);

		
		$my_query = new WP_Query($args);
		$counter = 1;


?>
		<div class="clear"></div>
    	<!-- Multiple horizontal posts -->
        <div class="multiple">
            <!-- Main post -->
            <div class="article-vertical">
            	<?php if ($my_query->have_posts()) : $my_query->the_post();?>
            		<?php     
            			//get post rating
   						$stars = df_avarage_rating($my_query->post->ID);
   					?>
					<?php get_template_part(THEME_LOOP."image","home"); ?>
	                <div class="entry-content">
	                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	                    <div class="entry-meta">
		                    <?php 
		                        if(is_array($stars)) {
		                            df_rating_html($stars);
		                        } 
		                     ?>
	                        <div class="description-em">
	                            <span class="by-view-number"><?php echo df_getPostViews($my_query->post->ID);?></span>
	                            <span class="by-date"><?php the_time('j F, Y');?></span>
		                        <?php if ( comments_open() ) { ?>
		                            <span class="by-comments">
		                                <a href="<?php the_permalink();?>#comments"><?php comments_number("0","1","%"); ?></a>
		                            </span>
		                        <?php } ?>
	                        </div>
	                    </div>
	            		<?php 
                			add_filter('excerpt_length', 'new_excerpt_length_20');
                			the_excerpt();
            			?>
	                    <a href="<?php the_permalink();?>" class="read-more"><?php _e("Read more", THEME_NAME);?></a>
	                </div>
	            <?php endif; ?>	
            </div>
            <!-- Multiple posts on the right side -->
            <div class="multiple-posts">
                <!-- Title -->
                <div class="multiple-posts-title" style="background-color:<?php echo $pageColor;?>">
                    <?php if($title) { ?>
                    	<h5><?php echo $title;?></h5>
                    <?php } ?>
                    <a href="<?php echo $link;?>"><?php _e("View all", THEME_NAME);?></a>
                </div>
                <ul>
                	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	            		<?php     
	            			//get post rating
	   						$stars = df_avarage_rating($my_query->post->ID);
	   						$image = get_post_thumb($my_query->post->ID,0,0);
	   					?>
	                	<!-- Posts -->
	                    <li>
	                    	<?php if($image['show']==true) { ?>
		                        <a href="<?php the_permalink();?>">
		                        	<?php echo df_image_html($my_query->post->ID,60,60); ?>
		                        </a>
	                        <?php } ?>
	                        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	                        <div class="entry-meta">
			                    <?php 
			                        if(is_array($stars)) {
			                            df_rating_html($stars);
			                        } 
			                     ?>
	                            <div class="description-em">
	                                <span class="by-view-number"><?php echo df_getPostViews($my_query->post->ID);?></span>
	                                <span class="by-date"><?php the_time('j F, Y');?></span>
	                            </div>
	                        </div>
	                    </li>
                	<?php endwhile; ?>
                	<?php endif; ?>	
                </ul>
            </div>
        </div>



<?php
	}
?>
<?php
/* -------------------------------------------------------------------------*
 * 					HOMEPAGE POPULAR ARTICLES 3 BLOCKS						*
 * -------------------------------------------------------------------------*/
 
	function homepage_popular_block_2($blockType, $blockId,$blockInputType) {

?>
		<!-- Clear any floats -->
        <div class="clear"></div>
		<?php for ($i=1;$i<=3;$i++) { ?>
		<?php 
			$title = get_option(THEME_NAME."_".$blockType."_title_".$i."_".$blockId);
			$cat = get_option(THEME_NAME."_".$blockType."_cat_".$i."_".$blockId);
			$count = get_option(THEME_NAME."_".$blockType."_count_".$i."_".$blockId);
			if($cat) {
				$pageColor = df_title_color($cat, "category", false);
			} else {
				$pageColor = df_title_color(get_option('page_for_posts'),'page', false);
			}

			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'order' => 'DESC',
				'orderby'	=> 'meta_value_num',
				'meta_key'	=> THEME_NAME.'_post_views_count',
			);

			
			$my_query = new WP_Query($args);
			$counter = 1;
			if($i==3) { $class = " last"; } else { $class = false; }
		?>


			<!-- Rating standings -->
	        <div class="rating-standings col4<?php echo $class;?>">
	            <!-- Title -->
	            <div class="standings-title" style="background-color:<?php echo $pageColor;?>">
	                <?php if($title) { ?>
	                	<h5><?php echo $title;?></h5>
	                <?php } ?>
	            </div>
	            <!-- Post lists -->
	            <ul>
	            	<?php $counter = 1;?>
	            	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	            		<?php     
	            			//get post rating
	   						$stars = df_avarage_rating($my_query->post->ID);
	   					?>
		                <li>
		                    <span class="standing-number"><?php echo $counter;?></span>
		                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		                    <div class="entry-meta">
			                    <?php 
			                        if(is_array($stars)) {
			                            df_rating_html($stars);
			                        } 
			                     ?>
	                            <div class="description-em">
	                                <span class="by-view-number"><?php echo df_getPostViews($my_query->post->ID);?></span>
	                                <span class="by-date"><?php the_time('j F, Y');?></span>
	                            </div>
		                    </div>
		                </li>
	            	<?php $counter++; ?>
	            	<?php endwhile; ?>
	            	<?php endif; ?>	
	            </ul>
	        </div>
		<?php } ?>
		<!-- Clear any floats -->
        <div class="clear"></div>
<?php
	}
?>
<?php
/* -------------------------------------------------------------------------*
 * 							HOMEPAGE POPULAR ARTICLES						*
 * -------------------------------------------------------------------------*/
 
	function homepage_popular_block($blockType, $blockId,$blockInputType) {
		global $post;
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		if($cat) {
			$pageColor = df_title_color($cat, "category", false);
		} else {
			$pageColor = df_title_color(get_option('page_for_posts'),'page', false);
		}


		$args=array(
			'posts_per_page' => $count,
			'order' => 'DESC',
			'cat' => $cat,
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> THEME_NAME.'_post_views_count',
			'post_type'=> 'post'
		);

		
		$my_query = new WP_Query($args);
		$counter = 1;


?>
		<div class="clear"></div>
    	<!-- Multiple horizontal posts -->
        <div class="multiple">
            <!-- Main post -->
            <div class="article-vertical">
            	<?php if ($my_query->have_posts()) : $my_query->the_post();?>
            		<?php     
            			//get post rating
   						$stars = df_avarage_rating($my_query->post->ID);
   					?>
					<?php get_template_part(THEME_LOOP."image","home"); ?>
	                <div class="entry-content">
	                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	                    <div class="entry-meta">
		                    <?php 
		                        if(is_array($stars)) {
		                            df_rating_html($stars);
		                        } 
		                     ?>
	                        <div class="description-em">
	                            <span class="by-view-number"><?php echo df_getPostViews($my_query->post->ID);?></span>
	                            <span class="by-date"><?php the_time('j F, Y');?></span>
		                        <?php if ( comments_open() ) { ?>
		                            <span class="by-comments">
		                                <a href="<?php the_permalink();?>#comments"><?php comments_number("0","1","%"); ?></a>
		                            </span>
		                        <?php } ?>
	                        </div>
	                    </div>
	            		<?php 
                			add_filter('excerpt_length', 'new_excerpt_length_20');
                			the_excerpt();
            			?>
	                    <a href="<?php the_permalink();?>" class="read-more"><?php _e("Read more", THEME_NAME);?></a>
	                </div>
	            <?php endif; ?>	
            </div>
            <!-- Multiple posts on the right side -->
            <div class="multiple-posts">
                <!-- Title -->
                <div class="multiple-posts-title" style="background-color:<?php echo $pageColor;?>">
                    <?php if($title) { ?>
                    	<h5><?php echo $title;?></h5>
                    <?php } ?>
                </div>
                <ul>
                	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	            		<?php     
	            			//get post rating
	   						$stars = df_avarage_rating($my_query->post->ID);
	   						$image = get_post_thumb($my_query->post->ID,0,0);
	   					?>
	                	<!-- Posts -->
	                    <li>
	                    	<?php if($image['show']==true) { ?>
		                        <a href="<?php the_permalink();?>">
		                        	<?php echo df_image_html($my_query->post->ID,60,60); ?>
		                        </a>
	                        <?php } ?>
	                        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	                        <div class="entry-meta">
			                    <?php 
			                        if(is_array($stars)) {
			                            df_rating_html($stars);
			                        } 
			                     ?>
	                            <div class="description-em">
	                                <span class="by-view-number"><?php echo df_getPostViews($my_query->post->ID);?></span>
	                                <span class="by-date"><?php the_time('j F, Y');?></span>
	                            </div>
	                        </div>
	                    </li>
                	<?php endwhile; ?>
                	<?php endif; ?>	
                </ul>
            </div>
        </div>



<?php
	}
?>
<?php 
/* -------------------------------------------------------------------------*
 * 					HOMEPAGE LATEST ARTICLES Blog Style						*
 * -------------------------------------------------------------------------*/
 
	function homepage_news_block_5($blockType, $blockId,$blockInputType) {
		global $blogStyle;
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$pagination = get_option(THEME_NAME."_".$blockType."_pagination_".$blockId);
		$blogStyle = get_option(THEME_NAME."_".$blockType."_blog_style_".$blockId);
		$paged = get_query_string_paged();
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'paged'=>$paged,
			'posts_per_page' => $count,
		);

		
		$my_query = new WP_Query($args);
		$counter = 1;


?>
	<div class="clear"></div>
	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
		<?php get_template_part(THEME_LOOP."post"); ?>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php if($pagination=="on") { customized_nav_btns($paged, $my_query->max_num_pages); } ?>		
<?php
	}
?>

<?php
/* -------------------------------------------------------------------------*
 * 					HOMEPAGE LATEST ARTICLES STYLE 2						*
 * -------------------------------------------------------------------------*/
 
	function homepage_news_block_2($blockType, $blockId,$blockInputType) {

?>
		<!-- Clear any floats -->
        <div class="clear"></div>
		<?php for ($i=1;$i<=2;$i++) { ?>
		<?php 
			$title = get_option(THEME_NAME."_".$blockType."_title_".$i."_".$blockId);
			$cat = get_option(THEME_NAME."_".$blockType."_cat_".$i."_".$blockId);
			$count = get_option(THEME_NAME."_".$blockType."_count_".$i."_".$blockId);
			if($cat) {
				$pageColor = df_title_color($cat, "category", false);
				$link = get_category_link($cat);
			} else {
				$pageColor = df_title_color(get_option('page_for_posts'),'page', false);
				$link = get_page_link(get_option('page_for_posts'));
			}

			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'order' => 'DESC',
				'orderby'	=> 'meta_value_num',
				'meta_key'	=> THEME_NAME.'_ratings_average',
			);

			
			$my_query = new WP_Query($args);
			$counter = 1;
			if($i==2) { $class = " last"; } else { $class = false; }
		?>


			<!-- Rating standings -->
	        <div class="rating-standings col6<?php echo $class;?>">
	            <!-- Title -->
	            <div class="standings-title" style="background-color:<?php echo $pageColor;?>">
	                <?php if($title) { ?>
	                	<h5><?php echo $title;?></h5>
	                <?php } ?>
	                <a href="<?php echo $link;?>"><?php _e("View all", THEME_NAME);?></a>
	            </div>
	            <!-- Post lists -->
	            <ul>
	            	<?php $counter = 1;?>
	            	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	            		<?php     
	            			//get post rating
	   						$stars = df_avarage_rating($my_query->post->ID);
	   					?>
		                <li>
		                    <span class="standing-number"><?php echo $counter;?></span>
		                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		                    <div class="entry-meta">
			                    <?php 
			                        if(is_array($stars)) {
			                            df_rating_html($stars);
			                        } 
			                     ?>
	                            <div class="description-em">
	                                <span class="by-view-number"><?php echo df_getPostViews($my_query->post->ID);?></span>
	                                <span class="by-date"><?php the_time('j F, Y');?></span>
	                            </div>
		                    </div>
		                </li>
	            	<?php $counter++; ?>
	            	<?php endwhile; ?>
	            	<?php endif; ?>	
	            </ul>
	        </div>
		<?php } ?>
		<!-- Clear any floats -->
        <div class="clear"></div>
<?php
	}
?>
<?php
/* -------------------------------------------------------------------------*
 * 					HOMEPAGE LATEST ARTICLES STYLE 3						*
 * -------------------------------------------------------------------------*/
 
	function homepage_news_block_3($blockType, $blockId,$blockInputType) {

?>
		<!-- Clear any floats -->
        <div class="clear"></div>
		<?php for ($i=1;$i<=3;$i++) { ?>
		<?php 
			$title = get_option(THEME_NAME."_".$blockType."_title_".$i."_".$blockId);
			$cat = get_option(THEME_NAME."_".$blockType."_cat_".$i."_".$blockId);
			$count = get_option(THEME_NAME."_".$blockType."_count_".$i."_".$blockId);
			if($cat) {
				$pageColor = df_title_color($cat, "category", false);
				$link = get_category_link($cat);
			} else {
				$pageColor = df_title_color(get_option('page_for_posts'),'page', false);
				$link = get_page_link(get_option('page_for_posts'));
			}

			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'order' => 'DESC',
				'orderby'	=> 'meta_value_num',
				'meta_key'	=> THEME_NAME.'_ratings_average',
			);

			
			$my_query = new WP_Query($args);
			$counter = 1;
			if($i==3) { $class = " last"; } else { $class = false; }
		?>


			<!-- Rating standings -->
	        <div class="rating-standings col4<?php echo $class;?>">
	            <!-- Title -->
	            <div class="standings-title" style="background-color:<?php echo $pageColor;?>">
	                <?php if($title) { ?>
	                	<h5><?php echo $title;?></h5>
	                <?php } ?>
	                <a href="<?php echo $link;?>"><?php _e("View all", THEME_NAME);?></a>
	            </div>
	            <!-- Post lists -->
	            <ul>
	            	<?php $counter = 1;?>
	            	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	            		<?php     
	            			//get post rating
	   						$stars = df_avarage_rating($my_query->post->ID);
	   					?>
		                <li>
		                    <span class="standing-number"><?php echo $counter;?></span>
		                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		                    <div class="entry-meta">
			                    <?php 
			                        if(is_array($stars)) {
			                            df_rating_html($stars);
			                        } 
			                     ?>
	                            <div class="description-em">
	                                <span class="by-view-number"><?php echo df_getPostViews($my_query->post->ID);?></span>
	                                <span class="by-date"><?php the_time('j F, Y');?></span>
	                            </div>
		                    </div>
		                </li>
	            	<?php $counter++; ?>
	            	<?php endwhile; ?>
	            	<?php endif; ?>	
	            </ul>
	        </div>
		<?php } ?>
		<!-- Clear any floats -->
        <div class="clear"></div>
<?php
	}
?>


<?php
/* -------------------------------------------------------------------------*
 * 					HOMEPAGE LATEST ARTICLES STYLE 4						*
 * -------------------------------------------------------------------------*/
 
	function homepage_news_block_4($blockType, $blockId,$blockInputType) {

?>
		<!-- Clear any floats -->
        <div class="clear"></div>
		<?php for ($i=1;$i<=2;$i++) { ?>
		<?php 
			$title = get_option(THEME_NAME."_".$blockType."_title_".$i."_".$blockId);
			$cat = get_option(THEME_NAME."_".$blockType."_cat_".$i."_".$blockId);
			$count = get_option(THEME_NAME."_".$blockType."_count_".$i."_".$blockId);
			if($cat) {
				$pageColor = df_title_color($cat, "category", false);
				$link = get_category_link($cat);
			} else {
				$pageColor = df_title_color(get_option('page_for_posts'),'page', false);
				$link = get_page_link(get_option('page_for_posts'));
			}

			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
			);

			
			$my_query = new WP_Query($args);
			$counter = 1;
			if($i==2) { $class = " last"; } else { $class = false; }
		?>
		<!-- Vertical muliple posts --> 
	    <div class="vertical-multiple col6<?php echo $class;?>">
	        <!-- Title -->
       		<div class="multiple-posts-title" style="background-color:<?php echo $pageColor;?>">
                <?php if($title) { ?>
                	<h5><?php echo $title;?></h5>
                <?php } ?>
                <a href="<?php echo $link;?>"><?php _e("View all", THEME_NAME);?></a>
            </div>


	        <div class="article-vertical">
            	<?php if ($my_query->have_posts()) : $my_query->the_post();?>
            		<?php     
            			//get post rating
   						$stars = df_avarage_rating($my_query->post->ID);
   					?>
   					
					<?php get_template_part(THEME_LOOP."image","home"); ?>
	                <div class="entry-content">
	                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	                    <div class="entry-meta">
		                    <?php 
		                        if(is_array($stars)) {
		                            df_rating_html($stars);
		                        } 
		                     ?>
	                        <div class="description-em">
	                            <span class="by-view-number"><?php echo df_getPostViews($my_query->post->ID);?></span>
	                            <span class="by-date"><?php the_time('j F, Y');?></span>
		                        <?php if ( comments_open() ) { ?>
		                            <span class="by-comments">
		                                <a href="<?php the_permalink();?>#comments"><?php comments_number("0","1","%"); ?></a>
		                            </span>
		                        <?php } ?>
	                        </div>
	                    </div>
	            		<?php 
                			add_filter('excerpt_length', 'new_excerpt_length_20');
                			the_excerpt();
            			?>
	                    <a href="<?php the_permalink();?>" class="read-more"><?php _e("Read more", THEME_NAME);?></a>
	                </div>
	            <?php endif; ?>	
	        </div>

	        <!-- Multiple posts under main post -->
	        <div class="multiple-posts">
	            <ul>
	            	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	            		<?php     
	            			//get post rating
	   						$stars = df_avarage_rating($my_query->post->ID);
   							$image = get_post_thumb($my_query->post->ID,0,0);
	   					?>
	                	<!-- Posts -->
	                    <li>
	                    	<?php if($image['show']==true) { ?>
		                        <a href="<?php the_permalink();?>">
		                        	<?php echo df_image_html($my_query->post->ID,60,60); ?>
		                        </a>
	                        <?php } ?>
	                        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	                        <div class="entry-meta">
			                    <?php 
			                        if(is_array($stars)) {
			                            df_rating_html($stars);
			                        } 
			                     ?>
	                            <div class="description-em">
	                                <span class="by-view-number"><?php echo df_getPostViews($my_query->post->ID);?></span>
	                                <span class="by-date"><?php the_time('j F, Y');?></span>
	                            </div>
	                        </div>
	                    </li>
	               	<?php $counter++; ?>
	            	<?php endwhile; ?>
	            	<?php endif; ?>	
	            </ul>
	        </div>
		</div>

		<?php } ?>
		<!-- Clear any floats -->
        <div class="clear"></div>
<?php
	}
?>


<?php

/* -------------------------------------------------------------------------*
 * 									BANNER CODE								*
 * -------------------------------------------------------------------------*/

	function homepage_banner($blockType, $blockId,$blockInputType) {
		$text = stripslashes(get_option(THEME_NAME."_".$blockType."_".$blockId));
	?>
		<div class="clear"></div>
		<!-- Ad Banner -->
		<div class="ad-banner-block">
			<?php echo do_shortcode($text);?>
		</div>
	<?php
	}
?>

<?php

/* -------------------------------------------------------------------------*
 * 									HTML CODE								*
 * -------------------------------------------------------------------------*/

	function homepage_html($blockType, $blockId,$blockInputType) {
		$text = stripslashes(get_option(THEME_NAME."_".$blockType."_".$blockId));
	?>
	<div class="clear"></div>
	<div class="full-block">
	     <?php echo do_shortcode($text);?>
	</div>
	<?php
	}
?>
