<?php
/** 
 * urbanfashion functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package urbanfashion
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'urbanfashion_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function urbanfashion_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on urbanfashion, use a find and replace
		 * to change 'urbanfashion' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'urbanfashion', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary Menu', 'urbanfashion' ),
				//'single-button' => esc_html__( 'Single Button', 'urbanfashion' ),
                'catgory-menu' => esc_html__( 'Category Menu', 'urbanfashion' ),
                'adv-disclosure' => esc_html__( 'Single Blog Menu', 'urbanfashion' ),
			)
		);


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'urbanfashion_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


		add_theme_support( 'woocommerce' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'urbanfashion_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function urbanfashion_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'urbanfashion_content_width', 640 );
}
add_action( 'after_setup_theme', 'urbanfashion_content_width', 0 );





/**
 * Enqueue scripts and styles.
 */
function urbanfashion_scripts() {

	wp_enqueue_style( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1' );
	wp_enqueue_style( 'font-awesome', get_theme_file_uri('/assets/css/font-awesome.min.css'), array(),'4.7.0','all' );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), '1.0' );
    wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), '1.0', 'all' );

	wp_enqueue_style( 'urbanfashion-style', get_stylesheet_uri() );

	wp_enqueue_script( 'popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array('jquery'), '1.16.0', true );

    wp_enqueue_script( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), '4.4.1', true );

    wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );


    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'niceselect', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'sticky-menu', get_template_directory_uri() . '/assets/js/sticky.min.js', array('jquery'), '1.0.4', true );



	wp_enqueue_script( 'urbanfashion-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '_S_VERSION', true );
	
	//wp_enqueue_script( 'urbanfashion-sticky-widget-js', get_template_directory_uri() . '/assets/js/sticky-widget.js', array('jquery'), '1.0.1', true );

	wp_enqueue_script( 'urbanfashion-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'urbanfashion_scripts' );


include_once('inc/widgets.php');

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/custom-breadcrumbs.php';

require get_template_directory() . '/inc/custom-pagination.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/codestar-framework/cs-framework.php';

require get_template_directory() . '/inc/metabox-and-options.php';

require get_template_directory() . '/inc/custom-style.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Load WooCommerce compatibility file.

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


// Customize Archive Title

add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});


// Excerpt Length and excerpt more text 

function urbanfashion_custom_excerpt_length( $length ) {
    return 18;
}
add_filter( 'excerpt_length', 'urbanfashion_custom_excerpt_length', 999 );

function urbanfashion_excerpt_more( $more ) {
    return ' ...';
}
add_filter( 'excerpt_more', 'urbanfashion_excerpt_more' );




// Widget Catagory Limits

add_filter( 'widget_categories_args', function( $args )
{
    $args['number']         = 5;
    $args['orderby']        = 'count';
    $args['order']          = 'DESC';
    $args['hierarchical']   = 0;
    $args['hide_empty']     = 1;

    return $args;
} );







// Register Custom Navigation Walker

function register_navwalker(){
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


// Admin footer modification
  
function remove_footer_admin () 
{
    echo '<span id="footer-thankyou">Developed by <a href="https://www.techunary.com" target="_blank">Humayun Ahmed</a></span>';
}
 
add_filter('admin_footer_text', 'remove_footer_admin');



// Woo Commerce Cart Icon

if(class_exists( 'WooCommerce' )){
	// Handle cart in header fragment for ajax add to cart
	add_filter('add_to_cart_fragments', 'urban_fashion_header_add_to_cart_fragment');
	function urban_fashion_header_add_to_cart_fragment( $fragments ) {
	    global $woocommerce;
	 
	    ob_start();
	 
	    urban_fashion_woocommerce_cart_link();
	 
	    $fragments['a.fashion-cart'] = ob_get_clean();
	 
	    return $fragments;
	 
	}
	 
	function urban_fashion_woocommerce_cart_link() {
	    global $woocommerce;
	    ?>

	    <a title="<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> <?php _e('in your shopping cart', 'woothemes'); ?>" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="fashion-cart"><i class="fa fa-shopping-cart"></i>  
	    	<span class="cart-text">Cart</span>
	    	<span class="shopping-cart-count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span></a>

	    <?php
	}
}

// Get Avatar 

if ( ! function_exists( 'urbanfashion_single_avatar' ) ) :
	function urbanfashion_single_avatar() {
		?>
		<div class="single-meta-avatar">
			<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 30, '', get_the_author_meta( 'display_name' ) ); ?>
				<?php the_author() ?>
			</a>
		</div>
	<?php
	}
endif;



// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );


// Remove wautop() from widget shortcode 
remove_filter('widget_text_content', 'wpautop');


