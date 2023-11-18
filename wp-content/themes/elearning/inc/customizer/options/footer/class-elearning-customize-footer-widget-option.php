<?php
/**
 * Footer widgets options.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*== FOOTER > FOOTER WIDGETS ==*/
if ( ! class_exists( 'eLearning_Customize_Footer_Widget_Option' ) ) :

	/**
	 * Option: Footer widget Option.
	 */
	class eLearning_Customize_Footer_Widget_Option extends eLearning_Customize_Base_Option {

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
					'name'     => 'elearning_footer_widgets',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'elearning-toggle',
					'label'    => esc_html__( 'Enable Footer Widgets', 'elearning' ),
					'section'  => 'elearning_footer_widgets_section',
					'priority' => 5,
				),

				array(
					'name'       => 'elearning_footer_widgets_title',
					'default'    => false,
					'type'       => 'control',
					'control'    => 'elearning-toggle',
					'label'      => esc_html__( 'Hide Widget Title', 'elearning' ),
					'section'    => 'elearning_footer_widgets_section',
					'priority'   => 10,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_style',
					'default'    => 'tg-footer-widget-col--four',
					'type'       => 'control',
					'control'    => 'elearning-radio-image',
					'label'      => esc_html__( 'Footer Widgets Style', 'elearning' ),
					'section'    => 'elearning_footer_widgets_section',
					'image_col'  => 2,
					'choices'    => apply_filters(
						'elearning_footer_widgets_style_choices',
						array(
							'tg-footer-widget-col--one'   => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/one-column.png',
							),
							'tg-footer-widget-col--two'   => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/two-columns.png',
							),
							'tg-footer-widget-col--three' => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/three-columns.png',
							),
							'tg-footer-widget-col--four'  => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/four-columns.png',
							),
						)
					),
					'priority'   => 25,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_colors_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Colors', 'elearning' ),
					'section'    => 'elearning_footer_widgets_section',
					'priority'   => 75,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_bg_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Background', 'elearning' ),
					'section'    => 'elearning_footer_widgets_section',
					'priority'   => 80,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_bg',
					'default'    => array(
						'background-color'      => '#ffffff',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'contain',
						'background-attachment' => 'scroll',
					),
					'type'       => 'sub-control',
					'control'    => 'elearning-background',
					'parent'     => 'elearning_footer_widgets_bg_group',
					'section'    => 'elearning_footer_widgets_section',
					'priority'   => 80,
					'transport'  => 'postMessage',
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_title_color_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Widget Title', 'elearning' ),
					'section'    => 'elearning_footer_widgets_section',
					'priority'   => 85,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_footer_widgets',
								'==',
								true,
							),
							array(
								'elearning_footer_widgets_title',
								'==',
								false,
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_title_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'section'    => 'elearning_footer_widgets_section',
					'parent'     => 'elearning_footer_widgets_title_color_group',
					'transport'  => 'postMessage',
					'priority'   => 85,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_footer_widgets',
								'==',
								true,
							),
							array(
								'elearning_footer_widgets_title',
								'==',
								false,
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_text_color_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Widget Content', 'elearning' ),
					'section'    => 'elearning_footer_widgets_section',
					'priority'   => 90,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_text_color',
					'default'    => '#51585f',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'section'    => 'elearning_footer_widgets_section',
					'parent'     => 'elearning_footer_widgets_text_color_group',
					'transport'  => 'postMessage',
					'priority'   => 90,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_link_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'section'    => 'elearning_footer_widgets_section',
					'label'      => esc_html__( 'Widget Link Item', 'elearning' ),
					'priority'   => 95,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_link_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_footer_widgets_link_color_group',
					'section'    => 'elearning_footer_widgets_section',
					'transport'  => 'postMessage',
					'tab'        => esc_html__( 'Normal', 'elearning' ),
					'priority'   => 95,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_link_hover_color',
					'default'    => '#269bd1',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_footer_widgets_link_color_group',
					'section'    => 'elearning_footer_widgets_section',
					'transport'  => 'postMessage',
					'tab'        => esc_html__( 'Hover', 'elearning' ),
					'priority'   => 95,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_border_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Border Top', 'elearning' ),
					'section'    => 'elearning_footer_widgets_section',
					'priority'   => 135,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'        => 'elearning_footer_widgets_border_top_width',
					'default'     => 1,
					'suffix'      => 'px',
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'label'       => esc_html__( 'Size', 'elearning' ),
					'section'     => 'elearning_footer_widgets_section',
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 20,
						'step' => 1,
					),
					'priority'    => 140,
					'dependency'  => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_border_top_color',
					'default'    => '#e9ecef',
					'type'       => 'control',
					'control'    => 'elearning-color',
					'section'    => 'elearning_footer_widgets_section',
					'label'      => esc_html__( 'Color', 'elearning' ),
					'transport'  => 'postMessage',
					'priority'   => 145,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_item_border_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'List Item Border Bottom', 'elearning' ),
					'section'    => 'elearning_footer_widgets_section',
					'priority'   => 150,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'        => 'elearning_footer_widgets_item_border_bottom_width',
					'default'     => 1,
					'suffix'      => 'px',
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'label'       => esc_html__( 'Size', 'elearning' ),
					'section'     => 'elearning_footer_widgets_section',
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 20,
						'step' => 1,
					),
					'priority'    => 155,
					'dependency'  => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),

				array(
					'name'       => 'elearning_footer_widgets_item_border_bottom_color',
					'default'    => '#e9ecef',
					'type'       => 'control',
					'control'    => 'elearning-color',
					'section'    => 'elearning_footer_widgets_section',
					'transport'  => 'postMessage',
					'label'      => esc_html__( 'Color', 'elearning' ),
					'priority'   => 160,
					'dependency' => array(
						'elearning_footer_widgets',
						'==',
						true,
					),
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Footer_Widget_Option();
endif;
