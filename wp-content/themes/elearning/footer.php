<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

			</div> <!-- /.site-content from header.php -->
		</div> <!-- /.tg-container from header.php -->
	</main> <!-- /#content from header.php -->
	<?php do_action( 'elearning_after_main' ); ?>

	<?php do_action( 'elearning_before_footer' ); ?>

	<footer id="colophon" class="site-footer tg-site-footer <?php elearning_footer_class(); ?>">
		<?php elearning_footer(); ?>
	</footer><!-- #colophon -->

	<?php do_action( 'elearning_after_footer' ); ?>
</div><!-- #page -->

<?php elearning_footer_bottom(); ?>
<?php wp_footer(); ?>

</body>
</html>
