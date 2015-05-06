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

    $width = 540;
    $height = 360;    


	$image = get_post_thumb($post->ID,$width,$height); 
	$imageL = get_post_thumb($post->ID,0,0); 

    //get video url
    $video = get_post_meta( $post->ID, THEME_NAME."_video", true );

    //slider images
    $slider = get_post_meta( $post->ID, THEME_NAME."_slider_images", true );

	if(get_option(THEME_NAME."_show_first_thumb") == "on" && $image['show']==true && !$video && !$slider) {
        $fancybox = get_post_meta ( $post->ID, THEME_NAME."_fancybox", true ); 
?>
    <div class="post-image">
        <?php if($fancybox=="off") { ?>
            <a href="<?php the_permalink();?>">
        <?php } ?>
    	   <?php echo df_image_html($post->ID,$width,$height); ?>
        <?php if($fancybox=="off") { ?>
            </a>
        <?php } ?>
        <?php if($fancybox!="off") { ?>
            <ol class="social-links">
                <li><a href="<?php the_permalink();?>"><i class="icon-link"></i></a></li>
                <li><a href="<?php echo $imageL['src'];?>" rel="lightbox"><i class="icon-search"></i></a></li>
            </ol>
        <?php } ?>
    </div>
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