<?php
/**
 * elearning compatibility class for Elementor Pro.
 *
 * @package eLearning
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return if Elementor not active.
if ( ! class_exists( '\Elementor\Plugin' ) || ! class_exists( 'ElementorPro\Modules\ThemeBuilder\Module' ) ) {
	return;
}

// PHP 5.3+ is required.
if ( ! version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	return;
}

if ( ! class_exists( 'elearning_Elementor_Pro' ) ) :

	/**
	 * Elementor compatibility.
	 */
	class eLearning_Elementor_Pro {

		/**
		 * Singleton instance of the class.
		 *
		 * @var object
		 */
		private static $instance;

		/**
		 * Elementor location manager
		 *
		 * @var object
		 */
		public $elementor_location_manager;

		/**
		 * Instance.
		 *
		 * @return elearning_Elementor_Pro
		 */
		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof elearning_Elementor_Pro ) ) {
				self::$instance = new eLearning_Elementor_Pro();
			}

			return self::$instance;
		}

		/**
		 * Primary class constructor.
		 *
		 * @return void
		 */
		public function __construct() {

			// Register theme locations.
			add_action( 'elementor/theme/register_locations', array( $this, 'register_locations' ) );

			// Override templates.
			add_action( 'elearning_header', array( $this, 'do_header' ), 0 );
			add_action( 'elearning_footer', array( $this, 'do_footer' ), 0 );
		}

		/**
		 * Register Theme Location for Elementor.
		 *
		 * @param object $manager Elementor object.
		 *
		 * @return void
		 */
		public function register_locations( $manager ) {

			$manager->register_all_core_location();

			$this->elementor_location_manager = \ElementorPro\Modules\ThemeBuilder\Module::instance()->get_locations_manager(); // phpcs:ignore PHPCompatibility.Syntax.NewDynamicAccessToStatic.Found
		}

		/**
		 * Override Header.
		 *
		 * @return void
		 */
		public function do_header() {

			$did_location = $this->elementor_location_manager->do_location( 'header' );

			if ( $did_location ) {
				remove_action( 'elearning_header', 'elearning_header_markup' );
			}
		}

		/**
		 * Override Footer.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function do_footer() {

			$did_location = $this->elementor_location_manager->do_location( 'footer' );

			if ( $did_location ) {
				remove_action( 'elearning_footer', 'elearning_footer_markup' );
			}
		}
	}

endif;

eLearning_Elementor_Pro::instance();

