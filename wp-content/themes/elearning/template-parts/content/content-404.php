<?php
/**
 * Template part for displaying 404 content.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="error-404 not-found">
	<?php if ( 'page-header' !== eLearning_Utils::has_page_title() ) : ?>
		<header class="page-header">
			<h1 class="page-title tg-page-content__title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'elearning' ); ?></h1>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div class="page-content">
		<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'elearning' ); ?></p>
		<?php
		get_search_form();
		?>
	</div><!-- .page-content -->
</section><!-- .error-404 -->
