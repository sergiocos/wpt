<?php
add_action('widgets_init', create_function('', 'return register_widget("DF_latest_comments");'));

class DF_latest_comments extends WP_Widget {
	function DF_latest_comments() {
		 parent::WP_Widget(false, $name = THEME_FULL_NAME.' Latest Comments');	
	}

	function form($instance) {
		 $count = esc_attr($instance['count']);
		 $title = esc_attr($instance['title']);
        ?>
        	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Title:' , THEME_NAME )); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( __( 'Count:' , THEME_NAME ));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
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

		$args =	array(
			'status' => 'approve', 
			'order' => 'DESC',
			'number' => $count
		);	
						
		$comments = get_comments($args);
		$totalCount = count($comments);
		$counter = 1;
							

		
?>		
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
        <ul class="widget-latest-comments">
        	<?php 
				foreach($comments as $comment) {
					if($comment->user_id && $comment->user_id!="0") {
						$authorName = get_the_author_meta('display_name',$comment->user_id );
					} else {
						$authorName = $comment->comment_author;
					}	


        	?>
            	<li>
		            <a href="<?php echo get_comment_link($comment);?>">
		            	<img src="<?php echo df_get_avatar_url(get_avatar( $comment, 60));?>" alt="<?php echo $authorName; ?>" />
		            </a>
		            <h3><a href="<?php echo get_comment_link($comment);?>"><?php echo WordLimiter(get_comment_excerpt($comment->comment_ID),10);?></a></h3>
		            <div class="entry-meta">
		                <div class="description-em">
		                    <span class="by-date">
		                    	<?php echo human_time_diff( strtotime($comment->comment_date), current_time('timestamp') ).__(" ago", THEME_NAME); ?>
		                    </span>
		                </div>
		            </div>
            	</li>
            <?php } ?>
        </ul>
	
<?php echo $after_widget; ?>
		
	
      <?php
	}
}
?>
