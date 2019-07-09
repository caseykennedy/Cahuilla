<?php
//Get page ID
if(is_object($post))
{
    $obj_page = get_page($post->ID);
}
$current_page_id = '';

if(isset($obj_page->ID) && (is_page() OR is_single()))
{
    $current_page_id = $obj_page->ID;
}
elseif(is_home())
{
    $current_page_id = get_option('page_on_front');
}
?>

<div class="header_style_wrapper">
<?php
    //Check if display top bar
    $tg_topbar = get_theme_mod('tg_topbar', false);
    
    if(HOTELLER_THEMEDEMO && isset($_GET['topbar']) && !empty($_GET['topbar']))
	{
	    $tg_topbar = true;
	}
    
    $hoteller_topbar = hoteller_get_topbar();
    hoteller_set_topbar($tg_topbar);
    
    if(!empty($tg_topbar))
    {
?>

<!-- Begin top bar -->
<div class="above_top_bar">
    <div class="page_content_wrapper">
    <div class="top_contact_info">
		<?php
		    if (!function_exists('pll__')) {
		    	$tg_menu_contact_hours = get_theme_mod('tg_menu_contact_hours');
		    }
		    else
		    {
			    $tg_menu_contact_hours = pll__(get_theme_mod('tg_menu_contact_hours'));
		    }
		    
		    if(!empty($tg_menu_contact_hours))
		    {	
		?>
		    <span id="top_contact_hours"><i class="fa fa-clock-o"></i><?php echo esc_html($tg_menu_contact_hours); ?></span>
		<?php
		    }
		?>
		<?php
		    //Display top contact info
		    if (!function_exists('pll__')) {
		    	$tg_menu_contact_number = get_theme_mod('tg_menu_contact_number');
		    }
		    else
		    {
			    $tg_menu_contact_number = pll__(get_theme_mod('tg_menu_contact_number'));
		    }
		    
		    if(!empty($tg_menu_contact_number))
		    {
		?>
		    <span id="top_contact_number"><a href="tel:<?php echo esc_attr($tg_menu_contact_number); ?>"><i class="fa fa-phone"></i><?php echo esc_html($tg_menu_contact_number); ?></a></span>
		<?php
		    }
		?>
    </div>
    
    <?php
		get_template_part("/templates/template-socials");
	?>
    	
    <?php
    	//Display Top Menu
    	if ( has_nav_menu( 'top-menu' ) ) 
		{
		    wp_nav_menu( 
		        	array( 
		        		'menu_id'			=> 'top_menu',
		        		'menu_class'		=> 'top_nav',
		        		'theme_location' 	=> 'top-menu',
		        	) 
		    ); 
		}
    ?>
    <br class="clear"/>
    </div>
</div>
<?php
    }
?>
<!-- End top bar -->

<?php
	//Get Page Menu Transparent Option
	$page_menu_transparent = get_post_meta($current_page_id, 'page_menu_transparent', true);
	
    $pp_page_bg = '';
    //Get page featured image
    if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        $pp_page_bg = $image_thumb[0];
        
        if(is_single() && $post->post_type == 'mphb_room_type')
		{
			$page_menu_transparent = 1;
		}
    }
    
   if(!empty($pp_page_bg) && basename($pp_page_bg)=='default.png')
    {
    	$pp_page_bg = '';
    }
	
	//Check if Woocommerce is installed	
	if(class_exists('Woocommerce') && hoteller_is_woocommerce_page())
	{
		$shop_page_id = get_option( 'woocommerce_shop_page_id' );
		$page_menu_transparent = get_post_meta($shop_page_id, 'page_menu_transparent', true);
	}
	
	if(is_search() OR is_404() OR is_archive() OR is_category() OR is_tag())
	{
	    $page_menu_transparent = 0;
	}
	
	$hoteller_homepage_style = hoteller_get_homepage_style();
	if($hoteller_homepage_style == 'fullscreen')
	{
	    $page_menu_transparent = 1;
	}
?>
<div class="top_bar <?php if(!empty($page_menu_transparent)) { ?>hasbg<?php } ?>">
    	<!-- Begin logo -->
    	<div id="logo_wrapper">
    	
    	<?php
    	    //get custom logo
    	    $tg_retina_logo = get_theme_mod('tg_retina_logo', hoteller_get_demo_logo('tg_retina_logo'));

    	    if(!empty($tg_retina_logo))
    	    {	
    	    	//Get image width and height
		    	$image_id = hoteller_get_image_id($tg_retina_logo);
		    	
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
			<!-- Cahuilla  -->
    	<div id="logo_normal" class="logo_container">
				<div class="standard_wrapper">
				<div class="c-logo__wrapper">
					<div class="logo_align">
						<a id="custom_logo" class="logo_wrapper <?php if(!empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo esc_url(home_url('/')); ?>">
							<div class="c-logo">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.6 51.69"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Asset 1</title><g id="Layer_2" data-name="Layer 2"><g id="ART"><path class="cls-1" d="M96.86,6.32A7.68,7.68,0,0,1,90.63.09.09.09,0,0,0,90.54,0a.09.09,0,0,0-.08.09,7.68,7.68,0,0,1-6.23,6.23.09.09,0,0,0-.09.08.09.09,0,0,0,.09.09,7.68,7.68,0,0,1,6.23,6.23.09.09,0,0,0,.08.09.09.09,0,0,0,.09-.09,7.68,7.68,0,0,1,6.23-6.23A.09.09,0,0,0,97,6.4.09.09,0,0,0,96.86,6.32Z"/><path class="cls-1" d="M118.82,18.11a3.61,3.61,0,0,1-2.94-2.94,0,0,0,1,0-.08,0,3.63,3.63,0,0,1-2.94,2.94,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3.64,3.64,0,0,1,2.94,2.94,0,0,0,0,0,.08,0,3.63,3.63,0,0,1,2.94-2.94,0,0,0,0,0,0,0A0,0,0,0,0,118.82,18.11Z"/><path class="cls-1" d="M75.19,48a4.33,4.33,0,0,1-3.51-3.5,0,0,0,0,0-.05,0s0,0,0,0a4.31,4.31,0,0,1-3.5,3.5.05.05,0,0,0,0,.1,4.29,4.29,0,0,1,3.5,3.5.05.05,0,0,0,0,0,0,0,0,0,0,.05,0,4.32,4.32,0,0,1,3.51-3.5.05.05,0,0,0,0-.1Z"/><path class="cls-1" d="M9.58,20.54A6.57,6.57,0,0,1,13.91,22l1.35-1.88a9.72,9.72,0,0,0-5.71-1.89A9.23,9.23,0,0,0,2.81,21,9.27,9.27,0,0,0,0,27.8a9.17,9.17,0,0,0,2.81,6.74,9.14,9.14,0,0,0,6.74,2.81,9.72,9.72,0,0,0,5.71-1.89l-1.35-1.87a6.57,6.57,0,0,1-4.33,1.48,6.72,6.72,0,0,1-5-2.14,7.37,7.37,0,0,1,0-10.26A6.74,6.74,0,0,1,9.58,20.54Z"/><path class="cls-1" d="M22.75,34.27l3.48,1.4,3.47-1.4.92,2.43H33.3L26.23,18.47,19.16,36.7h2.67Zm3.48-10.36,3,8.92h-6Z"/><polygon class="cls-1" points="39.86 32.88 46.19 32.88 46.19 36.7 48.52 36.7 48.52 19.6 46.19 19.6 46.19 31.45 43.03 30.04 39.86 31.45 39.86 19.6 37.53 19.6 37.53 36.7 39.86 36.7 39.86 32.88"/><path class="cls-1" d="M63.71,35a7.69,7.69,0,0,0,1.55-5.1V19.6H62.93V30.29c0,2.65-1.34,4.47-3.5,4.47s-3.49-1.82-3.49-4.47V19.6H53.6V29.9c0,4.35,2.17,7,5.83,7A5.28,5.28,0,0,0,63.71,35Z"/><rect class="cls-1" x="70.47" y="19.6" width="2.33" height="17.1"/><polygon class="cls-1" points="84.17 34.56 80.18 34.56 80.18 19.6 77.85 19.6 77.85 36.7 84.17 36.7 84.17 34.56"/><polygon class="cls-1" points="95.52 34.56 91.52 34.56 91.52 19.6 89.19 19.6 89.19 36.7 95.52 36.7 95.52 34.56"/><path class="cls-1" d="M106.14,18.47,99.07,36.7h2.68l.92-2.43,3.47,1.4,3.48-1.4.92,2.43H113Zm-3,14.36,3-8.92,3,8.92Z"/><path class="cls-1" d="M137.38,24.37A5,5,0,0,1,140,25a4.83,4.83,0,0,1,1.79,1.8l-1.54,1.08A3.79,3.79,0,0,0,139,26.68a3.08,3.08,0,0,0-1.65-.44,3.22,3.22,0,0,0-1.26.24,3,3,0,0,0-1,.68,3.16,3.16,0,0,0-.67,1,3.75,3.75,0,0,0,0,2.64,3.23,3.23,0,0,0,.67,1,3.16,3.16,0,0,0,1,.66,3.22,3.22,0,0,0,1.26.24,3.08,3.08,0,0,0,1.65-.43,3.79,3.79,0,0,0,1.19-1.23l1.54,1.08A4.83,4.83,0,0,1,140,34a5,5,0,0,1-2.59.66,5.45,5.45,0,0,1-2.07-.39,5.07,5.07,0,0,1-1.66-1.08,5.2,5.2,0,0,1-1.12-1.63,5.23,5.23,0,0,1,0-4.06,5.2,5.2,0,0,1,1.12-1.63,5.07,5.07,0,0,1,1.66-1.08A5.45,5.45,0,0,1,137.38,24.37Z"/><path class="cls-1" d="M153.57,34.45h-2.18l-.55-1.29h-4.05l-.56,1.29h-2.17l4.42-10.08h.66Zm-6.08-3h2.63l-1.31-3.34Z"/><path class="cls-1" d="M159.6,24.37a3.73,3.73,0,0,1,2,.53,3.66,3.66,0,0,1,1.26,1.34l-1.38,1.07a3,3,0,0,0-.81-.84,2,2,0,0,0-1.08-.3,1.61,1.61,0,0,0-.87.23.8.8,0,0,0-.36.73.77.77,0,0,0,.3.66,4.89,4.89,0,0,0,.86.48l1.12.49a5.91,5.91,0,0,1,1.81,1.18,2.35,2.35,0,0,1,.64,1.72,2.79,2.79,0,0,1-.27,1.24,2.74,2.74,0,0,1-.74.94,3.27,3.27,0,0,1-1.09.59,4.63,4.63,0,0,1-1.37.2,4.25,4.25,0,0,1-3.82-2.19l1.39-1a4.51,4.51,0,0,0,.44.54,3.89,3.89,0,0,0,.53.46,2.81,2.81,0,0,0,.65.32,2.55,2.55,0,0,0,.81.12,1.64,1.64,0,0,0,1-.29,1,1,0,0,0,.37-.81.83.83,0,0,0-.33-.72,5.37,5.37,0,0,0-.93-.51L158.73,30a9.77,9.77,0,0,1-1-.51,4,4,0,0,1-.76-.63,2.67,2.67,0,0,1-.49-.76,2.4,2.4,0,0,1-.18-.95,2.57,2.57,0,0,1,.25-1.16,2.7,2.7,0,0,1,.69-.88,3,3,0,0,1,1-.57A4.15,4.15,0,0,1,159.6,24.37Z"/><path class="cls-1" d="M168.58,34.45h-2v-9.9h2Z"/><path class="cls-1" d="M178.92,30.46V24.55h2V34.63h-.66l-5.74-6.12v5.94h-2V24.37h.68Z"/><path class="cls-1" d="M189.55,24.37a5.43,5.43,0,0,1,2.06.39,5.12,5.12,0,0,1,2.8,2.71,5.09,5.09,0,0,1-1.13,5.69,5.11,5.11,0,0,1-1.67,1.08,5.61,5.61,0,0,1-4.11,0,5.11,5.11,0,0,1-1.67-1.08,5,5,0,0,1-1.11-1.63,5.12,5.12,0,0,1,0-4.06,5,5,0,0,1,1.12-1.63,5.22,5.22,0,0,1,1.67-1.08A5.29,5.29,0,0,1,189.55,24.37Zm0,1.87a3.28,3.28,0,0,0-1.28.24,3,3,0,0,0-1,.68,3.2,3.2,0,0,0-.66,1,3.9,3.9,0,0,0,0,2.64,2.9,2.9,0,0,0,1.67,1.69,3.48,3.48,0,0,0,2.54,0,3.05,3.05,0,0,0,1-.66,3,3,0,0,0,.67-1,3.75,3.75,0,0,0,0-2.64,3.07,3.07,0,0,0-.67-1,3,3,0,0,0-1-.68A3.29,3.29,0,0,0,189.57,26.24Z"/><path class="cls-1" d="M212.5,34.45h-2V30.17H206.1v4.28h-2v-9.9h2v3.79h4.38V24.55h2Z"/><path class="cls-1" d="M221.11,24.37a5.43,5.43,0,0,1,2.06.39,5.12,5.12,0,0,1,2.8,2.71,5.09,5.09,0,0,1-1.13,5.69,5.11,5.11,0,0,1-1.67,1.08,5.61,5.61,0,0,1-4.11,0,5.11,5.11,0,0,1-1.67-1.08,5,5,0,0,1-1.11-1.63,5.12,5.12,0,0,1,0-4.06,5,5,0,0,1,1.12-1.63,5.22,5.22,0,0,1,1.67-1.08A5.29,5.29,0,0,1,221.11,24.37Zm0,1.87a3.28,3.28,0,0,0-1.28.24,3,3,0,0,0-1,.68,3.2,3.2,0,0,0-.66,1,3.9,3.9,0,0,0,0,2.64,2.9,2.9,0,0,0,1.67,1.69,3.48,3.48,0,0,0,2.54,0,3.05,3.05,0,0,0,1-.66,3,3,0,0,0,.67-1,3.75,3.75,0,0,0,0-2.64,3.07,3.07,0,0,0-.67-1,3,3,0,0,0-1-.68A3.29,3.29,0,0,0,221.13,26.24Z"/><path class="cls-1" d="M237,26.38H233.8v8.07h-2V26.38h-3.17V24.55H237Z"/><path class="cls-1" d="M246.64,26.38H242v2h3.42v1.72H242v2.51h4.81v1.83H240v-9.9h6.66Z"/><path class="cls-1" d="M252.27,32.62h4.33v1.83h-6.36v-9.9h2Z"/></g></g></svg>
							</div>
						</a>
					</div>

					<!-- Begin right corner buttons -->
					<div class="c-logo__links">
						<ul>
							<li>
								<span class="ti-location-pin"></span>
								<a href="#">Locate</a>
							</li>
							<li>
								<span class="ti-email"></span>
								<a href="#">Get Promotions</a>
							</li>
							<li>
								<span class="ti-bell"></span>
								<a href="#">Book Now</a>
							</li>
							<li>
								<span class="ti-user"></span>
								<a href="#">My Account</a>
							</li>
						</ul>
					</div>
					<!-- End right corner buttons -->
				</div>
			</div>
			</div>
    	<?php
    	    }
    	    else
    	    {
		?>
		<div id="logo_normal" class="logo_container">
    		<div class="logo_align">
	    	    <a id="custom_logo" class="logo_wrapper <?php if(!empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo esc_url(home_url('/')); ?>">
		    	    <img src="<?php echo get_template_directory_uri(); ?>/images/logo_black.png" alt="<?php esc_attr(get_bloginfo('name')); ?>" class="custom_logo_no_info"/>
	    	    </a>
    		</div>
		</div>
		<?php
    	    }
    	?>
    	
    	<?php
    		//get custom logo transparent
    	    $tg_retina_transparent_logo = get_theme_mod('tg_retina_transparent_logo');

    	    if(!empty($tg_retina_transparent_logo))
    	    {
    	    	//Get image width and height
		    	$image_id = hoteller_get_image_id($tg_retina_transparent_logo);
		    	
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
    	<div id="logo_transparent" class="logo_container">
    		<div class="logo_align">
	    	    <a id="custom_logo_transparent" class="logo_wrapper <?php if(empty($page_menu_transparent)) { ?>hidden<?php } else { ?>default<?php } ?>" href="<?php echo esc_url(home_url('/')); ?>">
	    	    	<?php
						if($image_width > 1 && $image_height > 1)
						{
					?>
					<img src="<?php echo esc_url($tg_retina_transparent_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="<?php echo esc_attr($image_width); ?>" height="<?php echo esc_attr($image_height); ?>"/>
					<?php
						}
						else if($image_width == 1 && $image_height == 1)
						{
					?>
	    	    	<img src="<?php echo esc_url($tg_retina_transparent_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" style="width:50%;height:auto;"/>
	    	    	<?php 
		    	    	}
						else
						{
					?>
	    	    	<img src="<?php echo esc_url($tg_retina_transparent_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="118" height ="36"/>
	    	    	<?php 
		    	    	}
		    	    ?>
	    	    </a>
    		</div>
    	</div>
    	<?php
    	    }
    	?>
			<!-- End logo -->   
			
			<!-- Begin right corner buttons -->
			<div id="logo_right_wrapper">
				<div id="logo_right_button">		
				<!-- Begin side menu -->
				<?php
						if ( has_nav_menu( 'side-menu' ) ) 
						{
				?>
						<a href="javascript:;" id="mobile_nav_icon"><span class="ti-menu"></span></a>
					<?php
						}
				?>
				<!-- End side menu -->
				</div>
			</div>
			<!-- End right corner buttons -->
    </div>
	</div>
</div>

<div class="menu__wrapper">
<div id="menu_wrapper" >
	<div class="">
		<div id="nav_wrapper">
			<div class="nav_wrapper_inner">
				<div id="menu_border_wrapper">
					<?php 	
						//Check if has custom menu
						if(is_object($post) && $post->post_type == 'page')
					{
						$page_menu = get_post_meta($current_page_id, 'page_menu', true);
					}
					
						if(empty($page_menu))
					{
						if ( has_nav_menu( 'primary-menu' ) ) 
						{
									wp_nav_menu( 
												array( 
													'menu_id'			=> 'main_menu',
													'menu_class'		=> 'nav',
													'theme_location' 	=> 'primary-menu',
													'walker' => new Hoteller_walker(),
												) 
									); 
							}
						}
						else
						{
							if( $page_menu && is_nav_menu( $page_menu ) ) {  
								wp_nav_menu( 
										array(
												'menu' => $page_menu,
												'walker' => new Hoteller_walker(),
												'menu_id'			=> 'main_menu',
												'menu_class'		=> 'nav',
										)
								);
						}
						}
					?>
				</div>
			</div>
		</div>
		<!-- End main nav -->
	</div>
</div>

</div>



        
        