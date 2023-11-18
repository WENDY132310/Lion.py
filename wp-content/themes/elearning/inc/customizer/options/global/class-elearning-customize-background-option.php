<?php
/**
 * Background options.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== BACKGROUND ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Background_Option' ) ) :

	/**
	 * General option.
	 */
	class eLearning_Customize_Background_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_inside_container_background_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Inside Container', 'elearning' ),
					'section'  => 'elearning_background_section',
					'priority' => 5,
				),

				array(
					'name'      => 'elearning_inside_container_background',
					'default'   => array(
						'background-color'      => '#ffffff',
						'background-image'      => '',
						'background-position'   => 'center center',
						'background-size'       => 'auto',
						'background-attachment' => 'scroll',
						'background-repeat'     => 'repeat',
					),
					'type'      => 'control',
					'control'   => 'elearning-background',
					'section'   => 'elearning_background_section',
					'transport' => 'postMessage',
					'priority'  => 10,
				),

				array(
					'name'     => 'elearning_outside_container_background_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Outside Container', 'elearning' ),
					'section'  => 'elearning_background_section',
					'priority' => 15,
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Background_Option();
endif;
