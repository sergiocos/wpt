 <?php 
	get_header();
	get_template_part(THEME_INCLUDES."top");
?> 

<!-- Container -->
<div class="container">
    <!-- Primary fullwidth -->
    <div id="primary-fullwidth">
        <!-- Blank page container -->
        <div class="blank-page-container">
            <div id="page-404">
                <h3><?php _e("404", THEME_NAME);?></h3>
                <h4><?php _e("The page you are looking for<br>has been moved or doesn't exist anymore!", THEME_NAME);?></h4>
                <p><?php _e("But don't worry, it can happen to the best of us - and it just happened to you!<br>
                You can back to home page or read this text one more time.", THEME_NAME);?></p>
                <a href="<?php echo home_url();?>" class="button colored"><?php _e("Back to home", THEME_NAME);?></a>
            </div>
        </div>
    </div>
    <!-- Sidebar -->
    <div id="sidebar"></div>
</div>

<?php 
	get_footer();
?>