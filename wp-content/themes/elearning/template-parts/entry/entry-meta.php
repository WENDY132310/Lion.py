<?php
/**
 * Template part entry meta.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( 'post' === get_post_type() ) :
	?>
	<div class="entry-meta">
		<?php
		$blog_meta_elements        = get_theme_mod(
			'elearning_blog_meta',
			array(
				'author',
				'date',
				'category',
				'tags',
				'comments',
			)
		);
		$single_post_meta_elements = get_theme_mod(
			'elearning_single_post_meta',
			array(
				'author',
				'date',
				'category',
				'tags',
				'comments',
			)
		);
		$meta_elements             = is_single() ? $single_post_meta_elements : $blog_meta_elements;

		foreach ( $meta_elements as $meta_element ) {
			if ( 'author' === $meta_element ) {
				elearning_entry_meta_author();
			} elseif ( 'date' === $meta_element ) {
				elearning_entry_meta_date();
			} elseif ( 'category' === $meta_element ) {
				elearning_entry_meta_category();
			} elseif ( 'tags' === $meta_element ) {
				elearning_entry_tag();
			} elseif ( 'comments' === $meta_element ) {
				elearning_entry_comments();
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'elearning' ),
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
		?>
	</div><!-- .entry-meta -->
<?php endif; ?>
