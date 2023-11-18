<?php
/**
 * The header for eLearning.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="tg-site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'elearning' ); ?></a>
	<?php do_action( 'elearning_before_header' ); ?>

	<header id="masthead" class="<?php elearning_css_class( 'elearning_header_class' ); ?>">
		<?php elearning_header(); ?>
	</header><!-- #masthead -->

	<?php do_action( 'elearning_after_header' ); ?>

	<?php do_action( 'elearning_before_main' ); ?>
	<main id="main" class="site-main">
		<?php elearning_page_header(); ?>
		<div id="content" class="site-content">
			<div class="tg-container tg-container--flex tg-container--flex-space-between">
