<?php
global $DFfields;
$differentThemes_general_options= array(



/* ------------------------------------------------------------------------*
 * HOME SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "homepage_blocks",
	"title" => "Homepage Blocks:",
	"id" => $DFfields->themeslug."_homepage_blocks",
	"blocks" => array(
		array(
			"title" => "News & Category News (Blog Style)",
			"type" => "homepage_news_block_5",
			"options" => array(
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_news_block_5_count", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array( "type" => "checkbox", "id" => $DFfields->themeslug."_homepage_news_block_5_pagination", "title" => "Allow Pagination:", "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_news_block_5_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( 
					"type" => "select", 
					"id" => $DFfields->themeslug."_homepage_news_block_5_blog_style", 
					"title" => "Style:", 
					"home" => "yes",
					"options"=>array(
						array("slug"=>"1", "name"=>"Default"), 
						array("slug"=>"2", "name"=>"3 posts in row"), 
						array("slug"=>"3", "name"=>"2 posts in row"), 
						array("slug"=>"4", "name"=>"1 posts in row"),
					),
				),
			),
		),		
		array(
			"title" => "News & Category Block",
			"type" => "homepage_news_block",
			"options" => array(
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_news_block_title", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_news_block_count", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_news_block_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				)
			),
		),		
		array(
			"title" => "Popular Posts",
			"type" => "homepage_popular_block",
			"options" => array(
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_popular_block_title", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_popular_block_count", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_popular_block_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
			),
		),		
		array(
			"title" => "Top Rated Posts In 2 Blocks",
			"type" => "homepage_news_block_2",
			"options" => array(
				array( "type" => "title", "title" => "Block 1", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_news_block_2_title_1", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_news_block_2_count_1", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_news_block_2_cat_1",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "title", "title" => "Block 2", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_news_block_2_title_2", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_news_block_2_count_2", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_news_block_2_cat_2",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				)
			),
		),			
		array(
			"title" => "Top Rated Posts In 3 Blocks",
			"type" => "homepage_news_block_3",
			"options" => array(
				array( "type" => "title", "title" => "Block 1", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_news_block_3_title_1", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_news_block_3_count_1", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_news_block_3_cat_1",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "title", "title" => "Block 2", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_news_block_3_title_2", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_news_block_3_count_2", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_news_block_3_cat_2",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "title", "title" => "Block 3", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_news_block_3_title_3", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_news_block_3_count_3", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_news_block_3_cat_3",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				)
			),
		),				
		array(
			"title" => "Popular Posts In 3 Blocks",
			"type" => "homepage_popular_block_2",
			"options" => array(
				array( "type" => "title", "title" => "Block 1", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_popular_block_2_title_1", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_popular_block_2_count_1", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_popular_block_2_cat_1",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "title", "title" => "Block 2", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_popular_block_2_title_2", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_popular_block_2_count_2", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_popular_block_2_cat_2",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "title", "title" => "Block 3", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_popular_block_2_title_3", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_popular_block_2_count_3", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_popular_block_2_cat_3",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				)
			),
		),	
		array(
			"title" => "News & Category Blocks (2 blocks)",
			"type" => "homepage_news_block_4",
			"options" => array(
				array( "type" => "title", "title" => "Block 1", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_news_block_4_title_1", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_news_block_4_count_1", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_news_block_4_cat_1",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "title", "title" => "Block 2", "home" => "yes" ),
				array( "type" => "input", "id" => $DFfields->themeslug."_homepage_news_block_4_title_2", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $DFfields->themeslug."_homepage_news_block_4_count_2", "title" => "Count:", "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $DFfields->themeslug."_homepage_news_block_4_cat_2",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				)
			),
		),	


		array(
			"title" => "Banner",
			"type" => "homepage_banner",
			"options" => array(
				array( "type" => "textarea", "id" => $DFfields->themeslug."_homepage_banner", "title" => "HTML Code:","sample" => '<a href="http://www.different-themes.com" target="_blank"><img src="'.THEME_IMAGE_URL.'728x90.gif" alt="" title="" /></a>', "home" => "yes" ),
			),
		),
		array(
			"title" => "HTML Code",
			"type" => "homepage_html",
			"options" => array(
				array( "type" => "textarea", "id" => $DFfields->themeslug."_homepage_html", "title" => "HTML Code:", "home" => "yes" ),
			),
		),
	)
),


 
 );


$DFfields->add_options($differentThemes_general_options);
?>