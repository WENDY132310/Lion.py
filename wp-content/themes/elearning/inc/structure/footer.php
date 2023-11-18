<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'elearning_footer_markup' ) ) {

	/**
	 * Footer markup.
	 */
	function elearning_footer_markup() {
		elearning_footer_widgets();
		elearning_footer_bar();
	}
	add_action( 'elearning_footer', 'elearning_footer_markup' );
}

if ( ! function_exists( 'elearning_footer_widgets_markup' ) ) {

	/**
	 * Footer widgets markup.
	 */
	function elearning_footer_widgets_markup() {

		if ( ! eLearning_Utils::has_footer_widgets() ) {
			return;
		}
		?>
		<div class="tg-site-footer-widgets">
			<div class="<?php elearning_css_class( 'elearning_footer_widgets_container_class' ); ?>">
				<?php get_sidebar( 'footer' ); ?>
			</div><!-- /.tg-container-->
		</div><!-- /.tg-site-footer-widgets -->
		<?php
	}
	add_action( 'elearning_footer_widgets', 'elearning_footer_widgets_markup' );
}

if ( ! function_exists( 'elearning_footer_bar_markup' ) ) {

	/**
	 * Footer bar markup.
	 */
	function elearning_footer_bar_markup() {

		if ( ! eLearning_Utils::has_footer_bar() ) {
			return;
		}
		?>
		<div class="tg-site-footer-bar <?php elearning_footer_bar_classes(); ?>">
			<div class="<?php elearning_css_class( 'elearning_footer_bottom_bar_container_class' ); ?>">
					<div class="tg-site-footer-section-1">
						<?php elearning_get_footer_bar_section(); ?>
					</div>
				<div class="tg-site-footer-section-2">
					<?php elearning_get_footer_bar_section( 'two' ); ?>
				</div>
			</div>
		</div>
		<?php
	}
	add_action( 'elearning_footer_bar', 'elearning_footer_bar_markup' );
}

if ( ! function_exists( 'elearning_scroll_to_top' ) ) {

	/**
	 * Scroll to top
	 */
	function elearning_scroll_to_top() {

		// If scroll to top is disabled.
		if ( ! get_theme_mod( 'elearning_scroll_to_top', true ) ) {
			return;
		}
		?>

		<a href="#" id="tg-scroll-to-top" class="<?php elearning_css_class( 'elearning_scroll_to_top_class' ); ?>">
			<i class="<?php echo esc_attr( apply_filters( 'elearning_scroll_to_top_icon_class', 'tg-icon' ) ); ?> <?php echo esc_attr( apply_filters( 'elearning_scroll_to_top_icon', 'tg-icon-arrow-up' ) ); ?>">
				<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'elearning' ); ?></span>
			</i>
		</a>
		<div class="tg-overlay-wrapper"></div>
		<?php
	}
	add_action( 'elearning_footer_bottom', 'elearning_scroll_to_top' );
}
