<?php
/**
 * Slider block.
 *
 * @package BlockArt
 */

namespace BlockArt\BlockTypes;

defined( 'ABSPATH' ) || exit;

/**
 * Buttons block.
 */
class Slider extends AbstractBlock {

	/**
	 * Block name.
	 *
	 * @var string Block name.
	 */
	protected $block_name = 'slider';

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
		if ( ! defined( 'REST_REQUEST' ) || ! REST_REQUEST ) {
			$loop        = blockart_array_get( $attributes, 'loop', false );
			$splide_data = array(
				'perPage'      => blockart_array_get( $attributes, 'perPage', 1 ),
				'autoplay'     => blockart_array_get( $attributes, 'autoplay', false ),
				'pauseOnHover' => blockart_array_get( $attributes, 'pauseOnHover', false ),
				'arrows'       => blockart_array_get( $attributes, 'arrows', true ),
				'pagination'   => blockart_array_get( $attributes, 'pagination', false ),
				'speed'        => blockart_array_get( $attributes, 'speed', 800 ),
				'rewindSpeed'  => blockart_array_get( $attributes, 'speed', 800 ),
				'interval'     => blockart_array_get( $attributes, 'interval', 5000 ),
				'perMove'      => blockart_array_get( $attributes, 'perMove', 1 ),
				'type'         => $loop ? 'loop' : 'slide',
			);
			$content     = str_replace( 'class="splide"', 'class="splide" data-splide="' . esc_attr( wp_json_encode( $splide_data ) ) . '"', $content );
		}
		return $content;
	}
}
