<?php
/**
 * eLearning dynamic CSS generation file for theme options.
 *
 * class eLearning_Dynamic_CSS
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Dynamic_CSS' ) ) {

	/**
	 * elearning dynamic CSS generation file for theme options.
	 *
	 * class eLearning_Dynamic_CSS
	 */
	class eLearning_Dynamic_CSS {

		/**
		 * Return dynamic CSS output.
		 *
		 * @param string $dynamic_css          Dynamic CSS.
		 * @param string $dynamic_css_filtered Dynamic CSS Filters.
		 *
		 * @return string Generated CSS.
		 */
		public static function render_output( $dynamic_css, $dynamic_css_filtered = '' ) {

			// Generate dynamic CSS.
			$parse_css = '';

			// Container width.
			$container_width     = get_theme_mod( 'elearning_general_container_width', 1160 );
			$container_width_css = array(
				'.tg-container' => array(
					'max-width' => esc_html( $container_width ) . 'px',
				),
			);
			$parse_css          .= self::parse_css( 1160, $container_width, $container_width_css, 1200 );

			// Content width.
			$content_width     = get_theme_mod( 'elearning_general_content_width', 70 );
			$content_width_css = array(
				'#primary' => array(
					'width' => esc_html( $content_width ) . '%',
				),
			);
			$parse_css        .= self::parse_css( 70, $content_width, $content_width_css );

			// Sidebar Width
			$sidebar_width     = get_theme_mod( 'elearning_general_sidebar_width', 30 );
			$sidebar_width_css = array(
				'#secondary' => array(
					'width' => esc_html( $sidebar_width ) . '%',
				),
			);
			$parse_css        .= self::parse_css( 30, $sidebar_width, $sidebar_width_css );

			// Base primary color.
			$base_primary_color     = get_theme_mod( 'elearning_base_color_primary', '#269bd1' );
			$base_primary_color_css = array(
				'a:hover, a:focus, .tg-primary-menu > div ul li:hover > a,  .tg-primary-menu > div ul li.current_page_item > a, .tg-primary-menu > div ul li.current-menu-item > a,  .tg-mobile-navigation > div ul li.current_page_item > a, .tg-mobile-navigation > div ul li.current-menu-item > a,  .entry-content a,  .tg-meta-style-two .entry-meta span, .tg-meta-style-two .entry-meta a, .entry-title a:hover, .entry-title a:focus' => array(
					'color' => esc_html( $base_primary_color ),
				),
				'.tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.current-menu-item > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div > ul > li.current-menu-item > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div > ul > li.current-menu-item > a::before, .tg-scroll-to-top:hover, button, input[type="button"], input[type="reset"], input[type="submit"], .tg-primary-menu > div ul li.tg-header-button-wrap a' => array(
					'background-color' => esc_html( $base_primary_color ),
				),
			);
			$parse_css             .= self::parse_css( '#269bd1', $base_primary_color, $base_primary_color_css );

			// Base text color.
			$base_text_color     = get_theme_mod( 'elearning_base_color_text', '#51585f' );
			$base_text_color_css = array(
				'body, a' => array(
					'color' => esc_html( $base_text_color ),
				),
			);
			$parse_css          .= self::parse_css( '#51585f', $base_text_color, $base_text_color_css );

			// Base border color.
			$base_border_color     = get_theme_mod( 'elearning_base_color_border', '#e9ecef' );
			$base_border_color_css = array(
				'.tg-site-header, .tg-primary-menu, .tg-primary-menu > div ul li ul, .tg-primary-menu > div ul li ul li a, .posts-navigation, #comments, .widget ul li, .post-navigation, #secondary, .tg-site-footer .tg-site-footer-widgets, .tg-site-footer .tg-site-footer-bar .tg-container' => array(
					'border-color' => esc_html( $base_border_color ),
				),
				'hr .tg-container--separate, ' => array(
					'background-color' => esc_html( $base_border_color ),
				),
			);
			$parse_css            .= self::parse_css( '#e9ecef', $base_border_color, $base_border_color_css );

			$heading_color     = get_theme_mod( 'elearning_heading_color', '#16181a' );
			$heading_color_css = array(
				'h1, h2, h3, h4, h5, h6, .entry-title a' => array(
					'color' => esc_html( $heading_color ),
				),
			);
			$parse_css        .= self::parse_css( '#16181a', $heading_color, $heading_color_css );

			// Link colors.
			$link_color_normal     = get_theme_mod( 'elearning_link_color', '#269bd1' );
			$link_color_normal_css = array(
				'.entry-content a' => array(
					'color' => esc_html( $link_color_normal ),
				),
			);
			$parse_css            .= self::parse_css( '#269bd1', $link_color_normal, $link_color_normal_css );

			// Link hover color.
			$link_color_hover     = get_theme_mod( 'elearning_link_hover_color', '#269bd1' );
			$link_color_hover_css = array(
				'.entry-content a:hover, .entry-content a:focus' => array(
					'color' => esc_html( $link_color_hover ),
				),
			);
			$parse_css           .= self::parse_css( '#269bd1', $link_color_hover, $link_color_hover_css );

			// Inside container background color.
			$inside_container_bg_default = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$inside_container_bg         = get_theme_mod( 'elearning_inside_container_background', $inside_container_bg_default );
			$parse_css                  .= self::parse_background_css( $inside_container_bg_default, $inside_container_bg, '#main' );

			$base_typography_body_default = array(
				'font-family'    => 'default',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => '15px',
					'tablet'  => '',
					'mobile'  => '',
				),
				'line-height'    => array(
					'desktop' => '1.8',
					'tablet'  => '',
					'mobile'  => '',
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);
			$base_typography_body         = get_theme_mod( 'elearning_base_typography_body', $base_typography_body_default );
			$parse_css                   .= self::parse_typography_css(
				$base_typography_body_default,
				$base_typography_body,
				'body',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$base_typography_heading_default = apply_filters(
				'elearning_base_typography_heading_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '400',
					'line-height'    => array(
						'desktop' => '1.3',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$base_typography_heading         = get_theme_mod( 'elearning_base_typography_heading', $base_typography_heading_default );
			$parse_css                      .= self::parse_typography_css(
				$base_typography_heading_default,
				$base_typography_heading,
				'h1, h2, h3, h4, h5, h6',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h1_default = apply_filters(
				'elearning_typography_h1_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => '2.5rem',
						'tablet'  => '',
						'mobile'  => '',
					),
					'line-height'    => array(
						'desktop' => '1.3',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$typography_h1         = get_theme_mod( 'elearning_typography_h1', $typography_h1_default );
			$parse_css            .= self::parse_typography_css(
				$typography_h1_default,
				$typography_h1,
				'h1',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h2_default = apply_filters(
				'elearning_typography_h2_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => '2.25rem',
						'tablet'  => '',
						'mobile'  => '',
					),
					'line-height'    => array(
						'desktop' => '1.3',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$typography_h2         = get_theme_mod( 'elearning_typography_h2', $typography_h2_default );
			$parse_css            .= self::parse_typography_css(
				$typography_h2_default,
				$typography_h2,
				'h2',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h3_default = apply_filters(
				'elearning_typography_h3_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => '2rem',
						'tablet'  => '',
						'mobile'  => '',
					),
					'line-height'    => array(
						'desktop' => '1.3',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$typography_h3         = get_theme_mod( 'elearning_typography_h3', $typography_h3_default );
			$parse_css            .= self::parse_typography_css(
				$typography_h3_default,
				$typography_h3,
				'h3',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h4_default = apply_filters(
				'elearning_typography_h4_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => '1.75rem',
						'tablet'  => '',
						'mobile'  => '',
					),
					'line-height'    => array(
						'desktop' => '1.3',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$typography_h4         = get_theme_mod( 'elearning_typography_h4', $typography_h4_default );
			$parse_css            .= self::parse_typography_css(
				$typography_h4_default,
				$typography_h4,
				'h4',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h5_default = apply_filters(
				'elearning_typography_h5_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => '1.313rem',
						'tablet'  => '',
						'mobile'  => '',
					),
					'line-height'    => array(
						'desktop' => '1.3',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$typography_h5         = get_theme_mod( 'elearning_typography_h5', $typography_h5_default );
			$parse_css            .= self::parse_typography_css(
				$typography_h5_default,
				$typography_h5,
				'h5',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h6_default = apply_filters(
				'elearning_typography_h6_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => '1.125rem',
						'tablet'  => '',
						'mobile'  => '',
					),
					'line-height'    => array(
						'desktop' => '1.3',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$typography_h6         = get_theme_mod( 'elearning_typography_h6', $typography_h6_default );
			$parse_css            .= self::parse_typography_css(
				$typography_h6_default,
				$typography_h6,
				'h6',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Button padding.
			$button_padding_default = array(
				'top'    => '10px',
				'right'  => '15px',
				'bottom' => '10px',
				'left'   => '15px',
			);
			$button_padding         = get_theme_mod( 'elearning_button_padding', $button_padding_default );
			$parse_css             .= self::parse_dimension_css(
				$button_padding_default,
				$button_padding,
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span',
				'padding'
			);

			// Button text color.
			$button_text_color     = get_theme_mod( 'elearning_button_text_color', '#ffffff' );
			$button_text_color_css = array(
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span' => array(
					'color' => esc_html( $button_text_color ),
				),
			);
			$parse_css            .= self::parse_css( '#ffffff', $button_text_color, $button_text_color_css );

			// Button hover text color.
			$button_hover_text_color     = get_theme_mod( 'elearning_button_text_hover_color', '#ffffff' );
			$button_hover_text_color_css = array(
				'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover' => array(
					'color' => esc_html( $button_hover_text_color ),
				),
			);
			$parse_css                  .= self::parse_css( '#ffffff', $button_hover_text_color, $button_hover_text_color_css );

			// Button background color.
			$button_bg_color     = get_theme_mod( 'elearning_button_bg_color', '#269bd1' );
			$button_bg_color_css = array(
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span' => array(
					'background-color' => esc_html( $button_bg_color ),
				),
			);
			$parse_css          .= self::parse_css( '#269bd1', $button_bg_color, $button_bg_color_css );

			// Button background hover color.
			$button_bg_hover_color     = get_theme_mod( 'elearning_button_bg_hover_color', '#1e7ba6' );
			$button_bg_hover_color_css = array(
				'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover' => array(
					'background-color' => esc_html( $button_bg_hover_color ),
				),
			);
			$parse_css                .= self::parse_css( '#ffffff', $button_bg_hover_color, $button_bg_hover_color_css );

			// Button border roundness.
			$button_border_radius     = get_theme_mod( 'elearning_button_roundness', 0 );
			$button_border_radius_css = array(
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span' => array(
					'border-radius' => esc_html( $button_border_radius ) . 'px',
				),
			);
			$parse_css               .= self::parse_css( 0, $button_border_radius, $button_border_radius_css );

			$typography_site_title_default = array(
				'font-family'    => 'default',
				'font-weight'    => 'regular',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => '1.313rem',
					'tablet'  => '',
					'mobile'  => '',
				),
				'line-height'    => array(
					'desktop' => '1.5',
					'tablet'  => '',
					'mobile'  => '',
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);
			$typography_site_title         = get_theme_mod( 'elearning_typography_site_title', $typography_site_title_default );
			$parse_css                    .= self::parse_typography_css(
				$typography_site_title_default,
				$typography_site_title,
				'.site-branding .site-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_site_description_default = array(
				'font-family'    => 'default',
				'font-weight'    => 'regular',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => '1rem',
					'tablet'  => '',
					'mobile'  => '',
				),
				'line-height'    => array(
					'desktop' => '1.8',
					'tablet'  => '',
					'mobile'  => '',
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);
			$typography_site_description         = get_theme_mod( 'elearning_typography_site_description', $typography_site_description_default );
			$parse_css                          .= self::parse_typography_css(
				$typography_site_description_default,
				$typography_site_description,
				'.site-branding .site-description',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header top text color.
			$header_top_text_color     = get_theme_mod( 'elearning_header_top_text_color', '#51585f' );
			$header_top_text_color_css = array(
				'.tg-site-header .tg-site-header-top' => array(
					'color' => esc_html( $header_top_text_color ),
				),
			);
			$parse_css                .= self::parse_css( '#51585f', $header_top_text_color, $header_top_text_color_css );

			// Header top background.
			$header_top_bg_default = array(
				'background-color'      => '#e9ecef',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$header_top_bg         = get_theme_mod( 'elearning_header_top_bg', $header_top_bg_default );
			$parse_css            .= self::parse_background_css( $header_top_bg_default, $header_top_bg, '.tg-site-header .tg-site-header-top' );

			// Header main background.
			$header_main_bg_default = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$header_main_bg         = get_theme_mod( 'elearning_header_main_bg', $header_main_bg_default );
			$parse_css             .= self::parse_background_css( $header_main_bg_default, $header_main_bg, '.tg-site-header, .tg-container--separate .tg-site-header' );

			// Header main border bottom.
			$header_main_border_bottom     = get_theme_mod( 'elearning_header_main_border_bottom_size', 1 );
			$header_main_border_bottom_css = array(
				'.tg-site-header' => array(
					'border-bottom-width' => esc_html( $header_main_border_bottom ) . 'px',
				),
			);
			$parse_css                    .= self::parse_css( 1, $header_main_border_bottom, $header_main_border_bottom_css );

			// Header main border bottom.
			$header_main_border_bottom_color     = get_theme_mod( 'elearning_header_main_border_bottom_color', '#e9ecef' );
			$header_main_border_bottom_color_css = array(
				'.tg-site .tg-site-header' => array(
					'border-bottom-color' => esc_html( $header_main_border_bottom_color ),
				),
			);
			$parse_css                          .= self::parse_css( '#e9ecef', $header_main_border_bottom_color, $header_main_border_bottom_color_css );

			// Header button padding.
			$header_button_padding_default = array(
				'top'    => '5px',
				'right'  => '10px',
				'bottom' => '5px',
				'left'   => '10px',
			);
			$header_button_padding         = get_theme_mod( 'elearning_header_button_padding', $header_button_padding_default );
			$parse_css                    .= self::parse_dimension_css(
				$header_button_padding_default,
				$header_button_padding,
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a',
				'padding'
			);

			// Header button text color.
			$header_button_text_color     = get_theme_mod( 'elearning_header_button_text_color', '#ffffff' );
			$header_button_text_color_css = array(
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a' => array(
					'color' => esc_html( $header_button_text_color ),
				),
			);
			$parse_css                   .= self::parse_css( '#ffffff', $header_button_text_color, $header_button_text_color_css );

			// Header button hover text color.
			$header_button_hover_text_color     = get_theme_mod( 'elearning_header_button_text_hover_color', '#ffffff' );
			$header_button_hover_text_color_css = array(
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a:hover' => array(
					'color' => esc_html( $header_button_hover_text_color ),
				),
			);
			$parse_css                         .= self::parse_css( '#ffffff', $header_button_hover_text_color, $header_button_hover_text_color_css );

			// Header background color.
			$header_button_bg_color     = get_theme_mod( 'elearning_header_button_bg_color', '#269bd1' );
			$header_button_bg_color_css = array(
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a' => array(
					'background-color' => esc_html( $header_button_bg_color ),
				),
			);
			$parse_css                 .= self::parse_css( '#269bd1', $header_button_bg_color, $header_button_bg_color_css );

			// Header button hover background color.
			$header_button_bg_hover_color     = get_theme_mod( 'elearning_header_button_bg_hover_color', '#1e7ba6' );
			$header_button_bg_hover_color_css = array(
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a:hover' => array(
					'background-color' => esc_html( $header_button_bg_hover_color ),
				),
			);
			$parse_css                       .= self::parse_css( '#ffffff', $header_button_bg_hover_color, $header_button_bg_hover_color_css );

			// Header button border roundness.
			$header_button_border_radius     = get_theme_mod( 'elearning_header_button_roundness', 0 );
			$header_button_border_radius_css = array(
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a' => array(
					'border-radius' => esc_html( $header_button_border_radius ) . 'px',
				),
			);
			$parse_css                      .= self::parse_css( 0, $header_button_border_radius, $header_button_border_radius_css );

			// Primary menu border bottom.
			$primary_menu_border_bottom     = get_theme_mod( 'elearning_primary_menu_border_bottom_size', 0 );
			$primary_menu_border_bottom_css = array(
				'.tg-site-header .main-navigation' => array(
					'border-bottom-width' => esc_html( $primary_menu_border_bottom ) . 'px',
				),
			);
			$parse_css                     .= self::parse_css( 0, $primary_menu_border_bottom, $primary_menu_border_bottom_css );

			// Primary menu border bottom.
			$primary_menu_border_bottom_color     = get_theme_mod( 'elearning_primary_menu_border_bottom_color', '#e9ecef' );
			$primary_menu_border_bottom_color_css = array(
				'.tg-site-header .main-navigation' => array(
					'border-bottom-color' => esc_html( $primary_menu_border_bottom_color ),
				),
			);
			$parse_css                           .= self::parse_css( '#e9ecef', $primary_menu_border_bottom_color, $primary_menu_border_bottom_color_css );

			// Primary menu item color.
			$primary_menu_item_color_normal     = get_theme_mod( 'elearning_primary_menu_text_color', '' );
			$primary_menu_item_color_normal_css = array(
				'.tg-primary-menu > div > ul li:not(.tg-header-button-wrap) a' => array(
					'color' => esc_html( $primary_menu_item_color_normal ),
				),
			);
			$parse_css                         .= self::parse_css( '#269bd1', $primary_menu_item_color_normal, $primary_menu_item_color_normal_css );

			// Primary menu item hover color.
			$primary_menu_item_color_hover     = get_theme_mod( 'elearning_primary_menu_text_hover_color', '' );
			$primary_menu_item_color_hover_css = array(
				'.tg-primary-menu > div > ul li:not(.tg-header-button-wrap):hover > a' => array(
					'color' => esc_html( $primary_menu_item_color_hover ),
				),
			);
			$parse_css                        .= self::parse_css( '', $primary_menu_item_color_hover, $primary_menu_item_color_hover_css );

			// Primary menu item active color.
			$primary_menu_item_color_active     = get_theme_mod( 'elearning_primary_menu_text_active_color', '' );
			$primary_menu_item_color_active_css = array(
				'.tg-primary-menu > div ul li:active > a, .tg-primary-menu > div ul > li:not(.tg-header-button-wrap).current_page_item > a, .tg-primary-menu > div ul > li:not(.tg-header-button-wrap).current_page_ancestor > a, .tg-primary-menu > div ul > li:not(.tg-header-button-wrap).current-menu-item > a, .tg-primary-menu > div ul > li:not(.tg-header-button-wrap).current-menu-ancestor > a' => array(
					'color' => esc_html( $primary_menu_item_color_active ),
				),
				'.tg-primary-menu.tg-primary-menu--style-underline > div ul > li:not(.tg-header-button-wrap).current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-underline > div ul > li:not(.tg-header-button-wrap).current_page_ancestor > a::before, .tg-primary-menu.tg-primary-menu--style-underline > div ul > li:not(.tg-header-button-wrap).current-menu-item > a::before, .tg-primary-menu.tg-primary-menu--style-underline > div ul > li:not(.tg-header-button-wrap).current-menu-ancestor > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div ul > li:not(.tg-header-button-wrap).current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div ul > li:not(.tg-header-button-wrap).current_page_ancestor > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div ul > li:not(.tg-header-button-wrap).current-menu-item > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div ul > li:not(.tg-header-button-wrap).current-menu-ancestor > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div ul > li:not(.tg-header-button-wrap).current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div ul > li:not(.tg-header-button-wrap).current_page_ancestor > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div ul > li:not(.tg-header-button-wrap).current-menu-item > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div ul > li:not(.tg-header-button-wrap).current-menu-ancestor > a::before' => array(
					'background-color' => esc_html( $primary_menu_item_color_active ),
				),
			);
			$parse_css                         .= self::parse_css( '', $primary_menu_item_color_active, $primary_menu_item_color_active_css );

			$typography_primary_menu_default = array(
				'font-family'    => 'default',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => '1rem',
					'tablet'  => '',
					'mobile'  => '',
				),
				'line-height'    => array(
					'desktop' => '1.8',
					'tablet'  => '',
					'mobile'  => '',
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);
			$typography_primary_menu         = get_theme_mod( 'elearning_typography_primary_menu', $typography_primary_menu_default );
			$parse_css                      .= self::parse_typography_css(
				$typography_primary_menu_default,
				$typography_primary_menu,
				'.tg-primary-menu > div ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_primary_menu_dropdown_item_default = array(
				'font-family'    => 'default',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => '1rem',
					'tablet'  => '',
					'mobile'  => '',
				),
				'line-height'    => array(
					'desktop' => '1.8',
					'tablet'  => '',
					'mobile'  => '',
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);
			$typography_primary_menu_dropdown_item         = get_theme_mod( 'elearning_typography_primary_menu_dropdown_item', $typography_primary_menu_dropdown_item_default );
			$parse_css                                    .= self::parse_typography_css(
				$typography_primary_menu_dropdown_item_default,
				$typography_primary_menu_dropdown_item,
				'.tg-primary-menu > div ul li ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_mobile_menu_default = array(
				'font-family'    => 'default',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => '1rem',
					'tablet'  => '',
					'mobile'  => '',
				),
				'line-height'    => array(
					'desktop' => '1.8',
					'tablet'  => '',
					'mobile'  => '',
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);
			$typography_mobile_menu         = get_theme_mod( 'elearning_typography_mobile_menu', $typography_mobile_menu_default );
			$parse_css                     .= self::parse_typography_css(
				$typography_mobile_menu_default,
				$typography_mobile_menu,
				'.tg-mobile-navigation a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Page header padding.
			$page_title_padding_default = array(
				'top'    => '20px',
				'right'  => '0px',
				'bottom' => '20px',
				'left'   => '0px',
			);
			$page_title_padding         = get_theme_mod( 'elearning_page_title_padding', $page_title_padding_default );
			$parse_css                 .= self::parse_dimension_css(
				$page_title_padding_default,
				$page_title_padding,
				'.tg-page-header',
				'padding'
			);

			// Breadcrumbs font size.
			$breadcrumb_font_size     = get_theme_mod( 'elearning_breadcrumbs_font_size', 16 );
			$breadcrumb_font_size_css = array(
				apply_filters( 'elearning_breadcrumbs_font_size_selector', '.tg-page-header .breadcrumb-trail ul li' ) => array(
					'font-size' => esc_html( $breadcrumb_font_size ) . 'px',
				),
			);
			$parse_css               .= self::parse_css( 16, $breadcrumb_font_size, $breadcrumb_font_size_css );

			// Page/Post title color.
			$post_page_title_color     = get_theme_mod( 'elearning_post_page_title_color', '#16181a' );
			$post_page_title_color_css = array(
				'.tg-page-header .tg-page-header__title, .tg-page-content__title, .tg-page-header .archive-description > p' => array(
					'color' => esc_html( $post_page_title_color ),
				),
			);
			$parse_css                .= self::parse_css( '#16181a', $post_page_title_color, $post_page_title_color_css );

			// Page header background.
			$page_header_bg_default = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-position'   => 'top left',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$page_header_bg         = get_theme_mod( 'elearning_page_title_bg', $page_header_bg_default );
			$parse_css             .= self::parse_background_css( $page_header_bg_default, $page_header_bg, '.tg-page-header, .tg-container--separate .tg-page-header' );

			// Breadcrumbs text color.
			$breadcrumb_text_color     = get_theme_mod( 'elearning_breadcrumbs_text_color', '#16181a' );
			$breadcrumb_text_color_css = array(
				apply_filters( 'elearning_breadcrumbs_text_color_selector', '.tg-page-header .breadcrumb-trail ul li' ) => array(
					'color' => esc_html( $breadcrumb_text_color ),
				),
			);
			$parse_css                .= self::parse_css( '#16181a', $breadcrumb_text_color, $breadcrumb_text_color_css );

			// Breadcrumbs separator color.
			$breadcrumb_separator_color     = get_theme_mod( 'elearning_breadcrumbs_seperator_color', '#51585f' );
			$breadcrumb_separator_color_css = array(
				apply_filters( 'elearning_breadcrumbs_separator_color_selector', '.tg-page-header .breadcrumb-trail ul li::after' ) => array(
					'color' => esc_html( $breadcrumb_separator_color ),
				),
			);
			$parse_css                     .= self::parse_css( '#51585f', $breadcrumb_separator_color, $breadcrumb_separator_color_css );

			// Breadcrumbs link color.
			$breadcrumb_link_color     = get_theme_mod( 'elearning_breadcrumbs_link_color', '#16181a' );
			$breadcrumb_link_color_css = array(
				apply_filters( 'elearning_breadcrumbs_link_color_selector', '.tg-page-header .breadcrumb-trail ul li a' ) => array(
					'color' => esc_html( $breadcrumb_link_color ),
				),
			);
			$parse_css                .= self::parse_css( '#16181a', $breadcrumb_link_color, $breadcrumb_link_color_css );

			// Breadcrumbs link hover color.
			$breadcrumb_link_hover_color     = get_theme_mod( 'elearning_breadcrumbs_link_hover_color', '#269bd1' );
			$breadcrumb_link_hover_color_css = array(
				apply_filters( 'elearning_breadcrumbs_link_hover_color_selector', '.tg-page-header .breadcrumb-trail ul li a:hover ' ) => array(
					'color' => esc_html( $breadcrumb_link_hover_color ),
				),
			);
			$parse_css                      .= self::parse_css( '#269bd1', $breadcrumb_link_hover_color, $breadcrumb_link_hover_color_css );

			$typography_post_page_title_default = apply_filters(
				'elearning_typography_post_page_title_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => '2.5rem',
						'tablet'  => '',
						'mobile'  => '',
					),
					'line-height'    => array(
						'desktop' => '1.3',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$typography_post_page_title         = get_theme_mod( 'elearning_typography_post_page_title', $typography_post_page_title_default );
			$parse_css                         .= self::parse_typography_css(
				$typography_post_page_title_default,
				$typography_post_page_title,
				'.tg-page-header .tg-page-header__title, .tg-page-content__title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_blog_post_title_default = array(
				'font-family'    => 'default',
				'font-weight'    => '500',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => '2.25rem',
					'tablet'  => '',
					'mobile'  => '',
				),
				'line-height'    => array(
					'desktop' => '1.3',
					'tablet'  => '',
					'mobile'  => '',
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);
			$typography_blog_post_title         = get_theme_mod( 'elearning_typography_blog_post_title', $typography_blog_post_title_default );
			$parse_css                         .= self::parse_typography_css(
				$typography_blog_post_title_default,
				$typography_blog_post_title,
				apply_filters( 'elearning_typography_blog_post_title_selector', '.entry-title:not(.tg-page-content__title)' ),
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_widget_heading_default = apply_filters(
				'elearning_typography_widget_heading_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => '1.2rem',
						'tablet'  => '',
						'mobile'  => '',
					),
					'line-height'    => array(
						'desktop' => '1.3',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$typography_widget_heading         = get_theme_mod( 'elearning_typography_widget_heading', $typography_widget_heading_default );
			$parse_css                        .= self::parse_typography_css(
				$typography_widget_heading_default,
				$typography_widget_heading,
				'.widget .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_widget_content_default = apply_filters(
				'elearning_typography_widget_content_filter',
				array(
					'font-family'    => 'default',
					'font-weight'    => 'regular',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => '15px',
						'tablet'  => '',
						'mobile'  => '',
					),
					'line-height'    => array(
						'desktop' => '1.8',
						'tablet'  => '',
						'mobile'  => '',
					),
					'font-style'     => 'normal',
					'text-transform' => 'none',
				)
			);
			$typography_widget_content         = get_theme_mod( 'elearning_typography_widget_content', $typography_widget_content_default );
			$parse_css                        .= self::parse_typography_css(
				$typography_widget_content_default,
				$typography_widget_content,
				'.widget',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer background.
			$footer_widgets_bg_defaults = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$footer_widgets_bg          = get_theme_mod( 'elearning_footer_widgets_bg', $footer_widgets_bg_defaults );
			$parse_css                 .= self::parse_background_css( $footer_widgets_bg_defaults, $footer_widgets_bg, apply_filters( 'elearning_footer_widgets_bg_selector', '.tg-site-footer-widgets' ) );

			// Footer widgets title color.
			$footer_widgets_title_color     = get_theme_mod( 'elearning_footer_widgets_title_color', '#16181a' );
			$footer_widgets_title_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets .widget-title' => array(
					'color' => esc_html( $footer_widgets_title_color ),
				),
			);
			$parse_css                     .= self::parse_css( '#16181a', $footer_widgets_title_color, $footer_widgets_title_color_css );

			// Footer widgets text color.
			$footer_widgets_text_color     = get_theme_mod( 'elearning_footer_widgets_text_color', '#51585f' );
			$footer_widgets_text_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets, .tg-site-footer .tg-site-footer-widgets p' => array(
					'color' => esc_html( $footer_widgets_text_color ),
				),
			);
			$parse_css                    .= self::parse_css( '#51585f', $footer_widgets_text_color, $footer_widgets_text_color_css );

			// Footer widgets link color.
			$footer_widgets_link_color     = get_theme_mod( 'elearning_footer_widgets_link_color', '#16181a' );
			$footer_widgets_link_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets a' => array(
					'color' => esc_html( $footer_widgets_link_color ),
				),
			);
			$parse_css                    .= self::parse_css( '#16181a', $footer_widgets_link_color, $footer_widgets_link_color_css );

			// Footer widgets link hover color.
			$footer_widgets_link_hover_color     = get_theme_mod( 'elearning_footer_widgets_link_hover_color', '#269bd1' );
			$footer_widgets_link_hover_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets a:hover, .tg-site-footer .tg-site-footer-widgets a:focus' => array(
					'color' => esc_html( $footer_widgets_link_hover_color ),
				),
			);
			$parse_css                          .= self::parse_css( '#269bd1', $footer_widgets_link_hover_color, $footer_widgets_link_hover_color_css );

			// Footer widgets border top width.
			$footer_widgets_border_top_width     = get_theme_mod( 'elearning_footer_widgets_border_top_width', 1 );
			$footer_widgets_border_top_width_css = array(
				'.tg-site-footer .tg-site-footer-widgets' => array(
					'border-top-width' => esc_html( $footer_widgets_border_top_width ) . 'px',
				),
			);
			$parse_css                          .= self::parse_css( 1, $footer_widgets_border_top_width, $footer_widgets_border_top_width_css );

			// Footer widgets border top color.
			$footer_widgets_border_top_color     = get_theme_mod( 'elearning_footer_widgets_border_top_color', '#e9ecef' );
			$footer_widgets_border_top_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets' => array(
					'border-top-color' => esc_html( $footer_widgets_border_top_color ),
				),
			);
			$parse_css                          .= self::parse_css( '#e9ecef', $footer_widgets_border_top_color, $footer_widgets_border_top_color_css );

			// Footer widgets item border bottom width.
			$footer_widgets_item_border_bottom_width     = get_theme_mod( 'elearning_footer_widgets_item_border_bottom_width', 1 );
			$footer_widgets_item_border_bottom_width_css = array(
				'.tg-site-footer .tg-site-footer-widgets ul li' => array(
					'border-bottom-width' => esc_html( $footer_widgets_item_border_bottom_width ) . 'px',
				),
			);
			$parse_css                                  .= self::parse_css( 1, $footer_widgets_item_border_bottom_width, $footer_widgets_item_border_bottom_width_css );

			// Footer widgets item border bottom color.
			$footer_widgets_item_border_bottom__color     = get_theme_mod( 'elearning_footer_widgets_item_border_bottom_color', '#e9ecef' );
			$footer_widgets_item_border_bottom__color_css = array(
				'.tg-site-footer .tg-site-footer-widgets ul li' => array(
					'border-bottom-color' => esc_html( $footer_widgets_item_border_bottom__color ),
				),
			);
			$parse_css                                   .= self::parse_css( '#e9ecef', $footer_widgets_item_border_bottom__color, $footer_widgets_item_border_bottom__color_css );

			// Footer bottom bar background.
			$footer_bar_bg_defaults = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$footer_bar             = get_theme_mod( 'elearning_footer_bar_bg', $footer_bar_bg_defaults );
			$parse_css             .= self::parse_background_css( $footer_bar_bg_defaults, $footer_bar, '.tg-site-footer .tg-site-footer-bar' );

			// Footer bottom bar text color.
			$footer_bar_text_color     = get_theme_mod( 'elearning_footer_bar_text_color', '#51585f' );
			$footer_bar_text_color_css = array(
				'.tg-site-footer .tg-site-footer-bar' => array(
					'color' => esc_html( $footer_bar_text_color ),
				),
			);
			$parse_css                .= self::parse_css( '#51585f', $footer_bar_text_color, $footer_bar_text_color_css );

			// Footer bottom bar link color.
			$footer_bar_link_color     = get_theme_mod( 'elearning_footer_bar_link_color', '#16181a' );
			$footer_bar_link_color_css = array(
				'.tg-site-footer .tg-site-footer-bar a' => array(
					'color' => esc_html( $footer_bar_link_color ),
				),
			);
			$parse_css                .= self::parse_css( '#16181a', $footer_bar_link_color, $footer_bar_link_color_css );

			// Footer bottom bar link hover color.
			$footer_bar_link_hover_color     = get_theme_mod( 'elearning_footer_bar_link_hover_color', '#269bd1' );
			$footer_bar_link_hover_color_css = array(
				'.tg-site-footer .tg-site-footer-bar a:hover, .tg-site-footer .tg-site-footer-bar a:focus' => array(
					'color' => esc_html( $footer_bar_link_hover_color ),
				),
			);
			$parse_css                      .= self::parse_css( '#269bd1', $footer_bar_link_hover_color, $footer_bar_link_hover_color_css );

			// Footer bar border top width.
			$footer_bar_border_top_width     = get_theme_mod( 'elearning_footer_bar_border_top_width', 0 );
			$footer_bar_border_top_width_css = array(
				'.tg-site-footer .tg-site-footer-bar' => array(
					'border-top-width' => esc_html( $footer_bar_border_top_width ) . 'px',
				),
			);
			$parse_css                      .= self::parse_css( 0, $footer_bar_border_top_width, $footer_bar_border_top_width_css );

			// Footer bar border top color.
			$footer_bar_border_top_color     = get_theme_mod( 'elearning_footer_bar_border_top_color', '#e9ecef' );
			$footer_bar_border_top_color_css = array(
				'.tg-site-footer .tg-site-footer-bar' => array(
					'border-top-color' => esc_html( $footer_bar_border_top_color ),
				),
			);
			$parse_css                      .= self::parse_css( '#e9ecef', $footer_bar_border_top_color, $footer_bar_border_top_color_css );

			$scroll_to_top_normal_bg_color     = get_theme_mod( 'elearning_scroll_to_top_bg_color', '#16181a' );
			$scroll_to_top_normal_bg_color_css = array(
				'.tg-scroll-to-top' => array(
					'background-color' => esc_html( $scroll_to_top_normal_bg_color ),
				),
			);
			$parse_css                        .= self::parse_css( '#16181a', $scroll_to_top_normal_bg_color, $scroll_to_top_normal_bg_color_css );

			$scroll_to_top_hover_bg_color     = get_theme_mod( 'elearning_scroll_to_top_bg_hover_color', '#1e7ba6' );
			$scroll_to_top_hover_bg_color_css = array(
				'.tg-scroll-to-top:hover' => array(
					'background-color' => esc_html( $scroll_to_top_hover_bg_color ),
				),
			);
			$parse_css                       .= self::parse_css( '#1e7ba6', $scroll_to_top_hover_bg_color, $scroll_to_top_hover_bg_color_css );

			$scroll_to_top_normal_color     = get_theme_mod( 'elearning_scroll_to_top_color', '#ffffff' );
			$scroll_to_top_normal_color_css = array(
				'.tg-scroll-to-top' => array(
					'color' => esc_html( $scroll_to_top_normal_color ),
				),
			);
			$parse_css                     .= self::parse_css( '#ffffff', $scroll_to_top_normal_color, $scroll_to_top_normal_color_css );

			$scroll_to_top_hover_color     = get_theme_mod( 'elearning_scroll_to_top_hover_color', '#ffffff' );
			$scroll_to_top_hover_color_css = array(
				'.tg-scroll-to-top:hover' => array(
					'color' => esc_html( $scroll_to_top_hover_color ),
				),
			);
			$parse_css                    .= self::parse_css( '#ffffff', $scroll_to_top_hover_color, $scroll_to_top_hover_color_css );

			$parse_css .= $dynamic_css;

			return apply_filters( 'elearning_theme_dynamic_css', $parse_css );
		}

		/**
		 * Parses CSS.
		 *
		 * @param string|array $default_value Default value.
		 * @param string|array $output_value  Updated value.
		 * @param array        $css_output    Array of CSS.
		 * @param string       $min_media     Min Media breakpoint.
		 * @param string       $max_media     Max Media breakpoint.
		 * @return string Generated CSS.
		 */
		public static function parse_css( $default_value, $output_value, $css_output = array(), $min_media = '', $max_media = '' ) {

			// Return if default value matches.
			if ( $default_value === $output_value ) {
				return '';
			}

			$parse_css = '';

			if ( is_array( $css_output ) && count( $css_output ) > 0 ) {

				foreach ( $css_output as $selector => $properties ) {

					if ( null === $properties ) {
						break;
					}

					if ( ! count( $properties ) ) {
						continue;
					}

					$temp_parse_css   = $selector . '{';
					$properties_added = 0;

					foreach ( $properties as $property => $value ) {

						if ( '' === $value ) {
							continue;
						}

						$properties_added ++;
						$temp_parse_css .= $property . ':' . $value . ';';
					}

					$temp_parse_css .= '}';

					if ( $properties_added > 0 ) {
						$parse_css .= $temp_parse_css;
					}
				}

				if ( '' !== $parse_css && ( '' !== $min_media || '' !== $max_media ) ) {

					$media_css       = '@media ';
					$min_media_css   = '';
					$max_media_css   = '';
					$media_separator = '';

					if ( '' !== $min_media ) {
						$min_media_css = 'screen and (min-width:' . $min_media . 'px)';
					}

					if ( '' !== $max_media ) {
						$max_media_css = 'screen and (max-width:' . $max_media . 'px)';
					}

					if ( '' !== $min_media && '' !== $max_media ) {
						$media_separator = ' and ';
					}

					$media_css .= $min_media_css . $media_separator . $max_media_css . '{' . $parse_css . '}';

					return $media_css;
				}
			}

			return $parse_css;
		}

		/**
		 * Returns the background CSS property for dynamic CSS generation.
		 *
		 * @param string|array $default_value Default value.
		 * @param string|array $output_value  Updated value.
		 * @param string       $selector      CSS selector.
		 *
		 * @return string|void Generated CSS for background CSS property.
		 */
		public static function parse_background_css( $default_value, $output_value, $selector ) {

			if ( $default_value === $output_value ) {
				return;
			}

			$parse_css = $selector . '{';

			// For background color.
			if ( isset( $output_value['background-color'] ) && ! empty( $output_value['background-color'] ) && ( $output_value['background-color'] !== $default_value['background-color'] ) ) {
				$parse_css .= 'background-color:' . $output_value['background-color'] . ';';
			}

			// For background image.
			if ( isset( $output_value['background-image'] ) && ! empty( $output_value['background-image'] ) && ( $output_value['background-image'] !== $default_value['background-image'] ) ) {
				$parse_css .= 'background-image:url(' . $output_value['background-image'] . ');';
			}

			// For background position.
			if ( isset( $output_value['background-position'] ) && ! empty( $output_value['background-position'] ) && ( $output_value['background-position'] !== $default_value['background-position'] ) ) {
				$parse_css .= 'background-position:' . $output_value['background-position'] . ';';
			}

			// For background size.
			if ( isset( $output_value['background-size'] ) && ! empty( $output_value['background-size'] ) && ( $output_value['background-size'] !== $default_value['background-size'] ) ) {
				$parse_css .= 'background-size:' . $output_value['background-size'] . ';';
			}

			// For background attachment.
			if ( isset( $output_value['background-attachment'] ) && ! empty( $output_value['background-attachment'] ) && ( $output_value['background-attachment'] !== $default_value['background-attachment'] ) ) {
				$parse_css .= 'background-attachment:' . $output_value['background-attachment'] . ';';
			}

			// For background repeat.
			if ( isset( $output_value['background-repeat'] ) && ! empty( $output_value['background-repeat'] ) && ( $output_value['background-repeat'] !== $default_value['background-repeat'] ) ) {
				$parse_css .= 'background-repeat:' . $output_value['background-repeat'] . ';';
			}

			$parse_css .= '}';

			return $parse_css;
		}

		/**
		 * Returns the typography CSS property for dynamic CSS generation.
		 *
		 * @param string|array $default_value Default value.
		 * @param string|array $output_value  Updated value.
		 * @param string       $selector      CSS selector.
		 * @param array        $devices       Devices for breakpoints.
		 *
		 * @return string|void Generated CSS for typography CSS.
		 */
		public static function parse_typography_css( $default_value, $output_value, $selector, $devices = array() ) {

			if ( $default_value === $output_value ) {
				return;
			}

			$parse_css = $selector . '{';

			// For font family.
			if ( isset( $output_value['font-family'] ) && ! empty( $output_value['font-family'] ) && ( $output_value['font-family'] !== $default_value['font-family'] ) ) {
				$parse_css .= 'font-family:' . $output_value['font-family'] . ';';
			}

			// For font style.
			if ( isset( $output_value['font-style'] ) && ! empty( $output_value['font-style'] ) && ( $output_value['font-style'] !== $default_value['font-style'] ) ) {
				$parse_css .= 'font-style:' . $output_value['font-style'] . ';';
			}

			// For text transform.
			if ( isset( $output_value['text-transform'] ) && ! empty( $output_value['text-transform'] ) && ( $output_value['text-transform'] !== $default_value['text-transform'] ) ) {
				$parse_css .= 'text-transform:' . $output_value['text-transform'] . ';';
			}

			// For text decoration.
			if ( isset( $output_value['text-decoration'] ) && ! empty( $output_value['text-decoration'] ) && ( $output_value['text-decoration'] !== $default_value['text-decoration'] ) ) {
				$parse_css .= 'text-decoration:' . $output_value['text-decoration'] . ';';
			}

			// For font weight.
			if ( isset( $output_value['font-weight'] ) && ! empty( $output_value['font-weight'] ) && ( $output_value['font-weight'] !== $default_value['font-weight'] ) ) {
				$font_weight_value = $output_value['font-weight'];

				if ( 'italic' === $font_weight_value || 'regular' === $font_weight_value ) {
					$parse_css .= 'font-weight:' . 400 . ';';
				} else {
					$parse_css .= 'font-weight:' . str_replace( 'italic', '', $font_weight_value ) . ';';
				}
			}

			// For font size on desktop.
			if ( isset( $output_value['font-size']['desktop'] ) && ! empty( $output_value['font-size']['desktop'] ) && ( $output_value['font-size']['desktop'] !== $default_value['font-size']['desktop'] ) ) {
				$parse_css .= 'font-size:' . $output_value['font-size']['desktop'] . ';';
			}

			// For line height on desktop.
			if ( isset( $output_value['line-height']['desktop'] ) && ! empty( $output_value['line-height']['desktop'] ) && ( $output_value['line-height']['desktop'] !== $default_value['line-height']['desktop'] ) ) {
				$parse_css .= 'line-height:' . $output_value['line-height']['desktop'] . ';';
			}

			// For letter spacing on desktop.
			if ( isset( $output_value['letter-spacing']['desktop'] ) && ! empty( $output_value['letter-spacing']['desktop'] ) && ( $output_value['letter-spacing']['desktop'] !== $default_value['letter-spacing']['desktop'] ) ) {
				$parse_css .= 'letter-spacing:' . $output_value['letter-spacing']['desktop'] . ';';
			}

			$parse_css .= '}';

			// For responsive devices.
			if ( is_array( $devices ) ) {

				foreach ( $devices as $device => $size ) {

					// For tablet devices.
					if ( 'tablet' === $device && $size ) {

						if ( ( isset( $output_value['font-size']['tablet'] ) && ! isset( $output_value['font-size']['tablet'] ) && $output_value['font-size']['tablet'] ) || ( isset( $output_value['line-height']['tablet'] ) && ! empty( $output_value['line-height']['tablet'] ) && $output_value['line-height']['tablet'] ) || ( isset( $output_value['letter-spacing']['tablet'] ) && ! empty( $output_value['letter-spacing']['tablet'] ) && $output_value['letter-spacing']['tablet'] ) ) {
							$parse_css .= '@media(max-width:' . $size . 'px){';
							$parse_css .= $selector . '{';

							// For font size on tablet.
							if ( isset( $output_value['font-size']['tablet'] ) && ! isset( $output_value['font-size']['tablet'] ) && ( $output_value['font-size']['tablet'] !== $default_value['font-size']['tablet'] ) ) {
								$parse_css .= 'font-size:' . $output_value['font-size']['tablet'] . ';';
							}

							// For line height on tablet.
							if ( isset( $output_value['line-height']['tablet'] ) && ! isset( $output_value['line-height']['tablet'] ) && ( $output_value['line-height']['tablet'] !== $default_value['line-height']['tablet'] ) ) {
								$parse_css .= 'line-height:' . $output_value['line-height']['tablet'] . ';';
							}

							// For letter spacing on tablet.
							if ( isset( $output_value['letter-spacing']['tablet'] ) && ! isset( $output_value['letter-spacing']['tablet'] ) && ( $output_value['letter-spacing']['tablet'] !== $default_value['letter-spacing']['tablet'] ) ) {
								$parse_css .= 'letter-spacing:' . $output_value['letter-spacing']['tablet'] . ';';
							}

							$parse_css .= '}';
							$parse_css .= '}';
						}
					}

					// For mobile devices.
					if ( 'mobile' === $device && $size ) {

						if ( ( isset( $output_value['font-size']['mobile'] ) && ! empty( $output_value['font-size']['mobile'] ) && $output_value['font-size']['mobile'] ) || ( isset( $output_value['line-height']['mobile'] ) && ! empty( $output_value['line-height']['mobile'] ) && $output_value['line-height']['mobile'] ) || ( isset( $output_value['letter-spacing']['mobile'] ) && ! empty( $output_value['letter-spacing']['mobile'] ) && $output_value['letter-spacing']['mobile'] ) ) {
							$parse_css .= '@media(max-width:' . $size . 'px){';
							$parse_css .= $selector . '{';

							// For font size on mobile.
							if ( isset( $output_value['font-size']['mobile'] ) && ! empty( $output_value['font-size']['mobile'] ) && ( $output_value['font-size']['mobile'] !== $default_value['font-size']['mobile'] ) ) {
								$parse_css .= 'font-size:' . $output_value['font-size']['mobile'] . ';';
							}

							// For line height on mobile.
							if ( isset( $output_value['line-height']['mobile'] ) && ! empty( $output_value['line-height']['mobile'] ) && ( $output_value['line-height']['mobile'] !== $default_value['line-height']['mobile'] ) ) {
								$parse_css .= 'line-height:' . $output_value['line-height']['mobile'] . ';';
							}

							// For letter spacing on mobile.
							if ( isset( $output_value['letter-spacing']['mobile'] ) && ! empty( $output_value['letter-spacing']['mobile'] ) && ( $output_value['letter-spacing']['mobile'] !== $default_value['letter-spacing']['mobile'] ) ) {
								$parse_css .= 'letter-spacing:' . $output_value['letter-spacing']['mobile'] . ';';
							}

							$parse_css .= '}';
							$parse_css .= '}';
						}
					}
				}
			}

			return $parse_css;
		}

		/**
		 * Returns the dimension ( padding, margin, border-width ) CSS property for dynamic CSS generation.
		 *
		 * @param string|array $default_value Default value.
		 * @param string|array $output_value  Updated value.
		 * @param string       $selector      CSS selector.
		 * @param string       $property      CSS property.
		 *
		 * @return string|void Generated CSS for dimension CSS.
		 */
		public static function parse_dimension_css( $default_value, $output_value, $selector, $property ) {

			if ( $default_value === $output_value ) {
				return;
			}

			$parse_css = $selector . '{';

			if ( isset( $output_value['top'] ) && ! empty( $output_value['top'] ) && ( $output_value['top'] !== $default_value['top'] ) ) {
				$parse_css .= $property . '-top:' . $output_value['top'] . ';';
			}

			if ( isset( $output_value['top'] ) && ! empty( $output_value['top'] ) && ( $output_value['right'] !== $default_value['right'] ) ) {
				$parse_css .= $property . '-right:' . $output_value['right'] . ';';
			}

			if ( isset( $output_value['bottom'] ) && ! empty( $output_value['bottom'] ) && ( $output_value['bottom'] !== $default_value['bottom'] ) ) {
				$parse_css .= $property . '-bottom:' . $output_value['bottom'] . ';';
			}

			if ( isset( $output_value['left'] ) && ! empty( $output_value['left'] ) && ( $output_value['left'] !== $default_value['left'] ) ) {
				$parse_css .= $property . '-left:' . $output_value['left'] . ';';
			}

			$parse_css .= '}';

			return $parse_css;
		}
	}
}
