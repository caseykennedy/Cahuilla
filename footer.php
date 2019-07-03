<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 */
 
?>
</div>
<?php
	$tg_footer_sidebar = get_theme_mod('tg_footer_sidebar', 4);
	
	//Check if blank template
	$hoteller_is_no_header = hoteller_get_is_no_header();
	$hoteller_screen_class = hoteller_get_screen_class();
	
	if(!is_bool($hoteller_is_no_header) OR !$hoteller_is_no_header)
	{

	$hoteller_homepage_style = hoteller_get_homepage_style();
?>
<div id="footer_wrapper">
<?php
	//Check if page type
	if(is_page())
	{
		$page_show_footer_sidebar = get_post_meta($post->ID, 'page_show_footer_sidebar', true);
	}
	else
	{
		$page_show_footer_sidebar = 0;
	}
	
    if(!empty($tg_footer_sidebar) && empty($page_show_footer_sidebar))
    {
    	$footer_class = '';
    	
    	switch($tg_footer_sidebar)
    	{
    		case 1:
    			$footer_class = 'one';
    		break;
    		case 2:
    			$footer_class = 'two';
    		break;
    		case 3:
    			$footer_class = 'three';
    		break;
    		case 4:
    			$footer_class = 'four';
    		break;
    		default:
    			$footer_class = 'four';
    		break;
    	}
?>
<div id="footer" class="<?php if(isset($hoteller_homepage_style) && !empty($hoteller_homepage_style)) { echo esc_attr($hoteller_homepage_style); } ?> <?php if(!empty($hoteller_screen_class)) { echo esc_attr($hoteller_screen_class); } ?>">

<?php
    //get custom logo
    $tg_footer_retina_logo = get_theme_mod('tg_footer_retina_logo');

    if(!empty($tg_footer_retina_logo))
    {	
    	//Get image width and height
    	$image_id = hoteller_get_image_id($tg_footer_retina_logo);
    	
    	if(!empty($image_id) && is_numeric($image_id))
    	{
    		$obj_image = wp_get_attachment_image_src($image_id, 'original');
    		
    		$image_width = 0;
	    	$image_height = 0;
	    	
	    	if(isset($obj_image[1]))
	    	{
	    		$image_width = intval($obj_image[1]/2);
	    	}
	    	if(isset($obj_image[2]))
	    	{
	    		$image_height = intval($obj_image[2]/2);
	    	}
    	}
    	else if(!is_numeric($image_id))
	    {
		    $image_width = 1;
	    	$image_height = 1;
	    }
    	else
    	{
	    	$image_width = 0;
	    	$image_height = 0;
    	}
?>
<div id="logo_normal" class="logo_container">
	<div class="logo_align">
			<a id="custom_logo" class="logo_wrapper <?php if(!empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo esc_url(home_url('/')); ?>">
				<div class="c-logo c-logo--footer">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128.55 86.12"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Cahuilla Casino Hotel</title><g id="Layer_2" data-name="Layer 2"><g id="ART"><path class="cls-1" d="M24.12,61.28a4.27,4.27,0,0,1,2.21.56,4.13,4.13,0,0,1,1.52,1.53l-1.31.92a3.31,3.31,0,0,0-1-1.05,2.54,2.54,0,0,0-1.4-.37,2.65,2.65,0,0,0-1.07.21,2.4,2.4,0,0,0-.86.57,2.78,2.78,0,0,0-.57.88,3.24,3.24,0,0,0,0,2.24,2.85,2.85,0,0,0,.57.87,2.51,2.51,0,0,0,.86.56A2.83,2.83,0,0,0,25.52,68a3.31,3.31,0,0,0,1-1.05l1.31.92a4.13,4.13,0,0,1-1.52,1.53,4.37,4.37,0,0,1-2.21.56,4.71,4.71,0,0,1-1.76-.33A4.36,4.36,0,0,1,21,68.75,4.31,4.31,0,0,1,20,67.37a4.45,4.45,0,0,1,0-3.46A4.31,4.31,0,0,1,21,62.53a4.36,4.36,0,0,1,1.41-.92A4.71,4.71,0,0,1,24.12,61.28Z"/><path class="cls-1" d="M36.47,69.85H34.62l-.47-1.1H30.71l-.48,1.1H28.38l3.77-8.57h.56Zm-5.16-2.51h2.23l-1.11-2.85Z"/><path class="cls-1" d="M40.18,61.28A3,3,0,0,1,43,62.87l-1.18.91a2.39,2.39,0,0,0-.69-.72,1.61,1.61,0,0,0-.91-.25,1.26,1.26,0,0,0-.74.2.66.66,0,0,0-.31.61.65.65,0,0,0,.26.56,3.74,3.74,0,0,0,.72.41l1,.42a5.07,5.07,0,0,1,1.54,1,2,2,0,0,1,.54,1.46,2.46,2.46,0,0,1-.23,1.06,2.21,2.21,0,0,1-.63.79,2.6,2.6,0,0,1-.93.5,3.87,3.87,0,0,1-1.16.17A3.62,3.62,0,0,1,37,68.14l1.19-.89a3.92,3.92,0,0,0,.37.46,2.38,2.38,0,0,0,.45.38,2,2,0,0,0,.55.28,2.17,2.17,0,0,0,.69.1,1.42,1.42,0,0,0,.88-.24.84.84,0,0,0,.31-.69.69.69,0,0,0-.28-.61,4.85,4.85,0,0,0-.79-.44l-.9-.4c-.29-.14-.57-.29-.82-.44a3.41,3.41,0,0,1-.64-.53,2.41,2.41,0,0,1-.42-.65,1.92,1.92,0,0,1-.16-.81,2.32,2.32,0,0,1,.22-1,2.26,2.26,0,0,1,.59-.75,2.49,2.49,0,0,1,.88-.48A3.5,3.5,0,0,1,40.18,61.28Z"/><path class="cls-1" d="M46.41,69.85H44.69V61.43h1.72Z"/><path class="cls-1" d="M53.78,66.46v-5H55.5V70h-.56l-4.88-5.2v5H48.34V61.28h.57Z"/><path class="cls-1" d="M61.41,61.28a4.66,4.66,0,0,1,1.75.33,4.4,4.4,0,0,1,1.42.92,4.32,4.32,0,0,1,0,6.22,4.4,4.4,0,0,1-1.42.92,4.81,4.81,0,0,1-3.5,0,4.36,4.36,0,0,1-1.41-.92,4.31,4.31,0,0,1-1-1.38,4.45,4.45,0,0,1,0-3.46,4.31,4.31,0,0,1,1-1.38,4.51,4.51,0,0,1,1.42-.92A4.57,4.57,0,0,1,61.41,61.28Zm0,1.59a2.75,2.75,0,0,0-1.09.21,2.45,2.45,0,0,0-.85.57,2.65,2.65,0,0,0-.56.87,3.24,3.24,0,0,0,0,2.24,2.6,2.6,0,0,0,.56.88,2.57,2.57,0,0,0,.85.56,2.91,2.91,0,0,0,2.17,0,2.44,2.44,0,0,0,1.42-1.44,3.09,3.09,0,0,0,0-2.24,2.65,2.65,0,0,0-.56-.87,2.49,2.49,0,0,0-.86-.57A2.77,2.77,0,0,0,61.42,62.87Z"/><path class="cls-1" d="M78.1,69.85H76.37V66.21H72.65v3.64H70.93V61.43h1.72v3.23h3.72V61.43H78.1Z"/><path class="cls-1" d="M84,61.28a4.62,4.62,0,0,1,1.75.33,4.4,4.4,0,0,1,1.42.92,4.18,4.18,0,0,1,1,1.38,4.45,4.45,0,0,1,0,3.46,4.18,4.18,0,0,1-1,1.38,4.4,4.4,0,0,1-1.42.92A4.62,4.62,0,0,1,84,70a4.57,4.57,0,0,1-1.74-.33,4.37,4.37,0,0,1-2.37-5.76,4.18,4.18,0,0,1,1-1.38,4.36,4.36,0,0,1,1.41-.92A4.57,4.57,0,0,1,84,61.28Zm0,1.59a2.8,2.8,0,0,0-1.1.21,2.45,2.45,0,0,0-.85.57,2.65,2.65,0,0,0-.56.87,3.24,3.24,0,0,0,0,2.24,2.6,2.6,0,0,0,.56.88,2.57,2.57,0,0,0,.85.56,2.8,2.8,0,0,0,1.1.21,2.72,2.72,0,0,0,1.07-.21,2.51,2.51,0,0,0,.86-.56,2.78,2.78,0,0,0,.57-.88,3.24,3.24,0,0,0,0-2.24,2.85,2.85,0,0,0-.57-.87,2.4,2.4,0,0,0-.86-.57A2.72,2.72,0,0,0,84,62.87Z"/><path class="cls-1" d="M96.08,63h-2.7v6.86H91.66V63H89V61.43h7.11Z"/><path class="cls-1" d="M102.88,63H98.94V64.7h2.91v1.46H98.94v2.13H103v1.56H97.22V61.43h5.66Z"/><path class="cls-1" d="M106.25,68.29h3.69v1.56h-5.41V61.43h1.72Z"/><path class="cls-1" d="M10.91,34.57a10.56,10.56,0,0,0-7.7,3.18A10.62,10.62,0,0,0,0,45.49a10.44,10.44,0,0,0,3.21,7.69,10.45,10.45,0,0,0,7.7,3.22,11.1,11.1,0,0,0,6.53-2.17L15.89,52.1a7.5,7.5,0,0,1-5,1.69,7.65,7.65,0,0,1-5.7-2.45,8.39,8.39,0,0,1,0-11.71,7.65,7.65,0,0,1,5.7-2.45,7.5,7.5,0,0,1,5,1.69l1.55-2.13A11.1,11.1,0,0,0,10.91,34.57Z"/><path class="cls-1" d="M34.89,55.65l-1-2.78-4,1.61-4-1.61-1.06,2.78H21.79l8.08-20.83,8.07,20.83Zm-8.43-4.42h6.81L29.87,41Z"/><path class="cls-1" d="M52.58,36.11h2.66V55.65H52.58V51.29H45.35v4.36H42.68V36.11h2.67V49.65L49,48l3.62,1.61Z"/><path class="cls-1" d="M71.61,36.11h2.67V47.88a8.79,8.79,0,0,1-1.78,5.83,6,6,0,0,1-4.88,2.16c-4.19,0-6.66-3-6.66-8V36.11h2.66V48.32c0,3,1.47,5.11,4,5.11s4-2.08,4-5.11Z"/><path class="cls-1" d="M82.82,55.65H80.16V36.11h2.66Z"/><path class="cls-1" d="M91.2,53.21h4.57v2.44H88.54V36.11H91.2Z"/><path class="cls-1" d="M104.1,53.21h4.56v2.44h-7.22V36.11h2.66Z"/><path class="cls-1" d="M125.75,55.65l-1-2.78-4,1.61-4-1.61-1.06,2.78h-3l8.08-20.83,7.82,20.83Zm-8.43-4.42h6.81L120.73,41Z"/><path class="cls-1" d="M79.11,14A16.93,16.93,0,0,1,65.35.19a.2.2,0,0,0-.2-.19A.2.2,0,0,0,65,.19,16.93,16.93,0,0,1,51.2,14a.2.2,0,0,0-.19.19.19.19,0,0,0,.19.19A17,17,0,0,1,65,28.09a.2.2,0,1,0,.39,0A17,17,0,0,1,79.11,14.33a.19.19,0,0,0,.19-.19A.2.2,0,0,0,79.11,14Z"/><path class="cls-1" d="M99.1,26.71a5.6,5.6,0,0,1-4.55-4.54.06.06,0,0,0-.06-.06.06.06,0,0,0-.06.06,5.59,5.59,0,0,1-4.54,4.54.07.07,0,0,0-.07.06.07.07,0,0,0,.07.07,5.59,5.59,0,0,1,4.54,4.54.06.06,0,0,0,.06.06.06.06,0,0,0,.06-.06,5.6,5.6,0,0,1,4.55-4.54.07.07,0,0,0,.06-.07A.06.06,0,0,0,99.1,26.71Z"/><path class="cls-1" d="M54.1,79.6a7.72,7.72,0,0,1-6.26-6.27.09.09,0,0,0-.09-.08.09.09,0,0,0-.08.08,7.74,7.74,0,0,1-6.26,6.27.09.09,0,0,0-.09.08.09.09,0,0,0,.09.09A7.72,7.72,0,0,1,47.67,86a.09.09,0,0,0,.08.09.09.09,0,0,0,.09-.09,7.7,7.7,0,0,1,6.26-6.26.09.09,0,0,0,.09-.09A.09.09,0,0,0,54.1,79.6Z"/></g></g></svg>
				</div>
	    </a>
	</div>
</div>
<?php
    }
?>
	
<?php
	if(is_active_sidebar('Footer Sidebar')) 
	{
?>
	<ul class="sidebar_widget <?php echo esc_attr($footer_class); ?>">
	    <?php dynamic_sidebar('Footer Sidebar'); ?>
	</ul>
<?php
	}
?>
</div>
<?php
    }
?>

<?php	
	//Check if page type
	if(is_page())
	{
		$page_show_footer_photostream = get_post_meta($post->ID, 'page_show_footer_photostream', true);
	}
	else
	{
		$page_show_footer_photostream = 0;
	}
	
	if(empty($page_show_footer_photostream))
	{
		//If display photostream
		$pp_photostream = get_option('pp_photostream');
		if(HOTELLER_THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
		{
			$pp_photostream = 0;
		}
	
		if(!empty($pp_photostream) && $hoteller_homepage_style != 'fullscreen' && $hoteller_homepage_style != 'fullscreen_white' && $hoteller_homepage_style != 'split')
		{
			$photos_arr = array();
			
			$pp_photostream_rows = get_option('pp_photostream_rows');
			if(empty($pp_photostream_rows))
			{
				$pp_photostream_rows = 1;
			}
			$items = intval((10*$pp_photostream_rows)+10);
		
			if($pp_photostream == 'flickr')
			{
				$pp_flickr_id = get_option('pp_flickr_id');
				$photos_arr = hoteller_get_flickr(array('type' => 'user', 'id' => $pp_flickr_id, 'items' => $items));
			}
			else
			{
				$pp_instagram_username = get_option('pp_instagram_username');
				$pp_instagram_access_token = get_option('pp_instagram_access_token');
				$photos_arr = hoteller_get_instagram($pp_instagram_username, $pp_instagram_access_token, $items);
			}
			
			if(!empty($photos_arr))
			{
?>
<br class="clear"/>
<input type="hidden" id="tg_photostream" name="tg_photostream" value="<?php echo intval($pp_photostream); ?>"/>
<div id="footer_photostream" class="footer_photostream_wrapper ri-grid ri-grid-size-3">
	<h2 class="widgettitle photostream">
		<?php
			if($pp_photostream == 'instagram')
			{
		?>
			<a href="https://instagram.com/<?php echo esc_html($pp_instagram_username); ?>" target="_blank">
				<i class="fab fa-instagram marginright"></i><?php echo esc_html($pp_instagram_username); ?>
			</a>
		<?php
			}
			else
			{
		?>
			<i class="fab fa-flickr marginright"></i>Flickr
		<?php
			}
		?>
	</h2>
	<ul>
		<?php
			foreach($photos_arr as $photo)
			{
		?>
			<li><a target="_blank" href="<?php echo esc_url($photo['link']); ?>"><img src="<?php echo esc_url($photo['thumb_url']); ?>" alt="<?php echo esc_attr($photo['title']); ?>" /></a></li>
		<?php
			}
		?>
	</ul>
</div>
<?php
		}
	}
}
?>

<?php
//Check if page type
if(is_page())
{
	$page_show_copyright = get_post_meta($post->ID, 'page_show_copyright', true);
}
else
{
	$page_show_copyright = 0;
}

if(empty($page_show_copyright))
{
	//Get Footer Sidebar
	if(HOTELLER_THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
	{
	    $tg_footer_sidebar = 0;
	}
?>
<div class="footer_bar <?php if(isset($hoteller_homepage_style) && !empty($hoteller_homepage_style)) { echo esc_attr($hoteller_homepage_style); } ?> <?php if(!empty($hoteller_screen_class)) { echo esc_attr($hoteller_screen_class); } ?> <?php if(empty($tg_footer_sidebar)) { ?>noborder<?php } ?>">

	<div class="footer_bar_wrapper <?php if(isset($hoteller_homepage_style) && !empty($hoteller_homepage_style)) { echo esc_attr($hoteller_homepage_style); } ?>">
		<?php
			//Check if display social icons or footer menu
			$tg_footer_copyright_right_area = get_theme_mod('tg_footer_copyright_right_area', 'menu');
			
			if($tg_footer_copyright_right_area=='social')
			{
				if($hoteller_homepage_style!='flow' && $hoteller_homepage_style!='fullscreen' && $hoteller_homepage_style!='carousel' && $hoteller_homepage_style!='flip' && $hoteller_homepage_style!='fullscreen_video')
				{	
					//Check if open link in new window
					$tg_footer_social_link = get_theme_mod('tg_footer_social_link' ,true);
			?>
			<div class="social_wrapper">
			    <ul>
			    	<?php
			    		$pp_facebook_url = get_option('pp_facebook_url');
			    		
			    		if(!empty($pp_facebook_url))
			    		{
			    	?>
			    	<li class="facebook"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="<?php echo esc_url($pp_facebook_url); ?>"><i class="fab fa-facebook"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_twitter_username = get_option('pp_twitter_username');
			    		
			    		if(!empty($pp_twitter_username))
			    		{
			    	?>
			    	<li class="twitter"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="http://twitter.com/<?php echo esc_attr($pp_twitter_username); ?>"><i class="fab fa-twitter"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_flickr_username = get_option('pp_flickr_username');
			    		
			    		if(!empty($pp_flickr_username))
			    		{
			    	?>
			    	<li class="flickr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Flickr" href="http://flickr.com/people/<?php echo esc_attr($pp_flickr_username); ?>"><i class="fab fa-flickr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_youtube_url = get_option('pp_youtube_url');
			    		
			    		if(!empty($pp_youtube_url))
			    		{
			    	?>
			    	<li class="youtube"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Youtube" href="<?php echo esc_url($pp_youtube_url); ?>"><i class="fab fa-youtube"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_vimeo_username = get_option('pp_vimeo_username');
			    		
			    		if(!empty($pp_vimeo_username))
			    		{
			    	?>
			    	<li class="vimeo"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Vimeo" href="http://vimeo.com/<?php echo esc_attr($pp_vimeo_username); ?>"><i class="fab fa-vimeo-square"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_tumblr_username = get_option('pp_tumblr_username');
			    		
			    		if(!empty($pp_tumblr_username))
			    		{
			    	?>
			    	<li class="tumblr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Tumblr" href="http://<?php echo esc_attr($pp_tumblr_username); ?>.tumblr.com"><i class="fab fa-tumblr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_google_url = get_option('pp_google_url');
			    		
			    		if(!empty($pp_google_url))
			    		{
			    	?>
			    	<li class="google"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Google+" href="<?php echo esc_url($pp_google_url); ?>"><i class="fab fa-google-plus"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_dribbble_username = get_option('pp_dribbble_username');
			    		
			    		if(!empty($pp_dribbble_username))
			    		{
			    	?>
			    	<li class="dribbble"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Dribbble" href="http://dribbble.com/<?php echo esc_attr($pp_dribbble_username); ?>"><i class="fab fa-dribbble"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_linkedin_url = get_option('pp_linkedin_url');
			    		
			    		if(!empty($pp_linkedin_url))
			    		{
			    	?>
			    	<li class="linkedin"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Linkedin" href="<?php echo esc_url($pp_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			            $pp_pinterest_username = get_option('pp_pinterest_username');
			            
			            if(!empty($pp_pinterest_username))
			            {
			        ?>
			        <li class="pinterest"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Pinterest" href="http://pinterest.com/<?php echo esc_attr($pp_pinterest_username); ?>"><i class="fab fa-pinterest"></i></a></li>
			        <?php
			            }
			        ?>
			        <?php
			        	$pp_instagram_username = get_option('pp_instagram_username');
			        	
			        	if(!empty($pp_instagram_username))
			        	{
			        ?>
			        <li class="instagram"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Instagram" href="http://instagram.com/<?php echo esc_attr($pp_instagram_username); ?>"><i class="fab fa-instagram"></i></a></li>
			        <?php
			        	}
			        ?>
			        <?php
			        	$pp_behance_username = get_option('pp_behance_username');
			        	
			        	if(!empty($pp_behance_username))
			        	{
			        ?>
			        <li class="behance"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Behance" href="http://behance.net/<?php echo esc_attr($pp_behance_username); ?>"><i class="fab fa-behance-square"></i></a></li>
			        <?php
			        	}
			        ?>
			        <?php
					    $pp_500px_url = get_option('pp_500px_url');
					    
					    if(!empty($pp_500px_url))
					    {
					?>
					<li class="500px"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="500px" href="<?php echo esc_url($pp_500px_url); ?>"><i class="fab fa-500px"></i></a></li>
					<?php
					    }
					?>
					<?php
					     $pp_snapchat_url = get_option('pp_snapchat_url');
					     
					     if(!empty($pp_snapchat_url))
					     {
					 ?>
					 <li class="snapchat"><a <?php if(!empty($pp_snapchat_url)) { ?>target="_blank"<?php } ?> title="Snapchat" href="<?php echo esc_url($pp_snapchat_url); ?>"><i class="fab fa-snapchat-ghost"></i></a></li>
					 <?php
					     }
					 ?>
					<?php
					    $pp_tripadvisor_url = get_option('pp_tripadvisor_url');
					    
					    if(!empty($pp_tripadvisor_url))
					    {
					?>
					<li class="tripadvisor"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Tripadvisor" href="<?php echo esc_url($pp_tripadvisor_url); ?>"><i class="fab fa-tripadvisor"></i></a></li>
					<?php
					    }
					?>
					<?php
					    $pp_yelp_url = get_option('pp_yelp_url');
					    
					    if(!empty($pp_yelp_url))
					    {
					?>
					<li class="yelp"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Yelp" href="<?php echo esc_url($pp_yelp_url); ?>"><i class="fab fa-yelp"></i></a></li>
					<?php
					    }
					?>
			    </ul>
			</div>
		<?php
				}
			} //End if display social icons
			else
			{
				if ( has_nav_menu( 'footer-menu' ) ) 
			    {
				    wp_nav_menu( 
				        	array( 
				        		'menu_id'			=> 'footer_menu',
				        		'menu_class'		=> 'footer_nav',
				        		'theme_location' 	=> 'footer-menu',
				        	) 
				    ); 
				}
			}
		?>
	    <?php
	    	//Display copyright text
	    	if (!function_exists('pll__')) {
	        	$tg_footer_copyright_text = get_theme_mod('tg_footer_copyright_text', '© Copyright');
	        }
	        else
	        {
		        $tg_footer_copyright_text = pll__(get_theme_mod('tg_footer_copyright_text', '© Copyright'));
	        }

	        if(!empty($tg_footer_copyright_text))
	        {
	        	echo '<div id="copyright">'.wp_kses_post(wp_specialchars_decode($tg_footer_copyright_text)).'</div><br class="clear"/>';
	        }
	    ?>
	</div>
</div>
<?php
}
?>
</div>
<?php
    } //End if not blank template
?>

<?php
	//Check if display to top button
	$tg_footer_copyright_totop = get_theme_mod('tg_footer_copyright_totop', true);
	
	if(!empty($tg_footer_copyright_totop))
	{
?>
 	<a id="toTop" href="javascript:;"><i class="fa fa-angle-up"></i></a>
<?php
 	}
?>

<?php
    //Check if theme demo then enable layout switcher
    if(HOTELLER_THEMEDEMO)
    {	
?>
    <div id="option_wrapper">
    <div class="inner">
    	<div style="text-align:center">
	    	
	    	<h4>Ready Sites</h2>
	    	<p>
	    		Here are example ready to use sites that can be imported within one click.
	    	</p>
	    	<?php
	    		$customizer_styling_arr = array( 
					array(
						'id'	=>	1, 
						'title' => 'Luxury Hotel', 
						'url' => hoteller_get_demo_url('luxury'),
					),
					array(
						'id'	=>	2, 
						'title' => 'City Hotel', 
						'url' => hoteller_get_demo_url('city'),
					),
					array(
						'id'	=>	3, 
						'title' => 'Mountain Hotel', 
						'url' => hoteller_get_demo_url('mountain'),
					),
					array(
						'id'	=>	4, 
						'title' => 'Beach Hotel', 
						'url' => hoteller_get_demo_url('beach'),
					),
					array(
						'id'	=>	5, 
						'title' => 'Apartment Hotel', 
						'url' => hoteller_get_demo_url('apartment'),
					),
					array(
						'id'	=>	6, 
						'title' => 'Cultural Hotel', 
						'url' => hoteller_get_demo_url('cultural'),
					),
				);
	    	?>
	    	<ul class="demo_list">
	    		<?php
	    			foreach($customizer_styling_arr as $customizer_styling)
	    			{
	    		?>
	    		<li>
	        		<img src="<?php echo get_template_directory_uri(); ?>/cache/demos/xml/demo<?php echo esc_html($customizer_styling['id']); ?>/<?php echo esc_html($customizer_styling['id']); ?>.jpg" alt="<?php echo esc_attr($customizer_styling['title']); ?>"/>
	        		<div class="demo_thumb_hover_wrapper">
	        		    <div class="demo_thumb_hover_inner">
	        		    	<div class="demo_thumb_desc">
	    	    	    		<h6><?php echo esc_html($customizer_styling['title']); ?></h6>
	    	    	    		<a href="<?php echo esc_url($customizer_styling['url']); ?>" target="_blank" class="button white">Launch</a>
	        		    	</div> 
	        		    </div>	   
	        		</div>		   
	    		</li>
	    		<?php
	    			}
	    		?>
	    		<!-- li>
	        		<img src="<?php echo get_template_directory_uri(); ?>/cache/demos/more.png" alt="More Ready Sites are coming soon"/>
	        		<div class="demo_thumb_hover_wrapper">
	        		    <div class="demo_thumb_hover_inner">
	        		    	<div class="demo_thumb_desc">
	    	    	    		<h6>More Ready Sites are coming soon</h6>
	        		    	</div> 
	        		    </div>	   
	        		</div>		   
	    		</li -->
	    	</ul>
	    	<br class="clear"/><br/>
	    	<h4>Multilingual Demos</h2>
		    	<p>
	    		Create multilingual website for your hotel easily using Free Polylang plugin. See example below.
	    	</p>
	    	<ul class="demo_list">
		    	<li>
		    		<a class="demo_lang" href="https://themes.themegoods.com/hoteller/polylang/" target="_blank">English</a>
		    	</li>
		    	<li>
		    		<a class="demo_lang" href="https://themes.themegoods.com/hoteller/polylang/it/" target="_blank">Italian</a>
		    	</li>
	    	</ul>
    	</div>
    </div>
    </div>
    <div id="option_btn">
    	<a href="javascript:;" class="demotip" title="Choose Theme Demos"><span class="ti-settings"></span></a>
    	
    	<a href="http://themegoods.theme-demo.net/hoteller" class="demotip" title="Try Before You Buy" target="_blank"><span class="ti-pencil-alt"></span></a>
    	
    	<a href="http://docs.themegoods.com/docs/hoteller" class="demotip" title="Theme Documentation" target="_blank"><span class="ti-book"></span></a>
    	
    	<a href="https://themeforest.net/item/hoteller-hotel-booking-wordpress/22316029?ref=ThemeGoods&license=regular&open_purchase_for_item_id=22316029&purchasable=source&ref=ThemeGoods" title="Purchase Theme" class="demotip" target="_blank"><span class="ti-shopping-cart"></span></a>
    </div>
<?php
    	wp_enqueue_script("hoteller-jquery-cookie", get_template_directory_uri()."/js/jquery.cookie.js", false, HOTELLER_THEMEVERSION, true);
    	wp_enqueue_script("tooltipster", get_template_directory_uri()."/js/jquery.tooltipster.min.js", false, HOTELLER_THEMEVERSION, true);
    	wp_enqueue_script("hoteller-demo", get_template_directory_uri()."/js/core/demo.js", false, HOTELLER_THEMEVERSION, true);
    }
?>

<?php
    $tg_frame = get_theme_mod('tg_frame', false);
    
    if(HOTELLER_THEMEDEMO && isset($_GET['frame']) && !empty($_GET['frame']))
    {
	    $tg_frame = 1;
    }
    
    if(!empty($tg_frame))
    {
?>
    <div class="frame_top"></div>
    <div class="frame_bottom"></div>
    <div class="frame_left"></div>
    <div class="frame_right"></div>
<?php
    }
?>

</div>

<?php
    $tg_enable_right_click = get_theme_mod('tg_enable_right_click', false);
    $tg_enable_right_click_content = get_theme_mod('tg_enable_right_click_content', false);

    if(!empty($tg_enable_right_click) && !empty($tg_enable_right_click_content))
    {
	    $tg_enable_right_click_content_text = get_theme_mod('tg_enable_right_click_content_text');
?>
    <div id="right_click_content">
	    <div class="right_click_content_table">
		    <div class="right_click_content_cell">
		    	<div><?php echo esc_html($tg_enable_right_click_content_text); ?></div>
	    	</div>
	    </div>
    </div>
<?php
    }
?>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
