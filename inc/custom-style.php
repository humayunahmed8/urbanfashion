<?php


if ( ! function_exists( 'urbanfashion_google_fonts_url' ) ) :
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function urbanfashion_google_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $body_font_variant = cs_get_option('body_font_variant');
    $body_font_variant_processed = implode(',',$body_font_variant);
    $body_subsets   = ':'.$body_font_variant_processed.'';

    $heading_font_variant = cs_get_option('heading_font_variant');
    $heading_font_variant_processed = implode(',',$heading_font_variant);
    $heading_subsets   = ':'.$heading_font_variant_processed.'';

    $body_font = cs_get_option('body_fonts')['family'];
    $body_font .= $body_subsets;

    $heading_font = cs_get_option('heading_fonts')['family'];
    $heading_font .= $heading_subsets;

    /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== esc_html_x( 'on', 'Karla font: on or off', 'textdomain' ) ) {
        $fonts[] = $body_font;
    }

    /* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== esc_html_x( 'on', 'Lato font: on or off', 'textdomain' ) ) {
        $fonts[] = $heading_font;
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
        ), 'https://fonts.googleapis.com/css' );

    }

    return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function urbanfashion_prefix_scripts() {

    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'urbanfashion_google_fonts', urbanfashion_google_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'urbanfashion_prefix_scripts' );





function urbanfashion_custom_css() {
    wp_enqueue_style(
        'urbanfashion-custom-style',
        get_template_directory_uri() . '/assets/css/custom-style.css'
    );

    $body_font = cs_get_option('body_fonts')['family']; 
    $body_font_variant = cs_get_option('body_fonts')['variant']; 
    $heading_font_variant = cs_get_option('heading_fonts')['variant']; 
    $heading_font = cs_get_option('heading_fonts')['family'];

    $enable_box_layout = cs_get_option('enable_box_layout');
    $body_bg_color = cs_get_option('body_bg_color');
    $body_bg = cs_get_option('body_bg');
    $body_bg_image_array = wp_get_attachment_image_src( $body_bg, 'large', false );
    $body_bg_repeat = cs_get_option('body_bg_repeat');
    $body_bg_attachment = cs_get_option('body_bg_attachment');
    $body_bg_size = cs_get_option('body_bg_size');
    $body_bg_position = cs_get_option('body_bg_position');



    $footer_bg = cs_get_option('footer_bg');
    $footer_text_color = cs_get_option('footer_text_color');
    $footer_heading_color = cs_get_option('footer_heading_color');
    $theme_color = cs_get_option('theme_color');
    $theme_secondary_color = cs_get_option('theme_secondary_color');
    $custom_css = '
        body{ 
            font-family: '.esc_html($body_font).'; font-weight:'.esc_html($body_font_variant).'; 
        }
        h1,h2,h3,h4,h5,h6{
            font-family: '.esc_html($heading_font).'; font-weight:'.esc_html($heading_font_variant).'; 
        }
    ';

    if($enable_box_layout == true){
        if(!empty($body_bg_color)){
            $custom_css .= '
                body{
                    background-color:'.esc_attr($body_bg_color).'
                }
            ';
        }

        if(!empty($body_bg)){
            $custom_css .= '
                body{
                    background-image: url('.esc_url($body_bg_image_array[0]).')
                }
            ';
        }

        if(!empty($body_bg_repeat)){
            $custom_css .= '
                body{
                    background-repeat:'.esc_attr($body_bg_repeat).'
                }
            ';
        }

        if(!empty($body_bg_attachment)){
            $custom_css .= '
                body{
                    background-attachment:'.esc_attr($body_bg_attachment).'
                }
            ';
        }

        if(!empty($body_bg_size)){
            $custom_css .= '
                body{
                    background-size:'.esc_attr($body_bg_size).'
                }
            ';
        }

        if(!empty($body_bg_position)){
            $custom_css .= '
                body{
                    background-position:'.esc_attr($body_bg_position).'
                }
            ';
        }
    }



    if(!empty($footer_bg)){
        $custom_css .= '
            .footer-top{background-color:'.esc_attr($footer_bg).'}
        ';
    }

    if(!empty($footer_text_color)){
        $custom_css .= '
            .site-footer .widget li a, .site-footer .widget a, .site-footer .widget p{color:'.esc_attr($footer_text_color).'}
        ';
    }

    if(!empty($footer_heading_color)){
        $custom_css .= '
            .site-footer .widget-title{color:'.esc_attr($footer_heading_color).'}
        ';
    }

    if(!empty($theme_color)){
        $custom_css .= '
             .dummy-bg-color-class{background-color:'.esc_attr($theme_color).'!important}

            .dummy-theme-color {color:'.esc_attr($theme_color).'}

            .dummy-border-color {
                border-top-color: '.esc_attr($theme_color).'
            }

            .dummy-shape-color{
                fill: '.esc_attr($theme_color).'!important
            }
        ';
    }


    if(!empty($theme_secondary_color)){
        $custom_css .= '
            .dummy-hover-secondary-color {background-color:'.esc_attr($theme_secondary_color).'!important}

            .dummy-secondary-border-and-hover-color {
                border-color: '.esc_attr($theme_secondary_color).'!important
            }
        ';
    }


    wp_add_inline_style( 'urbanfashion-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'urbanfashion_custom_css' );
