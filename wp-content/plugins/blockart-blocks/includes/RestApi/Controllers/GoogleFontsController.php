<?php
/**
 * Google fonts controller.
 *
 * @package BlockArt
 */

namespace BlockArt\RestApi\Controllers;

defined( 'ABSPATH' ) || exit;

/**
 * Setting controller.
 */
class GoogleFontsController extends \WP_REST_Controller {

	/**
	 * The namespace of this controller's route.
	 *
	 * @var string The namespace of this controller's route.
	 */
	protected $namespace = 'blockart/v1';

	/**
	 * The base of this controller's route.
	 *
	 * @var string The base of this controller's route.
	 */
	protected $rest_base = 'google-fonts';

	/**
	 * {@inheritDoc}
	 *
	 * @return void
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			'/' . $this->rest_base,
			array(
				array(
					'methods'             => \WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_items' ),
					'permission_callback' => array( $this, 'get_items_permissions_check' ),
				),
			)
		);
	}

	/**
	 * Check if a given request has access to get items.
	 *
	 * @param \WP_REST_Request $request Full data about the request.
	 *
	 * @return true|\WP_Error
	 */
	public function get_items_permissions_check( $request ) {
		if ( ! current_user_can( 'edit_posts' ) ) {
			return new \WP_Error(
				'rest_forbidden',
				esc_html__( 'You are not allowed to access this resource.', 'blockart' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}
		return true;
	}

	/**
	 * Get items.
	 *
	 * @param \WP_REST_Request $request Full data about the request.
	 *
	 * @return \WP_REST_Response
	 */
	public function get_items( $request ) {
		$filesystem = blockart_get_filesystem();
		if ( ! $filesystem ) {
			return new \WP_Error( 'filesystem_error', 'Could not access filesystem.' );
		}
		$google_fonts_json_file = __DIR__ . '/google-fonts.json';
		if ( ! $filesystem->exists( $google_fonts_json_file ) ) {
			return new \WP_Error( 'not_found', 'Google fonts file not found.' );
		}
		$google_fonts_json = $filesystem->get_contents( $google_fonts_json_file );
		return new \WP_REST_Response( json_decode( $google_fonts_json, true ), 200 );
	}
}
