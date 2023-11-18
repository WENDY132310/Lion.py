<?php
/**
 * The template for displaying search results pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
	<section id="primary" class="content-area">
		<?php elearning_content_search(); ?>
	</section><!-- #primary -->
<?php
get_sidebar();
get_footer();
