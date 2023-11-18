<?php
/**
 * Page header template.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$allowed_markup = array( 'h1', 'h2', 'h3', 'h3', 'h4', 'h5', 'h6', 'span', 'p', 'div' );
$markup         = get_theme_mod( 'elearning_page_title_markup', 'h1' );
$style          = apply_filters( 'elearning_page_title_align_filter', get_theme_mod( 'elearning_page_title_alignment', 'tg-page-header--left' ) );

// If the markup doesn't match the allowed one set default one.
if ( ! in_array( $markup, $allowed_markup, true ) ) {
	$markup = 'h1';
}

// Final.
$markup = apply_filters( 'elearning_page_header_markup', $markup );

do_action( 'elearning_before_page_header' );
?>
<header class="tg-page-header <?php echo esc_attr( $style ); ?>">
	<div class="<?php elearning_css_class( 'elearning_page_header_container_class' ); ?>">
		<div class="tg-page-header-title">
			<?php
			if ( 'page-header' === get_theme_mod( 'elearning_page_title', 'page-header' ) && ! is_single() ) {
				$page_title = elearning_get_title();

				// Page header title.
				echo sprintf(
					'<%1$s class="tg-page-header__title">%2$s</%1$s>',
					esc_attr( $markup ),
					wp_kses_post( $page_title )
				);

				! is_post_type_archive( 'mto-course' ) && is_post_type_archive( 'mto-course' );
			}
			?>
		</div>
		<?php
		if ( eLearning_Utils::has_breadcrumbs() ) {
			elearning_breadcrumbs();
		}
		?>
	</div>
</header>
<!-- /.page-header -->
<?php
do_action( 'elearning_after_page_header' );
