<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//single page titile
	$titleShow = get_post_meta ( df_page_id(), THEME_NAME."_show_title", true );

?>					

<?php if($titleShow!="hide" && !is_category()) { ?> 
	<h5><?php echo df_page_title(); ?></h5>
	<hr>
<?php 
	} else if (is_category()) { 
		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;
		$titleColor = df_title_color($cat_id, "category", false);
		$catName = get_category($cat_id ); 

	?>

	<div class="category-title" style="background:<?php echo $titleColor;?>">
		<h5><?php echo $catName->name; ?></h5>
	</div>
<?php } ?>