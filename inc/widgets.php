<?php 

function urbanfashion_widget_areas() {


    
    register_sidebar( array(
        'name'          => esc_html__( 'Main Footer', 'urbanfashion' ),
        'id'            => 'urbanfashion_footer',
        'description'   => esc_html__( 'Add footer top left widgets here.', 'urbanfashion' ),
        'before_widget' => '<div id="%1$s" class="col single-footer-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );




    register_sidebar( array(
        'name'          => esc_html__( 'Main Sidebar', 'urbanfashion' ),
        'id'            => 'right_sidebar',
        'description'   => esc_html__( 'Add widgets here. This widget will be show as a default sidebar.', 'urbanfashion' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );



    register_sidebar( array(
        'name'          => esc_html__( 'Single Post Sidebar', 'urbanfashion' ),
        'id'            => 'right_sidebar_two',
        'description'   => esc_html__( 'Add right sidebar widgets here on Single Post.', 'urbanfashion' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );



    register_sidebar( array(
        'name'          => esc_html__( 'Recommended Post Widget', 'urbanfashion' ),
        'id'            => 'recommended_widget_sidebar',
        'description'   => esc_html__( 'Add recommended post widgets here. it will be print on single post bottom.', 'urbanfashion' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );





}
add_action('widgets_init', 'urbanfashion_widget_areas');


