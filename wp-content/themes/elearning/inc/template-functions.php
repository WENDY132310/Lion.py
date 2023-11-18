<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'elearning_pingback_header' ) ) {

	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	function elearning_pingback_header() {

		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
}

add_action( 'wp_head', 'elearning_pingback_header' );

if ( ! function_exists( 'elearning_header_class' ) ) {

	/**
	 * Adds css classes into header
	 *
	 * @param string $class css classname.
	 */
	function elearning_header_class( $class = '' ) {

		$classes = array();
		$classes = array_map( 'esc_attr', $classes );
		$classes = apply_filters( 'elearning_header_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_header_top_class' ) ) {

	/**
	 * Adds css classes into header
	 *
	 * @param string $class css classname.
	 */
	function elearning_header_top_class( $class = '' ) {

		$classes = array();
		$classes = array_map( 'esc_attr', $classes );
		$classes = apply_filters( 'elearning_header_top_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_css_class' ) ) {

	/**
	 * Adds css classes to elements dynamically.
	 *
	 * @param string $tag Filter tag name.
	 *
	 * @return string CSS classes.
	 */
	function elearning_css_class( $tag, $echo = true ) {

		$classes = elearning_Dynamic_Filter::filter_via_tag( $tag );
		$classes = apply_filters( $tag, $classes );
		$classes = array_unique( $classes );

		// Output in string format.
		if ( true === $echo ) {
			echo join( ' ', $classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			return join( ' ', $classes );
		}
	}
}

if ( ! function_exists( 'elearning_primary_menu_class' ) ) {

	/**
	 * Adds css classes into primary menu
	 *
	 * @param string $class css classname.
	 */
	function elearning_primary_menu_class( $class = '' ) {

		$classes = array();
		$classes = array_map( 'esc_attr', $classes );
		$classes = apply_filters( 'elearning_primary_menu_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_footer_class' ) ) {

	/**
	 * Adds css classes into the footer
	 *
	 * @param string $class css classname.
	 */
	function elearning_footer_class( $class = '' ) {

		$classes = array();
		$classes = array_map( 'esc_attr', $classes );
		$classes = apply_filters( 'elearning_footer_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_footer_widget_container_class' ) ) {

	/**
	 * Adds css classes into the footer widget area
	 *
	 * @param string $class css classname.
	 */
	function elearning_footer_widget_container_class( $class = '' ) {

		$classes = array();
		$classes = array_map( 'esc_attr', $classes );
		$classes = apply_filters( 'elearning_footer_widget_container_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_footer_bar_classes' ) ) {

	/**
	 * Adds css classes into the footer bar
	 *
	 * @param string $class css classname.
	 */
	function elearning_footer_bar_classes( $class = '' ) {

		$classes = array();
		$classes = array_map( 'esc_attr', $classes );
		$classes = apply_filters( 'elearning_footer_bar_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_sidebar_class' ) ) {

	/**
	 * Adds css classes into the sidebar
	 *
	 * @param string $class css classname.
	 */
	function elearning_sidebar_class( $class = '' ) {

		$classes = array();
		$classes = array_map( 'esc_attr', $classes );
		$classes = apply_filters( 'elearning_sidebar_class', $classes, $class );
		$classes = array_unique( $classes );

		echo join( ' ', $classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_get_title' ) ) {

	/**
	 * Returns page title.
	 *
	 * @return string
	 */
	function elearning_get_title() {

		if ( is_archive() ) {

			if ( is_author() ) :

				/**
				 * Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 */
				the_post();
				/* translators: %s: author. */
				$page_title = sprintf( esc_html__( 'Author: %s', 'elearning' ), '<span class="vcard">' . get_the_author() . '</span>' );

				/**
				 * Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();

			elseif ( is_post_type_archive() ) :
				$page_title = post_type_archive_title( '', false );

			elseif ( is_day() ) :
				/* translators: %s: day */
				$page_title = sprintf( esc_html__( 'Day: %s', 'elearning' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				/* translators: %s: month */
				$page_title = sprintf( esc_html__( 'Month: %s', 'elearning' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				/* translators: %s: year. */
				$page_title = sprintf( esc_html__( 'Year: %s', 'elearning' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			else :
				$page_title = single_cat_title( '', false );

			endif;
		} elseif ( is_404() ) {
			$page_title = esc_html__( 'Page Not Found', 'elearning' );
		} elseif ( is_search() ) {
			$page_title = esc_html__( 'Search Results', 'elearning' );
		} elseif ( is_page() ) {
			$page_title = get_the_title();
		} elseif ( is_single() ) {
			$page_title = get_the_title();
		} elseif ( is_home() ) {
			$queried_id = get_option( 'page_for_posts' );
			$page_title = get_the_title( $queried_id );
		} else {
			$page_title = '';
		}

		return apply_filters( 'elearning_title', $page_title );
	}
}

if ( ! function_exists( 'elearning_get_current_layout' ) ) {

	/**
	 * Get the current layout of the page
	 *
	 * @return string layout.
	 */
	function elearning_get_current_layout() {

		$layout            = '';
		$individual_layout = get_post_meta( eLearning_Utils::get_post_id(), 'elearning_layout', true );

		if ( ! empty( $individual_layout ) && 'tg-site-layout--customizer' !== $individual_layout ) {
			$layout = $individual_layout;
		} elseif ( apply_filters( 'elearning_pro_current_layout', '' ) ) {
			$layout = apply_filters( 'elearning_pro_current_layout', '' );
		} else {
			switch ( true ) {
				case ( is_singular( 'page' ) || is_404() ):
					$layout = get_theme_mod( 'elearning_structure_page', 'tg-site-layout--right' );

					if ( function_exists( 'masteriyo_is_account_page' ) && masteriyo_is_account_page() ) {
						$layout = 'tg-site-layout--no-sidebar';
					}

					break;
				case ( is_singular() ):
					$layout = get_theme_mod( 'elearning_structure_post', 'tg-site-layout--right' );

					break;
				case ( is_archive() || is_home() ):
					$layout = get_theme_mod( 'elearning_structure_archive', 'tg-site-layout--right' );

					break;
				default:
					$layout = get_theme_mod( 'elearning_structure_default', 'tg-site-layout--right' );
			}
		}

		return apply_filters( 'elearning_current_layout', $layout );
	}
}

if ( ! function_exists( 'elearning_insert_mod_hatom_data' ) ) {

	/**
	 * Adding the support for the entry-title tag for Google Rich Snippets.
	 *
	 * @param string $content The post content.
	 * @return string hatom data.
	 */
	function elearning_insert_mod_hatom_data( $content ) {

		$title = get_the_title();

		if ( is_single() && 'page-header' === eLearning_Utils::has_page_title() ) {
			$content .= '<div class="extra-hatom" style="display: none !important;"><span class="entry-title">' . $title . '</span></div>';
		}

		return $content;
	}
	add_filter( 'the_content', 'elearning_insert_mod_hatom_data' );
}

if ( ! function_exists( 'elearning_get_image_by_id' ) ) {

	/**
	 * Get image HTML by id.
	 *
	 * @param int $id ID of the logo image attachment.
	 * @param int $attr HTML alt for image.
	 * @param int $default_alt Default alt value.
	 */
	function elearning_get_image_by_id( $id, $attr, $default_alt = '' ) {

		// Get image alt.
		$image_alt = get_post_meta( eLearning_Utils::get_post_id(), '_wp_attachment_image_alt', true );

		if ( empty( $image_alt ) && ! empty( $default_alt ) ) {
			$attr['alt'] = $default_alt;
		}

		return wp_get_attachment_image( $id, 'full', false, $attr );
	}
}

if ( ! function_exists( 'elearning_insert_primary_menu_item' ) ) {

	/**
	 * Get search icon in primary menu list.
	 *
	 * @param string $items Menu html.
	 * @param object $args Menu arguments.
	 * @return string Menu HTML.
	 */
	function elearning_insert_primary_menu_item( $items, $args ) {

		if ( apply_filters( 'elearning_header_action_menu_location', 'menu-primary' ) === $args->theme_location ) {
			$items .= apply_filters( 'elearning_header_search', eLearning_Utils::header_search_markup() );
		}

		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'elearning_insert_primary_menu_item', 10, 2 );
}

if ( ! function_exists( 'elearning_menu_fallback' ) ) {

	/**
	 * Menu fallback for primary menu.
	 *
	 * Contains wp_list_pages to display pages created,
	 * search icons/
	 */
	function elearning_menu_fallback() {

		$output = '';

		$output .= '<div id="primary-menu" class="menu-primary">';
		$output .= '<ul>';
		$output .= wp_list_pages(
			array(
				'echo'     => false,
				'title_li' => false,
			)
		);
		$output .= apply_filters( 'elearning_header_search', eLearning_Utils::header_search_markup() );
		$output .= '</ul>';
		$output .= '</div>';

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'elearning_shift_extra_menu' ) ) {

	/**
	 * Keep menu items on one line.
	 *
	 * @param string $items The HTML list content for the menu items.
	 * @param stdClass $args An object containing wp_nav_menu() arguments.
	 * @return string HTML for more button.
	 */
	function elearning_shift_extra_menu( $items, $args ) {

		if ( 'menu-primary' === $args->theme_location && get_theme_mod( 'elearning_primary_menu_extra', false ) ) :
			$items .= '<li class="menu-item menu-item-has-children tg-menu-extras-wrap">';
			$items .= '<span class="submenu-expand">';
			$items .= '<i class="fa fa-ellipsis-v"></i>';
			$items .= '</span>';
			$items .= '<ul class="sub-menu" id="tg-menu-extras">';
			$items .= '</ul>';
			$items .= '</li>';
		endif;

		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'elearning_shift_extra_menu', 9, 2 );
}

if ( ! function_exists( 'elearning_header_button_append' ) ) {

	/**
	 * Header button.
	 *
	 * @param string $items The HTML list content for the menu items.
	 * @param stdClass $args An object containing wp_nav_menu() arguments.
	 * @return string HTML for header button item.
	 */
	function elearning_header_button_append( $items, $args ) {

		$button_text   = get_theme_mod( 'elearning_header_button_text' );
		$button_link   = get_theme_mod( 'elearning_header_button_link' );
		$button_target = get_theme_mod( 'elearning_header_button_target' );
		$button_target = $button_target ? ' target="_blank"' : '';

		if ( 'menu-primary' === $args->theme_location && $button_text ) {
			$items .= '<li class="menu-item tg-header-button-wrap">';
			$items .= '<a href="' . esc_url( $button_link ) . '"' . esc_attr( $button_target ) . '>';
			$items .= $button_text;
			$items .= '</a>';
			$items .= '</li>';
		}

		return $items;
	}
	add_filter( 'wp_nav_menu_items', 'elearning_header_button_append', 8, 2 );
}

if ( ! function_exists( 'elearning_responsive_oembeds' ) ) {
	/**
	 * Adds a responsive embed wrapper around oEmbed content.
	 *
	 * @param string $html oEmbed markup.
	 * @param string $url URL to embed.
	 * @return string
	 */
	function elearning_responsive_oembeds( $html, $url ) {

		$hosts = apply_filters(
			'elearning_oembed_responsive_hosts',
			array(
				'vimeo.com',
				'youtube.com',
				'dailymotion.com',
				'flickr.com',
				'hulu.com',
				'kickstarter.com',
				'vine.co',
				'soundcloud.com',
				'youtu.be',
			)
		);

		if ( eLearning_Utils::strpos_a( $url, $hosts ) ) {
			$html = ( '' !== $html ) ? '<div class="tg-oembed-container">' . $html . '</div>' : '';
		}

		return $html;
	}
}
add_filter( 'embed_oembed_html', 'elearning_responsive_oembeds', 99, 4 );

if ( ! function_exists( 'elearning_get_header_top_section' ) ) {

	/**
	 * Get header top section content.
	 *
	 * @param string $section Accepts args one|two
	 */
	function elearning_get_header_top_section( $section = 'left' ) {

		$type = get_theme_mod( "elearning_header_top_{$section}_content", 'text_html' );

		switch ( $type ) {

			case 'text_html':
				$text_html = get_theme_mod( "elearning_header_top_{$section}_content_html", '' );
				echo do_shortcode( wp_kses_post( $text_html ) );

				break;
			case 'menu':
				$menu = get_theme_mod( "elearning_header_top_{$section}_content_menu", 'none' );

				if ( 'none' === $menu ) {
					return;
				}

				wp_nav_menu(
					array(
						'theme_location' => '',
						'menu'           => $menu,
						'menu_id'        => "header-top-{$section}-menu",
						'container'      => '',
						'depth'          => apply_filters( 'elearning_header_top_menu_depth', -1 ),
					)
				);

				break;
			case 'widget':
				if ( is_active_sidebar( "header-top-{$section}-sidebar" ) ) {
					dynamic_sidebar( "header-top-{$section}-sidebar" );
				}

				break;
			default:
		}
	}
}

if ( ! function_exists( 'elearning_get_footer_bar_section' ) ) {

	/**
	 * Get footer bar content.
	 *
	 * @param string $section Accepts args one|two
	 */
	function elearning_get_footer_bar_section( $section = 'one' ) {

		$type = get_theme_mod( "elearning_footer_bar_section_{$section}", 'text_html' );

		switch ( $type ) {

			case 'text_html':
				echo do_shortcode( wp_kses_post( eLearning_Utils::footer_copyright_markup( $section ) ) );

				break;
			case 'menu':
				$menu = get_theme_mod( "elearning_footer_bar_section_{$section}_menu", 'none' );

				if ( 'none' === $menu ) {
					return;
				}

				wp_nav_menu(
					array(
						'theme_location' => '',
						'menu'           => $menu,
						'menu_id'        => "footer-bar-{$section}-menu",
						'container'      => '',
						'depth'          => -1,
						'fallback_cb'    => false,
					)
				);

				break;
			case 'widget':
				$sidebar = 'one' === $section ? 'left' : 'right';

				if ( is_active_sidebar( "footer-bar-{$sidebar}-sidebar" ) ) {
					dynamic_sidebar( "footer-bar-{$sidebar}-sidebar" );
				}

				break;
			default:
				if ( 'one' === $section ) {
					echo wp_kses_post( eLearning_Utils::footer_copyright_markup( 'one' ) );
				} else {
					do_action( 'elearning_footer_bar_section_two_option_case', $type );
				}
		}
	}
}
