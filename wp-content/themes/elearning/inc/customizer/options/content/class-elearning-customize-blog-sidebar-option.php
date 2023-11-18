<?php
/**
 * Sidebar options.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Customize_Blog_Sidebar_Option' ) ) :

	/**
	 * Sidebar options.
	 */
	class eLearning_Customize_Blog_Sidebar_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_typography_widget_title_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Typography', 'elearning' ),
					'section'  => 'elearning_sidebar_section',
					'priority' => 70,
				),

				array(
					'name'     => 'elearning_typography_widget_heading_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Title', 'elearning' ),
					'section'  => 'elearning_sidebar_section',
					'priority' => 75,
				),

				array(
					'name'        => 'elearning_typography_widget_heading',
					'default'     => apply_filters(
						'elearning_typography_widget_heading_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => '1.2rem',
								'tablet'  => '',
								'mobile'  => '',
							),
							'line-height'    => array(
								'desktop' => '1.3',
								'tablet'  => '',
								'mobile'  => '',
							),
							'font-style'     => 'normal',
							'text-transform' => 'none',
						)
					),
					'input_attrs' => array(
						'desktop' => array(
							'font-size'   => array(
								'step' => 0.1,
								'min'  => 0.5,
								'max'  => 4,
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
								'max'  => 2,
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
					'parent'      => 'elearning_typography_widget_heading_group',
					'section'     => 'elearning_sidebar_section',
					'transport'   => 'postMessage',
					'priority'    => 75,
				),

				array(
					'name'     => 'elearning_typography_widget_content_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Content', 'elearning' ),
					'section'  => 'elearning_sidebar_section',
					'priority' => 80,
				),

				array(
					'name'        => 'elearning_typography_widget_content',
					'default'     => apply_filters(
						'elearning_typography_widget_content_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '400',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => '15px',
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
						)
					),
					'input_attrs' => array(
						'desktop' => array(
							'font-size'   => array(
								'step' => 1,
								'min'  => 14,
								'max'  => 40,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'tablet'  => array(
							'font-size'   => array(
								'step' => 1,
								'min'  => 14,
								'max'  => 40,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'mobile'  => array(
							'font-size'   => array(
								'step' => 1,
								'min'  => 14,
								'max'  => 40,
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
					'parent'      => 'elearning_typography_widget_content_group',
					'section'     => 'elearning_sidebar_section',
					'transport'   => 'postMessage',
					'priority'    => 80,
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Blog_Sidebar_Option();
endif;
