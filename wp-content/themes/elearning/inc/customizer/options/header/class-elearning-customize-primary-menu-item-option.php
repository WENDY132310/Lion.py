<?php
/**
 * Primary menu item.
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*============================ MENU > PRIMARY MENU ITEM ============================*/
if ( ! class_exists( 'eLearning_Customize_Primary_Menu_Item_Option' ) ) :

	/**
	 * Primary Menu option.
	 */
	class eLearning_Customize_Primary_Menu_Item_Option extends eLearning_Customize_Base_Option {

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
					'name'            => 'elearning_primary_menu_text_active_effect',
					'default'         => 'tg-primary-menu--style-underline',
					'type'            => 'control',
					'control'         => 'select',
					'label'           => esc_html__( 'Active Menu Item Style', 'elearning' ),
					'choices'         => array(
						'tg-primary-menu--style-none'      => esc_html__( 'None', 'elearning' ),
						'tg-primary-menu--style-underline' => esc_html__( 'Underline Border', 'elearning' ),
						'tg-primary-menu--style-left-border' => esc_html__( 'Left Border', 'elearning' ),
						'tg-primary-menu--style-right-border' => esc_html__( 'Right Border', 'elearning' ),
					),
					'section'         => 'elearning_primary_menu_item_section',
					'priority'        => 20,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'elearning_primary_menu_item_style', 'default' ) && ! get_theme_mod( 'elearning_primary_menu', false ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'       => 'elearning_primary_menu_item_colors_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Colors', 'elearning' ),
					'section'    => 'elearning_primary_menu_item_section',
					'priority'   => 50,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'            => 'elearning_primary_menu_text_color_group',
					'type'            => 'control',
					'control'         => 'elearning-group',
					'label'           => esc_html__( 'Menu Item', 'elearning' ),
					'section'         => 'elearning_primary_menu_item_section',
					'priority'        => 55,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'elearning_primary_menu_item_style', 'default' ) && ! get_theme_mod( 'elearning_primary_menu', false ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'            => 'elearning_primary_menu_text_color',
					'default'         => '',
					'type'            => 'sub-control',
					'control'         => 'elearning-color',
					'parent'          => 'elearning_primary_menu_text_color_group',
					'tab'             => esc_html__( 'Normal', 'elearning' ),
					'section'         => 'elearning_primary_menu_item_section',
					'transport'       => 'postMessage',
					'priority'        => 55,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'elearning_primary_menu_item_style', 'default' ) && ! get_theme_mod( 'elearning_primary_menu', false ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'            => 'elearning_primary_menu_text_hover_color',
					'default'         => '',
					'type'            => 'sub-control',
					'control'         => 'elearning-color',
					'parent'          => 'elearning_primary_menu_text_color_group',
					'tab'             => esc_html__( 'Hover', 'elearning' ),
					'section'         => 'elearning_primary_menu_item_section',
					'transport'       => 'postMessage',
					'priority'        => 55,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'elearning_primary_menu_item_style', 'default' ) && ! get_theme_mod( 'elearning_primary_menu', false ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'            => 'elearning_primary_menu_text_active_color',
					'default'         => '',
					'type'            => 'sub-control',
					'control'         => 'elearning-color',
					'parent'          => 'elearning_primary_menu_text_color_group',
					'tab'             => esc_html__( 'Active', 'elearning' ),
					'section'         => 'elearning_primary_menu_item_section',
					'transport'       => 'postMessage',
					'priority'        => 55,
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'elearning_primary_menu_item_style', 'default' ) && ! get_theme_mod( 'elearning_primary_menu', false ) ) {
							return true;
						}

						return false;
					},
				),

				array(
					'name'       => 'elearning_typography_primary_menu_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Typography', 'elearning' ),
					'section'    => 'elearning_primary_menu_item_section',
					'priority'   => 115,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'       => 'elearning_typography_primary_menu_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Primary Menu', 'elearning' ),
					'section'    => 'elearning_primary_menu_item_section',
					'priority'   => 120,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'        => 'elearning_typography_primary_menu',
					'default'     => array(
						'font-family'    => 'default',
						'font-weight'    => 'regular',
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
					),
					'input_attrs' => array(
						'desktop' => array(
							'font-size'   => array(
								'step' => 0.1,
								'min'  => 0.5,
								'max'  => 3,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'tablet'  => array(
							'font-size'   => array(
								'step' => 0.1,
								'min'  => 0.5,
								'max'  => 3,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'mobile'  => array(
							'font-size'   => array(
								'step' => 0.1,
								'min'  => 0.5,
								'max'  => 3,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
					),
					'type'        => 'sub-control',
					'control'     => 'elearning-typography',
					'parent'      => 'elearning_typography_primary_menu_group',
					'section'     => 'elearning_primary_menu_item_section',
					'transport'   => 'postMessage',
					'priority'    => 120,
					'dependency'  => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Primary_Menu_Item_Option();
endif;
