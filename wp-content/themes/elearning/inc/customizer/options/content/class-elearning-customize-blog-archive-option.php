<?php
/**
 * Archive/ blog layout.
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Customize_Blog_Archive_Option' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class eLearning_Customize_Blog_Archive_Option extends eLearning_Customize_Base_Option {

		/**
		 * Include customize options.
		 *
		 * @param array                 $options      Customize options provided via the theme.
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return array|array[] Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize ) {

			$configs = array(

				array(
					'name'     => 'elearning_blog_archive_post_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Post', 'elearning' ),
					'section'  => 'elearning_archive_blog_section',
					'priority' => 50,
				),

				array(
					'name'     => 'elearning_archive_blog_content',
					'default'  => 'excerpt',
					'type'     => 'control',
					'control'  => 'radio',
					'label'    => esc_html__( 'Content', 'elearning' ),
					'section'  => 'elearning_archive_blog_section',
					'choices'  => array(
						'excerpt' => esc_html__( 'Excerpt', 'elearning' ),
						'content' => esc_html__( 'Full Content', 'elearning' ),
					),
					'priority' => 55,
				),

				array(
					'name'        => 'elearning_archive_blog_post_elements',
					'default'     => array(
						'thumbnail',
						'header',
						'meta',
						'content',
					),
					'type'        => 'control',
					'control'     => 'elearning-sortable',
					'label'       => esc_html__( 'Post Elements', 'elearning' ),
					'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'elearning' ),
					'section'     => 'elearning_archive_blog_section',
					'choices'     => array(
						'thumbnail' => esc_attr__( 'Featured Image', 'elearning' ),
						'header'    => esc_attr__( 'Title', 'elearning' ),
						'meta'      => esc_attr__( 'Meta', 'elearning' ),
						'content'   => esc_attr__( 'Content', 'elearning' ),
					),
					'dependency'  => apply_filters( 'elearning_archive_blog_post_elements', false ),
					'priority'    => 70,
				),

				array(
					'name'        => 'elearning_blog_meta',
					'default'     => array(
						'author',
						'date',
						'category',
						'tags',
						'comments',
					),
					'type'        => 'control',
					'control'     => 'elearning-sortable',
					'label'       => esc_html__( 'Meta Tags Order', 'elearning' ),
					'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'elearning' ),
					'section'     => 'elearning_archive_blog_section',
					'choices'     => array(
						'comments' => esc_attr__( 'Comments', 'elearning' ),
						'category' => esc_attr__( 'Categories', 'elearning' ),
						'author'   => esc_attr__( 'Author', 'elearning' ),
						'date'     => esc_attr__( 'Date', 'elearning' ),
						'tags'     => esc_attr__( 'Tags', 'elearning' ),
					),
					'dependency'  => apply_filters( 'elearning_archive_blog_post_elements_order', false ),
					'priority'    => 75,
				),

				array(
					'name'       => 'elearning_blog_archive_read_more_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Read More', 'elearning' ),
					'section'    => 'elearning_archive_blog_section',
					'priority'   => 85,
					'dependency' => array(
						'elearning_archive_blog_content',
						'==',
						'excerpt',
					),
				),

				array(
					'name'       => 'elearning_archive_blog_read_more',
					'default'    => true,
					'type'       => 'control',
					'control'    => 'elearning-toggle',
					'label'      => esc_html__( 'Enable', 'elearning' ),
					'section'    => 'elearning_archive_blog_section',
					'priority'   => 90,
					'dependency' => array(
						'elearning_archive_blog_content',
						'==',
						'excerpt',
					),
				),

				array(
					'name'       => 'elearning_blog_archive_read_more_style',
					'default'    => 'left',
					'type'       => 'control',
					'control'    => 'elearning-radio-image',
					'label'      => esc_html__( 'Style', 'elearning' ),
					'section'    => 'elearning_archive_blog_section',
					'priority'   => 105,
					'image_col'  => 2,
					'choices'    => apply_filters(
						'elearning_read_more_style',
						array(
							'left'  => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/read-more-left.png',
							),
							'right' => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/read-more-right.png',
							),
						)
					),
					'dependency' => array(
						'conditions' => apply_filters(
							'elearning_read_more_align_dependency',
							array(
								array(
									'elearning_archive_blog_content',
									'==',
									'excerpt',
								),
								array(
									'elearning_archive_blog_read_more',
									'==',
									true,
								),
							)
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_typography_blog_archive_heading',
					'type'       => 'control',
					'control'    => 'elearning-title',
					'label'      => esc_html__( 'Typography', 'elearning' ),
					'section'    => 'elearning_archive_blog_section',
					'priority'   => 285,
					'dependency' => array(
						'elearning_archive_blog_content',
						'==',
						'excerpt',
					),
				),

				array(
					'name'     => 'elearning_typography_blog_post_title_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Blog/Archive Post Title', 'elearning' ),
					'section'  => 'elearning_archive_blog_section',
					'priority' => 286,
				),

				array(
					'name'        => 'elearning_typography_blog_post_title',
					'default'     => array(
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
					'parent'      => 'elearning_typography_blog_post_title_group',
					'section'     => 'elearning_archive_blog_section',
					'transport'   => 'postMessage',
					'priority'    => 286,
				),

			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Blog_Archive_Option();
endif;
