<?php
	wp_reset_query();
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?> 
    <?php if (have_posts()) : ?>
    	<!-- Blank page container -->
        <div <?php post_class("blank-page-container"); ?>>
        	<?php get_template_part(THEME_SINGLE."image"); ?> 
        	<?php get_template_part(THEME_SINGLE."page-title"); ?> 
        		<?php the_content(); ?>
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
				
		</div>
		<?php get_template_part(THEME_SINGLE."share"); ?>
		<?php wp_reset_query(); ?>
		<?php if ( comments_open() ) : ?>
			<?php comments_template(); // Get comments.php template ?>
		<?php endif; ?>
	<?php else: ?>
		<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
	<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?> 

  