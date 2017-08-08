<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class ATS_Admin {
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ) );

		$dismiss_notice = get_option( 'ats_dismiss_notice' );

		if ( empty( $dismiss_notice ) ) {
      add_action( 'admin_notices', array( $this, 'notice' ) );
      add_action( 'wp_ajax_ats_dismiss_notice', array( $this, 'dismiss_notice' ) );
    }
	}

	public function includes() {
		include_once( 'class-ats-admin-child-theme.php' );
	}

	public function notice() {
    ?>
    <div class="ats-notice notice notice-success is-dismissible">
      <p><?php echo sprintf( __( 'Hi: You may like <a href="%s" target="_blank">templates here</a> if the Twenty Seventeen theme does not meet your requirement.', 'advanced-twenty-seventeen'), 'https://themeforest.net/user/saturnthemes/portfolio?ref=saturnthemes' ); ?></p>
    </div>
    <script>
      jQuery(document).ready(function ($) {
        setTimeout(function () {
          $('.ats-notice .notice-dismiss').on('click', function () {
            $.ajax({
              url: ajaxurl,
              data: {
                action: 'ats_dismiss_notice'
              }
            });
          });
        }, 2000);
      });
    </script>
    <?php
  }

  public function dismiss_notice() {
	  update_option( 'ats_dismiss_notice', 1 );
	  echo 'done';
  }
}

return new ATS_Admin();