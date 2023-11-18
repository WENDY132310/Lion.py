<?php
/**
 * Filter array values.
 *
 * @package    eLearning
 * @since      elearning 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Dynamic_Filter' ) ) :

	/**
	 * Filter array values.
	 */
	class eLearning_Dynamic_Filter {

		/**
		 * Array of filter name and css classes.
		 *
		 * @var  array $css_class_arr Filter tag and class list.
		 */
		private static $css_class_arr = array();

		/**
		 * Get filter tag and class list in Array.
		 *
		 * @return array Filter tag and class list.
		 */
		public static function css_class_list() {

			self::$css_class_arr = array(
				'elearning_header_class'                   => array(
					'site-header',
					'tg-site-header',
				),
				'elearning_header_main_container_class'    => array(
					'tg-header-container',
					'tg-container',
					'tg-container--flex',
					'tg-container--flex-center',
					'tg-container--flex-space-between',
				),
				'elearning_header_top_class'               => array(
					'tg-site-header-top',
				),
				'elearning_header_top_container_class'     => array(
					'tg-header-container',
					'tg-container',
					'tg-container--flex',
					'tg-container--flex-center',
				),
				'elearning_page_header_container_class'    => array(
					'tg-container',
					'tg-container--flex',
					'tg-container--flex-center',
					'tg-container--flex-space-between',
				),
				'elearning_nav_class'                      => array(
					'main-navigation',
					'tg-primary-menu',
				),
				'elearning_header_action_class'            => array(
					'tg-header-action',
				),
				'elearning_header_search_class'            => array(
					'menu-item',
					'tg-menu-item',
					'tg-menu-item-search',
				),
				'elearning_read_more_wrapper_class'        => array(
					'tg-read-more-wrapper',
					'clearfix',
				),
				'elearning_footer_widgets_container_class' => array(
					'tg-container',
				),
				'elearning_footer_bottom_bar_container_class' => array(
					'tg-container',
					'tg-container--flex',
					'tg-container--flex-top',
				),
				'elearning_scroll_to_top_class'            => array(
					'tg-scroll-to-top',
				),
				'elearning_mobile_nav_class'               => array(
					'tg-mobile-navigation',
				),
			);

			return apply_filters( 'elearning_css_class_list', self::$css_class_arr );

		}

		/**
		 * Filter the array according to key.
		 *
		 * @param string $tag Filter tag.
		 * @return array Filter tag and class list.
		 */
		public static function filter_via_tag( $tag ) {

			$css_class = self::css_class_list();
			$filtered  = array();

			if ( isset( $css_class[ $tag ] ) ) {
				$filtered = $css_class[ $tag ];
			}

			return $filtered;
		}
	}
endif;
