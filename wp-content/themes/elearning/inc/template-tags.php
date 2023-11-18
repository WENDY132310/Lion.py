<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some functionality here could be replaced by core features.
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'elearning_entry_meta_date' ) ) {

	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function elearning_entry_meta_date() {

		$meta_style = get_theme_mod( 'elearning_meta_style', 'tg-meta-style-one' );

		/* translators: %s: post date. */
		$date_text = ( 'tg-meta-style-one' === $meta_style ) ? esc_html_x( 'Posted on %s', 'post date', 'elearning' ) : '%s';

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			$date_text,
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_entry_meta_author' ) ) {

	/**
	 * Prints HTML with meta information for the current author.
	 */
	function elearning_entry_meta_author() {

		$meta_style = get_theme_mod( 'elearning_meta_style', 'tg-meta-style-one' );
		/* translators: %s: post author. */
		$author_text = ( 'tg-meta-style-one' === $meta_style ) ? esc_html_x( 'By %s', 'post author', 'elearning' ) : '%s';
		$byline      = sprintf(
			$author_text,
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_entry_meta_category' ) ) {

	/**
	 * Prints HTML with meta information of post categories.
	 */
	function elearning_entry_meta_category() {

		$meta_style = get_theme_mod( 'elearning_meta_style', 'tg-meta-style-one' );

		/* translators: 1: list of categories. */
		$categories_text = ( 'tg-meta-style-one' === $meta_style ) ? esc_html__( 'Posted in %1$s', 'elearning' ) : '%1$s';

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'elearning' ) );

			if ( $categories_list ) {
				printf( '<span class="cat-links">' . $categories_text . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

	}
}

if ( ! function_exists( 'elearning_entry_comments' ) ) {

	/**
	 * Prints HTML with comments on current post.
	 */
	function elearning_entry_comments() {

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__( 'No Comments<span class="screen-reader-text"> on %s</span>', 'elearning' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
}

if ( ! function_exists( 'elearning_entry_tag' ) ) {

	/**
	 * Prints HTML with tags of current post.
	 */
	function elearning_entry_tag() {

		$meta_style = get_theme_mod( 'elearning_meta_style', 'tg-meta-style-one' );

		/* translators: 1: list of tags. */
		$tags_text = ( 'tg-meta-style-one' === $meta_style ) ? esc_html__( 'Tagged %1$s', 'elearning' ) : '%1$s';

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'elearning' ) );

			if ( $tags_list ) {
				printf( '<span class="tags-links">' . $tags_text . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
}

if ( ! function_exists( 'elearning_entry_thumbnail' ) ) {

	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function elearning_entry_thumbnail( $image_size = 'post-thumbnail' ) {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		?>
		<div class="post-thumbnail">
			<?php
			if ( is_singular() ) {
				the_post_thumbnail();
			} else {
				?>
				<a class="post-thumbnail__link" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php
					the_post_thumbnail(
						$image_size,
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
			}
			?>
		</div><!-- .post-thumbnail -->
		<?php
	}
}

if ( ! function_exists( 'elearning_posts_navigation' ) ) {

	/**
	 * Archive navigation.
	 */
	function elearning_posts_navigation() {
		the_posts_navigation();
	}
}

/**
 * Determine whether this is an AMP response.
 *
 * @return bool Is AMP endpoint and is AMP plugin active.
 */
function elearning_is_amp() {
	return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
}
