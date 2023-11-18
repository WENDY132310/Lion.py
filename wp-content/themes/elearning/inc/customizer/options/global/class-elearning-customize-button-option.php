<?php
/**
 * Button.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== STYLING >  BUTTON ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Button_Option' ) ) :

	/**
	 * Button option.
	 */
	class eLearning_Customize_Button_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_button_dimensions_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Dimensions', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 5,
				),

				array(
					'name'     => 'elearning_button_padding',
					'default'  => array(
						'top'    => '10px',
						'right'  => '15px',
						'bottom' => '10px',
						'left'   => '15px',
					),
					'type'     => 'control',
					'control'  => 'elearning-dimensions',
					'label'    => esc_html__( 'Padding', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 10,
				),

				array(
					'name'     => 'elearning_button_color_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Colors', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_button_text_color_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Text Color', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 25,
				),

				array(
					'name'     => 'elearning_button_text_color',
					'default'  => '#ffffff',
					'type'     => 'sub-control',
					'control'  => 'elearning-color',
					'parent'   => 'elearning_button_text_color_group',
					'tab'      => esc_html__( 'Normal', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 25,
				),

				array(
					'name'     => 'elearning_button_text_hover_color',
					'default'  => '#ffffff',
					'type'     => 'sub-control',
					'control'  => 'elearning-color',
					'parent'   => 'elearning_button_text_color_group',
					'tab'      => esc_html__( 'Hover', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 25,
				),

				array(
					'name'     => 'elearning_button_bg_color_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Background', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_button_bg_color',
					'default'  => '#269bd1',
					'type'     => 'sub-control',
					'control'  => 'elearning-color',
					'parent'   => 'elearning_button_bg_color_group',
					'tab'      => esc_html__( 'Normal', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_button_bg_hover_color',
					'default'  => '#1e7ba6',
					'type'     => 'sub-control',
					'control'  => 'elearning-color',
					'parent'   => 'elearning_button_bg_color_group',
					'tab'      => esc_html__( 'Hover', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_button_border_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Border', 'elearning' ),
					'section'  => 'elearning_button_section',
					'priority' => 35,
				),

				array(
					'name'        => 'elearning_button_roundness',
					'default'     => 0,
					'suffix'      => 'px',
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'label'       => esc_html__( 'Roundness', 'elearning' ),
					'section'     => 'elearning_button_section',
					'priority'    => 40,
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 20,
						'step' => 1,
					),
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Button_Option();
endif;
