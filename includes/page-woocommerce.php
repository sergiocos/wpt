<?php
	wp_reset_query();
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?> 
    <?php if (have_posts()) : ?>
    	<!-- Blank page container -->
        <div <?php post_class("blank-page-container"); ?>>
        	<?php woocommerce_content(); ?>
        </div>
	<?php else: ?>
		<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
	<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?> 
