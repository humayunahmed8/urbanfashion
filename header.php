<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package urbanfashion
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php 
			
		// Store framework data
		$enable_preloader = cs_get_option('enable_preloader');
		$enable_box_layout = cs_get_option('enable_box_layout');


		$enable_image_logo = cs_get_option('enable_image_logo');
		$image_logo = cs_get_option('image_logo');
		$image_logo_max_width = cs_get_option('image_logo_max_width');
		$text_logo = cs_get_option('text_logo');


	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


	<!-- Theme Preloader -->

    <?php if($enable_preloader == true) : ?>

		<script>
			jQuery(window).load(function(){
				jQuery(".preloader-wrapper").fadeOut();
			})
		</script>	

		<!-- Preloader -->
		<div class="preloader-wrapper">
			<div id="bars2">
		        <span></span>
		        <span></span>
		        <span></span>
		        <span></span>
		        <span></span>
	        </div>
		</div>

	<?php endif; ?>

<div id="page" class="site<?php if($enable_box_layout == true) : ?> urbanfashion-boxed-layout <?php endif; ?>">

		<div class="urbanfashion-header">
		    <div class="container">
			    <div class="header-internal">
			        <div class="row align-items-center">

			        	<div class="col-xl-2 col-lg-2 col-md-2 col-2 order-1 order-lg-1 order-md-1">
			        		<div class="site-branding">             
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					
									<?php if($enable_image_logo == true && !empty($image_logo)) : 
										$image_logo_src = wp_get_attachment_image_src( $image_logo, 'full', false );
									?>
										<img style="max-width:<?php echo esc_attr($image_logo_max_width); ?>px" src="<?php echo esc_url($image_logo_src[0]); ?>" alt="<?php echo esc_html(bloginfo( 'name' )); ?>">
									<?php else : ?>
										<?php if(!empty($text_logo)) {echo esc_html($text_logo);} else{ echo esc_html(bloginfo( 'name' ));}  ?>
									<?php endif; ?>
									
								</a>
					 		</div>
			        	</div>

			        	<div class="col-xl-5 col-lg-5 col-md-2 col-2 order-3 order-lg-2 order-md-3 text-center">
			        		<div class="single-sub-menu-content">
					        	<nav id="single-page-navigation" class="main-navigation">
						            <?php
						                wp_nav_menu( array(
						                    'theme_location' => 'main-menu',
						                    'menu_id'        => 'primary-menu',
						                ) );
						            ?>
						        </nav><!-- #site-navigation -->
					        </div>
			        	</div>

			        	<div class="col-xl-5 col-lg-5 col-md-8 col-8 order-2 order-lg-3 order-md-2 text-right">
			        		<div class="top-right-nav">

			        			<div class="header-search-bar blog-cat-search header-search-mobile">
			                        <div class="search-container">
			                            <?php get_search_form() ?>
			                            <div class="search-btn search-open"></div>
			                        </div>
		                    	</div>

		                    	<?php urban_fashion_woocommerce_cart_link() ?>
								<div class="header-right-avatar">
									<?php if ( is_user_logged_in() ) : ?>
									 	<div class="avatar-thubmnail">
									 		<?php urbanfashion_single_avatar(); ?>
									 	</div>
								 	<?php endif; ?>
								 	<div class="avatar-name">
								 		<?php if ( is_user_logged_in() ) : ?>
										 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','urbanfashion'); ?>"><?php _e('My Account','urbanfashion'); ?></a>
										 <?php else : ?>
										 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','urbanfashion'); ?>"><?php _e('Login / Register','urbanfashion'); ?></a>
										 <?php endif; ?>
								 	</div>
								</div>
							</div>
			        	</div>
			        </div>

		        	<div class="responsive-menu-wrap"></div>
		    	</div>
		    </div> <!-- /.container -->
		</div>
	
	<div id="content" class="site-content">
