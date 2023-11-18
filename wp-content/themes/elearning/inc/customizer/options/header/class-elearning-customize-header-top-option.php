<?php
/**
 * Header top options.
 *
 * @package eLearning
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Customize_Header_Top_Option' ) ) :

	/**
	 * Header top customizer options.
	 */
	class eLearning_Customize_Header_Top_Option extends eLearning_Customize_Base_Option {

		/**
		 * Include customize options.
		 *
		 * @param array                 $options      Customize options provided via the theme.
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return array|array[] Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize ) {

			$configs = array(

				array(
					'name'     => 'elearning_header_top',
					'default'  => false,
					'type'     => 'control',
					'control'  => 'elearning-toggle',
					'label'    => esc_html__( 'Enable Header Top Bar', 'elearning' ),
					'section'  => 'elearning_header_top_section',
					'priority' => 5,
				),

				array(
					'name'       => 'elearning_header_top_left_content_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Left Content', 'elearning' ),
					'section'    => 'elearning_header_top_section',
					'priority'   => 50,
					'dependency' => array(
						'elearning_header_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_header_top_left_content',
					'default'    => 'text_html',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'elearning_header_top_section',
					'choices'    => array(
						'none'      => esc_html__( 'None', 'elearning' ),
						'text_html' => esc_html__( 'Text/HTML', 'elearning' ),
						'menu'      => esc_html__( 'Menu', 'elearning' ),
						'widget'    => esc_html__( 'Widget', 'elearning' ),
					),
					'priority'   => 55,
					'dependency' => array(
						'elearning_header_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_header_top_left_content_html',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'elearning-editor',
					'section'    => 'elearning_header_top_section',
					'transport'  => 'postMessage',
					'partial'    => array(
						'selector'        => '.tg-header-top-left-content',
						'render_callback' => 'Elearning_Customizer_Partials::customize_partial_header_top_left_content_html',
					),
					'label'      => esc_html__( 'Text/HTML for Left Content', 'elearning' ),
					'priority'   => 60,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_header_top',
								'==',
								true,
							),
							array(
								'elearning_header_top_left_content',
								'==',
								'text_html',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_header_top_left_content_menu',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'elearning_header_top_section',
					'label'      => esc_html__( 'Select a Menu for Left Content', 'elearning' ),
					'choices'    => eLearning_Utils::get_menus(),
					'priority'   => 65,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_header_top',
								'==',
								true,
							),
							array(
								'elearning_header_top_left_content',
								'==',
								'menu',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_header_top_right_content_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Right Content', 'elearning' ),
					'section'    => 'elearning_header_top_section',
					'priority'   => 75,
					'dependency' => array(
						'elearning_header_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_header_top_right_content',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'elearning_header_top_section',
					'choices'    => array(
						'none'      => esc_html__( 'None', 'elearning' ),
						'text_html' => esc_html__( 'Text/HTML', 'elearning' ),
						'menu'      => esc_html__( 'Menu', 'elearning' ),
						'widget'    => esc_html__( 'Widget', 'elearning' ),
					),
					'priority'   => 80,
					'dependency' => array(
						'elearning_header_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_header_top_right_content_html',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'elearning-editor',
					'section'    => 'elearning_header_top_section',
					'transport'  => 'postMessage',
					'partial'    => array(
						'selector'        => '.tg-header-top-right-content',
						'render_callback' => 'Elearning_Customizer_Partials::customize_partial_header_top_right_content_html',
					),
					'label'      => esc_html__( 'Text/HTML for Right Content', 'elearning' ),
					'priority'   => 85,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_header_top',
								'==',
								true,
							),
							array(
								'elearning_header_top_right_content',
								'==',
								'text_html',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_header_top_right_content_menu',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'elearning_header_top_section',
					'label'      => esc_html__( 'Select a Menu for Right Content', 'elearning' ),
					'choices'    => eLearning_Utils::get_menus(),
					'priority'   => 90,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_header_top',
								'==',
								true,
							),
							array(
								'elearning_header_top_right_content',
								'==',
								'menu',
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_header_top_colors_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Colors', 'elearning' ),
					'section'    => 'elearning_header_top_section',
					'priority'   => 115,
					'dependency' => array(
						'elearning_header_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_header_top_text_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Text', 'elearning' ),
					'section'    => 'elearning_header_top_section',
					'priority'   => 120,
					'dependency' => array(
						'elearning_header_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_header_top_text_color',
					'default'    => '#51585f',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_header_top_text_group',
					'section'    => 'elearning_header_top_section',
					'transport'  => 'postMessage',
					'priority'   => 120,
					'dependency' => array(
						'elearning_header_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_header_top_bg_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Background', 'elearning' ),
					'section'    => 'elearning_header_top_section',
					'priority'   => 135,
					'dependency' => array(
						'elearning_header_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_header_top_bg',
					'default'    => array(
						'background-color'      => '#e9ecef',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'contain',
						'background-attachment' => 'scroll',
					),
					'type'       => 'sub-control',
					'control'    => 'elearning-background',
					'section'    => 'elearning_header_top_section',
					'parent'     => 'elearning_header_top_bg_group',
					'transport'  => 'postMessage',
					'priority'   => 135,
					'dependency' => array(
						'elearning_header_top',
						'==',
						true,
					),
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Header_Top_Option();
endif;
