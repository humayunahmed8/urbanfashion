<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package urbanfashion
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php if( has_post_thumbnail() ) : ?>
		<div class="urbanfashion-feautured-content">
			<?php if( !is_single() ) : ?> <a href="<?php the_permalink(); ?>"> <?php endif; ?>
				 <?php the_post_thumbnail('urbanfashion-blog-thumb');  ?>
			</a>
		</div>
	<?php else : ?>
		<div class="urbanfashion-feautured-content">
			<?php if( !is_single() ) : ?> <a href="<?php the_permalink(); ?>"> <?php endif; ?>
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/blog-placeholder.png" alt="<?php the_title(); ?>" />
			</a>
		</div>
	<?php endif; ?>



	<div class="blog-content-wrapper">

		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>

			<ul class="post-overview">		
				<li>
					<div class="entry-meta">
					<?php
						urbanfashion_posted_by();
					?>
					</div>
				</li>
				<li>
					<div class="entry-meta">
						<?php urbanfashion_posted_on() ;?>
					</div><!-- .entry-meta -->
				</li>
				<?php urbanfashion_entry_footer(); ?>
			</ul>

			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary entry-content">
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
				echo '<a href="'.esc_url(get_permalink()).'" class="urbanfashion-read-more-btn"> '.esc_html__( 'See Result', 'urbanfashion' ).' </a>';
			}
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'urbanfashion' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
