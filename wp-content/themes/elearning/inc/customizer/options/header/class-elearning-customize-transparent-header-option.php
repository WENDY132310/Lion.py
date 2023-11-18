<?php
/**
 * Transparent header options.
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Customize_Transparent_Header_Option' ) ) :

	/**
	 * Transparent Header customizer options.
	 */
	class eLearning_Customize_Transparent_Header_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_transparent_header',
					'default'  => false,
					'type'     => 'control',
					'control'  => 'elearning-toggle',
					'label'    => esc_html__( 'Enable Transparent Header', 'elearning' ),
					'section'  => 'elearning_transparent_header_section',
					'priority' => 10,
				),

				array(
					'name'       => 'elearning_transparent_header_custom',
					'default'    => false,
					'type'       => 'control',
					'control'    => 'elearning-toggle',
					'label'      => esc_html__( 'Enable on 404, Search and Archive Pages', 'elearning' ),
					'section'    => 'elearning_transparent_header_section',
					'priority'   => 20,
					'dependency' => array(
						'elearning_transparent_header',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_transparent_header_latest_posts',
					'default'    => false,
					'type'       => 'control',
					'control'    => 'elearning-toggle',
					'label'      => esc_html__( 'Enable on Front Page (Latest Posts)', 'elearning' ),
					'section'    => 'elearning_transparent_header_section',
					'priority'   => 30,
					'dependency' => array(
						'elearning_transparent_header',
						'==',
						true,
					),
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Transparent_Header_Option();
endif;
