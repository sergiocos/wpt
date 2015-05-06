<?php
add_action('widgets_init', create_function('', 'return register_widget("DF_reviews");'));

class DF_reviews extends WP_Widget {
	function DF_reviews() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Reviews');	
	}

	function form($instance) {

		 $title = esc_attr($instance['title']);
		 $count = esc_attr($instance['count']);
		 $type = esc_attr($instance['type']);
		 $cat = esc_attr($instance['cat']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( __( 'Post count:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('type'); ?>"><?php printf ( __( 'Type:' , THEME_NAME ));?> 
				<select style="width: 100%; clear: both; margin: 0;" id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>">
					<option value="latests"<?php if($type=="latests") echo ' selected="selected"';?>><?php _e("Latests", THEME_NAME);?></option>
					<option value="top"<?php if($type=="top") echo ' selected="selected"';?>><?php _e("Top", THEME_NAME);?></option>
				</select>
			</p>
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
			<p><label for="<?php echo $this->get_field_id('cat'); ?>"><?php printf ( __( 'Category:' , THEME_NAME ));?> 
				<select name="<?php echo $this->get_field_name('cat'); ?>" style="width: 100%; clear: both; margin: 0;">
					<option value=""><?php _e("Latest Posts", THEME_NAME);?></option>
					<?php foreach($args as $ar) { ?>
						<option value="<?php echo $ar->term_id; ?>" <?php if($ar->term_id==$cat)  {echo 'selected="selected"';} ?>><?php echo $ar->cat_name; ?></option>
					<?php } ?>
				</select>
			</p>
		
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['type'] = strip_tags($new_instance['type']);
		$instance['cat'] = strip_tags($new_instance['cat']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
		$cat = $instance['cat'];
		$type = $instance['type'];

		if($type=="top") {
			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'order' => 'DESC',
				'orderby'	=> 'meta_value_num',
				'meta_key'	=> THEME_NAME.'_ratings_average',
			);
		} else {

			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'meta_query' => array(
				    array(
				        'key' => THEME_NAME.'_ratings_average',
				        'value'   => '0',
				        'compare' => '>='
				    )
				)
			);
		}

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

					//get post rating
    				$stars = df_avarage_rating($the_query->post->ID);
				?>
	        	<li>
	        		<?php if($counter==1) { ?>
	            		<?php get_template_part(THEME_LOOP."image-widget"); ?>
	            	<?php } elseif($src['show']==true) { ?>
	            		<a href="<?php the_permalink();?>"><?php echo $image; ?></a>
	            	<?php } ?>
	            	<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <div class="entry-review">
		                <?php 
		                    if(is_array($stars)) {
		                        df_rating_html($stars);
		                    } 
		                 ?>
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
