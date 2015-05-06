<?php
add_action('widgets_init', create_function('', 'return register_widget("DF_latest_posts_2");'));

class DF_latest_posts_2 extends WP_Widget {
	function DF_latest_posts_2() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Latest Posts');	
	}

	function form($instance) {
		 $cat = esc_attr($instance['cat']);
		 $count = esc_attr($instance['count']);
		 $title = esc_attr($instance['title']);
        ?>
        	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( __( 'Count:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
			<?php
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'taxonomy'                 => 'category');
				$args = get_categories( $args ); 
			?> 	
			<select name="<?php echo $this->get_field_name('cat'); ?>" style="width: 100%; clear: both; margin: 0;">
				<option value=""><?php _e("Latest Posts", THEME_NAME);?></option>
				<?php foreach($args as $ar) { ?>
					<option value="<?php echo $ar->term_id; ?>" <?php if($ar->term_id==$cat)  {echo 'selected="selected"';} ?>><?php echo $ar->cat_name; ?></option>
				<?php } ?>
			</select>
		
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['cat'] = strip_tags($new_instance['cat']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
		$cat = $instance['cat'];
		$args=array(
			'cat'=> $cat,
			'posts_per_page'=> $count
		);
		
		$the_query = new WP_Query($args);
		$counter = 1;
		

		

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
