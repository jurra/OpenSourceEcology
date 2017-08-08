<?php
/**
 * Security check
 * Prevent direct access to the file.
 *
 * @since 1.5
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Sketchfab shortcode
 * Register shortcode handler.
 *
 * usage: [sketchfab id="" width="" height="" autostart="0" autospin="0"]
 *
 * @since 1.5
 */
function sketchfab_shortcode( $atts ) {

	// Set default attributes
	$atts = shortcode_atts(
		array(
			'id'          => '',
			'width'       => 640,
			'height'      => 480,
			'autostart'   => '0',
			'autospin'    => '0'
		), $atts
	);

	// Embed code
	$embed_code = '<iframe width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" src="https://sketchfab.com/models/' . $atts['id'] . '/embed?autostart=' . $atts['autostart'] . '&autospin=' . $atts['autospin'] . '" frameborder="0" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';

	// Return embed code
	return $embed_code;

}
add_shortcode( 'sketchfab', 'sketchfab_shortcode' );
