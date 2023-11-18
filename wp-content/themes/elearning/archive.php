<?php
/**
 * The template for displaying archive pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
	<div id="primary" class="content-area">
		<?php elearning_content_archive(); ?>
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
