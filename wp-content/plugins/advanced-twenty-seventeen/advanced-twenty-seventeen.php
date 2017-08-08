<?php
/**
 * Plugin Name: Advanced Twenty Seventeen
 * Plugin URI: https://saturnthemes.com/
 * Description: An toolkit that helps you customize the Twenty Seventeen theme completely.
 * Version: 1.3.1
 * Author: saturnplugins
 * Author URI: https://saturnthemes.com
 * Requires at least: 4.0
 * Tested up to: 4.7
 *
 * Text Domain: advanced-twenty-seventeen
 * Domain Path: /i18n/languages/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'AdvancedTwentySeventeen' ) ) {
	class AdvancedTwentySeventeen {
		public $version = '1.3.1';

		protected static $_instance = null;

		public function __construct() {
			$this->define_constants();
			$this->includes();
			$this->init_hooks();
		}

		public function init() {
			$this->load_plugin_textdomain();
		}

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		private function define_constants() {
			$this->define( 'ATS_PLUGIN_FILE', __FILE__ );
			$this->define( 'ATS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
			$this->define( 'ATS_VERSION', $this->version );
		}

		public function includes() {
            include_once( 'inc/libraries/kirki/kirki.php' );

            if ( $this->is_request( 'admin' ) ) {
				include_once( 'inc/admin/class-ats-admin.php' );
			}

			include_once( 'inc/class-ats-customizer.php' );
			include_once( 'inc/class-ats-install.php' );

			if ( $this->is_request( 'frontend' ) ) {
				$this->frontend_includes();
			}
		}

		public function frontend_includes() {
		}

		public function load_plugin_textdomain() {
			$locale = apply_filters( 'plugin_locale', get_locale(), 'advanced-twenty-seventeen' );

			load_textdomain( 'advanced-twenty-seventeen', WP_LANG_DIR . '/advanced-twenty-seventeen/advanced-twenty-seventeen-' . $locale . '.mo' );
			load_plugin_textdomain( 'advanced-twenty-seventeen', false, plugin_basename( dirname( __FILE__ ) ) . '/i18n/languages' );
		}

		public function plugin_url() {
			return untrailingslashit( plugins_url( '/', __FILE__ ) );
		}

		public function plugin_path() {
			return untrailingslashit( plugin_dir_path( __FILE__ ) );
		}

		protected function init_hooks() {
			register_activation_hook( __FILE__, array( 'ATS_Install', 'install' ) );
			add_action( 'init', array( $this, 'init' ), 0 );
		}

		protected function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		protected function is_request( $type ) {
			switch ( $type ) {
				case 'admin' :
					return is_admin();
				case 'ajax' :
					return defined( 'DOING_AJAX' );
				case 'cron' :
					return defined( 'DOING_CRON' );
				case 'frontend' :
					return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
			}
		}
	}
}

function ats() {
	return AdvancedTwentySeventeen::instance();
}

$GLOBALS['ats'] = ats();