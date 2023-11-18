<?php
/**
 * Header main options.
 *
 * @package eLearning
 */

defined( 'ABSPATH' ) || exit;

/*========================================== HEADER > HEADER MAIN ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Header_Main_Option' ) ) :

	/**
	 * Header main customizer options.
	 */
	class eLearning_Customize_Header_Main_Option extends eLearning_Customize_Base_Option {

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
					'name'       => 'elearning_header_main_style',
					'default'    => 'tg-site-header--left',
					'type'       => 'control',
					'control'    => 'elearning-radio-image',
					'label'      => esc_html__( 'Style', 'elearning' ),
					'section'    => 'elearning_header_main_section',
					'transport'  => 'postMessage',
					'priority'   => 20,
					'choices'    => apply_filters(
						'elearning_header_main_style_choices',
						array(
							'tg-site-header--left'   => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/header-left.png',
							),
							'tg-site-header--center' => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/header-center.png',
							),
							'tg-site-header--right'  => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/header-right.png',
							),
						)
					),
					'image_col'  => 2,
					'dependency' => apply_filters(
						'elearning_header_main_style_cb',
						array()
					),
				),

				array(
					'name'     => 'elearning_search_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Search', 'elearning' ),
					'section'  => 'elearning_header_main_section',
					'priority' => 60,
				),

				array(
					'name'     => 'elearning_header_search',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'elearning-toggle',
					'label'    => esc_html__( 'Enable Search Icon', 'elearning' ),
					'section'  => 'elearning_header_main_section',
					'priority' => 65,
				),

				array(
					'name'     => 'elearning_header_main_colors_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Colors', 'elearning' ),
					'section'  => 'elearning_header_main_section',
					'priority' => 105,
				),

				array(
					'name'      => 'elearning_header_main_bg',
					'default'   => array(
						'background-color'      => '#ffffff',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'contain',
						'background-attachment' => 'scroll',
					),
					'type'      => 'control',
					'control'   => 'elearning-background',
					'section'   => 'elearning_header_main_section',
					'transport' => 'postMessage',
					'priority'  => 110,
				),

				array(
					'name'     => 'elearning_header_main_border_bottom_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Border Bottom', 'elearning' ),
					'section'  => 'elearning_header_main_section',
					'priority' => 115,
				),

				array(
					'name'        => 'elearning_header_main_border_bottom_size',
					'default'     => 1,
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'suffix'      => 'px',
					'label'       => esc_html__( 'Size', 'elearning' ),
					'section'     => 'elearning_header_main_section',
					'transport'   => 'postMessage',
					'priority'    => 120,
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 20,
						'step' => 1,
					),
				),

				array(
					'name'      => 'elearning_header_main_border_bottom_color',
					'default'   => '#e9ecef',
					'type'      => 'control',
					'control'   => 'elearning-color',
					'label'     => esc_html__( 'Color', 'elearning' ),
					'section'   => 'elearning_header_main_section',
					'transport' => 'postMessage',
					'priority'  => 125,
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Header_Main_Option();
endif;
