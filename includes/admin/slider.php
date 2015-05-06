<?php
global $different_themes_managment;
$differentThemes_slider_options= array(
 array(
	"type" => "navigation",
	"name" => "Slider Settings",
	"slug" => "sliders"
),

array(
	"type" => "tab",
	"slug"=>'custom-styling'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"slider_settings", "name"=>"Slider Settings"),
		)
),

/* ------------------------------------------------------------------------*
 * HEADER SLIDER SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'slider_settings'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Main Slider Options",
),

array(
	"type" => "select",
	"title" => "Auto Start",
	"id" => $different_themes_managment->themeslug."_main_auto",
	"options"=>array(
		array("slug"=>"true", "name"=>"True"), 
		array("slug"=>"false", "name"=>"False")
	),
	"std" => "true"
),

array(
	"type" => "select",
	"title" => "Text Caption",
	"id" => $different_themes_managment->themeslug."_main_caption",
	"options"=>array(
		array("slug"=>"true", "name"=>"True"), 
		array("slug"=>"false", "name"=>"False")
	),
	"std" => "true"
),

array(
	"type" => "select",
	"title" => "Slide Mode",
	"id" => $different_themes_managment->themeslug."_main_mode",
	"options"=>array(
		array("slug"=>"horizontal", "name"=>"Horizontal"), 
		array("slug"=>"vertical", "name"=>"Vertical"),
		array("slug"=>"fade", "name"=>"Fade")
	),
	"std" => "horizontal"
),

array(
	"type" => "close"

),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Post Slider Options",
),

array(
	"type" => "select",
	"title" => "Auto Start",
	"id" => $different_themes_managment->themeslug."_post_auto",
	"options"=>array(
		array("slug"=>"true", "name"=>"True"), 
		array("slug"=>"false", "name"=>"False")
	),
	"std" => "true"
),

array(
	"type" => "select",
	"title" => "Slide Mode",
	"id" => $different_themes_managment->themeslug."_post_mode",
	"options"=>array(
		array("slug"=>"horizontal", "name"=>"Horizontal"), 
		array("slug"=>"vertical", "name"=>"Vertical"),
		array("slug"=>"fade", "name"=>"Fade")
	),
	"std" => "face"
),

array(
	"type" => "close"

),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Widget Slider Options",
),

array(
	"type" => "select",
	"title" => "Auto Start",
	"id" => $different_themes_managment->themeslug."_widget_auto",
	"options"=>array(
		array("slug"=>"true", "name"=>"True"), 
		array("slug"=>"false", "name"=>"False")
	),
	"std" => "true"
),
array(
	"type" => "select",
	"title" => "Text Caption",
	"id" => $different_themes_managment->themeslug."_widget_caption",
	"options"=>array(
		array("slug"=>"true", "name"=>"True"), 
		array("slug"=>"false", "name"=>"False")
	),
	"std" => "true"
),
array(
	"type" => "select",
	"title" => "Slide Mode",
	"id" => $different_themes_managment->themeslug."_widget_mode",
	"options"=>array(
		array("slug"=>"horizontal", "name"=>"Horizontal"), 
		array("slug"=>"vertical", "name"=>"Vertical"),
		array("slug"=>"fade", "name"=>"Fade")
	),
	"std" => "face"
),

array(
	"type" => "close"

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