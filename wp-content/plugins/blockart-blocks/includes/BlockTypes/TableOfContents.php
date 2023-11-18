<?php
/**
 * TableOfContents block.
 *
 * @package BlockArt
 */

namespace BlockArt\BlockTypes;

defined( 'ABSPATH' ) || exit;

/**
 * TableOfContents block.
 */
class TableOfContents extends AbstractBlock {

	/**
	 * Block name.
	 *
	 * @var string Block name.
	 */
	protected $block_name = 'table-of-contents';

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

		$client_id           = blockart_array_get( $attributes, 'clientId', '' );
		$css_id              = blockart_array_get( $attributes, 'cssID' );
		$heading_title       = blockart_array_get( $attributes, 'headingTitle', '' );
		$marker              = blockart_array_get( $attributes, 'marker', 'bullet' );
		$collapsible         = blockart_array_get( $attributes, 'collapsible', false );
		$initially_collapsed = blockart_array_get( $attributes, 'initiallyCollapsed', false );
		$icon_type           = blockart_array_get( $attributes, 'iconType', '' );
		$close_icon          = blockart_array_get( $attributes, 'closeIcon', '' );
		$open_icon           = blockart_array_get( $attributes, 'openIcon', '' );

		$headings           = $this->extract_headings_from_content( blockart_array_get( $attributes, 'headings', array() ) );
		$wrapper_attributes = array(
			'class'          => "blockart-toc blockart-toc-$client_id has-marker-$marker",
			'id'             => $css_id,
			'data-collapsed' => $collapsible ? ( $initially_collapsed ? 'true' : 'false' ) : null,
			'data-toc'       => "_blockart_toc_$client_id",
		);

		ob_start();
		?>
		<script>var _blockart_toc_<?php echo esc_js( $client_id ); ?> = <?php echo wp_json_encode( $headings ); ?>;</script>
		<div <?php blockart_build_html_attrs( $wrapper_attributes, true ); ?>>
			<div class="blockart-toc-header">
				<div class="blockart-toc-title"><?php echo esc_html( $heading_title ); ?></div>
				<?php if ( $collapsible ) : ?>
						<button class="blockart-toc-toggle" type="button">
							<?php
							if ( 'text' === $icon_type ) {
								?>
								<span class="blockart-toc-open-icon"><?php esc_html_e( 'Hide', 'blockart' ); ?></span>
								<span class="blockart-toc-close-icon"><?php esc_html_e( 'Show', 'blockart' ); ?></span>
								<?php
							} else {

								blockart_get_icon(
									$open_icon,
									true,
									array(
										'class' => 'blockart-toc-open-icon',
									)
								);
								?>
								<?php
								blockart_get_icon(
									$close_icon,
									true,
									array(
										'class' => 'blockart-toc-close-icon',
									)
								);

							}
							?>
						</button>
				<?php endif; ?>
			</div>
			<div class="blockart-toc-body">
				<?php if ( $headings ) : ?>
					<?php $this->headings_list_html( $this->transform_single_level_headings_to_nested( $headings ) ); ?>
				<?php else : ?>
					<p><?php esc_html_e( 'Begin adding Headings to create a table of contents.', 'blockart' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Headings list HTML.
	 *
	 * @param array $headings Nested array of headings.
	 * @return void
	 */
	protected function headings_list_html( $headings ) {
		?>
		<ul class="blockart-toc-list">
			<?php foreach ( $headings as $heading ) : ?>
				<li class="blockart-toc-list-item">
					<a href="<?php echo '#' . esc_attr( isset( $heading['id'] ) ? "{$heading['id']}" : blockart_string_to_kebab( $heading['content'] ) ); ?>">
						<?php echo esc_html( $heading['content'] ); ?>
						<?php if ( isset( $heading['children'] ) ) : ?>
							<?php $this->headings_list_html( $heading['children'] ); ?>
						<?php endif; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
	}

	/**
	 * Extract headings from content.
	 *
	 * @param array $allowed_headings Allowed headings from block attribute.
	 * @return array
	 */
	protected function extract_headings_from_content( $allowed_headings = array(), $content = '' ) {
		$content = empty( $content ) ? get_the_content() : $content;
		if (
			empty( $content ) ||
			empty( $allowed_headings )
		) {
			return false;
		}

		preg_match_all( '/<h[1-6][^>]*>(.*?)<\/h[1-6]>/i', $content, $matches );

		if ( empty( $matches[0] ) ) {
			return false;
		}

		return array_filter(
			array_map(
				function ( $heading ) {
						preg_match( '/<h([1-6])[^>]*>(.*?)<\/h[1-6]>/i', $heading, $heading_matches );
					if ( count( $heading_matches ) !== 3 || empty( $heading_matches[2] ) ) {
						return false;
					}
						return array(
							'content' => wp_strip_all_tags( $heading_matches[2] ),
							'level'   => intval( $heading_matches[1] ),
							'id'      => blockart_string_to_kebab( $heading_matches[2] ),
						);
				},
				$matches[0]
			)
		);
	}

	/**
	 * Get nested headings level.
	 *
	 * @param array $headings Single level array of headings.
	 * @param integer $position
	 * @return array
	 */
	protected function transform_single_level_headings_to_nested( $headings, $position = 0 ) {
		$result = array();
		$length = count( $headings );
		for ( $i = 0; $i < $length; $i++ ) {
			$heading = $headings[ $i ];
			if ( $heading['level'] === $headings[0]['level'] ) {
				$end   = $i + 1;
				$count = count( $headings );
				while (
					$end < $count &&
					$headings[ $end ]['level'] > $heading['level']
				) {
					++$end;
				}
				$heading['position'] = $position + $i;
				$heading['children'] = $end > ( $i + 1 ) ?
				$this->transform_single_level_headings_to_nested(
					array_slice( $headings, $i + 1, $end - ( $i - 1 ) ),
					$position + $i
				) : null;
				$result[]            = $heading;
				$i                   = $end - 1;
			}
		}
		return $result;
	}
}
