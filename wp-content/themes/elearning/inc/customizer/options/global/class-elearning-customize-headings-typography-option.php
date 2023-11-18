<?php
/**
 * Typography.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== TYPOGRAPHY > HEADINGS ( H1 - H6 ) ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Headings_Typography_Option' ) ) :

	/**
	 * Typography option.
	 */
	class eLearning_Customize_Headings_Typography_Option extends eLearning_Customize_Base_Option {

		/**
		 * Include customize options.
		 *
		 * @param array $options Customize options provided via the theme.
		 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return mixed|void Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize ) {

			$configs = array(

				array(
					'name'     => 'elearning_typography_h1_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'H1', 'elearning' ),
					'section'  => 'elearning_headings_typography_section',
					'priority' => 5,
				),

				array(
					'name'        => 'elearning_typography_h1',
					'default'     => apply_filters(
						'elearning_typography_h1_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => '2.5rem',
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
								'min'  => 1,
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
								'min'  => 1,
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
								'min'  => 1,
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
					'parent'      => 'elearning_typography_h1_group',
					'section'     => 'elearning_headings_typography_section',
					'transport'   => 'postMessage',
					'priority'    => 5,
				),

				array(
					'name'     => 'elearning_typography_h2_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'H2', 'elearning' ),
					'section'  => 'elearning_headings_typography_section',
					'priority' => 10,
				),

				array(
					'name'        => 'elearning_typography_h2',
					'default'     => apply_filters(
						'elearning_typography_h2_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => '2.25rem',
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
								'min'  => 1,
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
								'min'  => 1,
								'max'  => 4,
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
								'min'  => 1,
								'max'  => 4,
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
					'parent'      => 'elearning_typography_h2_group',
					'section'     => 'elearning_headings_typography_section',
					'transport'   => 'postMessage',
					'priority'    => 10,
				),

				array(
					'name'     => 'elearning_typography_h3_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'H3', 'elearning' ),
					'section'  => 'elearning_headings_typography_section',
					'priority' => 15,
				),

				array(
					'name'        => 'elearning_typography_h3',
					'default'     => apply_filters(
						'elearning_typography_h3_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => '2rem',
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
								'min'  => 1,
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
								'min'  => 1,
								'max'  => 4,
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
								'min'  => 1,
								'max'  => 4,
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
					'parent'      => 'elearning_typography_h3_group',
					'section'     => 'elearning_headings_typography_section',
					'transport'   => 'postMessage',
					'priority'    => 15,
				),

				array(
					'name'     => 'elearning_typography_h4_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'H4', 'elearning' ),
					'section'  => 'elearning_headings_typography_section',
					'priority' => 20,
				),

				array(
					'name'        => 'elearning_typography_h4',
					'default'     => apply_filters(
						'elearning_typography_h4_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => '1.75rem',
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
								'min'  => 1,
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
								'min'  => 1,
								'max'  => 4,
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
								'min'  => 1,
								'max'  => 4,
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
					'parent'      => 'elearning_typography_h4_group',
					'section'     => 'elearning_headings_typography_section',
					'transport'   => 'postMessage',
					'priority'    => 20,
				),

				array(
					'name'     => 'elearning_typography_h5_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'H5', 'elearning' ),
					'section'  => 'elearning_headings_typography_section',
					'priority' => 25,
				),

				array(
					'name'        => 'elearning_typography_h5',
					'default'     => apply_filters(
						'elearning_typography_h5_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => '1.313rem',
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
								'min'  => 1,
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
								'min'  => 1,
								'max'  => 4,
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
								'min'  => 1,
								'max'  => 4,
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
					'parent'      => 'elearning_typography_h5_group',
					'section'     => 'elearning_headings_typography_section',
					'transport'   => 'postMessage',
					'priority'    => 25,
				),

				array(
					'name'     => 'elearning_typography_h6_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'H6', 'elearning' ),
					'section'  => 'elearning_headings_typography_section',
					'priority' => 30,
				),

				array(
					'name'        => 'elearning_typography_h6',
					'default'     => apply_filters(
						'elearning_typography_h6_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => '1.125rem',
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
								'min'  => 1,
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
								'max'  => 2.5,
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
					'parent'      => 'elearning_typography_h6_group',
					'section'     => 'elearning_headings_typography_section',
					'transport'   => 'postMessage',
					'priority'    => 30,
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Headings_Typography_Option();
endif;
