<?php
/**
 * Typography.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== TYPOGRAPHY ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Typography_Option' ) ) :

	/**
	 * Typography option.
	 */
	class eLearning_Customize_Typography_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_base_typography_body_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'section'  => 'elearning_base_typography_section',
					'label'    => esc_html__( 'Body', 'elearning' ),
					'priority' => 4,
				),

				array(
					'name'        => 'elearning_base_typography_body',
					'default'     => array(
						'font-family'    => 'default',
						'font-weight'    => '400',
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
					),
					'input_attrs' => array(
						'desktop' => array(
							'font-size'   => array(
								'step' => 1,
								'min'  => 10,
								'max'  => 36,
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
								'min'  => 10,
								'max'  => 36,
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
								'min'  => 10,
								'max'  => 36,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
					),
					'type'        => 'control',
					'control'     => 'elearning-typography',
					'section'     => 'elearning_base_typography_section',
					'priority'    => 5,
				),

				array(
					'name'     => 'elearning_body_typography_separator',
					'type'     => 'control',
					'control'  => 'elearning-divider',
					'section'  => 'elearning_base_typography_section',
					'priority' => 6,
				),

				array(
					'name'     => 'elearning_base_typography_heading_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Heading', 'elearning' ),
					'section'  => 'elearning_base_typography_section',
					'priority' => 10,
				),

				array(
					'name'        => 'elearning_base_typography_heading',
					'default'     => apply_filters(
						'elearning_base_typography_heading_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '400',
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
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'tablet'  => array(
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'mobile'  => array(
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
					),
					'type'        => 'sub-control',
					'control'     => 'elearning-typography',
					'parent'      => 'elearning_base_typography_heading_group',
					'section'     => 'elearning_base_typography_section',
					'transport'   => 'postMessage',
					'priority'    => 10,
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Typography_Option();
endif;
