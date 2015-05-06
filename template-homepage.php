<?php
/*
Template Name: Dynamic Layout Page - Drag&Drop
*/	
?>
<?php get_header(); ?>
<?php get_template_part(THEME_INCLUDES.'top'); ?>

<?php 
	wp_reset_query();
	global $post;


	$slider = get_post_meta ( DF_page_id(), THEME_NAME."_slider", true ); 

	//blocks
	$homepage_layout_order = get_option(THEME_NAME."_homepage_layout_order_".DF_page_id());

?>
<?php get_template_part(THEME_LOOP."loop","start"); ?> 
    
		<?php the_content();?>
		<?php
			get_template_part(THEME_FUNCTIONS.'homepage', 'blocks');
			if(is_array($homepage_layout_order)) {
				foreach($homepage_layout_order as $blocks) { 
					$blockType = $blocks['type'];
					$blockId = $blocks['id'];
					$blockInputType = $blocks['inputType'];
					
					$blockType($blockType, $blockId,$blockInputType);
					
				}
			}
		?> 
<?php get_template_part(THEME_LOOP."loop","end"); ?> 
<?php get_footer(); ?>