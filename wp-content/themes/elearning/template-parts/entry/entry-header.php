<?php
/**
 * Template part for entry header.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$page_title = get_theme_mod( 'elearning_page_title', 'page-header' );
?>
<header class="entry-header">
	<?php
	if ( is_singular() ) :
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			if ( 'page-header' !== $page_title ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			endif;
		endif;
	else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif;
	?>
</header><!-- .entry-header -->
