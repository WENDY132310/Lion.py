<?php
/**
 * Map block.
 *
 * @package BlockArt
 */

namespace BlockArt\BlockTypes;

defined( 'ABSPATH' ) || exit;

/**
 * Map block.
 */
class Map extends AbstractBlock {

	/**
	 * Block name.
	 *
	 * @var string Block name.
	 */
	protected $block_name = 'map';

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
		if ( blockart_is_rest_request() ) {
			return $content;
		}

		$client_id  = blockart_array_get( $attributes, 'clientId', '' );
		$css_id     = blockart_array_get( $attributes, 'cssID' );
		$address    = blockart_array_get( $attributes, 'address', 'Kathmandu' );
		$map_height = blockart_array_get( $attributes, 'mapHeight' );
		$language   = blockart_array_get( $attributes, 'language', 'en' );
		$zoom       = blockart_array_get( $attributes, 'zoom', 10 );
		$api_key    = blockart_get_setting()->get( 'integrations.google-maps-embed-api-key', '' );

		// TODO: implement map with JS api.
		// if ( $api_key ) {
		// 	wp_enqueue_script( 'blockart-google-maps', "https://maps.googleapis.com/maps/api/js?key=$api_key", array(), BLOCKART_VERSION, true );
		// }

		$wrapper_attributes = array(
			'class' => "blockart-map blockart-map-$client_id",
			'id'    => $css_id,
		);

		$google_maps_url = add_query_arg(
			array(
				'q'      => rawurlencode( $address ),
				'hl'     => $language,
				'z'      => $zoom,
				't'      => 'm',
				'output' => 'embed',
				'iwloc'  => 'near',
			),
			'https://maps.google.com/maps'
		);

		ob_start();
		?>
		<div <?php blockart_build_html_attrs( $wrapper_attributes, true ); ?>>
			<div class="blockart-map-iframe">
				<iframe src="<?php echo esc_url( $google_maps_url ); ?>" width="660" height="<?php echo esc_attr( $map_height ); ?>" style="border:none;"></iframe>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
