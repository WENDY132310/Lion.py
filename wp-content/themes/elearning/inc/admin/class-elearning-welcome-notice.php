<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class eLearning_Welcome_Notice {

	public function __construct() {
		add_action( 'admin_notices', array( $this, 'welcome_notice_markup' ) );
		add_action( 'wp_ajax_elearning-install-tdi-plugin', array( $this, 'install_tdi_plugin' ) );
		add_action( 'wp_ajax_elearning-dismiss-notice', array( $this, 'dismiss_notice' ) );
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice_markup() {
		if ( get_option( 'elearning_hide_welcome_notice' ) ) {
			return;
		}
		?>
		<div id="message" class="notice notice-success elearning-welcome-notice elearning-notice">
			<a class="elearning-message-close notice-dismiss" href="#"></a>
			<div class="elearning-message__content">
				<div class="elearning-message__image">
					<img class="elearning-screenshot" src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.jpg' ); ?>" alt="<?php esc_attr_e( 'elearning', 'elearning' ); ?>" />
				</div>
				<div class="elearning-message__text">
					<h2 class="elearning-message__heading">
						<?php
						printf(
						/* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
							esc_html__( 'Welcome! Thank you for choosing eLearning! To fully take advantage of the best our theme can offer, please make sure you visit our %1$swelcome page%2$s.', 'elearning' ),
							'<a href="' . esc_url( admin_url( 'themes.php?page=elearning-options' ) ) . '">',
							'</a>'
						);
						?>
					</h2>
					<div class="elearning-message__cta">
						<a href="#" class="btn-get-started button button-primary button-hero" data-name="<?php echo esc_attr( 'themegrill-demo-importer' ); ?>" data-slug="<?php echo esc_attr( 'themegrill-demo-importer' ); ?>" aria-label="<?php echo esc_attr( eLearning_Admin::btn_text( false ) ); ?>">
							<?php echo esc_html__( 'Get started with eLearning', 'elearning' ); ?>
						</a>
						<span class="plugin-install-notice"><?php esc_html_e( 'Clicking the button will install and activate the ThemeGrill Demo Importer plugin.', 'elearning' ); ?></span>
					</div>
				</div>
			</div>
		</div> <!-- /.elearning-message__content -->
		<?php
	}

	public function dismiss_notice() {
		check_ajax_referer( 'elearning_dismiss_notice_nonce', 'security' );
		update_option( 'elearning_hide_welcome_notice', 1 );
		wp_send_json_success();
		exit();
	}

	public function install_tdi_plugin() {
		check_ajax_referer( 'elearning_tdi_install_nonce', 'security' );
		update_option( 'elearning_hide_welcome_notice', 1 );

		$state = '';

		if ( class_exists( 'themegrill_demo_importer' ) ) {
			$state = 'activated';
		} elseif ( file_exists( WP_PLUGIN_DIR . '/themegrill-demo-importer/themegrill-demo-importer.php' ) ) {
			$state = 'installed';
		}

		if ( 'activated' === $state ) {
			$response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all' );
		} elseif ( 'installed' === $state ) {
			$response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all' );
			if ( current_user_can( 'activate_plugin' ) ) {
				$result = activate_plugin( 'themegrill-demo-importer/themegrill-demo-importer.php' );

				if ( is_wp_error( $result ) ) {
					$response['errorCode']    = $result->get_error_code();
					$response['errorMessage'] = $result->get_error_message();
				}
			}
		} else {
			wp_enqueue_style( 'plugin-install' );
			wp_enqueue_script( 'plugin-install' );

			$response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all' );

			/**
			 * Install Plugin.
			 */
			include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
			include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

			$api = plugins_api(
				'plugin_information',
				array(
					'slug'   => sanitize_key( wp_unslash( 'themegrill-demo-importer' ) ),
					'fields' => array(
						'sections' => false,
					),
				)
			);

			$skin     = new WP_Ajax_Upgrader_Skin();
			$upgrader = new Plugin_Upgrader( $skin );
			$result   = $upgrader->install( $api->download_link );

			if ( $result ) {
				$response['installed'] = 'succeed';
			} else {
				$response['installed'] = 'failed';
			}

			// Activate plugin.
			if ( current_user_can( 'activate_plugin' ) ) {
				$result = activate_plugin( 'themegrill-demo-importer/themegrill-demo-importer.php' );

				if ( is_wp_error( $result ) ) {
					$response['errorCode']    = $result->get_error_code();
					$response['errorMessage'] = $result->get_error_message();
				}
			}
		}
		wp_send_json( $response );
		exit();
	}
}

new eLearning_Welcome_Notice();
