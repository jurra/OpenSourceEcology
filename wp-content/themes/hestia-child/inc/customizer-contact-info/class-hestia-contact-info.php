<?php
/**
 * A custom text control for Contact info.
 *
 * @package Hestia
 * @since Hestia 1.1.10
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * A custom text control for Contact info.
 *
 * @since Hestia 1.0
 */
class Hestia_Contact_Info extends WP_Customize_Control {
	/**
	 * Render content for the control.
	 *
	 * @since Hestia 1.0
	 */
	public function render_content() {
		if ( defined( 'PIRATE_FORMS_VERSION' ) ) :
			/* translators: %s is Path in plugin wrapped */
			printf( esc_html__( 'You should be able to see the form on your front-page. You can configure settings from %s, in your WordPress dashboard.','hestia' ),
				/* translators: %s is Path in plugin*/
				sprintf( '<b>%s</b>', esc_html__( 'Settings > Pirate Forms', 'hestia' ) )
			);
		else :
			/* translators: %s is Plugin name wrapped */
			printf( esc_html__( 'In order to add a contact form to this section, you need need to install %s plugin.','hestia' ),
				/* translators: %s is Plugin name */
				sprintf( '<a href="' . esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=pirate-forms' ), 'install-plugin_pirate-forms' ) ) . '" rel="nofollow">%s</a>',
					esc_html( 'Pirate Forms' )
				)
			);
		endif;
	}
}
