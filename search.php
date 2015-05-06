<?php
	get_header();
	get_template_part(THEME_INCLUDES."top");
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?> 
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php get_template_part(THEME_LOOP."post"); ?>
	<?php endwhile; else: ?>
		<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
	<?php endif; ?>
	<?php customized_nav_btns($paged, $wp_query->max_num_pages); ?>	
<?php get_template_part(THEME_LOOP."loop","end"); ?> 	
<?php get_footer(); ?>