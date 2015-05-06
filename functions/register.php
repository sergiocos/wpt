<?php

$homepage = get_option( 'show_on_front');
if( $homepage == "page" ) {
	$meta = get_post_custom_values("_wp_page_template",get_option( 'page_on_front'));
	if($homepage == "page" && $meta[0] == "template-homepage.php") {$has_homepage=true;} else {$has_homepage=false;}
}	
		
function register_my_menus() {
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array( 
				'top-menu' => __( 'Top Menu', THEME_NAME ),
				'main-menu' => __( 'Main Menu', THEME_NAME ),
			)
		);
	}	
}

function create_portfolio() {
		
	$labels = array(
    'name' => _x('Gallery', THEME_NAME.' menu'),
    'singular_name' => _x('Gallery Menu', THEME_NAME.' menu'),
    'add_new' => _x('Add New', THEME_NAME.' menu'),
    'add_new_item' => __('Add New Item', THEME_NAME),
    'edit_item' => __('Edit Item', THEME_NAME),
    'new_item' => __('New Gallery Item', THEME_NAME),
    'view_item' => __('View Item', THEME_NAME),
    'search_items' => __('Search Gallery Items', THEME_NAME),
    'not_found' =>  __('No Gallery items found', THEME_NAME),
    'not_found_in_trash' => __('No Gallery items found in Trash', THEME_NAME), 
    'parent_item_colon' => ''
	);
  
	register_taxonomy("gallery-cat", 
					    	array("Categories"), 
					    	array(	"hierarchical" => true, 
					    			"label" => "Categories", 
					    			"singular_label" => "Categories", 
					    			"rewrite" => true,
					    			"query_var" => true
					    		));  
		
		register_post_type( 'gallery-item',
		array( 'labels' => $labels,
	         'public' => true,  
	         'show_ui' => true,  
	         'capability_type' => 'post',  
	         'hierarchical' => false,  
			 'taxonomies' => array('gallery-cat'),
	         'supports' => array('title', 'editor', 'thumbnail', 'comments', 'page-attributes') ) );

}

function orange_register_sidebar($name, $id){
	register_sidebar(array('name'=>$name,
		'id' => $id,
		'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
	));
}


/* -------------------------------------------------------------------------*
 * 							DEFAULT SIDEBARS								*
 * -------------------------------------------------------------------------*/

$orange_sidebars=array(array('name'=>'Default Sidebar', 'id'=>'default'),array('name'=>'Footer', 'id'=>'footer'));	

if(function_exists("bp_current_component")) {
	$orange_sidebars[]=array('name'=>'BuddyPress Sidebar', 'id'=>'buddypress_sidebar');
}

$sidebar_strings = get_option(THEME_NAME.'_sidebar_names');
$generated_sidebars = explode("|*|", $sidebar_strings);
array_pop($generated_sidebars);
$orange_generated_sidebars=array();
	
foreach($generated_sidebars as $sidebar) {
	$orange_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar));
	$orange_generated_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar));
}
 
 /* -------------------------------------------------------------------------*
 * 							REGISTER ALL SIDEBARS
 * -------------------------------------------------------------------------*/

if (function_exists('register_sidebar')) {
	
	//register the sidebars
	foreach($orange_sidebars as $sidebar){
		orange_register_sidebar($sidebar['name'], $sidebar['id']);
	}
	
}
add_action('init', 'create_portfolio');
add_action('init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );
?>