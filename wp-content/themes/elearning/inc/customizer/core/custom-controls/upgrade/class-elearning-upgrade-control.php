<?php
/**
 * Customize Upgrade control class.
 *
 * @package eLearning
 *
 * @since   1.4.6
 * @see     WP_Customize_Control
 */

/**
 * class eLearning_Customize_Heading_Control
 */
class eLearning_Upgrade_Control extends eLearning_Customize_Base_Additional_Control {

	/**
	 * Customize control type.
	 *
	 * @var string
	 */
	public $type = 'elearning-upgrade';

	/**
	 * Custom links for this control.
	 *
	 * @var array
	 */
	public $url = '';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {

		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['url'] = esc_url( $this->url );

	}

	/**
	 * Renders the Underscore template for this control.
	 *
	 * @see    WP_Customize_Control::print_template()
	 * @return void
	 */
	protected function content_template() {
		?>
		<p class="description upgrade-description">{{{ data.description }}}</p>

		<span>
			<a href="{{{data.url}}}" class="button button-primary" target="_blank">
				{{ data.label }}
			</a>
		</span>
		<?php
	}

	/**
	 * Render content is still called, so be sure to override it with an empty function in your subclass as well.
	 */
	protected function render_content() {

	}

}
