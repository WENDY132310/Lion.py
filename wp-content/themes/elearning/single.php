<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
	<div id="primary" class="content-area">
		<?php elearning_content_single(); ?>
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
