<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class eLearning_Dashboard {
	private static $instance;

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		$this->setup_hooks();
	}

	private function setup_hooks() {
		add_action( 'admin_menu', array( $this, 'create_menu' ) );
	}

	public function create_menu() {

		add_theme_page(
			esc_html__( 'eLearning Options', 'elearning' ),
			esc_html__( 'eLearning Options', 'elearning' ),
			'edit_theme_options',
			'elearning-options',
			array(
				$this,
				'option_page',
			)
		);
	}

	public function option_page() {

		$customize_options = array(
			'site_logo' => array(
				'label' => __( 'Upload Logo', 'elearning' ),
				'link'  => admin_url( 'customize.php?autofocus[control]=custom_logo' ),
				'icon'  => 'dashicons-format-image',
			),
			'colors'    => array(
				'label' => __( 'Set Color', 'elearning' ),
				'link'  => admin_url( 'customize.php?autofocus[section]=elearning_colors_section' ),
				'icon'  => 'dashicons-admin-appearance',
			),
			'header'    => array(
				'label' => __( 'Header Options', 'elearning' ),
				'link'  => admin_url( 'customize.php?autofocus[panel]=elearning_header_panel' ),
				'icon'  => 'dashicons-insert-before',
			),
			'blog'      => array(
				'label' => __( 'Blog Options', 'elearning' ),
				'link'  => admin_url( 'customize.php?autofocus[section]=elearning_archive_blog_section' ),
				'icon'  => ' dashicons-editor-bold',
			),
			'footer'    => array(
				'label' => __( 'Footer Options', 'elearning' ),
				'link'  => admin_url( 'customize.php?autofocus[panel]=elearning_footer_panel' ),
				'icon'  => 'dashicons-insert-after',
			),
		);

		?>
			<div class="wrap">
				<div class="metabox-holder">
					<div class="elearning-header" >
						<div class="elearning-container">
							<a class="elearning-title" href="<?php echo esc_url( 'https://masteriyo.com/themes/elearning' ); ?>" target="_blank">
								<img class="elearning-icon" src="<?php echo esc_url( ELEARNING_PARENT_URI . '/inc/admin/images/eLearning-logo.svg' ); ?>" alt="elearning">
								<span class="elearning-version">
									<?php
									echo esc_html( self::get_theme()->Version );
									?>
								</span>
							</a>
							<div>
								<a href="<?php echo esc_url( 'https://masteriyo.com/themes/elearning' ); ?>" target="_blank"><?php esc_html_e( 'Theme Info', 'elearning' ); ?></a>
								<a href="<?php echo esc_url( 'https://demo.masteriyo.com/elearning/' ); ?>" target="_blank"><?php esc_html_e( 'Demos', 'elearning' ); ?></a>
								<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/elearning/' ); ?>" target="_blank"><?php esc_html_e( 'Support', 'elearning' ); ?></a>
							</div>
						</div><!--/.elearning-container-->
					</div> <!--/.elearning-header-->
					<div class="elearning-container">
						<div class="postbox-container" style="float: none;">
							<div class="col-70">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<div class="postbox">
									<h3 class="hndle"><?php esc_html_e( 'Quick customize settings', 'elearning' ); ?></h3>
									<div class="inside elearning-quick-settings" style="padding: 0;margin: 0;">
										<ul>
											<?php foreach ( $customize_options as $customize_option ) : ?>
												<li>
													<a href="<?php echo esc_url( $customize_option['link'] ); ?>" target="_blank">
														<span class="dashicons <?php echo esc_attr( $customize_option['icon'] ); ?>"></span>
														<h4><?php echo esc_html( $customize_option['label'] ); ?></h4>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div> <!--/.col-70-->
							<div class="col-30">
								<div class="postbox">
									<h3 class="hndle" ><span class="dashicons dashicons-download"></span><span><?php esc_html_e( 'Starter Demos', 'elearning' ); ?></span></h3>
									<div class="inside">
										<p>
											<?php
											echo sprintf(
												/* translators: 1: Theme Name, 2: Demo Link. */
												esc_html__( 'You do not need to build your site from scratch, %1$s provides a variety of %2$s', 'elearning' ),
												esc_html( self::get_theme()->Name ),
												'<a href="' . esc_url( 'https://demo.masteriyo.com/elearning/' ) . '" target="_blank">' . esc_html__( 'Demos.', 'elearning' ) . '</a>'
											);
											?>
										</p>
										<p><?php esc_html_e( 'Import demo site and start editing as your liking.', 'elearning' ); ?></p>
										<a href="#" class="btn-get-started" data-name="<?php echo esc_attr( 'themegrill-demo-importer' ); ?>" data-slug="<?php echo esc_attr( 'themegrill-demo-importer' ); ?>" aria-label="<?php echo esc_attr( eLearning_Admin::btn_text( false ) ); ?>">
											<?php echo esc_html( eLearning_Admin::btn_text( false ) . ' &#129066;' ); ?>
										</a>
									</div>
								</div>
								<div class="postbox">
									<h3 class="hndle"><span class="dashicons dashicons-thumbs-up"></span><span><?php esc_html_e( 'Review', 'elearning' ); ?></span></h3>
									<div class="inside">
										<p>
											<?php
											echo sprintf(
												/* translators: 1: Theme Name, 2: Review Link. */
												esc_html__( 'Love using %1$s? Help us by leaving a review %2$s', 'elearning' ),
												esc_html( self::get_theme()->Name ),
												'<a href="' . esc_url( 'https://wordpress.org/support/theme/elearning/reviews/' ) . '" target="_blank">' . esc_html__( 'here &#129066;', 'elearning' ) . '</a>'
											);
											?>
										</p>
									</div>
								</div>
							</div><!--/.col-30-->
						</div><!--/.postbox-container-->
					</div><!--/.elearning-container-->
				</div><!--/.metabox-holder-->
			</div><!--/.wrap-->
		<?php
	}

	/**
	 * Get theme.
	 *
	 * @since 1.0.0
	 *
	 * @return false|WP_Theme
	 */
	public static function get_theme() {

		if ( ! is_child_theme() ) {
			$theme = wp_get_theme();
		} else {
			$theme = wp_get_theme()->parent();
		}

		return $theme;
	}
}

elearning_Dashboard::instance();
