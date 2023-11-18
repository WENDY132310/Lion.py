<?php
/**
 * Header button options.
 *
 * @package eLearning
 */

defined( 'ABSPATH' ) || exit;

/*========================================== HEADER > HEADER BUTTON ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Header_Button_Option' ) ) :

	/**
	 * Header main customizer options.
	 */
	class eLearning_Customize_Header_Button_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_header_button_text',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'text',
					'label'    => esc_html__( 'Button Text', 'elearning' ),
					'section'  => 'elearning_header_button_section',
					'priority' => 5,
				),

				array(
					'name'        => 'elearning_header_button_link',
					'default'     => '',
					'type'        => 'control',
					'control'     => 'text',
					'label'       => esc_html__( 'Button Link', 'elearning' ),
					'section'     => 'elearning_header_button_section',
					'priority'    => 10,
					'input_attrs' => array(
						'placeholder' => esc_attr__( 'https://example.com', 'elearning' ),
					),
				),

				array(
					'name'     => 'elearning_header_button_target',
					'default'  => false,
					'type'     => 'control',
					'control'  => 'elearning-toggle',
					'label'    => esc_html__( 'Open link in a new tab', 'elearning' ),
					'section'  => 'elearning_header_button_section',
					'priority' => 15,
				),

				array(
					'name'     => 'elearning_header_button_dimensions_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Dimensions', 'elearning' ),
					'section'  => 'elearning_header_button_section',
					'priority' => 20,
				),

				array(
					'name'      => 'elearning_header_button_padding',
					'default'   => array(
						'top'    => '5px',
						'right'  => '10px',
						'bottom' => '5px',
						'left'   => '10px',
					),
					'type'      => 'control',
					'control'   => 'elearning-dimensions',
					'label'     => esc_html__( 'Padding', 'elearning' ),
					'section'   => 'elearning_header_button_section',
					'transport' => 'postMessage',
					'priority'  => 25,
				),

				array(
					'name'     => 'elearning_header_button_color_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Colors', 'elearning' ),
					'section'  => 'elearning_header_button_section',
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_header_button_text_color_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Text Color', 'elearning' ),
					'section'  => 'elearning_header_button_section',
					'priority' => 35,
				),

				array(
					'name'      => 'elearning_header_button_text_color',
					'default'   => '#ffffff',
					'type'      => 'sub-control',
					'control'   => 'elearning-color',
					'parent'    => 'elearning_header_button_text_color_group',
					'tab'       => esc_html__( 'Normal', 'elearning' ),
					'section'   => 'elearning_header_button_section',
					'transport' => 'postMessage',
					'priority'  => 40,
				),

				array(
					'name'      => 'elearning_header_button_text_hover_color',
					'default'   => '#ffffff',
					'type'      => 'sub-control',
					'control'   => 'elearning-color',
					'parent'    => 'elearning_header_button_text_color_group',
					'tab'       => esc_html__( 'Hover', 'elearning' ),
					'section'   => 'elearning_header_button_section',
					'transport' => 'postMessage',
					'priority'  => 45,
				),

				array(
					'name'     => 'elearning_header_button_bg_color_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Background Color', 'elearning' ),
					'section'  => 'elearning_header_button_section',
					'priority' => 50,
				),

				array(
					'name'      => 'elearning_header_button_bg_color',
					'default'   => '#269bd1',
					'type'      => 'sub-control',
					'control'   => 'elearning-color',
					'parent'    => 'elearning_header_button_bg_color_group',
					'tab'       => esc_html__( 'Normal', 'elearning' ),
					'section'   => 'elearning_header_button_section',
					'transport' => 'postMessage',
					'priority'  => 55,
				),

				array(
					'name'      => 'elearning_header_button_bg_hover_color',
					'default'   => '#1e7ba6',
					'type'      => 'sub-control',
					'control'   => 'elearning-color',
					'parent'    => 'elearning_header_button_bg_color_group',
					'tab'       => esc_html__( 'Hover', 'elearning' ),
					'section'   => 'elearning_header_button_section',
					'transport' => 'postMessage',
					'priority'  => 60,
				),

				array(
					'name'     => 'elearning_header_button_border_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Border', 'elearning' ),
					'section'  => 'elearning_header_button_section',
					'priority' => 80,
				),

				array(
					'name'        => 'elearning_header_button_roundness',
					'default'     => 0,
					'suffix'      => 'px',
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'label'       => esc_html__( 'Roundness', 'elearning' ),
					'section'     => 'elearning_header_button_section',
					'transport'   => 'postMessage',
					'priority'    => 85,
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 30,
						'step' => 1,
					),
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Header_Button_Option();
endif;
