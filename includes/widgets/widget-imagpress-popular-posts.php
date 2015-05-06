<?php
add_action('widgets_init', create_function('', 'return register_widget("DF_popular_posts");'));

class DF_popular_posts extends WP_Widget {
	function DF_popular_posts() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Popular Posts');	
	}

	function form($instance) {

		 $title = esc_attr($instance['title']);
		 $count = esc_attr($instance['count']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( __( 'Post count:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

		
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];

		$args=array(
			'posts_per_page' => $count,
			'order' => 'DESC',
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> THEME_NAME.'_post_views_count',
			'post_type'=> 'post'
		);

		$the_query = new WP_Query($args);
		$counter = 1;
		
		$totalCount = $the_query->found_posts;
		
		$blogID = get_option('page_for_posts');
		

?>		
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
		<ul class="widget-popular-posts">
			<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<?php 
					$src = get_post_thumb($the_query->post->ID, 0, 0);
					$image = df_image_html($the_query->post->ID,60,60);
				?>
	        	<li>
	        		<?php if($counter==1) { ?>
	            		<?php get_template_part(THEME_LOOP."image-widget"); ?>
	            	<?php } elseif($src['show']==true) { ?>
	            		<a href="<?php the_permalink();?>"><?php echo $image; ?></a>
	            	<?php } ?>
	            	<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
	                <div class="entry-meta">
	                    <div class="description-em">
	                        <span class="by-category">
								<?php 
									$postCategories = wp_get_post_categories($the_query->post->ID );
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
	                        <span class="by-view-number"><?php echo df_getPostViews($the_query->post->ID);?></span>
	                    </div>
	                </div>
	            </li>
	            <?php $counter++; ?>
			<?php endwhile; else: ?>
				<p><?php  _e( 'No posts where found' , THEME_NAME);?></p>
			<?php endif; ?>
        </ul>

	<?php echo $after_widget; ?>
		
	
      <?php
	}
}
?>
