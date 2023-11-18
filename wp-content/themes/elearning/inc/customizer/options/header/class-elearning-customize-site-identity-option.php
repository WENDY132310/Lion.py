<?php
/**
 * Site Identity Options.
 *
* @package eLearning
 */

defined( 'ABSPATH' ) || exit;

/*========================================== HEADER > SITE IDENTITY ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Site_Identity_Option' ) ) :

	/**
	 * Site Identity customizer options.
	 */
	class eLearning_Customize_Site_Identity_Option extends eLearning_Customize_Base_Option {

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
					'name'        => 'elearning_retina_logo',
					'type'        => 'control',
					'control'     => 'image',
					'label'       => esc_html__( 'Retina Logo', 'elearning' ),
					'description' => esc_html__( 'Upload 2X times the size of your current logo. Eg: If your current logo size is 120*60 then upload 240*120 sized logo.', 'elearning' ),
					'section'     => 'title_tagline',
					'priority'    => 8,
				),

				array(
					'name'     => 'elearning_site_identity_color_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Colors', 'elearning' ),
					'section'  => 'title_tagline',
					'priority' => 19,
				),

				array(
					'name'     => 'elearning_site_identity_typography_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Typography', 'elearning' ),
					'section'  => 'title_tagline',
					'priority' => 23,
				),

				array(
					'name'     => 'elearning_typography_site_title_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Site Title', 'elearning' ),
					'section'  => 'title_tagline',
					'priority' => 24,
				),

				array(
					'name'        => 'elearning_typography_site_title',
					'default'     => array(
						'font-family'    => 'default',
						'font-weight'    => '400',
						'subsets'        => array( 'latin' ),
						'font-size'      => array(
							'desktop' => '1.313rem',
							'tablet'  => '',
							'mobile'  => '',
						),
						'line-height'    => array(
							'desktop' => '1.5',
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
					'parent'      => 'elearning_typography_site_title_group',
					'section'     => 'title_tagline',
					'transport'   => 'postMessage',
					'priority'    => 24,
				),

				array(
					'name'     => 'elearning_typography_site_description_group',
					'default'  => '',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Site Tagline', 'elearning' ),
					'section'  => 'title_tagline',
					'priority' => 25,
				),

				array(
					'name'        => 'elearning_typography_site_description',
					'default'     => array(
						'font-family'    => 'default',
						'font-weight'    => '400',
						'subsets'        => array( 'latin' ),
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
					'parent'      => 'elearning_typography_site_description_group',
					'section'     => 'title_tagline',
					'transport'   => 'postMessage',
					'priority'    => 25,
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Site_Identity_Option();
endif;
