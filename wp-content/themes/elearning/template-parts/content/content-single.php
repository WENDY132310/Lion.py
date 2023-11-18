<?php
/**
 * Template part for displaying posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$meta_style = get_theme_mod( 'elearning_meta_style', 'tg-meta-style-one' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $meta_style ); ?>>

	<?php
	$entry_elements = get_theme_mod(
		'elearning_single_post_elements',
		array(
			'header',
			'thumbnail',
			'meta',
			'content',
		)
	);

	foreach ( $entry_elements as $entry_element ) {
		get_template_part( 'template-parts/entry/entry', $entry_element );
	}
	?>
</article><!-- #post-<?php the_ID(); ?> -->
