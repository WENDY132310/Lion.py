<?php
/**
 * Template part for entry footer.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! get_theme_mod( 'elearning_archive_blog_read_more', true ) ) {
	return;
}

$read_more_text      = apply_filters( 'elearning_read_more_text', __( 'Read More', 'elearning' ) );
$read_more_alignment = get_theme_mod( 'elearning_blog_archive_read_more_style', 'left' );
?>

<footer class="entry-footer">
	<div class="<?php elearning_css_class( 'elearning_read_more_wrapper_class' ); ?> tg-text-align--<?php echo esc_attr( $read_more_alignment ); ?>">
		<a href="<?php the_permalink(); ?>" class="tg-read-more"><?php echo wp_kses_post( $read_more_text ); ?></a>
	</div>
</footer><!-- .entry-summary -->
