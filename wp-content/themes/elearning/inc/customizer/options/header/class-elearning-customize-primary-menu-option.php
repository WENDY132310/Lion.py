<?php
/**
 * Primary menu.
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== MENU > PRIMARY MENU ==*/
if ( ! class_exists( 'eLearning_Customize_Primary_Menu_Option' ) ) :

	/**
	 * Primary Menu option.
	 */
	class eLearning_Customize_Primary_Menu_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_primary_menu',
					'default'  => false,
					'type'     => 'control',
					'control'  => 'elearning-toggle',
					'label'    => esc_html__( 'Disable Primary Menu', 'elearning' ),
					'section'  => 'elearning_primary_menu_section',
					'priority' => 10,
				),

				array(
					'name'       => 'elearning_primary_menu_extra',
					'default'    => false,
					'type'       => 'control',
					'control'    => 'elearning-toggle',
					'label'      => esc_html__( 'Keep Menu Items on One Line', 'elearning' ),
					'section'    => 'elearning_primary_menu_section',
					'priority'   => 20,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'       => 'elearning_primary_menu_border_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Border Bottom', 'elearning' ),
					'section'    => 'elearning_primary_menu_section',
					'priority'   => 80,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'        => 'elearning_primary_menu_border_bottom_size',
					'default'     => 0,
					'suffix'      => 'px',
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'label'       => esc_html__( 'Size', 'elearning' ),
					'section'     => 'elearning_primary_menu_section',
					'transport'   => 'postMessage',
					'priority'    => 90,
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 20,
						'step' => 1,
					),
					'dependency'  => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'       => 'elearning_primary_menu_border_bottom_color',
					'default'    => '#e9ecef',
					'type'       => 'control',
					'control'    => 'elearning-color',
					'label'      => esc_html__( 'Color', 'elearning' ),
					'section'    => 'elearning_primary_menu_section',
					'transport'  => 'postMessage',
					'priority'   => 100,
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
	new eLearning_Customize_Primary_Menu_Option();
endif;
