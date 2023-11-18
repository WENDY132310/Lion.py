<?php
/**
 * Link Colors.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== COLORS > LINK COLORS ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Link_Colors_Option' ) ) :

	/**
	 * Link option.
	 */
	class eLearning_Customize_Link_Colors_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_link_color_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Link Colors', 'elearning' ),
					'section'  => 'elearning_link_colors_section',
					'priority' => 5,
				),

				array(
					'name'     => 'elearning_link_color',
					'default'  => '#269bd1',
					'type'     => 'control',
					'control'  => 'elearning-color',
					'label'    => esc_html__( 'Normal', 'elearning' ),
					'section'  => 'elearning_link_colors_section',
					'priority' => 10,
				),

				array(
					'name'     => 'elearning_link_hover_color',
					'default'  => '#1e7ba6',
					'type'     => 'control',
					'control'  => 'elearning-color',
					'label'    => esc_html__( 'Hover', 'elearning' ),
					'section'  => 'elearning_link_colors_section',
					'priority' => 15,
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Link_Colors_Option();
endif;
