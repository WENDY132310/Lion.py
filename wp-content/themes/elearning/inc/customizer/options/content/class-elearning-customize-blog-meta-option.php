<?php
/**
 * Meta styles.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== CONTENT > META ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Blog_Meta_Option' ) ) :

	/**
	 * Single Blog Post option.
	 */
	class eLearning_Customize_Blog_Meta_Option extends eLearning_Customize_Base_Option {

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
					'name'      => 'elearning_meta_style',
					'default'   => 'tg-meta-style-one',
					'type'      => 'control',
					'control'   => 'elearning-radio-image',
					'label'     => esc_html__( 'Meta Style', 'elearning' ),
					'section'   => 'elearning_meta_section',
					'image_col' => 2,
					'choices'   => array(
						'tg-meta-style-one' => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/meta-style-one.png',
						),
						'tg-meta-style-two' => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/meta-style-two.png',
						),
					),
					'priority'  => 10,
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Blog_Meta_Option();
endif;
