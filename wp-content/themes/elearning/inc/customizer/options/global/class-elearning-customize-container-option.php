<?php
/**
 * Container options.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== CONTAINER ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Container_Option' ) ) :

	/**
	 * General option.
	 */
	class eLearning_Customize_Container_Option extends eLearning_Customize_Base_Option {

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
					'name'      => 'elearning_general_container_style',
					'default'   => 'tg-container--wide',
					'type'      => 'control',
					'control'   => 'elearning-radio-image',
					'section'   => 'elearning_container_section',
					'label'     => esc_html__( 'Container Style', 'elearning' ),
					'priority'  => 10,
					'transport' => 'postMessage',
					'image_col' => 2,
					'choices'   => array(
						'tg-container--wide'     => array(
							'label' => esc_html__( 'Wide', 'elearning' ),
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/wide.png',
						),
						'tg-container--boxed'    => array(
							'label' => esc_html__( 'Boxed', 'elearning' ),
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/boxed.png',
						),
						'tg-container--separate' => array(
							'label' => esc_html__( 'Separate', 'elearning' ),
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/separate.png',
						),
					),
				),

				array(
					'name'        => 'elearning_general_container_width',
					'default'     => 1160,
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'suffix'      => 'px',
					'label'       => esc_html__( 'Container Width', 'elearning' ),
					'section'     => 'elearning_container_section',
					'priority'    => 20,
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'min'  => 768,
						'max'  => 1920,
						'step' => 1,
					),
				),

				array(
					'name'        => 'elearning_general_content_width',
					'default'     => 70,
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'suffix'      => '%',
					'label'       => esc_html__( 'Content Width', 'elearning' ),
					'section'     => 'elearning_container_section',
					'transport'   => 'postMessage',
					'priority'    => 30,
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),

				array(
					'name'        => 'elearning_general_sidebar_width',
					'default'     => 30,
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'suffix'      => '%',
					'label'       => esc_html__( 'Side Width', 'elearning' ),
					'section'     => 'elearning_container_section',
					'transport'   => 'postMessage',
					'priority'    => 40,
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Container_Option();
endif;
