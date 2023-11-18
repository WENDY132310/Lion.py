<?php
/**
 * eLearning utils class.
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * eLearning utils.
 *
 * Class responsible for different utility methods.
 *
 * @since 1.0.0
 */
class eLearning_Utils {

	public static function is_masteriyo_active() {
		return function_exists( 'masteriyo' );
	}

	/**
	 * Get post ID.
	 *
	 * @return mixed|void
	 */
	public static function get_post_id() {

		$post_id = '';

		if ( is_home() && 'page' === get_option( 'show_on_front' ) ) {
			$post_id = get_option( 'page_for_posts' );
		} elseif ( is_front_page() && 'page' === get_option( 'show_on_front' ) ) {
			$post_id = get_option( 'page_on_front' );
		} elseif ( is_singular() ) {
			$post_id = get_the_ID();
		} elseif ( self::is_masteriyo_active() && function_exists( 'masteriyo_is_courses_page' ) && masteriyo_is_courses_page() ) {
			$post_id = masteriyo_get_page_id( 'courses' );
		}

		return apply_filters( 'elearning_get_the_id', $post_id );
	}

	/**
	 * Check transparent header.
	 *
	 * @return mixed|void
	 */
	public static function has_transparent_header() {

		$transparency      = false;
		$meta_result       = get_post_meta( self::get_post_id(), 'elearning_transparent_header', true );
		$customizer_result = get_theme_mod( 'elearning_transparent_header', false );

		if ( ( is_404() || is_search() || is_archive() ) && get_theme_mod( 'elearning_transparent_header_custom', false ) && $customizer_result ) {
			$transparency = true;
		} elseif ( ( is_front_page() && is_home() ) && get_theme_mod( 'elearning_transparent_header_latest_posts', false ) && $customizer_result ) {
			$transparency = true;
		} elseif ( '1' === $meta_result || true === $meta_result ) { // Enabled in meta.
			$transparency = true;
		} elseif ( ( 'customizer' === $meta_result || '' === $meta_result ) && $customizer_result ) { // Enabled in Customizer
			$transparency = true;
		}

		return apply_filters( 'elearning_has_transparent_header', $transparency );
	}

	/**
	 * Check page title.
	 *
	 * @return mixed|string|void
	 */
	public static function has_page_title() {

		$customizer_result = get_theme_mod( 'elearning_page_title', 'page-header' );

		// If invalid: return default.
		if ( ! in_array( $customizer_result, array( 'page-header', 'content-area' ), true ) ) {
			return 'page-header';
		}

		return apply_filters( 'elearning_has_page_title', $customizer_result );
	}

	/**
	 * Check breadcrumbs.
	 *
	 * @return false|mixed|void
	 */
	public static function has_breadcrumbs() {

		$result = get_theme_mod( 'elearning_breadcrumbs', true ) && function_exists( 'elearning_breadcrumb_trail' );

		if ( is_front_page() ) {
			$result = false;
		}

		return apply_filters( 'elearning_has_breadcrumbs', $result );
	}

	/**
	 * Check header top.
	 *
	 * @return false|mixed|void
	 */
	public static function has_header_top() {

		$result = get_theme_mod( 'elearning_header_top', false );

		if ( ! in_array( $result, array( 1, '' ), true ) ) {
			return false;
		}

		return apply_filters( 'elearning_has_header_top', $result );
	}

	/**
	 * Check footer widgets.
	 *
	 * @return false|mixed|void
	 */
	public static function has_footer_widgets() {

		$result = get_theme_mod( 'elearning_footer_widgets', true );

		if ( ! in_array( $result, array( 1, '', true ), true ) ) {
			return false;
		}

		return apply_filters( 'elearning_has_footer_widgets', $result );
	}

	/**
	 * Check footer bar.
	 *
	 * @return mixed|void
	 */
	public static function has_footer_bar() {
		return apply_filters( 'elearning_has_footer_bar', '__return_true' );
	}

	/**
	 * Get Copyright markup.
	 *
	 * @param string $fbar_section 'one' or 'two' only should be passed as argument.
	 * @return array|string|string[]|null
	 */
	public static function footer_copyright_markup( $fbar_section = 'one' ) {

		if ( 'one' === $fbar_section ) {
			$default = sprintf(
				/* translators: 1: Current Year, 2: Site Name, 3: Theme Link, 4: WordPress Link. */
				esc_html__( 'Copyright &copy; %1$s %2$s. Powered by %3$s and %4$s.', 'elearning' ),
				'{the-year}',
				'{site-link}',
				'{theme-link}',
				'{wp-link}'
			);
		} else {
			$default = '';
		}

		$content      = get_theme_mod( "elearning_footer_bar_section_{$fbar_section}_html", $default );
		$theme_author = apply_filters(
			'elearning_theme_author',
			array(
				'theme_name' => __( 'eLearning', 'elearning' ),
				'theme_url'  => 'https://masteriyo.com/themes/elearning',
			)
		);
		$site_link    = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" >' . get_bloginfo( 'name', 'display' ) . '</a>';
		$theme_link   = '<a href="' . esc_url( $theme_author['theme_url'] ) . '" target="_blank" rel="nofollow">' . $theme_author['theme_name'] . '</a>';
		$wp_link      = '<a href="' . esc_url( 'https://wordpress.org/' ) . '" target="_blank" rel="nofollow">' . __( 'WordPress', 'elearning' ) . '</a>';

		if ( $content || is_customize_preview() ) {
			$content = str_replace( '{the-year}', date_i18n( 'Y' ), $content );
			$content = str_replace( '{site-link}', $site_link, $content );
			$content = str_replace( '{theme-link}', $theme_link, $content );
			$content = str_replace( '{wp-link}', $wp_link, $content );
		}

		return $content;
	}

	/**
	 * Get header search markup.
	 *
	 * @return string
	 */
	public static function header_search_markup() {

		$output     = '';
		$data_attrs = apply_filters( 'elearning_header_search_icon_data_attrs', '' );

		if ( get_theme_mod( 'elearning_header_search', true ) ) {
			$output  = '<li class="' . elearning_css_class( 'elearning_header_search_class', false ) . '"' . apply_filters( 'elearning_header_search_data_attrs', '' ) . '>';
			$output .= apply_filters( 'elearning_search_icon', '<a href="#" ' . $data_attrs . ' ><i class="tg-icon tg-icon-search"></i></a>' );
			$output .= get_search_form( false );
			$output .= '</li>';
			$output .= '<!-- /.tg-header-search -->';
		}

		return $output;
	}

	public static function get_layout() {

		global $post;
		$layout = 'tg-site-layout--right';

		if ( $post ) {

			$layout_meta_arr = get_post_meta( self::get_post_id(), 'elearning_layout' );
			$layout_meta     = isset( $layout_meta_arr[0] ) ? $layout_meta_arr[0] : 'tg-site-layout--customizer';

			if ( 'tg-site-layout--customizer' === $layout_meta ) {
				if ( is_single() ) {
					$layout = get_theme_mod( 'elearning_structure_post', 'tg-site-layout--right' );
				} elseif ( is_page() ) {
					$layout = get_theme_mod( 'elearning_structure_page', 'tg-site-layout--right' );
				} elseif ( is_archive() ) {
					$layout = get_theme_mod( 'elearning_structure_archive', 'tg-site-layout--right' );
				} else {
					$layout = get_theme_mod( 'elearning_structure_default', 'tg-site-layout--right' );
				}
			} else {
				$layout = $layout_meta;
			}
		}

		return $layout;
	}

	/**
	 * Find the position of the first occurrence of a substring in an array.
	 *
	 * @param       $haystack
	 * @param array $needles
	 * @param int   $offset
	 * @return bool
	 */
	public static function strpos_a( $haystack, $needles = array(), $offset = 0 ) {

		if ( ! is_array( $needles ) ) {
			$needles = array( $needles );
		}

		foreach ( $needles as $needle ) {

			if ( strpos( $haystack, $needle, $offset ) !== false ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Provides an array of Menu slug => name for dropdown.
	 *
	 *
	 * @param string $key Type of key in the menu item associative array.
	 * @return array
	 */
	public static function get_menus( $key = 'slug' ) {

		$menus      = get_terms(
			array(
				'taxonomy'   => 'nav_menu',
				'hide_empty' => true,
			)
		);
		$menu_slugs = array(
			'none' => esc_html__(
				'None',
				'elearning'
			),
		);

		foreach ( $menus as $menu ) {
			if ( 'term_id' === $key ) {
				$menu_slugs[ $menu->term_id ] = esc_html( $menu->name );
			} else {
				$menu_slugs[ $menu->slug ] = esc_html( $menu->name );
			}
		}

		return $menu_slugs;
	}

	/**
	 * Get sidebar name.
	 *
	 * @param string $sidebar_id Sidebar id.
	 * @return mixed|string
	 */
	public static function get_siderbar_name( $sidebar_id = '' ) {

		global $wp_registered_sidebars;
		$sidebar_name = '';

		if ( isset( $wp_registered_sidebars[ $sidebar_id ] ) ) {
			$sidebar_name = $wp_registered_sidebars[ $sidebar_id ]['name'];
		}

		return $sidebar_name;
	}
}
