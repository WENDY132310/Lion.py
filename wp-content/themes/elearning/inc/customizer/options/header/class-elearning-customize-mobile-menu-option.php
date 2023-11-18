<?php
/**
 * Mobile Menu Options.
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== MENU > MOBILE MENU ==*/
if ( ! class_exists( 'eLearning_Customize_Mobile_Menu_Option' ) ) :

	/**
	 * Header button customizer options.
	 */
	class eLearning_Customize_Mobile_Menu_Option extends eLearning_Customize_Base_Option {

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
					'name'       => 'elearning_typography_mobile_menu_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Typography', 'elearning' ),
					'section'    => 'elearning_mobile_menu_section',
					'priority'   => 200,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'       => 'elearning_typography_mobile_menu_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Mobile Menu', 'elearning' ),
					'section'    => 'elearning_mobile_menu_section',
					'priority'   => 205,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'       => 'elearning_typography_mobile_menu',
					'default'    => array(
						'font-family'    => 'default',
						'font-weight'    => '400',
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
					'type'       => 'sub-control',
					'control'    => 'elearning-typography',
					'parent'     => 'elearning_typography_mobile_menu_group',
					'section'    => 'elearning_mobile_menu_section',
					'transport'  => 'postMessage',
					'priority'   => 205,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Mobile_Menu_Option();
endif;
