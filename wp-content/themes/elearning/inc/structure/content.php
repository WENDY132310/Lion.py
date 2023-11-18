<?php
/**
 * Hooks for the content area of the site.
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'elearning_content_loop' ) ) {

	/**
	 * Main content loop.
	 *
	 * @return void
	 */
	function elearning_content_loop() {

		if ( have_posts() ) :
			do_action( 'elearning_before_content' );

			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', '' );
			endwhile;

			do_action( 'elearning_after_content' );
		else :
			get_template_part( 'template-parts/content/content', 'none' );
		endif;
	}
	add_action( 'elearning_content', 'elearning_content_loop' );
	add_action( 'elearning_content_archive', 'elearning_content_loop' );
}

if ( ! function_exists( 'elearning_search_content_loop' ) ) {

	/**
	 * Search content loop.
	 *
	 * @return void
	 */
	function elearning_search_content_loop() {

		if ( have_posts() ) :
			do_action( 'elearning_before_search_content' );

			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'search' );
			endwhile;

			do_action( 'elearning_after_search_content' );
		else :
			get_template_part( 'template-parts/content/content', 'none' );
		endif;
	}
	add_action( 'elearning_content_search', 'elearning_search_content_loop' );
}

if ( ! function_exists( 'elearning_single_content_loop' ) ) {

	/**
	 * Single content loop
	 */
	function elearning_single_content_loop() {

		if ( have_posts() ) :
			do_action( 'elearning_before_single_content' );

			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'single' );
			endwhile;

			do_action( 'elearning_after_single_content' );
		else :
			get_template_part( 'template-parts/content/content', 'none' );
		endif;
	}
	add_action( 'elearning_content_single', 'elearning_single_content_loop' );
}

if ( ! function_exists( 'elearning_page_content_loop' ) ) {

	/**
	 * Page content loop
	 */
	function elearning_page_content_loop() {

		if ( have_posts() ) :
			do_action( 'elearning_before_page_content' );

			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'page' );
			endwhile;

			do_action( 'elearning_after_page_content' );
		else :
			get_template_part( 'template-parts/content/content', 'none' );
		endif;
	}
	add_action( 'elearning_content_page', 'elearning_page_content_loop' );
}

if ( ! function_exists( 'elearning_post_navigation' ) ) {

	/**
	 * Single post navigation.
	 */
	function elearning_post_navigation() {
		the_post_navigation();
	}
	add_action( 'elearning_after_single_content', 'elearning_post_navigation' );
}

if ( ! function_exists( 'elearning_comment_template' ) ) {

	/**
	 * Single post comment.
	 */
	function elearning_comment_template() {

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
	add_action( 'elearning_after_single_content', 'elearning_comment_template' );
}

if ( ! function_exists( 'elearning_posts_navigation' ) ) {

	/**
	 * Posts navigation.
	 */
	function elearning_posts_navigation() {
		the_posts_navigation();
	}
	add_action( 'elearning_after_content', 'elearning_posts_navigation' );
}

if ( ! function_exists( 'elearning_404_page_content' ) ) {

	/**
	 * 404 page content.
	 */
	function elearning_404_page_content() {
		get_template_part( 'template-parts/content/content', '404' );
	}
	add_action( 'elearning_content_404', 'elearning_404_page_content' );
}

if ( ! function_exists( 'elearning_get_sidebar' ) ) {

	/**
	 * Get sidebar based on the layout.
	 *
	 * @param string $sidebar Sidebar Id.
	 * @return mixed|string
	 */
	function elearning_get_sidebar( $sidebar ) {

		$current_layout = elearning_get_current_layout();
		$sidebar_meta   = get_post_meta( eLearning_Utils::get_post_id(), 'elearning_sidebar', true );

		if ( $sidebar_meta ) {
			return $sidebar_meta;
		} else {
			if ( 'tg-site-layout--left' === $current_layout ) {
				return 'sidebar-left';
			}
		}

		return $sidebar;
	}
	add_filter( 'elearning_get_sidebar', 'elearning_get_sidebar', 10 );
}

if ( ! function_exists( 'elearning_archive_title' ) ) {

	/**
	 * Archive title in content area.
	 */
	function elearning_archive_title() {

		if ( ! is_archive() || 'page-header' === get_theme_mod( 'elearning_page_title', 'page-header' ) ) {
			return;
		}
		?>
		<header class="page-header">
			<h1 class="entry-title tg-page-content__title"><?php echo wp_kses_post( elearning_get_title() ); ?></h1>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		</header><!-- .page-header -->
		<?php
	}
	add_action( 'elearning_before_content', 'elearning_archive_title' );
}
