<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
   
    
    global $DFcounter,$oldBlogStyle;
    if(!$oldBlogStyle) { $oldBlogStyle=false; }


    //get current cat id
    $catId = get_cat_id( single_cat_title("",false) );
    if(is_category()) {
        $blogStyle = df_get_option($catId,"blog_style");
    } elseif(is_page_template ( 'template-homepage.php' )) {
        global $blogStyle;
    } else {
        $blogStyle = get_option(THEME_NAME."_blog_style");
    }

    if(!$blogStyle) { $blogStyle==1; }

    //set counter if changes blog style - reset the counter
    if(!$DFcounter || $blogStyle!=$oldBlogStyle) { $DFcounter = 1; }

	$image = get_post_thumb($post->ID,0,0); 

    //get video url
    $video = get_post_meta( $post->ID, THEME_NAME."_video", true );

    //slider images
    $slider = get_post_meta( $post->ID, THEME_NAME."_slider_images", true );

	if(get_option(THEME_NAME."_show_first_thumb") != "on" || $image['show']!=true && !$slider && !$video) {
		$class = " post-with-no-image";
	} else {
		$class = false;
	}

    //post count
    $post_count = $wp_query->post_count;

    //post_type
    $postType = get_post_meta ( $post->ID, THEME_NAME."_post_type", true );
    

    switch ($postType) {
        case 'default':
            $icon = '<i class="icon-file-text-alt"></i>';
            break;
        case 'video':
            $icon = '<i class="icon-play-sign"></i>';
            break;
        case 'image':
            $icon = '<i class="icon-camera"></i>';
            break;
        case 'music':
            $icon = '<i class="icon-music"></i>';
            break;
        case 'off':
            $icon = false;
            break;
        default:
            $icon = '<i class="icon-file-text-alt"></i>';
            break;
    }

    //get post rating
    $stars = df_avarage_rating($post->ID);


    if($blogStyle==2 || $blogStyle==3 || $blogStyle==4) {
        switch ($blogStyle) {
            case '2':
                $column = " col4";
                $postInColumn = 3;
                add_filter('excerpt_length', 'new_excerpt_length_10');
                break;
            case '3':
                $column = " col6";
                $postInColumn = 2;
                add_filter('excerpt_length', 'new_excerpt_length_20');
                break;
            case '4':
                $column = " col12";
                $postInColumn = 1;
                add_filter('excerpt_length', 'new_excerpt_length_70');
                break;
            
            default:
                $column = " col3";
                $postInColumn = 3;
                add_filter('excerpt_length', 'new_excerpt_length_10');
                break;
        }
        if($DFcounter%$postInColumn==0) { $class.= " last"; }
?>      
        <!-- Article vertical -->
        <div <?php post_class("article-vertical".$column.$class); ?>>
            <?php get_template_part(THEME_LOOP."image"); ?>
            <div class="entry-content">
                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                <div class="entry-meta">
                    <?php 
                        if(is_array($stars)) {
                            df_rating_html($stars);
                        } 
                     ?>
                    <div class="description-em">
                        <span class="by-date"><?php the_time('j F, Y');?></span>
                        <?php if ( comments_open() ) { ?>
                            <span class="by-comments">
                                <a href="<?php the_permalink();?>#comments"><?php comments_number("0","1","%"); ?></a>
                            </span>
                        <?php } ?>
                    </div>
                </div>
                <?php 
                    the_excerpt();
                ?>
                <a href="<?php the_permalink();?>" class="read-more"><?php _e("Read more", THEME_NAME);?></a>
                <?php if($icon) { ?>
                    <a href="<?php the_permalink();?>">
                        <span class="format-post">
                            <?php echo $icon;?>
                        </span>
                    </a>
                <?php } ?>
            </div>
        </div>
        <?php 
            if($DFcounter%$postInColumn==0) {
        ?>
            <div class="clear"></div>
        <?php } ?>
<?php } else { ?>
    <!-- Article standard -->
    <div <?php post_class("article-standard".$class); ?>>
        <?php get_template_part(THEME_LOOP."image"); ?>
        <div class="entry-content">
            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <div class="entry-meta">
                <?php 
                    if(is_array($stars)) {
                        df_rating_html($stars);
                    } 
                 ?>
                <div class="description-em">
                    <span class="by-date"><?php the_time('j F, Y');?></span>
                    <?php if ( comments_open() ) { ?>
                        <span class="by-comments">
                            <a href="<?php the_permalink();?>#comments"><?php comments_number("0","1","%"); ?></a>
                        </span>
                    <?php } ?>
                </div>
            </div>
            <?php 
                add_filter('excerpt_length', 'new_excerpt_length_50');
                the_excerpt();
            ?>
            <a href="<?php the_permalink();?>" class="read-more"><?php _e("Read more", THEME_NAME);?></a>
            <?php if($icon) { ?>
                <a href="<?php the_permalink();?>">
                    <span class="format-post">
                        <?php echo $icon;?>
                    </span>
                </a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<?php $DFcounter++; ?>
<?php $oldBlogStyle=$blogStyle; ?>