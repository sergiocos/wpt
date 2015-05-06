<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    
    //prev/next buttons settings
    $nextPostButtons = get_post_meta ( $post->ID, THEME_NAME."_post_btn", true ); 
    //next post
    $next_post = get_next_post();
    //next post
    $prev_post = get_previous_post();

    if($nextPostButtons=="yes" && (!empty( $next_post ) || !empty( $prev_post ))) {

?>  

          <!-- Post controls -->
            <div id="post-controls">
                <?php if(!empty( $next_post )) { ?>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="prev">
                        <span><?php _e("Previous", THEME_NAME);?></span>
                        <p><?php echo get_the_title( $next_post->ID ); ?></p>
                    </a>
                <?php } ?>
                <?php if(!empty( $prev_post )) { ?>
                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="next">
                        <span><?php _e("Next", THEME_NAME);?></span>
                        <p><?php echo get_the_title( $prev_post->ID ); ?></p>
                    </a>
                <?php } ?>
            </div>  
<?php } ?>