<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package urbanfashion
 */

get_header();

if (get_post_meta( $post->ID,'urbanfashion_page_options',true)) {
        $page_meta = get_post_meta( $post->ID,'urbanfashion_page_options',true);
    }else{
        $page_meta = array();
    }

    if (array_key_exists('enable_title', $page_meta)) {
        $enable_title = $page_meta['enable_title'];
    }else{
        $enable_title = true;
    }

    if (array_key_exists('custom_title', $page_meta)) {
        $custom_title = $page_meta['custom_title'];
    }else{
        $custom_title = '';
    }

    $blog_header_title = cs_get_option('blog_header_title');
    $blog_header_desc = cs_get_option('blog_header_desc');
    $blog_header_trending_post_title = cs_get_option('blog_header_trending_post_title');
    $featured_post_query = cs_get_option('featured_post_query');

?>




<div class="urbanfashion-internal">
	<main class="main-content">
	    <div class="container">
			<div class="main-blog-page-content-wrapper">
                <div class="main-blog-page-header-top">
                	<div class="row align-items-center">
                		<div class="col-lg-7">
                			<div class="main-blog-page-header-left-content">
                				<h1>
                                    <?php if(!empty($blog_header_title)) {echo $blog_header_title;} ?>
		                        </h1>
                                <p>
                                    <?php if(!empty($blog_header_desc)) {echo $blog_header_desc;} ?>
                                </p>
                			</div>
                		</div>
                		<div class="col-lg-5">
                            <h6 class="trending-post-section-title"><?php if(!empty($blog_header_trending_post_title)) {echo $blog_header_trending_post_title;} ?></h6>
                			<div class="trending-post-list">
                    			<?php 

    							$query_trend = array(
    							   'post_type' => 'post',
    							   'category_name'  => $featured_post_query,
    							   'posts_per_page' => '2' ,
    							   'orderby' => 'date',
    							   'order' => 'DESC',
    							 );
    							 
    							$trend_query = new WP_Query( $query_trend ); 

    		               		if ( $trend_query->have_posts() ) : while ( $trend_query->have_posts() ) : $trend_query->the_post(); ?>
    								
        			             <?php 
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                 ?>
    							
                                <div class="single-trending-post" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%), url('<?php echo $featured_img_url?>');">
    								<?php
    									the_title( '<h2 class="entry-title">
    										<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>
    											<div class="single-trending-post-overlay"></div>
    										</h2>' );
    								?>
    								<div class="treading-post-read-more-btn">
    									<i class="fa fa-arrow-right"></i>
    								</div>
    							</div>
    							<?php endwhile; endif; ?>

                			</div>
                		</div>
                	</div>
                </div> 


		        <div class="row no-gutters">
		            <!-- Right Content Area -->
		            <div class="col-12 col-md-12 col-lg-8 custom-col-lg-desktop-8">
		                <div class="site-main-content-area">

			                <div class="lazukhasan-main-blog-post-loop blog-index-page mobile-padding-right-0 pt-0 pl-0">

			               		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			                	<article class="single-blog-post pb-4" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			                		<div class="row align-items-center">

                                        <div class="col-md-4">
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

			                			<div class="col-md-8">
			                				<div class="blog-left-side-content">
			                					<?php
													if ( is_singular() ) :
														the_title( '<h1 class="entry-title">', '</h1>' );
													else :
														the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
													endif;
												?>

												<div class="entry-content">
													<?php
													if(is_single()){
														the_content( sprintf(
															wp_kses(
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
													}
													
													wp_link_pages( array(
														'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'urbanfashion' ),
														'after'  => '</div>',
													) );
													?>
												</div><!-- .entry-content -->


												<div class="entry-meta">
													<?php urbanfashion_posted_on() ;?>
												</div><!-- .entry-meta -->

			                				</div>
			                			</div>
			                		</div>
			                	</article>

			                	<?php 

			                	endwhile;

									urbanfashion_numeric_posts_nav();

								
								else :

									get_template_part( 'template-parts/content', 'none' );

								endif;
							?>

			                </div> <!-- /.lazukhasan-main-blog-post-loop -->
		                </div> <!-- /.site-main-content-area -->
		            </div> <!-- /.col-12 --> 




		            <!-- Right Sidebar -->
		            <div class="col-12 col-md-12 col-lg-4 custom-col-lg-desktop-4">
		            	<div class="single-post-right-sidebar">
                           <?php
                                if(is_active_sidebar('right_sidebar')){
                                    dynamic_sidebar('right_sidebar');
                                }
                            ?>
                        </div>
		            </div> <!-- /.site-left-sidebar-bg -->

		        </div> <!-- /.row -->
	        </div> <!-- /.main-blog-page-content-wrapper -->

	    </div> <!-- /.container -->
	</main> <!-- /.main-content -->
    
</div> <!-- /.urbanfashion-internal -->




<?php

get_footer();


