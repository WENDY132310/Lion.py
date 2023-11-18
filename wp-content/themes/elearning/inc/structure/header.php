<?php
/**
 * Hooks for Header HTML markups.
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'elearning_header_markup' ) ) {

	/**
	 * Adds header markup.
	 *
	 * @return void
	 */
	function elearning_header_markup() {

		$no_content = 'none' === get_theme_mod( 'elearning_header_top_left_content', 'text_html' ) && 'none' === get_theme_mod( 'elearning_header_top_right_content', 'none' );

		eLearning_Utils::has_transparent_header() && print( '<div class="tg-header-transparent-wrapper">' );

		( eLearning_Utils::has_header_top() && ! $no_content ) && elearning_header_top();

		elearning_header_bottom();

		eLearning_Utils::has_transparent_header() && print( '</div>' );
	}
	add_action( 'elearning_header', 'elearning_header_markup' );
}

if ( ! function_exists( 'elearning_header_top_markup' ) ) {

	/**
	 * Adds header top markup.
	 *
	 * @return void
	 */
	function elearning_header_top_markup() {
		?>
		<div class="<?php elearning_css_class( 'elearning_header_top_class' ); ?>">
			<div class="<?php elearning_css_class( 'elearning_header_top_container_class' ); ?>">
				<div class="tg-header-top-left-content">
					<?php elearning_header_top_left(); ?>
				</div>
				<div class="tg-header-top-right-content">
					<?php elearning_header_top_right(); ?>
				</div>
				</div>
		</div>
		<?php
	}
	add_action( 'elearning_header_top', 'elearning_header_top_markup' );
}

if ( ! function_exists( 'elearning_header_top_left_markup' ) ) {

	/**
	 * Adds header top markup.
	 *
	 * @return void
	 */
	function elearning_header_top_left_markup() {
		elearning_get_header_top_section();
	}
	add_action( 'elearning_header_top_left', 'elearning_header_top_left_markup' );
}

if ( ! function_exists( 'elearning_header_top_right_markup' ) ) {

	/**
	 * Adds header top right markup.
	 *
	 * @return void
	 */
	function elearning_header_top_right_markup() {
		elearning_get_header_top_section( 'right' );
	}
	add_action( 'elearning_header_top_right', 'elearning_header_top_right_markup' );
}

if ( ! function_exists( 'elearning_header_bottom_markup' ) ) {

	/**
	 * Adds header bottom.
	 *
	 * @return void
	 */
	function elearning_header_bottom_markup() {
		?>
		<div class="tg-site-header-bottom">
			<div class="<?php elearning_css_class( 'elearning_header_main_container_class' ); ?>">
				<?php elearning_header_bottom_one(); ?>
				<?php elearning_header_bottom_two(); ?>
			</div>
		</div>
		<?php
	}
	add_action( 'elearning_header_bottom', 'elearning_header_bottom_markup' );
}

if ( ! function_exists( 'elearning_header_bottom_one_markup' ) ) {

	/**
	 * Adds header bottom.
	 *
	 * @return void
	 */
	function elearning_header_bottom_one_markup() {

		do_action( 'elearning_header_block_one_before' );
		?>
		<div class="tg-block tg-block--one">
			<?php elearning_header_block_one(); ?>
		</div>
		<?php
		do_action( 'elearning_header_block_one_after' );
	}
	add_action( 'elearning_header_bottom_one', 'elearning_header_bottom_one_markup' );
}

if ( ! function_exists( 'elearning_header_bottom_two_markup' ) ) {

	/**
	 * Adds header bottom.
	 *
	 * @return void
	 */
	function elearning_header_bottom_two_markup() {

		do_action( 'elearning_header_block_two_before' );
		?>
		<div class="tg-block tg-block--two">
			<?php elearning_header_block_two(); ?>
		</div>
		<?php
		do_action( 'elearning_header_block_two_after' );
	}
	add_action( 'elearning_header_bottom_two', 'elearning_header_bottom_two_markup' );
}

if ( ! function_exists( 'elearning_header_block_one_markup' ) ) {

	/**
	 * Header block one markup.
	 */
	function elearning_header_block_one_markup() {
		elearning_site_branding();
	}
	add_action( 'elearning_header_block_one', 'elearning_header_block_one_markup' );
}

if ( ! function_exists( 'elearning_header_block_two_markup' ) ) {

	/**
	 * Header block two markup.
	 */
	function elearning_header_block_two_markup() {
		elearning_primary_menu();
		elearning_header_action();
		elearning_mobile_menu();
	}
	add_action( 'elearning_header_block_two', 'elearning_header_block_two_markup' );
}

if ( ! function_exists( 'elearning_site_branding' ) ) {

	/**
	 * Site branding.
	 */
	function elearning_site_branding() {
		?>
		<div class="site-branding">
			<?php
			$meta_logo_id = ! is_home() ? intval( get_post_meta( eLearning_Utils::get_post_id(), 'elearning_logo', true ) ) : '';

			if ( $meta_logo_id ) {
				$meta_logo_attr = array(
					'class'    => 'tg-logo',
					'itemprop' => 'logo',
				);
				$meta_logo      = apply_filters( 'elearning_meta_logo', elearning_get_image_by_id( $meta_logo_id, $meta_logo_attr, get_bloginfo( 'name', 'display' ) ) );

				echo sprintf(
					'<a href="%1$s" class="tg-logo-link" rel="home" itemprop="url">%2$s</a>',
					esc_url( home_url( '/' ) ),
					$meta_logo // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			} else {
				the_custom_logo();
			}
			?>
			<div class="site-info-wrap">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</p>
					<?php
				endif;

				$elearning_description = get_bloginfo( 'description', 'display' );

				if ( $elearning_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $elearning_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'elearning_primary_menu' ) ) {

	/**
	 * Header primary menu.
	 */
	function elearning_primary_menu() {

		do_action( 'elearning_primary_menu_before' );

		if ( get_theme_mod( 'elearning_primary_menu', false ) ) {
			return;
		}

		?>
		<nav id="site-navigation" class="<?php elearning_css_class( 'elearning_nav_class' ); ?> <?php elearning_primary_menu_class(); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'menu-primary',
					'menu_id'         => 'primary-menu',
					'menu_class'      => 'menu-primary',
					'container_class' => 'menu',
					'fallback_cb'     => 'elearning_menu_fallback',
				)
			);
			?>
		</nav>
		<?php
		do_action( 'elearning_primary_menu_before' );
	}
}

if ( ! function_exists( 'elearning_header_action' ) ) {

	/**
	 * Header Action.
	 */
	function elearning_header_action() {

		if ( get_theme_mod( 'elearning_primary_menu', false ) ) {
			return;
		}

		$mobile_menu_label = get_theme_mod( 'elearning_mobile_menu_text', '' );
		?>
		<nav id="header-action" class="<?php elearning_css_class( 'elearning_header_action_class' ); ?>">
			<ul class="tg-header-action-list">
				<li class="tg-header-action__item tg-mobile-toggle" <?php echo wp_kses_post( apply_filters( 'elearning_nav_toggle_data_attrs', '' ) ); ?>>
					<?php echo apply_filters( 'elearning_before_mobile_menu_toggle', '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<button aria-label="<?php esc_attr_e( 'Primary Menu', 'elearning' ); ?>" >
						<i class="tg-icon tg-icon-bars"><?php echo esc_html( $mobile_menu_label ); ?></i>
					</button>
					<?php echo apply_filters( 'elearning_before_mobile_menu_toggle', '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</li>
			</ul>
		</nav>
		<?php
	}
}

if ( ! function_exists( 'elearning_mobile_menu' ) ) {

	/**
	 * Adds mobile menu.
	 */
	function elearning_mobile_menu() {
		?>
		<nav id="mobile-navigation" class="<?php elearning_css_class( 'elearning_mobile_nav_class' ); ?>" <?php echo apply_filters( 'elearning_nav_data_attrs', '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-primary',
						'menu_id'        => 'mobile-primary-menu',
					)
				);
			?>
		</nav>
		<?php
	}
}

if ( ! function_exists( 'elearning_page_header' ) ) {

	/**
	 * Page header.
	 */
	function elearning_page_header() {

		$meta = get_post_meta( eLearning_Utils::get_post_id(), 'elearning_page_header' );

		if (
			( 'page-header' !== eLearning_Utils::has_page_title() && ! eLearning_Utils::has_breadcrumbs() ) ||
			( is_single() && ! eLearning_Utils::has_breadcrumbs() ) ||
			( isset( $meta[0] ) && ! $meta[0] ) || ( is_home() && is_front_page() )
		) {
			return;
		}

		get_template_part( 'template-parts/page-header/page-header' );
	}
}

if ( ! function_exists( 'elearning_breadcrumbs' ) ) {

	/**
	 * Adds breadcrumbs.
	 */
	function elearning_breadcrumbs() {

		elearning_breadcrumb_trail(
			array(
				'show_browse' => false,
			)
		);
	}
}

if ( ! function_exists( 'elearning_change_logo_attr' ) ) {

	/**
	 * Change the logo image attr while retina logo is set.
	 *
	 * @param $attr
	 * @param $attachment
	 * @param $size
	 *
	 * @return mixed
	 */
	function elearning_change_logo_attr( $attr, $attachment, $size ) {
		$custom_logo = get_theme_mod( 'custom_logo' );
		$retina_logo = get_theme_mod( 'elearning_retina_logo' );

		if ( $custom_logo && $retina_logo && isset( $attr['class'] ) && 'custom-logo' === $attr['class'] ) {
			$attr['srcset']  = '';
			$custom_logo_src = wp_get_attachment_image_src( $custom_logo, 'full' );
			$custom_logo_url = $custom_logo_src[0];

			// Set srcset.
			$attr['srcset'] = $custom_logo_url . ' 1x, ' . $retina_logo . ' 2x';
		}

		return $attr;
	}
	add_filter( 'wp_get_attachment_image_attributes', 'elearning_change_logo_attr', 10, 3 );
}
