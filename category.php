<?php
	get_header();
	get_template_part(THEME_INCLUDES."top");
	

	//cat id
	$catId = get_cat_id( single_cat_title("",false) );

	//style
	$blogStyle = df_get_option($catId,"blog_style");
	if(!$blogStyle) { $blogStyle==1; }

	//post count
	$posts_per_page = get_option(THEME_NAME.'_posts_per_page_cat_'.$blogStyle);

	if($posts_per_page == "") {
		$posts_per_page = get_option('posts_per_page');
	}

	global $query_string;

	$paged = get_query_string_paged();
	query_posts($query_string."&posts_per_page=".$posts_per_page."&paged=".$paged);
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?> 
	<?php get_template_part(THEME_SINGLE."page-title"); ?> 
	<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	<?php get_template_part(THEME_LOOP."post"); ?>
	<?php endwhile; else: ?>
		<p><?php  _e('Sorry, no posts matched your criteria.' , THEME_NAME ); ?></p>
	<?php endif; ?>
	<?php customized_nav_btns($paged, $wp_query->max_num_pages); ?>	
<?php get_template_part(THEME_LOOP."loop","end"); ?> 	
<?php get_footer(); ?>
