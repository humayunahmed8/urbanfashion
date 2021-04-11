<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package urbanfashion
 */

get_header();

	// Breadcrumb Overlay Background
    $breadcrumb_bg = array(get_template_directory_uri() . '/assets/img/breadcrumb-brusho-verlay.png');
?> 

	<!-- Theme BreadCrumb Area -->

	<div <?php if(has_post_thumbnail()) : ?> id="urbanfashion-breadcrumb-area-overlay" style="background-image:url(<?php echo esc_url(the_post_thumbnail_url('large')); ?>)" <?php endif; ?> class="urbanfashion-breadcrumb-area">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12">
	                 <h1 class="page-title">
	                    <?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'urbanfashion' ), '<span>' . get_search_query() . '</span>' );
						?>
	                </h1>
	            </div>
	        </div>
	    </div>
	    <div class="breadcrumb-overlay-bg" style="background-image: url('<?php echo $breadcrumb_bg[0]; ?>');"></div>
	</div>


	<div class="urbanfashion-internal enable-default-padding">
		<div class="container">

			<?php if ( have_posts() ) : ?>


			<div class="row">
				<div class="col-12 col-md-12 col-lg-9">
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

				<div class="col-12 col-md-12 col-lg-3">
					<div class="single-post-right-sidebar">
                       <?php
                            if(is_active_sidebar('right_sidebar')){
                                dynamic_sidebar('right_sidebar');
                            }
                        ?>
                    </div>
				</div>
			</div>

			<?php else : ?>

					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="search-page-content-none">
								<?php get_template_part( 'template-parts/content', 'none' ); ?>
							</div>
						</div>
					</div>

			<?php endif; ?>


		</div>
	</div>


<?php
get_footer();
