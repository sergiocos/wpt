<?php
/*
Template Name: Contact Page
*/	
?>
<?php get_header(); ?>
<?php 
	get_template_part(THEME_INCLUDES.'top');


	wp_reset_query();
	global $post;
	$mail_to = get_post_meta ($post->ID, THEME_NAME."_contact_mail", true );

	$showTitle = get_post_meta ( $post->ID, THEME_NAME."_show_title", true ); 

	//google map
	$map = get_post_meta ($post->ID, THEME_NAME."_map", true );



?>
<?php get_template_part(THEME_LOOP."loop","start"); ?> 
	<?php if($mail_to) { ?>
		<?php if (have_posts()) : ?>
	    	<!-- Blank page -->
	        <div class="blank-page-container">
	        	<?php get_template_part(THEME_SINGLE."page-title"); ?> 
        		<?php if($map) { ?>
					<div id="google-map" class="embeded-container">
					    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $map;?>&amp;iwloc=A&amp;output=embed"></iframe>
					</div>
				<?php } ?>
        		<?php the_content(); ?>
        		<hr>

	            <!-- Contact page -->
	            <div id="contact">
					<div id="message" style="display: none;">
						<div class="error_message"><?php _e("Attention! Please correct the errors below and try again.",THEME_NAME);?>
							<ul class="error_messages cross">
								<li class="name" style="display: none;"><?php _e("Your name is <strong>required</strong>.",THEME_NAME);?></li>
								<li class="email" style="display: none;"><?php _e("Your e-mail address is <strong>required</strong>.",THEME_NAME);?></li>
								<li class="message" style="display: none;"><?php _e("You must <strong>enter a message</strong> to send.",THEME_NAME);?></li>
							</ul>
						</div>
						<div class="success" style="display: none;"><?php _e("Email sent successfully!",THEME_NAME);?></div>
					</div>
	                <form method="post" name="contactform" id="contactform">
	                	<input name="form_type" type="hidden" id="form_type" value="contact" />
	                	<input name="contact_id" type="hidden" id="contact_id" value="<?php echo df_page_id();?>" />
	                    <div id="contact-input">
	                        <div>
	                        	<label for="name"><?php _e("Name",THEME_NAME);?></label>
	                       		<input name="name" type="text" id="name" value="">
	                        </div>    
	                        <div>
	                        	<label for="email"><?php _e("Email",THEME_NAME);?></label>
	                        	<input name="email" type="text" id="email" value="">
	                        </div>
	                    </div>    
	                    <div id="contact-message">
	                        <label for="comments"><?php _e("Message",THEME_NAME);?></label>
	                        <textarea name="comments" type="text" id="comments" value=""></textarea>
	                    </div>      
	                    <div id="contact-submit">
	                        <input type="submit" class="submit" id="submit" value="<?php _e("Submit",THEME_NAME);?>">
	                    </div>
	                </form>
	            </div>
		    </div> 
		<?php else: ?>
			<p><?php printf ( __('Sorry, no posts matched your criteria.' , THEME_NAME )); ?></p>
		<?php endif; ?>
	<?php } else { echo "<p style=\"color:#000; font-size:14pt; text-align: center; padding: 30px 0 10px 0;\">You need to set up Your contact mail!</p>"; } ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?> 
<?php get_footer(); ?>
