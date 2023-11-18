<?php
/**
 * Class to register panels and sections for customize options.
 *
 * class eLearning_Customize_Register_Section_Panels
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'elearning_Customize_Register_Section_Panels' ) ) :

	class eLearning_Customize_Register_Section_Panels extends elearning_Customize_Base_Option {

		/**
		 * Include customize options.
		 *
		 * @param array                 $options      Customize options provided via the theme.
		 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return mixed|void Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize ) {

			$configs = array(

				array(
					'name'     => 'elearning_global_panel',
					'type'     => 'panel',
					'title'    => esc_html__( 'Global', 'elearning' ),
					'priority' => 10,
				),

				array(
					'name'     => 'elearning_colors_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Colors', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_base_colors_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Base Colors', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'section'  => 'elearning_colors_section',
					'priority' => 10,
				),

				array(
					'name'     => 'elearning_heading_colors_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Heading Colors', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'section'  => 'elearning_colors_section',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_link_colors_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Link Colors', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'section'  => 'elearning_colors_section',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_background_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Background', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_layout_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Layout', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'priority' => 40,
				),

				array(
					'name'     => 'elearning_container_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Container', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'section'  => 'elearning_layout_section',
					'priority' => 10,
				),

				array(
					'name'     => 'elearning_sidebar_layout_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Sidebar Layout', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'section'  => 'elearning_layout_section',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_typography_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Typography', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'priority' => 50,
				),

				array(
					'name'     => 'elearning_base_typography_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Base Typography', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'section'  => 'elearning_typography_section',
					'priority' => 10,
				),

				array(
					'name'     => 'elearning_headings_typography_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Headings ( H1 - H6 )', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'section'  => 'elearning_typography_section',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_button_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Button', 'elearning' ),
					'panel'    => 'elearning_global_panel',
					'priority' => 60,
				),

				array(
					'name'     => 'elearning_header_panel',
					'type'     => 'panel',
					'title'    => esc_html__( 'Header', 'elearning' ),
					'priority' => 20,
				),

				array(
					'name'     => 'title_tagline',
					'type'     => 'section',
					'title'    => esc_html__( 'Site Identity', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'priority' => 10,
				),

				array(
					'name'     => 'header_image',
					'type'     => 'section',
					'title'    => esc_html__( 'Header Media', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_header_top_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Header Top Bar', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_header_main_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Header Main Area', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'priority' => 40,
				),

				array(
					'name'     => 'elearning_header_button_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Header Button', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'priority' => 50,
				),

				array(
					'name'     => 'elearning_transparent_header_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Transparent Header', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'priority' => 60,
				),

				array(
					'name'     => 'elearning_menu_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Menu', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'priority' => 70,
				),

				array(
					'name'     => 'elearning_primary_menu_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Primary Menu', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'section'  => 'elearning_menu_section',
					'priority' => 10,
				),

				array(
					'name'     => 'elearning_primary_menu_item_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Primary Menu : Menu Item', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'section'  => 'elearning_menu_section',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_primary_menu_dropdown_item_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Primary Menu : Dropdown Item', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'section'  => 'elearning_menu_section',
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_page_header',
					'type'     => 'section',
					'title'    => esc_html__( 'Page Header', 'elearning' ),
					'panel'    => 'elearning_header_panel',
					'priority' => 80,
				),

				array(
					'name'     => 'elearning_content_panel',
					'type'     => 'panel',
					'title'    => esc_html__( 'Content', 'elearning' ),
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_archive_blog_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Blog/Archive', 'elearning' ),
					'panel'    => 'elearning_content_panel',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_single_post_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Single Post', 'elearning' ),
					'panel'    => 'elearning_content_panel',
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_meta_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Meta', 'elearning' ),
					'panel'    => 'elearning_content_panel',
					'priority' => 40,
				),

				array(
					'name'     => 'elearning_sidebar_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Sidebar', 'elearning' ),
					'panel'    => 'elearning_content_panel',
					'priority' => 60,
				),

				array(
					'name'     => 'elearning_footer_panel',
					'type'     => 'panel',
					'title'    => esc_html__( 'Footer', 'elearning' ),
					'priority' => 35,
				),

				array(
					'name'     => 'elearning_footer_widgets_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Footer Widgets', 'elearning' ),
					'panel'    => 'elearning_footer_panel',
					'priority' => 10,
				),

				array(
					'name'     => 'elearning_footer_bottom_bar_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Footer Bottom Bar', 'elearning' ),
					'panel'    => 'elearning_footer_panel',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_footer_scroll_to_top_section',
					'type'     => 'section',
					'title'    => esc_html__( 'Scroll to Top', 'elearning' ),
					'panel'    => 'elearning_footer_panel',
					'priority' => 30,
				),

				array(
					'name'             => 'elearning_panel_separator',
					'type'             => 'section',
					'priority'         => 37,
					'section_callback' => 'elearning_WP_Customize_Separator',
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Register_Section_Panels();
endif;
