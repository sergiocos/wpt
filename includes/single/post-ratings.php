<?php 
    wp_reset_query();
    $ratings = get_post_meta( $post->ID, THEME_NAME."_ratings", true );
    $avarage = df_avarage_rating($post->ID);
    $avarage = $avarage[0];
    if($avarage>=4.75) {
        $rateText = __("Excellent",THEME_NAME);
    } else if($avarage<4.75 && $avarage>=3.75) {
        $rateText = __("Good",THEME_NAME);
    } else if($avarage<3.75 && $avarage>=2.75) {
        $rateText = __("Average",THEME_NAME);
    } else if($avarage<2.75 && $avarage>=1.75) {
        $rateText = __("Fair",THEME_NAME);
    } else if($avarage<1.75 && $avarage>=0.75) {
        $rateText = __("Poor",THEME_NAME);
    } else if($avarage<0.75) {
        $rateText = __("Very Poor",THEME_NAME);
    }

    if(isset($ratings) && $ratings!="") {
        $rating = explode(";", $ratings);
?>

        <!-- Rating overview -->
        <div id="rating-overview" <?php if($ratings) { ?> itemscope itemtype="http://data-vocabulary.org/Review"<?php } ?>>
            <meta itemprop="itemreviewed" content="<?php the_title(); ?>"/>
            <meta itemprop="reviewer" content="<?php the_author();?>"/>
            <meta itemprop="dtreviewed" content="<?php echo the_time("F d, Y"); ?>"/>
            <h4><?php _e("Rating overview", THEME_NAME);?></h4>
            <ul class="rating-description">
                <?php 
                    foreach($rating as $rate) { 
                        $ratingValues = explode(":", $rate);
                        if(isset($ratingValues[1])) {
                            $star = str_replace(',', '.', $ratingValues[1]);
                            $stars = array($ratingValues[1],$star*2);
                        }
                ?>
                <li>
                    <strong><?php echo $ratingValues[0];?></strong>
                    <?php df_rating_html($stars);?>
                </li>
                <?php 
                    }
                ?>
            </ul>
            <div class="rating-score">
                <strong><?php _e("Total score", THEME_NAME);?></strong>
                <div class="total-score">
                    <strong itemprop="summary"><?php echo $rateText;?></strong>
                    <strong class="result">
                        <span class="rating" itemprop="rating">
                            <?php echo $avarage;?>
                        </span>
                    </strong>
                </div>
            </div>
        </div>
<?php } ?>