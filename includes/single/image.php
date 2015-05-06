<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$width = 882;
	$height = 350;
	$image = get_post_thumb($post->ID,$width,$height); 
	$imageL = get_post_thumb($post->ID,0,0); 

	//post details
	$singleImage = get_post_meta( $post->ID, THEME_NAME."_single_image", true );

	//get video
	$video = get_post_meta( $post->ID, THEME_NAME."_video", true );

    //slider images
    $slider = get_post_meta( $post->ID, THEME_NAME."_slider_images", true );

	if(((get_option(THEME_NAME."_show_single_thumb") == "on"  && $singleImage=="show" && $image['show']==true) || (!$singleImage && $image['show']==true)) && !$video && !$slider) { 

?>
    <!-- Image -->
	<div class="post-image">
		<a href="<?php echo $imageL['src'];?>" rel="lightbox">
			<?php echo df_image_html($post->ID,$width,$height); ?>
		</a>
	</div>   
<?php } else if($singleImage=="show" && $slider && !$video) { ?>
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
<?php } else if(($video && $singleImage=="show") || ($video && !$singleImage)) { ?>
	<?php echo df_get_video_embed($video,800,500);?>
<?php } ?>