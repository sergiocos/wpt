<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    
    //get current cat id
    $catId = get_cat_id( single_cat_title("",false) );
    //blog style
    if(is_category()) {
        $blogStyle = df_get_option($catId,"blog_style");
    } else {
        $blogStyle = get_option(THEME_NAME."_blog_style");
    }

    $width = 260;
    $height = 180;    


	$image = get_post_thumb($post->ID,$width,$height); 
	$imageL = get_post_thumb($post->ID,0,0); 

    //get video url
    $video = get_post_meta( $post->ID, THEME_NAME."_video", true );

    //slider images
    $slider = get_post_meta( $post->ID, THEME_NAME."_slider_images", true );

	if(get_option(THEME_NAME."_show_first_thumb") == "on" && $image['show']==true && !$video && !$slider) {
        $fancybox = get_post_meta ( $post->ID, THEME_NAME."_fancybox", true ); 
?>

        <a href="<?php the_permalink();?>">
    	   <?php echo df_image_html($post->ID,$width,$height); ?>
        </a>


<?php } else if(get_option(THEME_NAME."_show_first_thumb") == "on" && $slider && !$video) { ?>
    <!-- Slider -->
    <div class="slider">
        <ul>
            <?php 
                $imageIds = explode(',',$slider);
                foreach($imageIds as $id) {
                    if($id) {
                        $slideImage = wp_get_attachment_image_src( $id, 'full');
                        $image = get_post_thumb(false,$width,$height, false, $slideImage[0]); 
            ?>
                <li><img src="<?php echo $image['src'];?>" alt="<?php the_title();?>"/></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
<?php } else if(get_option(THEME_NAME."_show_first_thumb") == "on" && $video) { ?>
    <div class="post-video">
        <?php echo df_get_video_embed($video,$width,$height);?>
    </div>
<?php } ?>