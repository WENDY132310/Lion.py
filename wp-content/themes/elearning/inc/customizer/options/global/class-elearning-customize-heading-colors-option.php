<?php
/**
 * Heading Colors.
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== COLORS > HEADING COLORS ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Heading_Colors_Option' ) ) :

	/**
	 * Link option.
	 */
	class eLearning_Customize_Heading_Colors_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_heading_color',
					'default'  => '#16181a',
					'type'     => 'control',
					'control'  => 'elearning-color',
					'label'    => esc_html__( 'Heading Color ( H1 - H6 )', 'elearning' ),
					'section'  => 'elearning_heading_colors_section',
					'priority' => 10,
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Heading_Colors_Option();
endif;
