<?php
/**
 * Helper class for font settings for this theme.
 *
 * class eLearning_Fonts
 *
 * @package    ThemeGrill
 * @subpackage eLearning
 * @since      eLearning 3.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper class for font settings for this theme.
 *
 * class eLearning_Fonts
 */
class eLearning_Fonts {

	/**
	 * System Fonts
	 *
	 * @var array
	 */
	public static $system_fonts = array();

	/**
	 * Google Fonts
	 *
	 * @var array
	 */
	public static $google_fonts = array();

	/**
	 * Custom Fonts
	 *
	 * @var array
	 */
	public static $custom_fonts = array();

	/**
	 * Font variants
	 *
	 * @var array
	 */
	public static $font_variants = array();

	/**
	 * Google font subsets
	 *
	 * @var array
	 */
	public static $google_font_subsets = array();

	/**
	 * Get system fonts.
	 *
	 * @return mixed|void
	 */
	public static function get_system_fonts() {

		if ( empty( self::$system_fonts ) ) :

			self::$system_fonts = array(

				'default'                                                                                                                              => array(
					'family' => 'default',
					'label'  => 'Default',
				),
				'Georgia,Times,"Times New Roman",serif'                                                                                                 => array(
					'family' => 'Georgia,Times,"Times New Roman",serif',
					'label'  => 'serif',
				),
				'-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif' => array(
					'family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif',
					'label'  => 'sans-serif',
				),
				'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace'                                                   => array(
					'family' => 'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace',
					'label'  => 'monospace',
				),

			);

		endif;

		return apply_filters( 'elearning_system_fonts', self::$system_fonts );

	}

	/**
	 * Get Google fonts.
	 * It's array is generated from the google-fonts.json file.
	 *
	 * @return mixed|void
	 */
	public static function get_google_fonts() {

		if ( empty( self::$google_fonts ) ) :

			global $wp_filesystem;
			$google_fonts_file = apply_filters( 'elearning_google_fonts_json_file', dirname(__FILE__) . '/custom-controls/typography/google-fonts.json' );

			if ( ! file_exists( dirname(__FILE__) . '/custom-controls/typography/google-fonts.json' ) ) {
				return array();
			}

			// Require `file.php` file of WordPress to include filesystem check for getting the file contents.
			if ( ! $wp_filesystem ) {
				require_once ABSPATH . '/wp-admin/includes/file.php';
			}

			// Proceed only if the file is readable.
			if ( is_readable( $google_fonts_file ) ) {
				WP_Filesystem();

				$file_contents     = $wp_filesystem->get_contents( $google_fonts_file );
				$google_fonts_json = json_decode( $file_contents, 1 );

				foreach ( $google_fonts_json['items'] as $key => $font ) {

					$google_fonts[ $font['family'] ] = array(
						'family'   => $font['family'],
						'label'    => $font['family'],
						'variants' => $font['variants'],
						'subsets'  => $font['subsets'],
					);

					self::$google_fonts = $google_fonts;

				}
			}

		endif;

		return apply_filters( 'elearning_system_fonts', self::$google_fonts );

	}

	/**
	 * Get custom fonts.
	 *
	 * @return mixed|void
	 */
	public static function get_custom_fonts() {

		return apply_filters( 'elearning_custom_fonts', self::$custom_fonts );

	}

	/**
	 * Get font variants.
	 *
	 * @return mixed|void
	 */
	public static function get_font_variants() {

		if ( empty( self::$font_variants ) ) :

			self::$font_variants = array(
				'100'       => esc_html__( 'Thin 100', 'elearning' ),
				'100italic' => esc_html__( 'Thin 100 Italic', 'elearning' ),
				'200'       => esc_html__( 'Extra-Light 200', 'elearning' ),
				'200italic' => esc_html__( 'Extra-Light 200 Italic', 'elearning' ),
				'300'       => esc_html__( 'Light 300', 'elearning' ),
				'300italic' => esc_html__( 'Light 300 Italic', 'elearning' ),
				'regular'   => esc_html__( 'Regular 400', 'elearning' ),
				'italic'    => esc_html__( 'Regular 400 Italic', 'elearning' ),
				'500'       => esc_html__( 'Medium 500', 'elearning' ),
				'500italic' => esc_html__( 'Medium 500 Italic', 'elearning' ),
				'600'       => esc_html__( 'Semi-Bold 600', 'elearning' ),
				'600italic' => esc_html__( 'Semi-Bold 600 Italic', 'elearning' ),
				'700'       => esc_html__( 'Bold 700', 'elearning' ),
				'700italic' => esc_html__( 'Bold 700 Italic', 'elearning' ),
				'800'       => esc_html__( 'Extra-Bold 800', 'elearning' ),
				'800italic' => esc_html__( 'Extra-Bold 800 Italic', 'elearning' ),
				'900'       => esc_html__( 'Black 900', 'elearning' ),
				'900italic' => esc_html__( 'Black 900 Italic', 'elearning' ),
			);

		endif;

		return apply_filters( 'elearning_font_variants', self::$font_variants );

	}

	/**
	 * Get Google font subsets.
	 *
	 * @return mixed|void
	 */
	public static function get_google_font_subsets() {

		if ( empty( self::$google_font_subsets ) ) :

			self::$google_font_subsets = array(
				'arabic'              => esc_html__( 'Arabic', 'elearning' ),
				'bengali'             => esc_html__( 'Bengali', 'elearning' ),
				'chinese-hongkong'    => esc_html__( 'Chinese (Hong Kong)', 'elearning' ),
				'chinese-simplified'  => esc_html__( 'Chinese (Simplified)', 'elearning' ),
				'chinese-traditional' => esc_html__( 'Chinese (Traditional)', 'elearning' ),
				'cyrillic'            => esc_html__( 'Cyrillic', 'elearning' ),
				'cyrillic-ext'        => esc_html__( 'Cyrillic Extended', 'elearning' ),
				'devanagari'          => esc_html__( 'Devanagari', 'elearning' ),
				'greek'               => esc_html__( 'Greek', 'elearning' ),
				'greek-ext'           => esc_html__( 'Greek Extended', 'elearning' ),
				'gujarati'            => esc_html__( 'Gujarati', 'elearning' ),
				'gurmukhi'            => esc_html__( 'Gurmukhi', 'elearning' ),
				'hebrew'              => esc_html__( 'Hebrew', 'elearning' ),
				'japanese'            => esc_html__( 'Japanese', 'elearning' ),
				'kannada'             => esc_html__( 'Kannada', 'elearning' ),
				'khmer'               => esc_html__( 'Khmer', 'elearning' ),
				'korean'              => esc_html__( 'Korean', 'elearning' ),
				'latin'               => esc_html__( 'Latin', 'elearning' ),
				'latin-ext'           => esc_html__( 'Latin Extended', 'elearning' ),
				'malayalam'           => esc_html__( 'Malayalam', 'elearning' ),
				'myanmar'             => esc_html__( 'Myanmar', 'elearning' ),
				'oriya'               => esc_html__( 'Oriya', 'elearning' ),
				'sinhala'             => esc_html__( 'Sinhala', 'elearning' ),
				'tamil'               => esc_html__( 'Tamil', 'elearning' ),
				'telugu'              => esc_html__( 'Telugu', 'elearning' ),
				'thai'                => esc_html__( 'Thai', 'elearning' ),
				'tibetan'             => esc_html__( 'Tibetan', 'elearning' ),
				'vietnamese'          => esc_html__( 'Vietnamese', 'elearning' ),
			);

		endif;

		return apply_filters( 'elearning_font_variants', self::$google_font_subsets );

	}

}
