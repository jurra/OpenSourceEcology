<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class ATS_Admin_Child_Theme {
	protected $is_17_theme = false;
	protected $is_child_theme = true;

	public function __construct() {
		$theme = wp_get_theme();

		$this->is_17_theme    = 'twentyseventeen' == $theme->template;
		$this->is_child_theme = is_child_theme();

		add_action( 'admin_post_ats_create_child_theme', array( $this, 'create_child_theme' ) );
		add_action( 'admin_notices', array( $this, 'notices' ) );
	}

	public function create_child_theme() {
		$child_theme_stub_path = ats()->plugin_path() . '/inc/admin/child-theme';
		$theme_path = get_theme_root() . '/advanced-twenty-seventeen-child';

		@mkdir( $theme_path );
		@mkdir( $theme_path . '/template-parts' );
		@mkdir( $theme_path . '/template-parts/header' );
		@mkdir( $theme_path . '/template-parts/footer' );

		@copy( $child_theme_stub_path . '/style.css', $theme_path . '/style.css' );
		@copy( $child_theme_stub_path . '/functions.php', $theme_path . '/functions.php' );
		@copy( $child_theme_stub_path . '/screenshot.png', $theme_path . '/screenshot.png' );
		@copy( $child_theme_stub_path . '/footer.php', $theme_path . '/footer.php' );
		@copy( $child_theme_stub_path . '/template-parts/header/site-branding.php', $theme_path . '/template-parts/header/site-branding.php' );
		@copy( $child_theme_stub_path . '/template-parts/footer/site-info.php', $theme_path . '/template-parts/footer/site-info.php' );
		@copy( $child_theme_stub_path . '/template-parts/footer/footer-widgets.php', $theme_path . '/template-parts/footer/footer-widgets.php' );

		switch_theme( 'advanced-twenty-seventeen-child' );

		wp_redirect( add_query_arg( array('ats_child_theme_created' => 1), admin_url('themes.php') ) );
	}

	public function notices() {
		?>
		<?php if ( ! $this->is_17_theme || ! $this->is_child_theme ) : ?>
			<div class="notice notice-error">
				<p>
					<?php esc_html_e( 'Advanced Twenty Seventeen plugin', 'advanced-twenty-seventeen' ); ?>:
					<?php if ( ! $this->is_17_theme ) : ?>
						<?php esc_html_e( 'Please activate the theme Twenty Seventeen.', 'advanced-twenty-seventeen' ) ?>
					<?php endif; ?>
					<?php if ( $this->is_17_theme && ! $this->is_child_theme ) : ?>
						<?php echo sprintf( __( 'Please click <a href="%s">here</a> to create advanced child theme for Twenty Seventeen', 'advanced-twenty-seventeen' ), 'admin-post.php?action=ats_create_child_theme' ); ?>
					<?php endif; ?>
				</p>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $_GET['ats_child_theme_created'] ) ) : ?>
			<div class="notice notice-success">
				<p>
					<?php esc_html_e( 'Advanced Twenty Seventeen plugin', 'advanced-twenty-seventeen' ); ?>:
					<?php echo sprintf( __( 'The child theme is created successfully. Please go to <a href="%s">customize</a> to use Advanced Twenty Seventeen', 'advanced-twenty-seventeen' ), admin_url( 'customize.php' ) ); ?>
				</p>
			</div>
		<?php endif; ?>
		<?php
	}
}

return new ATS_Admin_Child_Theme();