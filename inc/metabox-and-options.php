<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


function urbanfashion_theme_shortcode_options($options){
    $options      = array(); // remove shortcode old options
}
add_filter('cs_shortcode_options', 'urbanfashion_theme_shortcode_options');


function urbanfashion_theme_customizer($options){
    $options      = array(); // remove customizer old options
}
add_filter('cs_customize_options', 'urbanfashion_theme_customizer');


function urbanfashion_post_metabox($options){

    $options      = array(); // remove old options

  
    $options[]    = array(
        'id'        => 'urbanfashion_page_options',
        'title'     => esc_html__('Page Options','urbanfashion'),
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'high',
        'sections'  => array(

        // begin: a section
        array(
          'name'  => 'urbanfashion_page_options_meta',
          'icon'  => 'fa fa-cog',

          // begin: fields
          'fields' => array(
                array(
                  'id'      => 'enable_title',
                  'type'    => 'switcher',
                  'title'   => esc_html__('Enable Title', 'urbanfashion'),
                  'default' => true,
                  'desc'    => esc_html__('If you want to enable page title,You can select on', 'urbanfashion'),
                ),

                array(
                  'id'      => 'custom_title',
                  'type'    => 'text',
                  'title'   => esc_html__('Custom title', 'urbanfashion'),
                  'dependency'   => array( 'enable_title', '==', 'true' ),  
                  'desc'    => esc_html__('Type your custom title', 'urbanfashion'),
                ),

              ), // end: fields
            ), // end: a section
        ),
    );

    return $options;
}
add_filter( 'cs_metabox_options', 'urbanfashion_post_metabox' );



function urbanfashion_option_settings($settings){

    $settings = array();

    $settings           = array(
        'menu_title'      => esc_html__('Urban Fashion Setting','urbanfashion'),
        'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
        'menu_slug'       => esc_html__('urbanfashion-theme-options','urbanfashion'),
        'ajax_save'       => true,
        'show_reset_all'  => true,
        'framework_title' => esc_html__('Urban Fashion - by Humayun Ahmed','urbanfashion'),
    );


    return $settings;
}
add_filter('cs_framework_settings', 'urbanfashion_option_settings');




function urbanfashion_options($options){

  $options      = array(); // remove old options


  // Logo Setting

  $options[]    = array(
    'name'      => 'urbanfashion_logo_settings',
    'title'     => esc_html__('Logo Settings','urbanfashion'),
    'icon'      => 'fa fa-flag',
    'fields'    => array(
        array(
          'id'    => 'enable_image_logo',
          'type'  => 'switcher',
          'title' => esc_html__('Enable image logo','urbanfashion'),
          'default' => false,
        ),
        array(
          'id'    => 'image_logo',
          'type'  => 'image',
          'title' => esc_html__('Upload logo','urbanfashion'),
          'dependency'   => array( 'enable_image_logo', '==', 'true' ),
        ),
        array(
          'id'    => 'image_logo_max_width',
          'type'  => 'text',
          'default' => esc_attr('200','urbanfashion'),
          'title' => esc_html__('Logo max width','urbanfashion'),
          'desc' => esc_html__('Type logo max width as numeric value','urbanfashion'),
          'dependency'   => array( 'enable_image_logo', '==', 'true' ),
        ),
        array(
          'id'    => 'text_logo',
          'type'  => 'text',
          'title' => esc_html__('Logo text','urbanfashion'),
          'default' => esc_html__('urbanfashion','urbanfashion'),
          'dependency'   => array( 'enable_image_logo', '==', 'false' ),
        ),
      )
  );

  // Typography Setting

  $options[]    = array(
  'name'      => 'urbanfashion_typography_settings',
  'title'     => esc_html__('Typography Settings','urbanfashion'),
  'icon'      => 'fa fa-heart',
  'fields'    => array(
    array(
      'id'        => 'body_fonts',
      'type'      => 'typography',
      'title'     => esc_html__('Body font','urbanfashion'),
      'default'   => array(
        'family'  => 'Libre Baskerville',
        'variant' => 'regular',
        'font'    => 'google', // this is helper for output
      ),
    ),
    array(
      'id'       => 'body_font_variant',
      'type'     => 'checkbox',
      'title'    => esc_html__('Body font types','urbanfashion'),
      'options'  => array(
        '100'  => '100',
        '100i'  => '100i',
        '200'  => '200',
        '200i' => '200i',
        '300'  => '300',
        '300i'  => '300i',
        '400'  => '400',
        '400i' => '400i',
        '500'  => '500',
        '500i' => '500i',
        '700'  => '700',
        '700i' => '700i',
        '900'  => '900',
        '900i' => '900i',
      ),
      'default'  => array( '400','400i','700','700i')
    ),    
    array(
      'id'        => 'heading_fonts',
      'type'      => 'typography',
      'title'     => esc_html__('Heading font','urbanfashion'),
      'default'   => array(
        'family'  => 'Libre Baskerville',
        'variant' => '700',
        'font'    => 'google', // this is helper for output
      ),
    ),
    array(
      'id'       => 'heading_font_variant',
      'type'     => 'checkbox',
      'title'    => esc_html__('Heading font types','urbanfashion'),
      'options'  => array(
        '100'  => '100',
        '100'  => '100i',
        '200'  => '200',
        '200i' => '200i',
        '300'  => '300i',
        '400'  => '400',
        '400i' => '400i',
        '500'  => '500',
        '500i' => '500i',
        '700'  => '700',
        '700i' => '700i',
        '900'  => '900',
        '900i' => '900i',
      ),
      'default'  => array( '400','400i','700','700i')
    ),  
      )
  );



  // Styling setting 

  $options[]    = array(
    'name'      => 'urbanfashion_styling_settings',
    'title'     => esc_html__('Styling Settings','urbanfashion'),
    'icon'      => 'fa fa-paint-brush',
    'fields'    => array(
        array(
            'id'        => 'theme_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('Theme color','urbanfashion'),
            'default'   => esc_attr__('#FF4A64','urbanfashion'),
        ),
        array(
            'id'        => 'theme_secondary_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('Theme secondary color','urbanfashion'),
            'default'   => esc_attr__('#39393a','urbanfashion'), 
        ),
        array(
            'id'        => 'enable_preloader',
            'type'      => 'switcher',
            'title'     => esc_html__('Enable preloader Desktop','urbanfashion'),
            'default'   => false,
        ),
        array(
            'id'        => 'enable_box_layout',
            'type'      => 'switcher',
            'title'     => esc_html__('Enable box layout','urbanfashion'),
            'default'   => false,
        ),
        array(
            'id'        => 'body_bg',
            'type'      => 'image',
            'title'     => esc_html__('Body background image','urbanfashion'),
            'dependency'   => array( 'enable_box_layout', '==', 'true' ),
        ),
        array(
            'id'        => 'body_bg_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('Body background color','urbanfashion'),
            'dependency'   => array( 'enable_box_layout', '==', 'true' ),
        ),
        array(
            'id'        => 'body_bg_repeat', 
            'type'      => 'select',
            'default'      => 'repeat',
            'options'        => array(
                'repeat'          => 'Repeat',
                'no-repeat'     => 'No Repeat',
            ),
            'title'     => esc_html__('Body background repeat','urbanfashion'),
            'dependency'   => array( 'enable_box_layout', '==', 'true' ),
        ),
        array(
            'id'        => 'body_bg_size', 
            'type'      => 'select',
            'default'      => 'contain',
            'options'        => array(
                'contain'          => 'contain',
                'cover'     => 'cover',
            ),
            'title'     => esc_html__('Body background size','urbanfashion'),
            'dependency'   => array( 'enable_box_layout', '==', 'true' ),
        ),
        array(
            'id'        => 'body_bg_position', 
            'type'      => 'select',
            'default'      => 'center',
            'options'        => array(
                'center center'          => 'center center',
                'top left'     => 'top left',
                'top right'     => 'top right',
                'bottom right'     => 'bottom right',
                'bottom left'     => 'bottom left',
            ),
            'title'     => esc_html__('Body background position','urbanfashion'),
            'dependency'   => array( 'enable_box_layout', '==', 'true' ),
        ),
        array(
            'id'        => 'body_bg_attachment',
            'type'      => 'select',
            'default'      => 'scroll',
            'options'        => array(
                'scroll'          => 'Scroll',
                'fixed'     => 'Fixed',
            ),
            'title'     => esc_html__('Body background attachment','urbanfashion'),
            'dependency'   => array( 'enable_box_layout', '==', 'true' ),
        ),
      )
  );

  // Blog Setting

  $options[]    = array(
    'name'      => 'urbanfashion_blog_settings',
    'title'     => esc_html__('Blog Settings','urbanfashion'),
    'icon'      => 'fa fa-file',
    'fields'    => array(
        array(
            'id'        => 'display_post_date',
            'type'      => 'switcher',
            'title'     => esc_html__('Display post date?','urbanfashion'),
            'default'   => true,
        ),
        array(
            'id'        => 'display_comment_box',
            'type'      => 'switcher',
            'title'     => esc_html__('Display Comment Box on Single Post?','urbanfashion'),
            'default'   => false,
        ),
      )
  );


  // Blog Header Setting

  $options[]    = array(
    'name'      => 'urbanfashion_blog_header_text_settings',
    'title'     => esc_html__('Blog Page Header','urbanfashion'),
    'icon'      => 'fa fa-sticky-note',
    'fields'    => array(
        array(
            'id'        => 'blog_header_title',
            'type'      => 'textarea',
            'title'     => esc_html__('Blog Header Title','urbanfashion'),
            'desc' => esc_html__('Type Blog Header Title','urbanfashion'),
            'default' => 'Top 10 Tech Lists',
        ),
        array(
            'id'        => 'blog_header_desc',
            'type'      => 'textarea',
            'title'     => esc_html__('Blog Header Description','urbanfashion'),
            'desc' => esc_html__('Type Blog Header Description','urbanfashion'),
            'default' => 'Make better decisions on everything from antivirus software to smartwatches, with these trusted sources',
        ),
        array(
            'id'        => 'blog_header_trending_post_title',
            'type'      => 'text',
            'title'     => esc_html__('Trending Post Title','urbanfashion'),
            'desc' => esc_html__('Type Trending Post Title','urbanfashion'),
            'default' => 'Trending Lists',
        ),
        array(
            'id'        => 'featured_post_query',
            'type'      => 'text',
            'title'     => esc_html__('Featured post title category slug','urbanfashion'),
            'desc' => esc_html__('First create a category.Then, type the category slug name to this box. default value is: #featureds ','urbanfashion'),
            'default' => 'featured',
        ),
      )
  );




  // Archive Setting

  $options[]    = array(
    'name'      => 'urbanfashion_archive_header_text_settings',
    'title'     => esc_html__('Blog Archive Header','urbanfashion'),
    'icon'      => 'fa fa-archive',
    'fields'    => array(
        array(
            'id'        => 'blog_archive_title',
            'type'      => 'textarea',
            'title'     => esc_html__('Blog Archive Header Title','urbanfashion'),
            'desc' => esc_html__('Type Blog Archive Header Title','urbanfashion'),
            'default' => 'Download Free PLR Now!',
        ),
        array(
            'id'        => 'blog_archive_desc',
            'type'      => 'textarea',
            'title'     => esc_html__('Blog Archive Header Description','urbanfashion'),
            'desc' => esc_html__('Type Blog Archive Header Description','urbanfashion'),
            'default' => 'Make better decisions on everything from antivirus software to smartwatches, with these trusted sources...',
        )
      )
  );

  // Footer Setting

  $options[]    = array(
    'name'      => 'urbanfashion_footer_settings',
    'title'     => esc_html__('Footer Settings','urbanfashion'),
    'icon'      => 'fa fa-angle-double-down',
    'fields'    => array(
        array(
            'id'        => 'footer_bg',
            'type'      => 'color_picker',
            'title'     => esc_html__('Footer background color','urbanfashion'),
            'default'   => esc_attr__('#F8F8F8','urbanfashion'),
        ), 
        array(
            'id'        => 'footer_text_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('Footer text color','urbanfashion'),
            'default'   => esc_attr__('#727272','urbanfashion'),
        ),  
        array(
            'id'        => 'footer_heading_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('Footer heading color','urbanfashion'),
            'default'   => esc_attr__('#333232','urbanfashion'),
        ),   
      )
  );

  // Script Setting

  $options[]    = array(
    'name'      => 'urbanfashion_scripts_settings',
    'title'     => esc_html__('Scripts settings','urbanfashion'),
    'icon'      => 'fa fa-codepen',
    'fields'    => array(
        array(
          'id'    => 'head_scripts',
          'type'  => 'textarea',
          'sanitize' => false,
          'title' => esc_html__('Head script','urbanfashion'),
          'desc' => esc_html__('Scripts will be included before closing < / head >','urbanfashion'),
        ),
        array(
          'id'    => 'body_end_scripts',
          'type'  => 'textarea',
          'sanitize' => false,
          'title' => esc_html__('Footer script','urbanfashion'),
          'desc' => esc_html__('Scripts will be included before < / body >','urbanfashion'),
        ),
        array(
          'id'    => 'urbanfashion_custom_css',
          'type'  => 'textarea',
          'sanitize' => false,
          'title' => esc_html__('Custom CSS','urbanfashion'),
          'desc' => esc_html__('Add your custom CSS','urbanfashion'),
        ),
      )
  );

 
return $options;


}
add_filter( 'cs_framework_options', 'urbanfashion_options' );