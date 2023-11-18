<?php
/**
 * elearning Customizer Class
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Include the customizer framework.
require_once dirname( __FILE__ ) . '/core/class-elearning-customizer-framework.php';

// Include the customizer base class.
require_once dirname( __FILE__ ) . '/core/class-elearning-customize-base-option.php';

if ( ! class_exists( 'elearning_Customizer' ) ) :

	/**
	 * elearning Customizer class
	 */
	class eLearning_Customizer {
		/**
		 * Constructor - Setup customizer
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'elearning_customize_register' ) );
			add_action( 'customize_register', array( $this, 'elearning_customize_options_file_include' ), 1 );
			add_filter( 'elearning_default_variants', array( $this, 'add_font_variants' ) );
			add_filter( 'elearning_fontawesome_src', array( $this, 'fontawesome_src' ) );
			add_action( 'elearning_get_fonts', array( $this, 'get_fonts' ) );
		}

		/**
		 * Include the required files for extending the custom Customize controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function elearning_customize_register( $wp_customize ) {

			// Override default.
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/override-defaults.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/class-elearning-customizer-partials.php';
		}

		public function elearning_customize_options_file_include() {

			// Include the required customize section and panels register file.
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/class-elearning-customizer-register-panels-sections.php';

			/**
			 * Include the required customize options file.
			 */
			// Global.
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/global/class-elearning-customize-container-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/global/class-elearning-customize-base-colors-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/global/class-elearning-customize-link-colors-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/global/class-elearning-customize-heading-colors-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/global/class-elearning-customize-background-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/global/class-elearning-customize-sidebar-layout-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/global/class-elearning-customize-typography-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/global/class-elearning-customize-headings-typography-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/global/class-elearning-customize-button-option.php';

			// Header.
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/header/class-elearning-customize-site-identity-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/header/class-elearning-customize-header-top-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/header/class-elearning-customize-header-main-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/header/class-elearning-customize-header-button-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/header/class-elearning-customize-primary-menu-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/header/class-elearning-customize-primary-menu-item-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/header/class-elearning-customize-primary-menu-dropdown-item-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/header/class-elearning-customize-transparent-header-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/header/class-elearning-customize-mobile-menu-option.php';

			// Content.
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/content/class-elearning-customize-page-header-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/content/class-elearning-customize-blog-archive-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/content/class-elearning-customize-single-blog-post-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/content/class-elearning-customize-blog-meta-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/content/class-elearning-customize-blog-sidebar-option.php';

			// Footer.
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/footer/class-elearning-customize-footer-bottom-bar-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/footer/class-elearning-customize-footer-widget-option.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/options/footer/class-elearning-customize-scroll-to-top-option.php';
		}

		/**
		 * Add font variants.
		 *
		 * @param array $array Font variants.
		 * @return mixed
		 */
		public function add_font_variants( $array ) {

			$array[] = '500';
			$array[] = '500italic';
			$array[] = '700italic';

			return $array;
		}

		/**
		 * Modify font awesome path.
		 *
		 * @param string $path Font awesome path.
		 * @return string
		 */
		public function fontawesome_src( $path ) {
			return '/assets/lib/font-awesome/css/font-awesome';
		}

		/**
		 * Action hook to get the required Google fonts.
		 */
		public function get_fonts() {

			$base_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '400',
			);

			$base_heading_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '400',
			);

			$site_title_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '400',
			);

			$site_tagline_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '400',
			);

			$primary_menu_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '400',
			);

			$primary_menu_dropdown_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '400',
			);

			$mobile_menu_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '400',
			);

			$post_page_title_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$blog_post_title_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$h1_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$h2_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$h3_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$h4_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$h5_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$h6_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$widget_heading_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$widget_content_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
			);

			$base_typography                  = get_theme_mod( 'elearning_base_typography_body', $base_typography_default );
			$base_heading_typography          = get_theme_mod( 'elearning_base_typography_heading', $base_heading_typography_default );
			$site_title_typography            = get_theme_mod( 'elearning_typography_site_title', $site_title_typography_default );
			$site_tagline_typography          = get_theme_mod( 'elearning_typography_site_description', $site_tagline_typography_default );
			$primary_menu_typography          = get_theme_mod( 'elearning_typography_primary_menu', $primary_menu_typography_default );
			$primary_menu_dropdown_typography = get_theme_mod( 'elearning_typography_primary_menu_dropdown_item', $primary_menu_dropdown_typography_default );
			$mobile_menu_typography           = get_theme_mod( 'elearning_typography_mobile_menu', $mobile_menu_typography_default );
			$post_page_title_typography       = get_theme_mod( 'elearning_typography_post_page_title', $post_page_title_typography_default );
			$blog_post_title_typography       = get_theme_mod( 'elearning_typography_blog_post_title', $blog_post_title_typography_default );
			$h1_typography                    = get_theme_mod( 'elearning_typography_h1', $h1_typography_default );
			$h2_typography                    = get_theme_mod( 'elearning_typography_h2', $h2_typography_default );
			$h3_typography                    = get_theme_mod( 'elearning_typography_h3', $h3_typography_default );
			$h4_typography                    = get_theme_mod( 'elearning_typography_h4', $h4_typography_default );
			$h5_typography                    = get_theme_mod( 'elearning_typography_h5', $h5_typography_default );
			$h6_typography                    = get_theme_mod( 'elearning_typography_h6', $h6_typography_default );
			$widget_heading_typography        = get_theme_mod( 'elearning_typography_widget_heading', $widget_heading_typography_default );
			$widget_content_typography        = get_theme_mod( 'elearning_typography_widget_content', $widget_content_typography_default );

			// Grouped typography options with default font-wight of 400.
			$elearning_typography_options_one = array(
				$base_typography,
				$base_heading_typography,
				$site_title_typography,
				$site_tagline_typography,
				$primary_menu_typography,
				$primary_menu_dropdown_typography,
				$mobile_menu_typography,
			);

			// Grouped typography options with default font-wight of 500.
			$elearning_typography_options_two = array(
				$post_page_title_typography,
				$blog_post_title_typography,
				$h1_typography,
				$h2_typography,
				$h3_typography,
				$h4_typography,
				$h5_typography,
				$h6_typography,
				$widget_heading_typography,
				$widget_content_typography,
			);

			foreach ( $elearning_typography_options_one as $elearning_typography_option_one ) {

				if ( isset( $elearning_typography_option_one['font-family'] ) && 'default' === $elearning_typography_option_one['font-family'] ) {
					$elearning_typography_option_one['font-family'] = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif';
				}

				if ( isset( $elearning_typography_option_one['font-family'] ) ) {
					elearning_Generate_Fonts::add_font( $elearning_typography_option_one['font-family'], isset( $elearning_typography_option_one['font-weight'] ) ? $elearning_typography_option_one['font-weight'] : '400' );
				}
			}

			foreach ( $elearning_typography_options_two as $elearning_typography_option_two ) {

				if ( isset( $elearning_typography_option_two['font-family'] ) && 'default' === $elearning_typography_option_two['font-family'] ) {
					$elearning_typography_option_two['font-family'] = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif';
				}

				if ( isset( $elearning_typography_option_two['font-family'] ) ) {
					elearning_Generate_Fonts::add_font( $elearning_typography_option_two['font-family'], isset( $elearning_typography_option_two['font-weight'] ) ? $elearning_typography_option_two['font-weight'] : '500' );
				}
			}
		}
	}
	new eLearning_Customizer();
endif;
