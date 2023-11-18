<?php
/**
 * elearning Customizer partials.
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'elearning_Customizer_Partials' ) ) {

	/**
	 * Customizer Partials.
	 */
	class eLearning_Customizer_Partials {

		/**
		 * Instance.
		 *
		 * @access private
		 * @var object
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
		 * Render the site title for the selective refresh partial.
		 *
		 * @return string
		 */
		public static function customize_partial_blogname() {
			return get_bloginfo( 'name' );
		}

		/**
		 * Render the site tagline for the selective refresh partial.
		 *
		 * @return string
		 */
		public static function customize_partial_blogdescription() {
			return get_bloginfo( 'description' );
		}

		public static function customize_partial_header_top_left_content_html() {
			elearning_get_header_top_section();
		}

		public static function customize_partial_header_top_right_content_html() {
			elearning_get_header_top_section( 'right' );
		}

		public static function customize_partial_footer_bar_section_one_html() {
			return eLearning_Utils::footer_copyright_markup();
		}

		public static function customize_partial_footer_bar_section_two_html() {
			return eLearning_Utils::footer_copyright_markup( 'two' );
		}
	}
	elearning_Customizer_Partials::get_instance();
}
