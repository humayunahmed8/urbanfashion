<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package urbanfashion 
 */

if ( ! function_exists( 'urbanfashion_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function urbanfashion_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

			/* Updated and Plublish Time

				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
				<time class="updated" datetime="%3$s">%4$s</time>';

			*/

			$time_string = ' 
			<time class="updated" datetime="%3$s"> <b>Submitted On:</b> %4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'urbanfashion' ),
			'<span>' . $time_string . '</span>'
		);

		$display_post_date = cs_get_option('display_post_date');

		if($display_post_date != true ){

		}else{
			echo '<span class="posted-on posted-on-style-two">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

	}
endif;

if ( ! function_exists( 'urbanfashion_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function urbanfashion_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'urbanfashion' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> '. get_avatar( get_the_author_meta( 'ID' ) , 36 ) .' ' . esc_html( get_the_author() ) . '</a></span>'
		);


		$display_post_by = cs_get_option('display_post_by');

		if($display_post_by != true ){

		}else {
			//echo '<span class="byline fa fa-user-o author"> ' . $byline . '</span>'; // phpcs:ignore 

			echo '<span class="byline byline-style-two"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
endif;

if ( ! function_exists( 'urbanfashion_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function urbanfashion_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			$display_post_category = cs_get_option('display_post_category');

			if($display_post_category != true){ } else{
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'urbanfashion' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links cat-links-style-two fa fa-folder-open-o">' . esc_html__( '%1$s', 'urbanfashion' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}

			$display_post_tag = cs_get_option('display_post_tag');

			if($display_post_tag != true){ }else{
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'urbanfashion' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links tags-links-style-two fa fa-tags">' . esc_html__( '%1$s', 'urbanfashion' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}


		$display_post_comment_count = cs_get_option('display_post_comment_count');

		if($display_post_comment_count != true ){ } else {
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<li class="comments-link"> <span class="comments-count comment-count-style-two fa fa-comment-o">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'urbanfashion' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				echo '</span> </li>';
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'urbanfashion' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'urbanfashion_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function urbanfashion_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
