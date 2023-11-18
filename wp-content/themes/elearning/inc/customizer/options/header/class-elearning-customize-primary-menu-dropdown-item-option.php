<?php
/**
 * Primary menu dropdown item options.
 *
 * @package    ThemeGrill
 * @subpackage elearning
 * @since      elearning 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== MENU > PRIMARY MENU: DROPDOWN ITEM ==*/
if ( ! class_exists( 'eLearning_Customize_Primary_Menu_Dropdown_Item_Option' ) ) :

	/**
	 * Header button customizer options.
	 */
	class eLearning_Customize_Primary_Menu_Dropdown_Item_Option extends eLearning_Customize_Base_Option {

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
					'name'       => 'elearning_typography_primary_menu_dropdown_item_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Typography', 'elearning' ),
					'section'    => 'elearning_primary_menu_dropdown_item_section',
					'priority'   => 60,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'       => 'elearning_typography_primary_menu_dropdown_item_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Dropdown', 'elearning' ),
					'section'    => 'elearning_primary_menu_dropdown_item_section',
					'priority'   => 70,
					'dependency' => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),

				array(
					'name'        => 'elearning_typography_primary_menu_dropdown_item',
					'default'     => array(
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
					'input_attrs' => array(
						'desktop' => array(
							'font-size'   => array(
								'step' => 0.1,
								'min'  => 0.5,
								'max'  => 3,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'tablet'  => array(
							'font-size'   => array(
								'step' => 0.1,
								'min'  => 0.5,
								'max'  => 3,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'mobile'  => array(
							'font-size'   => array(
								'step' => 0.1,
								'min'  => 0.5,
								'max'  => 3,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
					),
					'type'        => 'sub-control',
					'control'     => 'elearning-typography',
					'parent'      => 'elearning_typography_primary_menu_dropdown_item_group',
					'section'     => 'elearning_primary_menu_dropdown_item_section',
					'transport'   => 'postMessage',
					'priority'    => 75,
					'dependency'  => array(
						'elearning_primary_menu',
						'==',
						false,
					),
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Primary_Menu_Dropdown_Item_Option();
endif;
