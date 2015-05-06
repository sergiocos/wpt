<?php
	wp_reset_query();
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?> 
	<!-- Blank page container -->
    <div <?php post_class("blank-page-container"); ?>>
		<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();

					the_content();
				} // end while
			} // end if
		?>
    </div>
<?php get_template_part(THEME_LOOP."loop","end"); ?> 
