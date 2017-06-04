<?php
/**
 * Customizer functionality for the Blog section.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

/**
 * Hook controls for Blog section to Customizer.
 *
 * @since Hestia 1.0
 */
function hestia_blog_customize_register( $wp_customize ) {

	$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;

	$wp_customize->add_section( 'hestia_blog', array(
		'title' => esc_html__( 'Blog', 'hestia' ),
		'panel' => 'hestia_frontpage_sections',
		'priority' => apply_filters( 'hestia_section_priority', 50, 'hestia_blog' ),
	));

	$wp_customize->add_setting( 'hestia_blog_hide', array(
		'sanitize_callback' => 'hestia_sanitize_checkbox',
		'default' => false,
	) );

	$wp_customize->add_control( 'hestia_blog_hide', array(
		'type' => 'checkbox',
		'label' => esc_html__( 'Disable section','hestia' ),
		'section' => 'hestia_blog',
		'priority' => 1,
	) );

	$wp_customize->add_setting( 'hestia_blog_title', array(
		'default' => esc_html__( 'Blog', 'hestia' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => $selective_refresh ? 'postMessage' : 'refresh',
	));

	$wp_customize->add_control( 'hestia_blog_title', array(
		'label' => esc_html__( 'Section Title', 'hestia' ),
		'section' => 'hestia_blog',
		'priority' => 5,
	));

	$wp_customize->add_setting( 'hestia_blog_subtitle', array(
		'default' => esc_html__( 'Change this subtitle in customizer.', 'hestia' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => $selective_refresh ? 'postMessage' : 'refresh',
	));

	$wp_customize->add_control( 'hestia_blog_subtitle', array(
		'label' => esc_html__( 'Section Subtitle', 'hestia' ),
		'section' => 'hestia_blog',
		'priority' => 10,
	));

	$wp_customize->add_setting( 'hestia_blog_items', array(
		'default' => 3,
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control( 'hestia_blog_items', array(
		'label' => esc_html__( 'Number of Items', 'hestia' ),
		'section' => 'hestia_blog',
		'priority' => 15,
		'type' => 'number',
	));

	if ( $selective_refresh ) {
		$wp_customize->selective_refresh->add_partial( 'hestia_blog_title', array(
			'selector'            => '.blogs h2.title',
			'settings'            => 'hestia_blog_title',
			'render_callback'     => 'hestia_blog_title_render_callback',
		) );

		$wp_customize->selective_refresh->add_partial( 'hestia_blog_subtitle', array(
			'selector'            => '.blogs h5.description',
			'settings'            => 'hestia_blog_subtitle',
			'render_callback'     => 'hestia_blog_subtitle_render_callback',
		) );

	}

}

add_action( 'customize_register', 'hestia_blog_customize_register' );

/**
 * Render callback function for header title selective refresh
 *
 * @return string
 */
function hestia_blog_title_render_callback() {
	return get_theme_mod( 'hestia_blog_title' );
}

/**
 * Render callback function for header title selective refresh
 *
 * @return string
 */
function hestia_blog_subtitle_render_callback() {
	return get_theme_mod( 'hestia_blog_subtitle' );
}
