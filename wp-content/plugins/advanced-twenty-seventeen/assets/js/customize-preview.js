/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {
	wp.customize( 'ats_custom_copyright', function( value ) {
		value.bind( function( to ) {
			$( '.site-info' ).html( to );
		});
	});

} )( jQuery );
