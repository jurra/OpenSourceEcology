<?php
/**
 * Security check
 * Prevent direct access to the file.
 *
 * @since 1.3
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Sketchfab oEmbed
 * Register oEmbed provider.
 *
 * @since 1.0
 */
function sketchfab_oembed_provider() {

	wp_oembed_add_provider( '#https?://(www.)?sketchfab.com/models/.*#i', 'https://sketchfab.com/oembed/', true );
	//wp_oembed_add_provider( '#https?://(www.)?skfb.ly/.*#i', 'https://sketchfab.com/oembed/', true );

}
add_action( 'init', 'sketchfab_oembed_provider' );
