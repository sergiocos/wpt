<?php
/*
Template Name: Archive Page
*/	
?>
<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>
<?php
	wp_reset_query();
	global $wpdb;
	$limit = 0;
	$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,	YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
	$cc=1;

	//page titile
	$titleShow = get_post_meta ( $post->ID, THEME_NAME."_title_show", true ); 
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?> 
    <?php if (have_posts()) : ?>
		<div class="blank-page-container">
				<?php get_template_part(THEME_SINGLE."page-title"); ?> 
				<?php 
					$args = array(
						'type'                     => 'post',
						'child_of'                 => 0,
						'orderby'                  => 'name',
						'order'                    => 'ASC',
						'hide_empty'               => 1,
						'hierarchical'             => 1,
						'taxonomy'                 => 'category',
						'pad_counts'               => false );
							
					$categories = get_categories( $args );

					$count_total = count($categories);
					$firstColumnCount = round(($count_total/2), 0, PHP_ROUND_HALF_UP);
					$secondColumnCount = $count_total - $firstColumnCount;
					$counter = 1;
					foreach ( $categories as $category ) { 

						$cat_id = $category->term_id;
						$query='cat='.$cat_id.'&showposts=4';
						$my_query = new WP_Query($query);
						$titleColor = df_title_color($cat_id, "category", false);
						$postCount = $my_query->post_count;

				?>
				<?php if($cc==1) { ?>
					<div class="row">
				<?php } ?>
	                <div class="col4">
			            <div class="archive-lists">
			            	<div class="archive-title" style="background:<?php echo $titleColor;?>">
			            		<h4><?php echo $category->name; ?></h4>
			            		<a href="<?php echo get_category_link($cat_id);?>"><?php _e("More", THEME_NAME);?></a>
			            	</div>
			                <ul>
			                	<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
			                		<?php $image = get_post_thumb($my_query->post->ID,0,0); ?>
			                    	<li>
			                    		<?php if($image['show']==true) { ?>
			                    			<a href="<?php the_permalink();?>"><?php echo df_image_html($post->ID,50,50); ?></a>
			                    		<?php } ?>
			                    		<a href="<?php the_permalink();?>"><?php the_title();?></a>
			                    	</li>
								<?php endwhile; ?>
								<?php endif; ?>
			                </ul>
			            </div>
		            </div>
					<?php if($cc%3==0 || $cc==$count_total) { ?>
		           		</div>
		           	<?php } ?>
					<?php if($cc%3==0 && $cc!=$count_total) { ?>
		           		<div class="row">
		           	<?php } ?>

	            <?php $cc++; ?>
	            <?php } ?>
		</div>
	<?php else: ?>
		<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
	<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?> 
<?php get_footer(); ?>