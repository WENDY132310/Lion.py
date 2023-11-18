<?php
/**
 * Sidebar Layout.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== LAYOUT > General ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Sidebar_Layout_Option' ) ) :

	/**
	 * Layout general option.
	 */
	class eLearning_Customize_Sidebar_Layout_Option extends eLearning_Customize_Base_Option {

		/**
		 * Include customize options.
		 *
		 * @param array                 $options      Customize options provided via the theme.
		 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return mixed|void Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize ) {

			$sidebar_layout_choices = apply_filters(
				'elearning_site_layout_choices',
				array(
					'tg-site-layout--default'    => array(
						'label' => '',
						'url'   => ELEARNING_PARENT_INC_ICON_URI . '/layout-default.png',
					),
					'tg-site-layout--left'       => array(
						'label' => '',
						'url'   => ELEARNING_PARENT_INC_ICON_URI . '/left-sidebar.png',
					),
					'tg-site-layout--right'      => array(
						'label' => '',
						'url'   => ELEARNING_PARENT_INC_ICON_URI . '/right-sidebar.png',
					),
					'tg-site-layout--no-sidebar' => array(
						'label' => '',
						'url'   => ELEARNING_PARENT_INC_ICON_URI . '/full-width.png',
					),
					'tg-site-layout--stretched'  => array(
						'label' => '',
						'url'   => ELEARNING_PARENT_INC_ICON_URI . '/stretched.png',
					),
				)
			);

			$configs = array(

				array(
					'name'      => 'elearning_structure_default',
					'default'   => 'tg-site-layout--right',
					'type'      => 'control',
					'control'   => 'elearning-radio-image',
					'section'   => 'elearning_sidebar_layout_section',
					'label'     => esc_html__( 'Default', 'elearning' ),
					'priority'  => 10,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

				array(
					'name'      => 'elearning_structure_archive',
					'default'   => 'tg-site-layout--right',
					'type'      => 'control',
					'control'   => 'elearning-radio-image',
					'section'   => 'elearning_sidebar_layout_section',
					'label'     => esc_html__( 'Blog/Archive', 'elearning' ),
					'priority'  => 20,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

				array(
					'name'      => 'elearning_structure_post',
					'default'   => 'tg-site-layout--right',
					'type'      => 'control',
					'control'   => 'elearning-radio-image',
					'section'   => 'elearning_sidebar_layout_section',
					'label'     => esc_html__( 'Single Post', 'elearning' ),
					'priority'  => 30,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

				array(
					'name'      => 'elearning_structure_page',
					'default'   => 'tg-site-layout--right',
					'type'      => 'control',
					'control'   => 'elearning-radio-image',
					'section'   => 'elearning_sidebar_layout_section',
					'label'     => esc_html__( 'Page', 'elearning' ),
					'priority'  => 40,
					'image_col' => 2,
					'choices'   => $sidebar_layout_choices,
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Sidebar_Layout_Option();
endif;
