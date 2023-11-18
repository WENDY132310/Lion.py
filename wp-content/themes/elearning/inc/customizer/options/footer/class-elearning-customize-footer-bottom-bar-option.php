<?php
/**
 * Footer bottom bar options.
 *
* @package eLearning
 */

defined( 'ABSPATH' ) || exit;

/*========================================== FOOTER > FOOTER  BAR ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Footer_Bottom_Bar_Option' ) ) :

	/**
	 * Footer option.
	 */
	class eLearning_Customize_Footer_Bottom_Bar_Option extends eLearning_Customize_Base_Option {

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
					'name'       => 'elearning_footer_bar_style',
					'default'    => 'tg-site-footer-bar--center',
					'type'       => 'control',
					'control'    => 'elearning-radio-image',
					'label'      => esc_html__( 'Style', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'transport'  => 'postMessage',
					'image_col'  => 2,
					'choices'    => apply_filters(
						'elearning_footer_bar_style_choices',
						array(
							'tg-site-footer-bar--left'   => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/footer-left.png',
							),
							'tg-site-footer-bar--center' => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/footer-center.png',
							),
						)
					),
					'dependency' => apply_filters( 'elearning_footer_bar_style_cb', false ),
					'priority'   => 10,
				),

				array(
					'name'       => 'elearning_footer_bar_left_content_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Left Content', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'priority'   => 20,
					'dependency' => apply_filters( 'elearning_footer_bar_section_one_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_section_one',
					'default'    => 'text_html',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'elearning_footer_bottom_bar_section',
					'choices'    => apply_filters(
						'elearning_footer_bar_section_one_choices',
						array(
							'none'      => esc_html__( 'None', 'elearning' ),
							'text_html' => esc_html__( 'Text/HTML', 'elearning' ),
							'menu'      => esc_html__( 'Menu', 'elearning' ),
							'widget'    => esc_html__( 'Widget', 'elearning' ),
						)
					),
					'priority'   => 25,
					'dependency' => apply_filters( 'elearning_footer_bar_section_one_cb', false ),
				),

				array(
					'name'        => 'elearning_footer_bar_section_one_html',
					'default'     => sprintf(
						/* translators: 1: Current Year, 2: Site Name, 3: Theme Link, 4: WordPress Link. */
						esc_html__( 'Copyright &copy; %1$s %2$s. Powered by %3$s and %4$s.', 'elearning' ),
						'{the-year}',
						'{site-link}',
						'{theme-link}',
						'{wp-link}'
					),
					'type'        => 'control',
					'control'     => 'elearning-editor',
					'section'     => 'elearning_footer_bottom_bar_section',
					'label'       => esc_html__( 'Text/HTML for Left Content', 'elearning' ),
					'description' => wp_kses(
						'<a href="' . esc_url( 'https://docs.elearningtheme.com/en/article/dynamic-strings-for-footer-copyright-content-13empt5/' ) . '" target="_blank">' . esc_html__( 'Docs Link', 'elearning' ) . '</a>',
						array(
							'a' => array(
								'href'   => true,
								'target' => true,
							),
						)
					),
					'priority'    => 30,
					'transport'   => 'postMessage',
					'partial'     => array(
						'selector'        => '.tg-site-footer-section-1',
						'render_callback' => 'Elearning_Customizer_Partials::customize_partial_footer_bar_section_one_html',
					),
					'dependency'  => apply_filters(
						'elearning_footer_bar_section_one_html_cb',
						array(
							'elearning_footer_bar_section_one',
							'==',
							'text_html',
						)
					),
				),

				array(
					'name'       => 'elearning_footer_bar_section_one_menu',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'elearning_footer_bottom_bar_section',
					'label'      => esc_html__( 'Select a Menu for Left Content', 'elearning' ),
					'choices'    => eLearning_Utils::get_menus(),
					'priority'   => 35,
					'dependency' => array(
						'conditions' => array(
							apply_filters(
								'elearning_footer_bar_section_one_menu_cb',
								array(
									'elearning_footer_bar_section_one',
									'==',
									'menu',
								)
							),
							apply_filters( 'elearning_footer_bar_section_one_cb', false ),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_footer_bar_right_content_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Right Content', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'priority'   => 40,
					'dependency' => apply_filters( 'elearning_footer_bar_section_one_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_section_two',
					'default'    => 'text_html',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'elearning_footer_bottom_bar_section',
					'choices'    => apply_filters(
						'elearning_footer_bar_section_two_choices',
						array(
							'none'      => esc_html__( 'None', 'elearning' ),
							'text_html' => esc_html__( 'Text/HTML', 'elearning' ),
							'menu'      => esc_html__( 'Menu', 'elearning' ),
							'widget'    => esc_html__( 'Widget', 'elearning' ),
						)
					),
					'priority'   => 45,
					'dependency' => apply_filters( 'elearning_footer_bar_section_two_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_section_two_html',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'elearning-editor',
					'section'    => 'elearning_footer_bottom_bar_section',
					'label'      => esc_html__( 'Text/HTML for Left Content', 'elearning' ),
					'transport'  => 'postMessage',
					'partial'    => array(
						'selector'        => '.tg-site-footer-section-2',
						'render_callback' => 'Elearning_Customizer_Partials::customize_partial_footer_bar_section_two_html',
					),
					'priority'   => 50,
					'dependency' => apply_filters(
						'elearning_footer_bar_section_two_html_cb',
						array(
							'elearning_footer_bar_section_two',
							'===',
							'text_html',
						)
					),
				),

				array(
					'name'       => 'elearning_footer_bar_section_two_menu',
					'default'    => 'none',
					'type'       => 'control',
					'control'    => 'select',
					'section'    => 'elearning_footer_bottom_bar_section',
					'label'      => esc_html__( 'Select a Menu for Left Content', 'elearning' ),
					'choices'    => eLearning_Utils::get_menus(),
					'priority'   => 55,
					'dependency' => apply_filters(
						'elearning_footer_bar_section_two_menu_cb',
						array(
							'elearning_footer_bar_section_two',
							'===',
							'menu',
						)
					),
				),

				array(
					'name'       => 'elearning_footer_bar_colors_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Colors', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'priority'   => 70,
					'dependency' => apply_filters( 'elearning_footer_color_heading_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_bg_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Background', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'priority'   => 75,
					'dependency' => apply_filters( 'elearning_footer_bar_text_color_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_bg',
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
					'parent'     => 'elearning_footer_bar_bg_group',
					'section'    => 'elearning_footer_bottom_bar_section',
					'transport'  => 'postMessage',
					'priority'   => 75,
					'dependency' => apply_filters( 'elearning_footer_bar_bg_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_text_color_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Text', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'priority'   => 80,
					'dependency' => apply_filters( 'elearning_footer_bar_text_color_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_text_color',
					'default'    => '#51585f',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_footer_bar_text_color_group',
					'section'    => 'elearning_footer_bottom_bar_section',
					'transport'  => 'postMessage',
					'priority'   => 80,
					'dependency' => apply_filters( 'elearning_footer_bar_text_color_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_link_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'section'    => 'elearning_footer_bottom_bar_section',
					'label'      => esc_html__( 'Link', 'elearning' ),
					'priority'   => 85,
					'dependency' => apply_filters( 'elearning_footer_bar_link_color_group_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_link_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_footer_bar_link_color_group',
					'tab'        => esc_html__( 'Normal', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'transport'  => 'postMessage',
					'priority'   => 85,
					'dependency' => apply_filters( 'elearning_footer_bar_link_color_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_link_hover_color',
					'default'    => '#269bd1',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_footer_bar_link_color_group',
					'tab'        => esc_html__( 'Hover', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'transport'  => 'postMessage',
					'priority'   => 85,
					'dependency' => apply_filters( 'elearning_footer_bar_link_hover_color_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_border_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Border Top', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'priority'   => 120,
					'dependency' => apply_filters( 'elearning_footer_bar_border_heading_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_border_top_width',
					'default'    => 0,
					'suffix'     => 'px',
					'type'       => 'control',
					'control'    => 'elearning-slider',
					'label'      => esc_html__( 'Size', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'transport'  => 'postMessage',
					'priority'   => 125,
					'dependency' => apply_filters( 'elearning_footer_bar_border_top_width_cb', false ),
				),

				array(
					'name'       => 'elearning_footer_bar_border_top_color',
					'default'    => '#e9ecef',
					'type'       => 'control',
					'control'    => 'elearning-color',
					'label'      => esc_html__( 'Color', 'elearning' ),
					'section'    => 'elearning_footer_bottom_bar_section',
					'transport'  => 'postMessage',
					'priority'   => 130,
					'dependency' => apply_filters( 'elearning_footer_bar_border_top_color_cb', false ),
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Footer_Bottom_Bar_Option();
endif;
