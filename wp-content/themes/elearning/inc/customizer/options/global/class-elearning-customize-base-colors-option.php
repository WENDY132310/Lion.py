<?php
/**
 * Base Colors.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== COLORS > BASE COLORS ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Base_Colors_Option' ) ) :

	/**
	 * Base option.
	 */
	class eLearning_Customize_Base_Colors_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_base_color_primary',
					'default'  => '#269bd1',
					'type'     => 'control',
					'control'  => 'elearning-color',
					'label'    => esc_html__( 'Primary Color', 'elearning' ),
					'section'  => 'elearning_base_colors_section',
					'priority' => 5,
				),

				array(
					'name'     => 'elearning_base_color_text',
					'default'  => '#51585f',
					'type'     => 'control',
					'control'  => 'elearning-color',
					'label'    => esc_html__( 'Text Color', 'elearning' ),
					'section'  => 'elearning_base_colors_section',
					'priority' => 20,
				),

				array(
					'name'     => 'elearning_base_color_border',
					'default'  => '#e9ecef',
					'type'     => 'control',
					'control'  => 'elearning-color',
					'label'    => esc_html__( 'Border Color', 'elearning' ),
					'section'  => 'elearning_base_colors_section',
					'priority' => 30,
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Base_Colors_Option();
endif;
