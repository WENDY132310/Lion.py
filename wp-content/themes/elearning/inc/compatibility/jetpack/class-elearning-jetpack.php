<?php
/**
 * Jetpack Compatibility File
 *
 * @link    https://jetpack.com/
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Jetpack' ) ) {

	/**
	 * class eLearning_Jetpack
	 */
	class eLearning_Jetpack {

		/**
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator.
		 */
		public static function get_instance() {

			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * eLearning constructor.
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'jetpack_setup' ) );
			add_filter( 'infinite_scroll_js_settings', array( $this, 'infinite_scroll_js_settings' ) );
		}

		/**
		 * Jetpack setup function.
		 *
		 * @see https://jetpack.com/support/infinite-scroll/
		 * @see https://jetpack.com/support/responsive-videos/
		 * @see https://jetpack.com/support/content-options/
		 */
		public function jetpack_setup() {

			// Add theme support for Infinite Scroll.
			add_theme_support(
				'infinite-scroll',
				apply_filters(
					'elearning_infinite_scroll_args',
					array(
						'container' => 'primary',
						'render'    => array( $this, 'infinite_scroll_render' ),
						'footer'    => 'page',
						'wrapper'   => true,
					)
				)
			);

			// Add theme support for Responsive Videos.
			add_theme_support( 'jetpack-responsive-videos' );

			// Add theme support for Content Options.
			add_theme_support(
				'jetpack-content-options',
				array(
					'post-details'    => array(
						'stylesheet' => 'elearning-style',
						'date'       => '.posted-on',
						'categories' => '.cat-links',
						'tags'       => '.tags-links',
						'author'     => '.byline',
						'comment'    => '.comments-link',
					),
					'featured-images' => array(
						'archive' => true,
						'post'    => true,
						'page'    => true,
					),
				)
			);
		}

		/**
		 * Custom render function for Infinite Scroll.
		 */
		public function infinite_scroll_render() {

			while ( have_posts() ) :
				the_post();
				if ( is_search() ) :
					get_template_part( 'template-parts/content', 'search' );
				else :
					get_template_part( 'template-parts/content', get_post_type() );
				endif;
			endwhile;
		}
	}
	eLearning_Jetpack::get_instance();
}
