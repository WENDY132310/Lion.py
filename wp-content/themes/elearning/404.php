<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
	<div id="primary" class="content-area">
		<?php elearning_content_404(); ?>
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
