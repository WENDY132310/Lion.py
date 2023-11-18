<?php
/**
 * eLearning functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eLearning
 * @since 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Define constants.
 */
define( 'ELEARNING_THEME_VERSION', wp_get_theme( 'elearning' )->get( 'Version' ) );
define( 'ELEARNING_PARENT_DIR', get_template_directory() );
define( 'ELEARNING_PARENT_URI', get_template_directory_uri() );
define( 'ELEARNING_PARENT_INC_DIR', ELEARNING_PARENT_DIR . '/inc' );
define( 'ELEARNING_PARENT_INC_URI', ELEARNING_PARENT_URI . '/inc' );
define( 'ELEARNING_PARENT_INC_ICON_URI', ELEARNING_PARENT_URI . '/assets/img/icons' );
define( 'ELEARNING_PARENT_CUSTOMIZER_DIR', ELEARNING_PARENT_INC_DIR . '/customizer' );

if ( ! function_exists( 'elearning_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function elearning_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'elearning', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register menu.
		register_nav_menus(
			array(
				'menu-primary' => esc_html__( 'Primary', 'elearning' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 170,
				'height'      => 60,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Custom background support.
		add_theme_support( 'custom-background' );

		// Gutenberg Wide/fullwidth support.
		add_theme_support( 'align-wide' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// AMP support.
		if ( defined( 'AMP__VERSION' ) && ( ! version_compare( AMP__VERSION, '1.0.0', '<' ) ) ) {
			add_theme_support(
				'amp',
				apply_filters(
					'elearning_amp_support_filter',
					array(
						'paired' => true,
					)
				)
			);
		}
	}
	add_action( 'after_setup_theme', 'elearning_setup' );
endif;

if ( ! function_exists( 'elearning_widgets_init' ) ) :

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function elearning_widgets_init() {
		$sidebars = apply_filters(
			'elearning_sidebars_args',
			array(
				'sidebar-right'            => esc_html__( 'Sidebar Right', 'elearning' ),
				'sidebar-left'             => esc_html__( 'Sidebar Left', 'elearning' ),
				'header-top-left-sidebar'  => esc_html__( 'Header Top Bar Left Sidebar', 'elearning' ),
				'header-top-right-sidebar' => esc_html__( 'Header Top Bar Right Sidebar', 'elearning' ),
				'footer-sidebar-1'         => esc_html__( 'Footer One', 'elearning' ),
				'footer-sidebar-2'         => esc_html__( 'Footer Two', 'elearning' ),
				'footer-sidebar-3'         => esc_html__( 'Footer Three', 'elearning' ),
				'footer-sidebar-4'         => esc_html__( 'Footer Four', 'elearning' ),
				'footer-bar-left-sidebar'  => esc_html__( 'Footer Bottom Bar Left Sidebar', 'elearning' ),
				'footer-bar-right-sidebar' => esc_html__( 'Footer Bottom Bar Right Sidebar', 'elearning' ),
			)
		);

		foreach ( $sidebars as $id => $name ) {
			register_sidebar(
				apply_filters(
					'elearning_sidebars_widget_args',
					array(
						'id'            => $id,
						'name'          => $name,
						'description'   => esc_html__( 'Add widgets here.', 'elearning' ),
						'before_widget' => '<section id="%1$s" class="widget %2$s">',
						'after_widget'  => '</section>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					)
				)
			);
		}
	}
	add_action( 'widgets_init', 'elearning_widgets_init' );
endif;

if ( ! function_exists( 'elearning_content_width' ) ) {

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function elearning_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'elearning_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'elearning_content_width', 0 );
}

if ( ! function_exists( 'elearning_scripts' ) ) {

	/**
	 * Enqueue scripts and styles.
	 */
	function elearning_scripts() {

		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_register_style( 'font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/css/font-awesome' . $suffix . '.css', false, '4.7.0' );
		wp_enqueue_style( 'font-awesome' );
		wp_register_style( 'elearning-style', get_stylesheet_uri(), array(), ELEARNING_THEME_VERSION );
		wp_enqueue_style( 'elearning-style' );

		wp_style_add_data( 'elearning-style', 'rtl', 'replace' );

		add_filter( 'elearning_dynamic_theme_css', array( 'elearning_Dynamic_CSS', 'render_output' ) );

		// Enqueue required Google font.
		eLearning_Generate_Fonts::render_fonts();

		// Generate dynamic CSS to add inline styles.
		$theme_dynamic_css = apply_filters( 'elearning_dynamic_theme_css', '' );

		wp_add_inline_style( 'elearning-style', $theme_dynamic_css );

		wp_enqueue_style( 'elearning-mto-style', get_template_directory_uri() . '/masteriyo.css', array( 'masteriyo-public' ), ELEARNING_THEME_VERSION );

		// Do not load scripts if AMP.
		if ( elearning_is_amp() ) {
			return;
		}

		wp_enqueue_script( 'elearning-navigation', get_template_directory_uri() . '/assets/js/navigation' . $suffix . '.js', array(), ELEARNING_THEME_VERSION, true );
		wp_enqueue_script( 'elearning-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $suffix . '.js', array(), ELEARNING_THEME_VERSION, true );
		wp_enqueue_script( 'elearning-custom', get_template_directory_uri() . '/assets/js/elearning-custom' . $suffix . '.js', array(), ELEARNING_THEME_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'elearning_scripts' );
}

if ( ! function_exists( 'elearning_block_editor_styles' ) ) {

	/**
	 * Enqueue block editor styles.
	 *
	 * @since elearning 1.0.0
	 */
	function elearning_block_editor_styles() {
		wp_enqueue_style( 'elearning-block-editor-styles', get_template_directory_uri() . '/style-editor-block.css', array(), ELEARNING_THEME_VERSION );
	}
	add_action( 'enqueue_block_editor_assets', 'elearning_block_editor_styles', 1, 1 );
}

// AMP support files.
if ( defined( 'AMP__VERSION' ) && ( ! version_compare( AMP__VERSION, '1.0.0', '<' ) ) ) {
	require_once ELEARNING_PARENT_INC_DIR . '/compatibility/amp/class-elearning-amp.php';
}

/**
 * Include files.
 */
require ELEARNING_PARENT_INC_DIR . '/class-elearning-utils.php';
require ELEARNING_PARENT_INC_DIR . '/hooks.php';
require ELEARNING_PARENT_INC_DIR . '/structure/header.php';
require ELEARNING_PARENT_INC_DIR . '/structure/content.php';
require ELEARNING_PARENT_INC_DIR . '/structure/footer.php';
require ELEARNING_PARENT_INC_DIR . '/custom-header.php';
require ELEARNING_PARENT_INC_DIR . '/class-elearning-dynamic-filter.php';
require ELEARNING_PARENT_INC_DIR . '/template-tags.php';
require ELEARNING_PARENT_INC_DIR . '/template-functions.php';
require ELEARNING_PARENT_INC_DIR . '/customizer/class-elearning-customizer.php';
require ELEARNING_PARENT_INC_DIR . '/class-elearning-css-classes.php';
require ELEARNING_PARENT_INC_DIR . '/class-elearning-dynamic-css.php';
defined( 'JETPACK__VERSION' ) && require ELEARNING_PARENT_INC_DIR . '/compatibility/jetpack/class-elearning-jetpack.php';

require ELEARNING_PARENT_INC_DIR . '/class-breadcrumb-trail.php';
require ELEARNING_PARENT_INC_DIR . '/compatibility/elementor/class-elearning-elementor-pro.php';

if ( is_admin() ) {
	// Meta boxes.
	require ELEARNING_PARENT_INC_DIR . '/meta-boxes/class-elearning-meta-box-page-settings.php';
	require ELEARNING_PARENT_INC_DIR . '/meta-boxes/class-elearning-meta-box.php';

	// Theme options page.
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-admin.php';
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-notice.php';
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-welcome-notice.php';
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-dashboard.php';
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-theme-review-notice.php';
}
