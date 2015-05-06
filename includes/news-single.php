<?php
	wp_reset_query();

	$showTitle = get_post_meta ( $post->ID, THEME_NAME."_show_title", true ); 

?>
<?php get_template_part(THEME_LOOP."loop","start"); ?> 
 	<?php if (have_posts()) : ?>
		<!-- Single post -->
		<div class="single-post-container">
		    <?php get_template_part(THEME_SINGLE."image"); ?> 
            <!-- Entry content -->
            <div <?php post_class("entry-content"); ?>>
            	<?php if($showTitle!="hide") { ?>
               	 	<h1 class="entry-title"><?php the_title(); ?></h1>
	                <div class="entry-meta">
	                    <div class="description-em">
	                        <span class="by-category">
								<?php 
									$postCategories = wp_get_post_categories( $post->ID );
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
	                        <span class="by-date"><?php the_time('j F, Y');?></span>
			                <?php if ( comments_open() ) { ?>
			               		<span class="by-comments">
			               			<a href="<?php the_permalink();?>#comments"><?php comments_number("0","1","%"); ?></a>
			               		</span>
			               	<?php } ?>
	                    </div>
	                </div>
	            <?php } ?>
                <?php the_content(); ?>
            </div>
			<?php 
				$args = array(
					'before'           => '<div class="post-pages"><p>' . __('Pages:',THEME_NAME),
					'after'            => '</p></div>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'nextpagelink'     => __('Next page',THEME_NAME),
					'previouspagelink' => __('Previous page',THEME_NAME),
					'pagelink'         => '%',
					'echo'             => 1
				);

				wp_link_pages($args); 
			?>
			<?php get_template_part(THEME_SINGLE."post-tags"); ?>
            <?php get_template_part(THEME_SINGLE."share"); ?>
            <?php get_template_part(THEME_SINGLE."post-switcher"); ?>
	    </div>
	    <?php get_template_part(THEME_SINGLE."post-ratings"); ?>
		<?php wp_reset_query(); ?>
		<?php if ( comments_open() ) : ?>
			<?php comments_template(); // Get comments.php template ?>
		<?php endif; ?>
	<?php else: ?>
		<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
	<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?> 	
