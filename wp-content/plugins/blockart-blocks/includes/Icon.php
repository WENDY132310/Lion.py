<?php
/**
 * Icon class.
 *
 * @package BlockArt
 */

namespace BlockArt;

defined( 'ABSPATH' ) || exit;

use BlockArt\Traits\Singleton;


/**
 * Icon.
 */
class Icon {

	use Singleton;

	/**
	 * All icons.
	 *
	 * @var array Holds all icons.
	 */
	private $icons = array();

	/**
	 * Icon constructor.
	 */
	protected function __construct() {
		$this->setup();
	}

	/**
	 * Setup.
	 *
	 * @return void
	 */
	private function setup() {
		if ( ! empty( $this->icons ) ) {
			return;
		}
		$icons_file = BLOCKART_DIST_DIR . '/icons.json';
		$filesystem = blockart_get_filesystem();

		if (
			! $filesystem ||
			! $filesystem->exists( $icons_file ) ||
			! $filesystem->is_readable( $icons_file )
		) {
			return;
		}

		$contents    = $filesystem->get_contents( $icons_file );
		$this->icons = blockart_to_array( $contents );
	}

	/**
	 * Get icon.
	 *
	 * @param string $name Icon name.
	 * @param array  $args Additional args for html attributes.
	 * @return false|mixed|null|void
	 */
	public function get( string $name, array $args = array() ) {
		$args  = wp_parse_args(
			$args,
			array(
				'size'        => '24',
				'aria-hidden' => 'true',
				'focusable'   => 'false',
			)
		);
		$icons = apply_filters( 'blockart_icons', $this->icons );
		$icon  = blockart_array_get( $icons, $name, false );

		if ( ! $icon ) {
			return '';
		}

		$icon = str_replace( '<svg', '<svg ' . $this->build_attributes( $args ), $icon );

		return apply_filters( 'blockart_icon', $icon, $name, $args );
	}

	/**
	 * Build SVG attributes.
	 *
	 * @param array $args Attributes to add to the SVG.
	 * @return string
	 */
	private function build_attributes( array $args ): string {
		$size  = blockart_array_pull( $args, 'size', '24' );
		$class = 'blockart-icon ' . blockart_array_pull( $args, 'class', '' );

		$args['width']  = $size;
		$args['height'] = $size;
		$args['class']  = $class;

		return blockart_array_to_html_attributes( $args );
	}
}
