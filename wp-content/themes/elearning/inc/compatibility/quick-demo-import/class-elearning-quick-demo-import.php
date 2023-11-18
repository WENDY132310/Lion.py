<?php
/**
 * Quick Demo Import Compatibility File
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Quick_Demo_Import' ) ) {

	/**
	 * class eLearning_Jetpack
	 */
	class eLearning_Quick_Demo_Import {

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
		 * Constructor.
		 */
		public function __construct() {
			add_filter( 'quick-demo-import/supported_themes', array( $this, 'theme_support' ) );
			add_filter( 'quick-demo-import/demo_packages', array( $this, 'demo_packages' ) );
		}

		/**
		 * Support theme.
		 *
		 * @param array $themes Supported themes.
		 * @return array Themes.
		 */
		public function theme_support( $themes ) {
			return array_merge( $themes, array( 'elearning' ) );
		}

		/**
		 * Demo packages.
		 *
		 * @return array Demo packages.
		 */
		public function demo_packages() {
			return array(
				'categories'   => array(
					'education' => __( 'Education', 'elearning' ),
					'blog'      => __( 'Blog', 'elearning' ),
				),
				'pagebuilders' => array(
					'elementor' => __( 'Elementor', 'elearning' ),
				),
				'demos'        => array(
					'elearning-default' => array(
						'title'                  => 'eLearning',
						'preview'                => 'https://demo.masteriyo.com/elearning',
						'description'            => 'Just another WordPress site',
						'category'               => array( 'education', 'blog' ),
						'pagebuilder'            => array( 'elementor' ),
						'screenshot'             => 'https://themegrill-demo-pack.s3.us-east-2.amazonaws.com/resources/elearning/elearning-default/screenshot.jpg',
						'zip'                    => 'https://themegrill-demo-pack.s3.us-east-2.amazonaws.com/packages/elearning/elearning-default-qdi.zip',
						'plugins_list'           => array(
							'learning-management-system' => array(
								'name' => 'Masteriyo LMS',
								'slug' => 'learning-management-system/lms.php',
							),
							'everest-forms'              => array(
								'name' => 'Everest Forms',
								'slug' => 'everest-forms/everest-forms.php',
							),
							'elementor'                  => array(
								'name' => 'Elementor',
								'slug' => 'elementor/elementor.php',
							),
						),
						'core_options'           => array(
							'blogname'       => 'eLearning',
							'page_on_front'  => 'Home',
							'page_for_posts' => 'Blog',
						),
						'customizer_data_update' => array(
							'nav_menu_locations' => array(
								'menu-primary' => 'Main',
							),
						),
						'masteriyo_settings'     => array(
							'general.styling.primary_color' => '#7963E0',
						),
					),
				),
			);
		}
	}
	eLearning_Quick_Demo_Import::get_instance();
}
