<?php
global $different_themes_managment;
$differentThemes_slider_options= array(
 array(
	"type" => "navigation",
	"name" => "Style Settings",
	"slug" => "custom-styling"
),

array(
	"type" => "tab",
	"slug"=>'custom-styling'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"font_style", "name"=>"Font Style"),
		array("slug"=>"page_style", "name"=>"Page Style/Colors"),

		)
),

/* ------------------------------------------------------------------------*
 * PAGE FONT SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'font_style'
),

array(
	"type" => "row",

),

array(
	"type" => "google_font_select",
	"title" => "Body font family:",
	"id" => $different_themes_managment->themeslug."_google_font_1",
	"sort" => "alpha",
	"info" => "Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",
	"default_font" => array('font' => "Verdana", 'txt' => "(default)")
),

array(
	"type" => "google_font_select",
	"title" => "Headings, menu etc:",
	"id" => $different_themes_managment->themeslug."_google_font_2",
	"sort" => "alpha",
	"info" => "Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",
	"default_font" => array('font' => "Roboto Slab", 'txt' => "(default)")
),

array(
	"type" => "close",

),

array(
"type" => "row",

),

array(
	"type" => "title",
	"title" => "Font Size/Line Height"
),

array(
	"type" => "input",
	"title" => "Body font size in PX:",
	"id" => $different_themes_managment->themeslug."_font_size_1",
	"number" => "yes",
	"std" => "14"
),

array(
	"type" => "input",
	"title" => "Body line height in PX:",
	"id" => $different_themes_managment->themeslug."_line_height_1",
	"number" => "yes",
	"std" => "22"
),

array(
	"type" => "close",

),

array(
	"type" => "save",
	"title" => "Save Changes"
),
   
array(
	"type" => "closesubtab"
),
/* ------------------------------------------------------------------------*
 * PAGE  SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'page_style'
),

array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => "Menu Style"
),



array(
	"type" => "radio",
	"id" => $different_themes_managment->themeslug."_menu_style",
	"radio" => array(
		array("title" => "Normal:", "value" => "off"),
		array("title" => "Sticky:", "value" => "on")
	),
	"std" => "on",
),

  
array(
	"type" => "close",

),
array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => "Default Category"
),

array(
	"type" => "color",
	"title" => "Color:",
	"id" => $different_themes_managment->themeslug."_default_cat_color",
	"std" => "333"
),     
array(
	"type" => "close",

),
array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => "Page Color"
),

array(
	"type" => "color",
	"title" => "Links colors:",
	"id" => $different_themes_managment->themeslug."_color_1",
	"std" => "e74c3c"
),
array(
	"type" => "color",
	"title" => "Background colors:",
	"id" => $different_themes_managment->themeslug."_color_2",
	"std" => "e74c3c"
),
array(
	"type" => "color",
	"title" => "Rating stars color:",
	"id" => $different_themes_managment->themeslug."_color_3",
	"std" => "e67e22"
),
array(
	"type" => "color",
	"title" => "Background color for header, widget title, copyright, search button, slider container:",
	"id" => $different_themes_managment->themeslug."_color_4",
	"std" => "333333"
),
array(
	"type" => "color",
	"title" => "Background color for footer:",
	"id" => $different_themes_managment->themeslug."_color_5",
	"std" => "222222"
),
array(
	"type" => "color",
	"title" => "Background hover color for menu links:",
	"id" => $different_themes_managment->themeslug."_color_6",
	"std" => "fff"
),
array(
	"type" => "color",
	"title" => "Text color for menu links, search button:",
	"id" => $different_themes_managment->themeslug."_color_7",
	"std" => "fff"
),
array(
	"type" => "color",
	"title" => "Text hover and current color for menu links, search button:",
	"id" => $different_themes_managment->themeslug."_color_8",
	"std" => "fff"
),
array(
	"type" => "color",
	"title" => "Text color for widget title, copyright block:",
	"id" => $different_themes_managment->themeslug."_color_9",
	"std" => "999999"
),
array(
	"type" => "color",
	"title" => "Border color for menu links:",
	"id" => $different_themes_managment->themeslug."_color_10",
	"std" => "444444"
),

array(
	"type" => "color",
	"title" => "Slider background color for tabs container slider:",
	"id" => $different_themes_managment->themeslug."_color_11",
	"std" => "333333"
),

array(
	"type" => "color",
	"title" => "Slider background color for tab link:",
	"id" => $different_themes_managment->themeslug."_color_12",
	"std" => "222222"
),

array(
	"type" => "color",
	"title" => "Slider background color for active tab link:",
	"id" => $different_themes_managment->themeslug."_color_13",
	"std" => "ffffff"
),

array(
	"type" => "color",
	"title" => "Slider links and entry meta in slider tabs:",
	"id" => $different_themes_managment->themeslug."_color_14",
	"std" => "ffffff"
),

array(
	"type" => "color",
	"title" => "Slider active links in slider tabs:",
	"id" => $different_themes_managment->themeslug."_color_15",
	"std" => "ffffff"
),
array(
	"type" => "color",
	"title" => "Border for tabs links:",
	"id" => $different_themes_managment->themeslug."_color_16",
	"std" => "111111"
),
array(
	"type" => "color",
	"title" => "Background color for active tab link:",
	"id" => $different_themes_managment->themeslug."_color_17",
	"std" => "ffffff"
),

array(
	"type" => "close",

),
array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => "Body Backgrounds"
),

array(
	"type" => "radio",
	"id" => $different_themes_managment->themeslug."_body_bg_type",
	"radio" => array(
		array("title" => "Pattern:", "value" => "pattern"),
		array("title" => "Custom Image:", "value" => "image"),
		array("title" => "Color:", "value" => "color"),
	),
	"std" => "pattern"
),

array(
	"type" => "select",
	"title" => "Patterns ",
	"id" => $different_themes_managment->themeslug."_body_pattern",
	"options"=>array(
		array("slug"=>"body_pattern", "name"=>"body_pattern"), 
		array("slug"=>"cartographer", "name"=>"cartographer"), 
		array("slug"=>"diagmonds", "name"=>"diagmonds"), 
		array("slug"=>"dvsup", "name"=>"dvsup"), 
		array("slug"=>"escheresque_ste", "name"=>"escheresque_ste"), 
		array("slug"=>"45degree_fabric", "name"=>"45degree_fabric"), 
		array("slug"=>"argyle", "name"=>"argyle"),
		array("slug"=>"beige_paper", "name"=>"beige_paper"),
		array("slug"=>"bgnoise_lg", "name"=>"bgnoise_lg"),
		array("slug"=>"black_denim", "name"=>"black_denim"),
		array("slug"=>"black_linen_v2", "name"=>"black_linen_v2"),
		array("slug"=>"black_paper", "name"=>"black_paper"),
		array("slug"=>"black-Linen", "name"=>"black-Linen"),
		array("slug"=>"blackmamba", "name"=>"blackmamba"),
		array("slug"=>"blu_stripes", "name"=>"blu_stripes"),
		array("slug"=>"bright_squares", "name"=>"bright_squares"),
		array("slug"=>"brushed_alu", "name"=>"brushed_alu"),
		array("slug"=>"brushed_alu_dark", "name"=>"brushed_alu_dark"),
		array("slug"=>"candyhole", "name"=>"candyhole"),
		array("slug"=>"checkered_pattern", "name"=>"checkered_pattern"),
		array("slug"=>"classy_fabric", "name"=>"classy_fabric"),
		array("slug"=>"concrete_wall_3", "name"=>"concrete_wall_3"),
		array("slug"=>"connect", "name"=>"connect"),
		array("slug"=>"cork_1", "name"=>"cork_1"),
		array("slug"=>"dark_brick_wall", "name"=>"dark_brick_wall"),
		array("slug"=>"dark_dotted", "name"=>"dark_dotted"),
		array("slug"=>"dark_geometric", "name"=>"dark_geometric"),
		array("slug"=>"dark_leather", "name"=>"dark_leather"),
		array("slug"=>"dark_mosaic", "name"=>"dark_mosaic"),
		array("slug"=>"dark_wood", "name"=>"dark_wood"),
		array("slug"=>"detailed", "name"=>"detailed"),
		array("slug"=>"diagonal-noise", "name"=>"diagonal-noise"),
		array("slug"=>"fabric_1", "name"=>"fabric_1"),
		array("slug"=>"fake_luxury", "name"=>"fake_luxury"),
		array("slug"=>"felt", "name"=>"felt"),
		array("slug"=>"flowers", "name"=>"flowers"),
		array("slug"=>"foggy_birds", "name"=>"foggy_birds"),
		array("slug"=>"graphy", "name"=>"graphy"),
		array("slug"=>"gray_sand", "name"=>"gray_sand"),
		array("slug"=>"green_gobbler", "name"=>"green_gobbler"),
		array("slug"=>"green-fibers", "name"=>"green-fibers"),
		array("slug"=>"grid_noise", "name"=>"grid_noise"),
		array("slug"=>"gridme", "name"=>"gridme"),
		array("slug"=>"grilled", "name"=>"grilled"),
		array("slug"=>"grunge_wall", "name"=>"grunge_wall"),
		array("slug"=>"handmadepaper", "name"=>"handmadepaper"),
		array("slug"=>"inflicted", "name"=>"inflicted"),
		array("slug"=>"irongrip", "name"=>"irongrip"),
		array("slug"=>"knitted-netting", "name"=>"knitted-netting"),
		array("slug"=>"leather_1", "name"=>"leather_1"),
		array("slug"=>"light_alu", "name"=>"light_alu"),
		array("slug"=>"light_checkered_tiles", "name"=>"light_checkered_tiles"),
		array("slug"=>"light_honeycomb", "name"=>"light_honeycomb"),
		array("slug"=>"lined_paper", "name"=>"lined_paper"),
		array("slug"=>"little_pluses", "name"=>"little_pluses"),
		array("slug"=>"mirrored_squares", "name"=>"mirrored_squares"),
		array("slug"=>"noise_pattern_with_crosslines", "name"=>"noise_pattern_with_crosslines"),
		array("slug"=>"noisy", "name"=>"noisy"),
		array("slug"=>"old_mathematics", "name"=>"old_mathematics"),
		array("slug"=>"padded", "name"=>"padded"),
		array("slug"=>"paper_1", "name"=>"paper_1"),
		array("slug"=>"paper_2", "name"=>"paper_2"),
		array("slug"=>"paper_3", "name"=>"paper_3"),
		array("slug"=>"pineapplecut", "name"=>"pineapplecut"),
		array("slug"=>"pinstriped_suit", "name"=>"pinstriped_suit"),
		array("slug"=>"plaid", "name"=>"plaid"),
		array("slug"=>"project_papper", "name"=>"project_papper"),
		array("slug"=>"px_by_Gre3g", "name"=>"px_by_Gre3g"),
		array("slug"=>"quilt", "name"=>"quilt"),
		array("slug"=>"random_grey_variations", "name"=>"random_grey_variations"),
		array("slug"=>"ravenna", "name"=>"ravenna"),
		array("slug"=>"real_cf", "name"=>"real_cf"),
		array("slug"=>"robots", "name"=>"robots"),
		array("slug"=>"rockywall", "name"=>"rockywall"),
		array("slug"=>"roughcloth", "name"=>"roughcloth"),
		array("slug"=>"small-crackle-bright", "name"=>"small-crackle-bright"),
		array("slug"=>"smooth_wall", "name"=>"smooth_wall"),
		array("slug"=>"snow", "name"=>"snow"),
		array("slug"=>"soft_kill", "name"=>"soft_kill"),
		array("slug"=>"square_bg", "name"=>"square_bg"),
		array("slug"=>"starring", "name"=>"starring"),
		array("slug"=>"stucco", "name"=>"stucco"),
		array("slug"=>"subtle_freckles", "name"=>"subtle_freckles"),
		array("slug"=>"subtle_orange_emboss", "name"=>"subtle_orange_emboss"),
		array("slug"=>"subtle_zebra_3d", "name"=>"subtle_zebra_3d"),
		array("slug"=>"tileable_wood_texture", "name"=>"tileable_wood_texture"),
		array("slug"=>"type", "name"=>"type"),
		array("slug"=>"vichy", "name"=>"vichy"),
		array("slug"=>"washi", "name"=>"washi"),
		array("slug"=>"white_sand", "name"=>"white_sand"),
		array("slug"=>"white_texture", "name"=>"white_texture"),
		array("slug"=>"whitediamond", "name"=>"whitediamond"),
		array("slug"=>"whitey", "name"=>"whitey"),
		array("slug"=>"woven", "name"=>"woven"),
		array("slug"=>"xv", "name"=>"xv"),
	),
	"protected" => array(
		array("id" => $different_themes_managment->themeslug."_body_bg_type", "value" => "pattern")
	)
),

array(
	"type" => "color",
	"title" => "Body Background Color:",
	"id" => $different_themes_managment->themeslug."_body_color",
	"std" => "f1f1f1",
	"protected" => array(
		array("id" => $different_themes_managment->themeslug."_body_bg_type", "value" => "color")
	)
),

array(
	"type" => "upload",
	"title" => "Body Background Image:",
	"id" => $different_themes_managment->themeslug."_body_image",
	"protected" => array(
		array("id" => $different_themes_managment->themeslug."_body_bg_type", "value" => "image")
	)
),

array(
	"type" => "close",

),

array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => "Slider Backgrounds"
),

array(
	"type" => "radio",
	"id" => $different_themes_managment->themeslug."_slider_bg_type",
	"radio" => array(
		array("title" => "Off:", "value" => "off"),
		array("title" => "Pattern:", "value" => "pattern"),
		array("title" => "Custom Image:", "value" => "image"),
		array("title" => "Color:", "value" => "color"),
	),
	"std" => "pattern"
),

array(
	"type" => "select",
	"title" => "Patterns ",
	"id" => $different_themes_managment->themeslug."_slider_pattern",
	"options"=>array(
		array("slug"=>"body_pattern", "name"=>"body_pattern"), 
		array("slug"=>"cartographer", "name"=>"cartographer"), 
		array("slug"=>"diagmonds", "name"=>"diagmonds"), 
		array("slug"=>"dvsup", "name"=>"dvsup"), 
		array("slug"=>"escheresque_ste", "name"=>"escheresque_ste"), 
		array("slug"=>"45degree_fabric", "name"=>"45degree_fabric"), 
		array("slug"=>"argyle", "name"=>"argyle"),
		array("slug"=>"beige_paper", "name"=>"beige_paper"),
		array("slug"=>"bgnoise_lg", "name"=>"bgnoise_lg"),
		array("slug"=>"black_denim", "name"=>"black_denim"),
		array("slug"=>"black_linen_v2", "name"=>"black_linen_v2"),
		array("slug"=>"black_paper", "name"=>"black_paper"),
		array("slug"=>"black-Linen", "name"=>"black-Linen"),
		array("slug"=>"blackmamba", "name"=>"blackmamba"),
		array("slug"=>"blu_stripes", "name"=>"blu_stripes"),
		array("slug"=>"bright_squares", "name"=>"bright_squares"),
		array("slug"=>"brushed_alu", "name"=>"brushed_alu"),
		array("slug"=>"brushed_alu_dark", "name"=>"brushed_alu_dark"),
		array("slug"=>"candyhole", "name"=>"candyhole"),
		array("slug"=>"checkered_pattern", "name"=>"checkered_pattern"),
		array("slug"=>"classy_fabric", "name"=>"classy_fabric"),
		array("slug"=>"concrete_wall_3", "name"=>"concrete_wall_3"),
		array("slug"=>"connect", "name"=>"connect"),
		array("slug"=>"cork_1", "name"=>"cork_1"),
		array("slug"=>"dark_brick_wall", "name"=>"dark_brick_wall"),
		array("slug"=>"dark_dotted", "name"=>"dark_dotted"),
		array("slug"=>"dark_geometric", "name"=>"dark_geometric"),
		array("slug"=>"dark_leather", "name"=>"dark_leather"),
		array("slug"=>"dark_mosaic", "name"=>"dark_mosaic"),
		array("slug"=>"dark_wood", "name"=>"dark_wood"),
		array("slug"=>"detailed", "name"=>"detailed"),
		array("slug"=>"diagonal-noise", "name"=>"diagonal-noise"),
		array("slug"=>"fabric_1", "name"=>"fabric_1"),
		array("slug"=>"fake_luxury", "name"=>"fake_luxury"),
		array("slug"=>"felt", "name"=>"felt"),
		array("slug"=>"flowers", "name"=>"flowers"),
		array("slug"=>"foggy_birds", "name"=>"foggy_birds"),
		array("slug"=>"graphy", "name"=>"graphy"),
		array("slug"=>"gray_sand", "name"=>"gray_sand"),
		array("slug"=>"green_gobbler", "name"=>"green_gobbler"),
		array("slug"=>"green-fibers", "name"=>"green-fibers"),
		array("slug"=>"grid_noise", "name"=>"grid_noise"),
		array("slug"=>"gridme", "name"=>"gridme"),
		array("slug"=>"grilled", "name"=>"grilled"),
		array("slug"=>"grunge_wall", "name"=>"grunge_wall"),
		array("slug"=>"handmadepaper", "name"=>"handmadepaper"),
		array("slug"=>"inflicted", "name"=>"inflicted"),
		array("slug"=>"irongrip", "name"=>"irongrip"),
		array("slug"=>"knitted-netting", "name"=>"knitted-netting"),
		array("slug"=>"leather_1", "name"=>"leather_1"),
		array("slug"=>"light_alu", "name"=>"light_alu"),
		array("slug"=>"light_checkered_tiles", "name"=>"light_checkered_tiles"),
		array("slug"=>"light_honeycomb", "name"=>"light_honeycomb"),
		array("slug"=>"lined_paper", "name"=>"lined_paper"),
		array("slug"=>"little_pluses", "name"=>"little_pluses"),
		array("slug"=>"mirrored_squares", "name"=>"mirrored_squares"),
		array("slug"=>"noise_pattern_with_crosslines", "name"=>"noise_pattern_with_crosslines"),
		array("slug"=>"noisy", "name"=>"noisy"),
		array("slug"=>"old_mathematics", "name"=>"old_mathematics"),
		array("slug"=>"padded", "name"=>"padded"),
		array("slug"=>"paper_1", "name"=>"paper_1"),
		array("slug"=>"paper_2", "name"=>"paper_2"),
		array("slug"=>"paper_3", "name"=>"paper_3"),
		array("slug"=>"pineapplecut", "name"=>"pineapplecut"),
		array("slug"=>"pinstriped_suit", "name"=>"pinstriped_suit"),
		array("slug"=>"plaid", "name"=>"plaid"),
		array("slug"=>"project_papper", "name"=>"project_papper"),
		array("slug"=>"px_by_Gre3g", "name"=>"px_by_Gre3g"),
		array("slug"=>"quilt", "name"=>"quilt"),
		array("slug"=>"random_grey_variations", "name"=>"random_grey_variations"),
		array("slug"=>"ravenna", "name"=>"ravenna"),
		array("slug"=>"real_cf", "name"=>"real_cf"),
		array("slug"=>"robots", "name"=>"robots"),
		array("slug"=>"rockywall", "name"=>"rockywall"),
		array("slug"=>"roughcloth", "name"=>"roughcloth"),
		array("slug"=>"small-crackle-bright", "name"=>"small-crackle-bright"),
		array("slug"=>"smooth_wall", "name"=>"smooth_wall"),
		array("slug"=>"snow", "name"=>"snow"),
		array("slug"=>"soft_kill", "name"=>"soft_kill"),
		array("slug"=>"square_bg", "name"=>"square_bg"),
		array("slug"=>"starring", "name"=>"starring"),
		array("slug"=>"stucco", "name"=>"stucco"),
		array("slug"=>"subtle_freckles", "name"=>"subtle_freckles"),
		array("slug"=>"subtle_orange_emboss", "name"=>"subtle_orange_emboss"),
		array("slug"=>"subtle_zebra_3d", "name"=>"subtle_zebra_3d"),
		array("slug"=>"tileable_wood_texture", "name"=>"tileable_wood_texture"),
		array("slug"=>"type", "name"=>"type"),
		array("slug"=>"vichy", "name"=>"vichy"),
		array("slug"=>"washi", "name"=>"washi"),
		array("slug"=>"white_sand", "name"=>"white_sand"),
		array("slug"=>"white_texture", "name"=>"white_texture"),
		array("slug"=>"whitediamond", "name"=>"whitediamond"),
		array("slug"=>"whitey", "name"=>"whitey"),
		array("slug"=>"woven", "name"=>"woven"),
		array("slug"=>"xv", "name"=>"xv"),
	),
	"protected" => array(
		array("id" => $different_themes_managment->themeslug."_slider_bg_type", "value" => "pattern")
	)
),

array(
	"type" => "color",
	"title" => "Slider Background Color:",
	"id" => $different_themes_managment->themeslug."_slider_color",
	"std" => "f1f1f1",
	"protected" => array(
		array("id" => $different_themes_managment->themeslug."_slider_bg_type", "value" => "color")
	)
),

array(
	"type" => "upload",
	"title" => "Slider Background Image:",
	"id" => $different_themes_managment->themeslug."_slider_image",
	"protected" => array(
		array("id" => $different_themes_managment->themeslug."_slider_bg_type", "value" => "image")
	)
),

array(
	"type" => "close",

),


array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => "Intro Text Backgrounds"
),

array(
	"type" => "radio",
	"id" => $different_themes_managment->themeslug."_intro_bg_type",
	"radio" => array(
		array("title" => "Off:", "value" => "off"),
		array("title" => "Pattern:", "value" => "pattern"),
		array("title" => "Custom Image:", "value" => "image"),
		array("title" => "Color:", "value" => "color"),
	),
	"std" => "pattern"
),

array(
	"type" => "select",
	"title" => "Patterns ",
	"id" => $different_themes_managment->themeslug."_intro_pattern",
	"options"=>array(
		array("slug"=>"body_pattern", "name"=>"body_pattern"), 
		array("slug"=>"cartographer", "name"=>"cartographer"), 
		array("slug"=>"diagmonds", "name"=>"diagmonds"), 
		array("slug"=>"dvsup", "name"=>"dvsup"), 
		array("slug"=>"escheresque_ste", "name"=>"escheresque_ste"), 
		array("slug"=>"45degree_fabric", "name"=>"45degree_fabric"), 
		array("slug"=>"argyle", "name"=>"argyle"),
		array("slug"=>"beige_paper", "name"=>"beige_paper"),
		array("slug"=>"bgnoise_lg", "name"=>"bgnoise_lg"),
		array("slug"=>"black_denim", "name"=>"black_denim"),
		array("slug"=>"black_linen_v2", "name"=>"black_linen_v2"),
		array("slug"=>"black_paper", "name"=>"black_paper"),
		array("slug"=>"black-Linen", "name"=>"black-Linen"),
		array("slug"=>"blackmamba", "name"=>"blackmamba"),
		array("slug"=>"blu_stripes", "name"=>"blu_stripes"),
		array("slug"=>"bright_squares", "name"=>"bright_squares"),
		array("slug"=>"brushed_alu", "name"=>"brushed_alu"),
		array("slug"=>"brushed_alu_dark", "name"=>"brushed_alu_dark"),
		array("slug"=>"candyhole", "name"=>"candyhole"),
		array("slug"=>"checkered_pattern", "name"=>"checkered_pattern"),
		array("slug"=>"classy_fabric", "name"=>"classy_fabric"),
		array("slug"=>"concrete_wall_3", "name"=>"concrete_wall_3"),
		array("slug"=>"connect", "name"=>"connect"),
		array("slug"=>"cork_1", "name"=>"cork_1"),
		array("slug"=>"dark_brick_wall", "name"=>"dark_brick_wall"),
		array("slug"=>"dark_dotted", "name"=>"dark_dotted"),
		array("slug"=>"dark_geometric", "name"=>"dark_geometric"),
		array("slug"=>"dark_leather", "name"=>"dark_leather"),
		array("slug"=>"dark_mosaic", "name"=>"dark_mosaic"),
		array("slug"=>"dark_wood", "name"=>"dark_wood"),
		array("slug"=>"detailed", "name"=>"detailed"),
		array("slug"=>"diagonal-noise", "name"=>"diagonal-noise"),
		array("slug"=>"fabric_1", "name"=>"fabric_1"),
		array("slug"=>"fake_luxury", "name"=>"fake_luxury"),
		array("slug"=>"felt", "name"=>"felt"),
		array("slug"=>"flowers", "name"=>"flowers"),
		array("slug"=>"foggy_birds", "name"=>"foggy_birds"),
		array("slug"=>"graphy", "name"=>"graphy"),
		array("slug"=>"gray_sand", "name"=>"gray_sand"),
		array("slug"=>"green_gobbler", "name"=>"green_gobbler"),
		array("slug"=>"green-fibers", "name"=>"green-fibers"),
		array("slug"=>"grid_noise", "name"=>"grid_noise"),
		array("slug"=>"gridme", "name"=>"gridme"),
		array("slug"=>"grilled", "name"=>"grilled"),
		array("slug"=>"grunge_wall", "name"=>"grunge_wall"),
		array("slug"=>"handmadepaper", "name"=>"handmadepaper"),
		array("slug"=>"inflicted", "name"=>"inflicted"),
		array("slug"=>"irongrip", "name"=>"irongrip"),
		array("slug"=>"knitted-netting", "name"=>"knitted-netting"),
		array("slug"=>"leather_1", "name"=>"leather_1"),
		array("slug"=>"light_alu", "name"=>"light_alu"),
		array("slug"=>"light_checkered_tiles", "name"=>"light_checkered_tiles"),
		array("slug"=>"light_honeycomb", "name"=>"light_honeycomb"),
		array("slug"=>"lined_paper", "name"=>"lined_paper"),
		array("slug"=>"little_pluses", "name"=>"little_pluses"),
		array("slug"=>"mirrored_squares", "name"=>"mirrored_squares"),
		array("slug"=>"noise_pattern_with_crosslines", "name"=>"noise_pattern_with_crosslines"),
		array("slug"=>"noisy", "name"=>"noisy"),
		array("slug"=>"old_mathematics", "name"=>"old_mathematics"),
		array("slug"=>"padded", "name"=>"padded"),
		array("slug"=>"paper_1", "name"=>"paper_1"),
		array("slug"=>"paper_2", "name"=>"paper_2"),
		array("slug"=>"paper_3", "name"=>"paper_3"),
		array("slug"=>"pineapplecut", "name"=>"pineapplecut"),
		array("slug"=>"pinstriped_suit", "name"=>"pinstriped_suit"),
		array("slug"=>"plaid", "name"=>"plaid"),
		array("slug"=>"project_papper", "name"=>"project_papper"),
		array("slug"=>"px_by_Gre3g", "name"=>"px_by_Gre3g"),
		array("slug"=>"quilt", "name"=>"quilt"),
		array("slug"=>"random_grey_variations", "name"=>"random_grey_variations"),
		array("slug"=>"ravenna", "name"=>"ravenna"),
		array("slug"=>"real_cf", "name"=>"real_cf"),
		array("slug"=>"robots", "name"=>"robots"),
		array("slug"=>"rockywall", "name"=>"rockywall"),
		array("slug"=>"roughcloth", "name"=>"roughcloth"),
		array("slug"=>"small-crackle-bright", "name"=>"small-crackle-bright"),
		array("slug"=>"smooth_wall", "name"=>"smooth_wall"),
		array("slug"=>"snow", "name"=>"snow"),
		array("slug"=>"soft_kill", "name"=>"soft_kill"),
		array("slug"=>"square_bg", "name"=>"square_bg"),
		array("slug"=>"starring", "name"=>"starring"),
		array("slug"=>"stucco", "name"=>"stucco"),
		array("slug"=>"subtle_freckles", "name"=>"subtle_freckles"),
		array("slug"=>"subtle_orange_emboss", "name"=>"subtle_orange_emboss"),
		array("slug"=>"subtle_zebra_3d", "name"=>"subtle_zebra_3d"),
		array("slug"=>"tileable_wood_texture", "name"=>"tileable_wood_texture"),
		array("slug"=>"type", "name"=>"type"),
		array("slug"=>"vichy", "name"=>"vichy"),
		array("slug"=>"washi", "name"=>"washi"),
		array("slug"=>"white_sand", "name"=>"white_sand"),
		array("slug"=>"white_texture", "name"=>"white_texture"),
		array("slug"=>"whitediamond", "name"=>"whitediamond"),
		array("slug"=>"whitey", "name"=>"whitey"),
		array("slug"=>"woven", "name"=>"woven"),
		array("slug"=>"xv", "name"=>"xv"),
	),
	"protected" => array(
		array("id" => $different_themes_managment->themeslug."_intro_bg_type", "value" => "pattern")
	)
),

array(
	"type" => "color",
	"title" => "Intro Text Background Color:",
	"id" => $different_themes_managment->themeslug."_intro_color",
	"std" => "f1f1f1",
	"protected" => array(
		array("id" => $different_themes_managment->themeslug."_intro_bg_type", "value" => "color")
	)
),

array(
	"type" => "upload",
	"title" => "Intro Text Background Image:",
	"id" => $different_themes_managment->themeslug."_intro_image",
	"protected" => array(
		array("id" => $different_themes_managment->themeslug."_intro_bg_type", "value" => "image")
	)
),

array(
	"type" => "close",

),


array(
	"type" => "save",
	"title" => "Save Changes"
),
   
array(
	"type" => "closesubtab"
),

array(
	"type" => "closetab"
)
 
);

$different_themes_managment->add_options($differentThemes_slider_options);
?>