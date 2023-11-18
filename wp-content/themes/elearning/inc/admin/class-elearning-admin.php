<?php
/**
 * elearning main admin class.
 *
 * @package eLearning
 */

defined( 'ABSPATH' ) || exit;

/**
 * class eLearning_Admin
 */
class eLearning_Admin {

	/**
	 * elearning_Admin constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Check if plugin is installed.
	 *
	 * @param $plugin
	 * @return bool
	 */
	public static function is_plugin_installed( $plugin ) {

		$installed_plugins = get_plugins();

		return isset( $installed_plugins[ $plugin ] );
	}

	/**
	 * Get button text based on plugin state.
	 *
	 * @param bool $for_js
	 * @return string|void
	 */
	public static function btn_text( $for_js = true ) {

		$tdi = 'quick-demo-import/qdi.php';

		// Check if TDI is not installed.
		if ( ! self::is_plugin_installed( $tdi ) ) {

			return $for_js
				? sprintf(
				/* Translators: 1: Button text */
					esc_html( '%s...' ),
					__( 'Processing', 'elearning' )
				)
				:
				__( 'Install ThemeGrill Demo Importer Plugin', 'elearning' );
		}

		// Check if TDI is not activated.
		if ( self::is_plugin_installed( $tdi ) && is_plugin_inactive( $tdi ) ) {

			return $for_js
				? sprintf(
				/* Translators: 1: Button text */
					esc_html( '%s...' ),
					__( 'Activating', 'elearning' )
				)
				:
				__( 'Activate ThemeGrill Demo Importer Plugin', 'elearning' );
		}

		return $for_js
			? sprintf(
			/* Translators: 1: Button text */
				esc_html( '%s...' ),
				__( 'Redirecting', 'elearning' )
			)
			:
			__( 'Demo Library', 'elearning' );
	}

	/**
	 * Localize array for import button AJAX request.
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'elearning-admin-style', get_template_directory_uri() . '/inc/admin/css/admin.css', array(), ELEARNING_THEME_VERSION );

		wp_enqueue_script( 'elearning-plugin-install-helper', ELEARNING_PARENT_INC_URI . '/admin/js/plugin-handle.js', array( 'jquery' ), ELEARNING_THEME_VERSION, true );

		$welcome_data = array(
			'uri'          => esc_url( admin_url( '/themes.php?page=demo-importer&browse=all' ) ),
			'btnText'      => self::btn_text(),
			'dismissNonce' => wp_create_nonce( 'elearning_dismiss_notice_nonce' ),
			'installNonce' => wp_create_nonce( 'elearning_tdi_install_nonce' ),
		);

		wp_localize_script( 'elearning-plugin-install-helper', 'elearningRedirectDemoPage', $welcome_data );
	}
}

new eLearning_Admin();
