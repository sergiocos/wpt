<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$sidebar = get_post_meta( df_page_id(), THEME_NAME.'_sidebar_select', true );
?>

<!-- Container -->
<div class="container">
	<?php if($sidebar=="DFoff") { ?>
	  	<!-- Primary fullwidth -->
	    <div id="primary-fullwidth">
    <?php } else { ?>
	    <!-- Primary left -->
	    <div id="primary-<?php DF_content_class(df_page_id());?>">
    <?php } ?> 
