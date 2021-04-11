<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package urbanfashion 
 */

get_header();


    if (get_post_meta( $post->ID,'urbanfashion_post_options',true)) {
        $page_meta = get_post_meta( $post->ID,'urbanfashion_post_options',true);
    }else{
        $page_meta = array();
    }

    if (array_key_exists('resource_links', $page_meta)) {
        $post_resource_links = $page_meta['resource_links'];
    }else{
        $post_resource_links = true;
    }

    if (array_key_exists('enable_resource_links', $page_meta)) {
        $post_enable_resource_links = $page_meta['enable_resource_links'];
    }else{
        $post_enable_resource_links = true;
    }

    $display_comment_box = cs_get_option('display_comment_box');

?>





<div class="urbanfashion-internal pb-5 offwhite-bg">
    <main class="main-content">
        <div class="container">
            

            <div class="single-post-content-box content-white-bg">

                
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="single-blog-post-header-container">
                    <div class="breadcrumb-and-adv-disclosure">
                        <div class="page-breadcrumbs-area single-post-breadcrumbs">
                            <?php custom_breadcrumbs(); ?>
                        </div>
                        <div class="advertising-disclosure">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'adv-disclosure',
                                    'menu_id'        => 'adv-disclosure-menu',
                                ) );
                            ?>
                        </div>
                    </div>
                     
                    <div class="single-blog-post-header">
                        <div class="single-post-title-box">
                            <div class="single-title-box-content">
                                <?php
                                    if ( is_singular() ) :
                                        the_title( '<h1 class="entry-title">', '</h1>' );
                                    else :
                                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                    endif;
                                ?>
                                <div class="single-blog-post-header-author-box">
                                    <span class="author-thumbnails">
                                        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 35 ); ?>
                                    </span>
                                    <span class="author-name-date">
                                        <p class="author-name"><?php the_author() ?></p>
                                        <span class="post-meta-date">
                                            <?php echo get_the_date();?>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="single-post-header-featured-image">
                            <?php if( has_post_thumbnail() ) : ?>
                                <div class="urbanfashion-feautured-content">
                                    <?php if( !is_single() ) : ?> <a href="<?php the_permalink(); ?>"> <?php endif; ?>
                                         <?php the_post_thumbnail('urbanfashion-blog-thumb');  ?>
                                    </a>
                                </div>
                            <?php else : ?>
                                <div class="urbanfashion-feautured-content">
                                    <?php if( !is_single() ) : ?> <a href="<?php the_permalink(); ?>"> <?php endif; ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/blog-placeholder.png" alt="" />
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php endwhile ?>
                            
                <div class="row no-gutters">


                    <!-- Right Codent Area -->
                    <div class="col-12 col-lg-9">
                        <div class="site-main-content-area">
                            <div class="lazukhasan-main-blog-post-loop pt-0 pb-0 mobile-padding-right-0 pl-0">

                                <?php while ( have_posts() ) : the_post(); ?>
                                <article class="single-blog-post border-0" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="single-blog-post-content">
                                        

                                        <?php //wcr_share_buttons(); ?>

                                        <!-- Post Content for Both Style -->

                                        <div class="entry-content">
                                            <?php
                                            if(is_single()){
                                                the_content( sprintf(
                                                    wp_kses(
                                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'urbanfashion' ),
                                                        array(
                                                            'span' => array(
                                                                'class' => array(),
                                                            ),
                                                        )
                                                    ),
                                                    get_the_title()
                                                ) );
                                            } else {
                                                the_excerpt();
                                                echo '<a href="'.esc_url(get_permalink()).'" class="urbanfashion-read-more-btn"> '.esc_html__( 'Read More', 'urbanfashion' ).' </a>';
                                            }
                                            
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'urbanfashion' ),
                                                'after'  => '</div>',
                                            ) );
                                            ?>
                                        </div><!-- .entry-content -->

                                        <!-- Post Navigation on Single Post -->
                                        <?php if(isset($display_post_nav) &&  $display_post_nav == true) : ?>
                                            <div class="single-post-navigation">
                                                <?php 
                                                    the_post_navigation();                                
                                                ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( comments_open() || get_comments_number() ) : 
                                        if($display_comment_box == true ) : 
                                        ?>
                                        <!-- Single Post Comments -->
                                        <div class="single-post-comments">
                                            <?php comments_template(); ?>
                                        </div>
                                        <?php endif; endif; ?>


                                    </div>
                                      
                                </article>

                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div> <!-- /.col-md-8 -->

                    <div class="col-lg-3">
                        <div class="single-post-right-sidebar">
                            <?php 
                                if(is_active_sidebar('right_sidebar')){
                                    dynamic_sidebar('right_sidebar');
                                }
                            ?>
                        </div> 
                    </div>
                </div> <!-- /.row -->

            </div> <!-- /.single-post-content-box -->


            <?php if(is_active_sidebar('recommended_widget_sidebar')) : ?>
            <div class="recommended-posts-widget">
                <?php 
                    dynamic_sidebar('recommended_widget_sidebar');
                ?>
            </div>
            <?php endif; ?>


        </div> <!-- /.container -->
    </main> <!-- /.main-content -->


   

</div> <!-- /.urbanfashion-internal -->









<?php
get_footer();





