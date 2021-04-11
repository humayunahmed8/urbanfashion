<?php
/**
 * Template part for displaying posts
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
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/blog-placeholder.png" alt="" />
			</a>
		</div>
	<?php endif; ?>




	<div class="blog-content-wrapper">
		<header class="entry-header">
				<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
				?>
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
		</header><!-- .entry-header -->


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
				echo '<a href="'.esc_url(get_permalink()).'" class="urbanfashion-read-more-btn urbanfashion-read-more-btn-style-two"> '.esc_html__( 'Continue reading →', 'urbanfashion' ).' </a>';
			}
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'urbanfashion' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	</div>


</article><!-- #post-<?php the_ID(); ?> -->
