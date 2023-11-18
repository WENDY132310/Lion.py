<?php
/**
 * Lottie block.
 *
 * @package BlockArt
 */

namespace BlockArt\BlockTypes;

defined( 'ABSPATH' ) || exit;

/**
 * Lottie block.
 */
class Lottie extends AbstractBlock {

	/**
	 * Block name.
	 *
	 * @var string Block name.
	 */
	protected $block_name = 'lottie';

	/**
	 * Render callback.
	 *
	 * @param array     $attributes Block attributes.
	 * @param string    $content Block content.
	 * @param \WP_Block $block Block object.
	 *
	 * @return string
	 */
	public function render( $attributes, $content, $block ) {
		if ( isset( $attributes['playOn'] ) && 'auto' !== $attributes['playOn'] ) {
			$content = str_replace( '<lottie-player', "<lottie-player {$attributes['playOn']}", $content );
		}
		return $content;
	}
}
