<?php
/**
 * Template part for entry content.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_archive() || is_home() ) {

	if ( 'excerpt' === get_theme_mod( 'elearning_archive_blog_content', 'excerpt' ) ) {
		get_template_part( 'template-parts/entry/entry', 'summary' );
		get_template_part( 'template-parts/entry/entry', 'footer' );

		return;
	}
}
?>

<div class="entry-content">
	<?php
	if ( is_single() ) {
		the_content(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'elearning' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
	} else {
		the_content();
	}

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elearning' ),
			'after'  => '</div>',
		)
	);
	?>
</div><!-- .entry-content -->
