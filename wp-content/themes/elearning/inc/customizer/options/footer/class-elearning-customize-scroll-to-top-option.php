<?php
/**
 * Scroll to top styling.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== STYLING >  SCROLL TO TOP  ==*/
if ( ! class_exists( 'eLearning_Customize_Scroll_To_Top_Option' ) ) :

	/**
	 * Scroll_To_Top option.
	 */
	class eLearning_Customize_Scroll_To_Top_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_scroll_to_top',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'elearning-toggle',
					'label'    => esc_html__( 'Enable Scroll to Top', 'elearning' ),
					'section'  => 'elearning_footer_scroll_to_top_section',
					'priority' => 10,
				),

				array(
					'name'       => 'elearning_scroll_to_top_color_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Colors', 'elearning' ),
					'section'    => 'elearning_footer_scroll_to_top_section',
					'priority'   => 55,
					'dependency' => array(
						'elearning_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_scroll_to_top_bg_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Background', 'elearning' ),
					'section'    => 'elearning_footer_scroll_to_top_section',
					'priority'   => 60,
					'dependency' => array(
						'elearning_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_scroll_to_top_bg_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_scroll_to_top_bg_color_group',
					'tab'        => esc_html__( 'Normal', 'elearning' ),
					'section'    => 'elearning_footer_scroll_to_top_section',
					'transport'  => 'postMessage',
					'priority'   => 60,
					'dependency' => array(
						'elearning_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_scroll_to_top_bg_hover_color',
					'default'    => '#1e7ba6',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_scroll_to_top_bg_color_group',
					'tab'        => esc_html__( 'Hover', 'elearning' ),
					'section'    => 'elearning_footer_scroll_to_top_section',
					'transport'  => 'postMessage',
					'priority'   => 60,
					'dependency' => array(
						'elearning_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_scroll_to_top_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Icon', 'elearning' ),
					'section'    => 'elearning_footer_scroll_to_top_section',
					'priority'   => 65,
					'dependency' => array(
						'elearning_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_scroll_to_top_color',
					'default'    => '#ffffff',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_scroll_to_top_color_group',
					'transport'  => 'postMessage',
					'tab'        => esc_html__( 'Normal', 'elearning' ),
					'section'    => 'elearning_footer_scroll_to_top_section',
					'priority'   => 65,
					'dependency' => array(
						'elearning_scroll_to_top',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_scroll_to_top_hover_color',
					'default'    => '#ffffff',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_scroll_to_top_color_group',
					'tab'        => esc_html__( 'Hover', 'elearning' ),
					'section'    => 'elearning_footer_scroll_to_top_section',
					'transport'  => 'postMessage',
					'priority'   => 65,
					'dependency' => array(
						'elearning_scroll_to_top',
						'==',
						true,
					),
				),

			);

			return array_merge( $options, $configs );
		}

	}
	new eLearning_Customize_Scroll_To_Top_Option();
endif;
