<?php
/**
 * Single blog post options.
 *
* @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== CONTENT > SINGLE POST ==========================================*/
if ( ! class_exists( 'eLearning_Customize_Single_Blog_Post_Option' ) ) :

	/**
	 * Single Blog Post option.
	 */
	class eLearning_Customize_Single_Blog_Post_Option extends eLearning_Customize_Base_Option {

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
					'name'        => 'elearning_single_post_elements_heading',
					'type'        => 'control',
					'control'     => 'elearning-title',
					'label'       => esc_html__( 'Post Elements', 'elearning' ),
					'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'elearning' ),
					'section'     => 'elearning_single_post_section',
					'priority'    => 5,
				),

				array(
					'name'     => 'elearning_single_post_elements',
					'default'  => array(
						'thumbnail',
						'header',
						'meta',
						'content',
					),
					'type'     => 'control',
					'control'  => 'elearning-sortable',
					'section'  => 'elearning_single_post_section',
					'choices'  => array(
						'thumbnail' => esc_attr__( 'Featured Image', 'elearning' ),
						'header'    => esc_attr__( 'Title', 'elearning' ),
						'meta'      => esc_attr__( 'Meta Tags', 'elearning' ),
						'content'   => esc_attr__( 'Content', 'elearning' ),
					),
					'priority' => 10,
				),

				array(
					'name'        => 'elearning_single_post_meta_heading',
					'type'        => 'control',
					'control'     => 'elearning-title',
					'label'       => esc_html__( 'Meta', 'elearning' ),
					'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'elearning' ),
					'section'     => 'elearning_single_post_section',
					'priority'    => 15,
				),

				array(
					'name'     => 'elearning_single_post_meta',
					'default'  => array(
						'author',
						'date',
						'category',
						'tags',
						'comments',
					),
					'type'     => 'control',
					'control'  => 'elearning-sortable',
					'section'  => 'elearning_single_post_section',
					'choices'  => array(
						'comments' => esc_attr__( 'Comments', 'elearning' ),
						'category' => esc_attr__( 'Categories', 'elearning' ),
						'author'   => esc_attr__( 'Author', 'elearning' ),
						'date'     => esc_attr__( 'Date', 'elearning' ),
						'tags'     => esc_attr__( 'Tags', 'elearning' ),
					),
					'priority' => 20,
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Single_Blog_Post_Option();
endif;
