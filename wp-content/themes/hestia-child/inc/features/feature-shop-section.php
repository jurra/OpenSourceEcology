<?php
/**
 * Customizer functionality for the Shop section.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

/**
 * Hook controls for Shop section to Customizer.
 *
 * @since Hestia 1.0
 */
function hestia_shop_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'hestia_shop', array(
		'title' => esc_html__( 'Shop', 'hestia' ),
		'panel' => 'hestia_frontpage_sections',
		'priority' => apply_filters( 'hestia_section_priority', 20, 'hestia_shop' ),
	));

	if ( class_exists( 'woocommerce' ) ) {

		$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;

		$wp_customize->add_setting( 'hestia_shop_hide', array(
			'sanitize_callback' => 'hestia_sanitize_checkbox',
			'default' => false,
		) );

		$wp_customize->add_control( 'hestia_shop_hide', array(
			'type' => 'checkbox',
			'label' => esc_html__( 'Disable section','hestia' ),
			'section' => 'hestia_shop',
			'priority' => 1,
		) );

		$wp_customize->add_setting( 'hestia_shop_title', array(
			'default' => esc_html__( 'Products', 'hestia' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => $selective_refresh ? 'postMessage' : 'refresh',
		));

		$wp_customize->add_control( 'hestia_shop_title', array(
			'label' => esc_html__( 'Section Title', 'hestia' ),
			'section' => 'hestia_shop',
			'priority' => 5,
		));

		$wp_customize->add_setting( 'hestia_shop_subtitle', array(
			'default' => esc_html__( 'Change this subtitle in customizer.', 'hestia' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => $selective_refresh ? 'postMessage' : 'refresh',
		));

		$wp_customize->add_control( 'hestia_shop_subtitle', array(
			'label' => esc_html__( 'Section Subtitle', 'hestia' ),
			'section' => 'hestia_shop',
			'priority' => 10,
		));

		$wp_customize->add_setting( 'hestia_shop_items', array(
			'default' => 4,
			'sanitize_callback' => 'absint',
		));

		$wp_customize->add_control( 'hestia_shop_items', array(
			'label' => esc_html__( 'Number of Items', 'hestia' ),
			'section' => 'hestia_shop',
			'priority' => 15,
			'type' => 'number',
		));

		if ( $selective_refresh ) {
			$wp_customize->selective_refresh->add_partial( 'hestia_shop_title', array(
				'selector'        => '.products .title',
				'settings'        => 'hestia_shop_title',
				'render_callback' => 'hestia_shop_title_render_callback',
			) );

			$wp_customize->selective_refresh->add_partial( 'hestia_shop_subtitle', array(
				'selector'        => '.products .description',
				'settings'        => 'hestia_shop_subtitle',
				'render_callback' => 'hestia_shop_subtitle_render_callback',
			) );
		}
	} // End if().

}

add_action( 'customize_register', 'hestia_shop_customize_register' );

/**
 * Render callback function for products section title selective refresh
 *
 * @return string
 */
function hestia_shop_title_render_callback() {
	return get_theme_mod( 'hestia_shop_title' );
}

/**
 * Render callback function for products section subtitle selective refresh
 *
 * @return string
 */
function hestia_shop_subtitle_render_callback() {
	return get_theme_mod( 'hestia_shop_subtitle' );
}

