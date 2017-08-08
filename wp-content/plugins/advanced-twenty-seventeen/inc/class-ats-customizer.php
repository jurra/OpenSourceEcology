<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class ATS_Customizer {
	public function __construct() {
	    add_action( 'widgets_init', array( $this, 'register_sidebars' ), 100 );

        Kirki::add_config( 'ats', array(
            'capability'    => 'edit_theme_options',
            'option_type'   => 'theme_mod',
        ) );

	    $panel_priority = 9999;
	    $section_priority = 10;
	    $control_priority = 10;

        Kirki::add_panel( 'ats_global_panel', array(
            'priority'    => $panel_priority++,
            'title'       => __( 'Advanced: Global', 'advanced-twenty-seventeen' ),
        ) );

        Kirki::add_panel( 'ats_header_panel', array(
            'priority'    => $panel_priority++,
            'title'       => __( 'Advanced: Header', 'advanced-twenty-seventeen' ),
        ) );

        Kirki::add_panel( 'ats_footer_panel', array(
            'priority'    => $panel_priority++,
            'title'       => __( 'Advanced: Footer', 'advanced-twenty-seventeen' ),
        ) );

        Kirki::add_panel( 'ats_miscellaneous_panel', array(
            'priority'    => $panel_priority++,
            'title'       => __( 'Advanced: Miscellaneous', 'advanced-twenty-seventeen' ),
        ) );

        Kirki::add_panel( 'ats_home_panel', array(
            'priority'    => $panel_priority++,
            'title'       => __( 'Advanced: Home Page', 'advanced-twenty-seventeen' ),
        ) );

        Kirki::add_section( 'ats_general_section', array(
            'title'          => __( 'General', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_global_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_typography_section', array(
            'title'          => __( 'Typography', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_global_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_layout_section', array(
            'title'          => __( 'Layout', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_global_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_header_general_section', array(
            'title'          => __( 'General', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_header_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_branding_section', array(
            'title'          => __( 'Site Branding', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_header_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_menu_section', array(
            'title'          => __( 'Menu', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_header_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_footer_general_section', array(
            'title'          => __( 'General', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_footer_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_footer_widget_section', array(
            'title'          => __( 'Widget', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_footer_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_footer_copyright_section', array(
            'title'          => __( 'Custom Copyright', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_footer_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_footer_social_section', array(
            'title'          => __( 'Social Icons', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_footer_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_custom_code_section', array(
            'title'          => __( 'Custom Code', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_miscellaneous_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_section( 'ats_home_general_section', array(
            'title'          => __( 'General', 'advanced-twenty-seventeen' ),
            'panel'          => 'ats_home_panel',
            'priority'       => $section_priority++,
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_site_layout',
            'label'    => __( 'Layout', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_general_section',
            'type'     => 'select',
            'choices'  => array(
                'full_width' => __( 'Full Width', 'advanced-twenty-seventeen' ),
                'boxed' => __( 'Boxed', 'advanced-twenty-seventeen' ),
            ),
            'default' => 'left top',
            'priority' => $control_priority++,
            'transport' => 'refresh',
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_general_background_image',
            'label'    => __( 'Background Image', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_general_section',
            'type'     => 'image',
            'priority' => $control_priority++,
            'description' => __( 'To use this option properly please go to Customizer > Header Media > click on Hide Image of Header Image.', 'advanced-twenty-seventeen' ),
            'output' => array(
                array(
                    'element'  => 'body',
                    'property' => 'background-image',
                ),
            ),
            'active_callback'  => array(
                array(
                    'setting'  => 'ats_site_layout',
                    'operator' => '==',
                    'value'    => 'boxed',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_general_background_repeat',
            'label'    => __( 'Background Repeat', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_general_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_repeat(),
            'default' => 'no-repeat',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => 'body',
                    'property' => 'background-repeat',
                ),
            ),
            'active_callback'  => array(
                array(
                    'setting'  => 'ats_site_layout',
                    'operator' => '==',
                    'value'    => 'boxed',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_general_background_position',
            'label'    => __( 'Background Position', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_general_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_position(),
            'default' => 'left top',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => 'body',
                    'property' => 'background-position',
                ),
            ),
            'active_callback'  => array(
                array(
                    'setting'  => 'ats_site_layout',
                    'operator' => '==',
                    'value'    => 'boxed',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_general_background_attachment',
            'label'    => __( 'Background Attachment', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_general_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_attachment(),
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => 'body',
                    'property' => 'background-attachment',
                ),
            ),
            'active_callback'  => array(
                array(
                    'setting'  => 'ats_site_layout',
                    'operator' => '==',
                    'value'    => 'boxed',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_general_background_color',
            'label'    => __( 'Background Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_general_section',
            'type'     => 'color',
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => 'body',
                    'property' => 'background-color',
                ),
            ),
            'active_callback'  => array(
                array(
                    'setting'  => 'ats_site_layout',
                    'operator' => '==',
                    'value'    => 'boxed',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'typography',
            'settings'    => 'ats_global_text',
            'label'       => esc_attr__( 'Text', 'kirki' ),
            'section'     => 'ats_typography_section',
            'default'     => array(
                'font-family'    => 'Libre Franklin',
                'variant'        => '400',
                'font-size'      => '16px',
                'letter-spacing' => '0em',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#333',
                'text-transform' => 'none',
                'line-height' => '24px'
            ),
            'transport' => 'auto',
            'priority'    => $control_priority++,
            'output'      => array(
                array(
                    'element' => 'body',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_general_color',
            'label'    => __( 'Text Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_typography_section',
            'type'     => 'color',
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => 'body',
                    'property' => 'color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_general_cats_general_heading_colorolor',
            'label'    => __( 'Heading Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_typography_section',
            'type'     => 'color',
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => 'h1, h2, h3, h4, h5, h6',
                    'property' => 'color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_general_link_color',
            'label'    => __( 'Link Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_typography_section',
            'type'     => 'color',
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => 'a',
                    'property' => 'color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_general_link_color_hover',
            'label'    => __( 'Link Color on Hover', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_typography_section',
            'type'     => 'color',
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => 'a:hover',
                    'property' => 'color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_header_background_image',
            'label'    => __( 'Background Image', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_header_general_section',
            'type'     => 'image',
            'priority' => $control_priority++,
            'description' => __( 'To use this option properly please go to Customizer > Header Media > click on Hide Image of Header Image.', 'advanced-twenty-seventeen' ),
            'output' => array(
                array(
                    'element'  => '.site-header',
                    'property' => 'background-image',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_header_background_repeat',
            'label'    => __( 'Background Repeat', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_header_general_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_repeat(),
            'default' => 'no-repeat',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-header',
                    'property' => 'background-repeat',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_header_background_position',
            'label'    => __( 'Background Position', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_header_general_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_position(),
            'default' => 'left top',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-header',
                    'property' => 'background-position',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_header_background_attachment',
            'label'    => __( 'Background Attachment', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_header_general_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_attachment(),
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-header',
                    'property' => 'background-attachment',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_header_background_color',
            'label'    => __( 'Background Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_header_general_section',
            'type'     => 'color',
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-header',
                    'property' => 'background-color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_branding_align',
            'label'    => __( 'Align', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_branding_section',
            'type'     => 'select',
            'choices'  => array(
                'left' => __( 'Left', 'advanced-twenty-seventeen' ),
                'center' => __( 'Center', 'advanced-twenty-seventeen' ),
                'right' => __( 'Right', 'advanced-twenty-seventeen' ),
            ),
            'description' => __( 'Horizontal align for site branding', 'advanced-twenty-seventeen' ),
            'default' => 'left',
            'priority' => $control_priority++,
            'transport' => 'refresh',
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'typography',
            'settings'    => 'ats_header_site_title_typography',
            'label'       => esc_attr__( 'Site Title', 'kirki' ),
            'section'     => 'ats_branding_section',
            'default'     => array(
                'font-family'    => 'Libre Franklin',
                'variant'        => '800',
                'font-size'      => '36px',
                'letter-spacing' => '0.08em',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#fff',
                'text-transform' => 'uppercase',
            ),
            'priority'    => $control_priority++,
            'output'      => array(
                array(
                    'element' => '.site-branding .site-branding-text .site-title, .site-branding .site-branding-text .site-title, .site-branding .site-branding-text .site-title, .site-branding .site-branding-text .site-title a',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'typography',
            'settings'    => 'ats_header_site_description',
            'label'       => esc_attr__( 'Site Description', 'kirki' ),
            'section'     => 'ats_branding_section',
            'default'     => array(
                'font-family'    => 'Libre Franklin',
                'variant'        => '400',
                'font-size'      => '16px',
                'letter-spacing' => '0em',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#fff',
                'text-transform' => 'none',
            ),
            'priority'    => $control_priority++,
            'output'      => array(
                array(
                    'element' => '.site-branding .site-branding-text .site-description',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_menu_align',
            'label'    => __( 'Align', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_menu_section',
            'type'     => 'select',
            'choices'  => array(
                'left' => __( 'Left', 'advanced-twenty-seventeen' ),
                'center' => __( 'Center', 'advanced-twenty-seventeen' ),
                'right' => __( 'Right', 'advanced-twenty-seventeen' ),
            ),
            'description' => __( 'Horizontal align for menu', 'advanced-twenty-seventeen' ),
            'default' => 'left',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element' => '.navigation-top .menu',
                    'property' => 'text-align'
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_menu_background_image',
            'label'    => __( 'Background Image', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_menu_section',
            'type'     => 'image',
            'priority' => $control_priority++,
            'output' => array(
                array(
                    'element'  => '.navigation-top',
                    'property' => 'background-image',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_menu_background_repeat',
            'label'    => __( 'Background Repeat', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_menu_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_repeat(),
            'default' => 'no-repeat',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.navigation-top',
                    'property' => 'background-repeat',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_menu_background_position',
            'label'    => __( 'Background Position', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_menu_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_position(),
            'default' => 'left top',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.navigation-top',
                    'property' => 'background-position',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_menu_background_attachment',
            'label'    => __( 'Background Attachment', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_menu_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_attachment(),
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.navigation-top',
                    'property' => 'background-attachment',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_menu_background_color',
            'label'    => __( 'Background Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_menu_section',
            'type'     => 'color',
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.navigation-top',
                    'property' => 'background-color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_menu_border_top',
            'label'    => __( 'Border Top', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_menu_section',
            'type'     => 'textfield',
            'default' => '1px solid #eee',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'description' => __( 'For example: 1px solid #eee or none', 'advanced-twenty-seventeen' ),
            'output' => array(
                array(
                    'element'  => '.navigation-top',
                    'property' => 'border-top',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_menu_border_bottom',
            'label'    => __( 'Border Bottom', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_menu_section',
            'type'     => 'textfield',
            'default' => '1px solid #eee',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'description' => __( 'For example: 1px solid #eee or none', 'advanced-twenty-seventeen' ),
            'output' => array(
                array(
                    'element'  => '.navigation-top',
                    'property' => 'border-bottom',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'typography',
            'settings'    => 'ats_menu_item',
            'label'       => esc_attr__( 'Menu Item', 'kirki' ),
            'section'     => 'ats_menu_section',
            'default'     => array(
                'font-family'    => 'Libre Franklin',
                'variant'        => '600',
                'font-size'      => '0.875rem',
                'letter-spacing' => '0em',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#222',
                'text-transform' => 'none',
            ),
            'transport' => 'auto',
            'priority'    => $control_priority++,
            'output'      => array(
                array(
                    'element' => '.navigation-top .menu > .menu-item > a',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'typography',
            'settings'    => 'ats_menu_item_hover',
            'label'       => esc_attr__( 'Menu Item on Hover', 'kirki' ),
            'section'     => 'ats_menu_section',
            'default'     => array(
                'font-family'    => 'Libre Franklin',
                'variant'        => '600',
                'font-size'      => '0.875rem',
                'letter-spacing' => '0em',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#767676',
                'text-transform' => 'none',
            ),
            'transport' => 'refresh',
            'priority'    => $control_priority++,
            'output'      => array(
                array(
                    'element' => '.main-navigation .menu > .menu-item > a:hover, .navigation-top .current-menu-item > a, .navigation-top .current_page_item > a',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_general_background_image',
            'label'    => __( 'Background Image', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_general_section',
            'type'     => 'image',
            'priority' => $control_priority++,
            'output' => array(
                array(
                    'element'  => '.site-footer',
                    'property' => 'background-image',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_general_background_repeat',
            'label'    => __( 'Background Repeat', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_general_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_repeat(),
            'default' => 'no-repeat',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-footer',
                    'property' => 'background-repeat',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_general_background_position',
            'label'    => __( 'Background Position', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_general_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_position(),
            'default' => 'left top',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-footer',
                    'property' => 'background-position',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_general_background_attachment',
            'label'    => __( 'Background Attachment', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_general_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_attachment(),
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-footer',
                    'property' => 'background-attachment',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_general_background_color',
            'label'    => __( 'Background Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_general_section',
            'type'     => 'color',
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-footer',
                    'property' => 'background-color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'toggle',
            'settings'    => 'ats_advanced_widgets',
            'label'       => __( 'Advanced Widgets', 'advanced-twenty-seventeen' ),
            'section'     => 'ats_footer_widget_section',
            'default'     => '0',
            'priority'    => $control_priority++,
            'description' => __( 'Allow to add more widget section in the footer', 'advanced-twenty-seventeen' ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'repeater',
            'label'       => esc_attr__( 'Sections', 'advanced-twenty-seventeen' ),
            'section'     => 'ats_footer_widget_section',
            'priority'    => $control_priority,
            'row_label' => array(
                'type' => 'text',
                'value' => esc_attr__('Widget Section', 'advanced-twenty-seventeen' ),
            ),
            'settings'    => 'ats_footer_widgets',
            'default'     => array(
                array(
                    'section_width' => '33%',
                ),
                array(
                    'section_width' => '33%',
                ),
                array(
                    'section_width' => '33%',
                ),
            ),
            'fields' => array(
                'section_width' => array(
                    'type'        => 'text',
                    'label'       => esc_attr__( 'Section Width', 'advanced-twenty-seventeen' ),
                    'default'     => '',
                ),
            ),
            'active_callback'  => array(
                array(
                    'setting'  => 'ats_advanced_widgets',
                    'operator' => '===',
                    'value'    => '1',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'typography',
            'settings'    => 'ats_footer_widget_title',
            'label'       => esc_attr__( 'Widget Title', 'advanced-twenty-seventeen' ),
            'section'     => 'ats_footer_widget_section',
            'default'     => array(
                'font-family'    => 'Libre Franklin',
                'variant'        => '800',
                'font-size'      => '0.6875rem',
                'letter-spacing' => '0.1818em',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#222',
                'text-transform' => 'uppercase',
            ),
            'transport' => 'auto',
            'priority'    => $control_priority++,
            'output'      => array(
                array(
                    'element' => '.site-footer .widget-area h2.widget-title',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'typography',
            'settings'    => 'ats_footer_widget_text',
            'label'       => esc_attr__( 'Widget Text', 'advanced-twenty-seventeen' ),
            'section'     => 'ats_footer_widget_section',
            'default'     => array(
                'font-family'    => 'Libre Franklin',
                'variant'        => '400',
                'font-size'      => '0.875rem',
                'letter-spacing' => '0em',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#333',
                'text-transform' => 'none',
            ),
            'transport' => 'auto',
            'priority'    => $control_priority++,
            'output'      => array(
                array(
                    'element' => '.site-footer .widget-area',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'typography',
            'settings'    => 'ats_footer_widget_link',
            'label'       => esc_attr__( 'Widget Link', 'advanced-twenty-seventeen' ),
            'section'     => 'ats_footer_widget_section',
            'default'     => array(
                'font-family'    => 'Libre Franklin',
                'variant'        => '400',
                'font-size'      => '0.875rem',
                'letter-spacing' => '0em',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#333',
                'text-transform' => 'none',
            ),
            'transport' => 'auto',
            'priority'    => $control_priority++,
            'output'      => array(
                array(
                    'element' => '.site-footer .widget-area a',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_custom_copyright',
            'label'    => __( 'Custom Copyright', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_copyright_section',
            'type'     => 'textarea',
            'default' => __( 'Proudly powered by WordPress', 'advanced-twenty-seventeen' ),
            'priority' => $control_priority++,
            'transport' => 'refresh',
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_copyright_background_image',
            'label'    => __( 'Background Image', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_copyright_section',
            'type'     => 'image',
            'priority' => $control_priority++,
            'output' => array(
                array(
                    'element'  => '.site-footer .footer-copyright-container',
                    'property' => 'background-image',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_copyright_background_repeat',
            'label'    => __( 'Background Repeat', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_copyright_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_repeat(),
            'default' => 'no-repeat',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-footer .footer-copyright-container',
                    'property' => 'background-repeat',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_copyright_background_position',
            'label'    => __( 'Background Position', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_copyright_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_position(),
            'default' => 'left top',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-footer .footer-copyright-container',
                    'property' => 'background-position',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_copyright_background_attachment',
            'label'    => __( 'Background Attachment', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_copyright_section',
            'type'     => 'select',
            'choices'  => $this->choice_background_attachment(),
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-footer .footer-copyright-container',
                    'property' => 'background-attachment',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_copyright_background_color',
            'label'    => __( 'Background Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_copyright_section',
            'type'     => 'color',
            'default' => '',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.site-footer .footer-copyright-container',
                    'property' => 'background-color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'typography',
            'settings'    => 'ats_footer_copyright_text',
            'label'       => esc_attr__( 'Copyright Text', 'advanced-twenty-seventeen' ),
            'section'     => 'ats_footer_copyright_section',
            'default'     => array(
                'font-family'    => 'Libre Franklin',
                'variant'        => '400',
                'font-size'      => '0.875rem',
                'letter-spacing' => '0em',
                'subsets'        => array( 'latin-ext' ),
                'color'          => '#333',
                'text-transform' => 'none',
            ),
            'transport' => 'auto',
            'priority'    => $control_priority++,
            'output'      => array(
                array(
                    'element' => '.site-footer .site-info',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_social_color',
            'label'    => __( 'Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_social_section',
            'type'     => 'color',
            'default' => '#767676',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.social-navigation a',
                    'property' => 'background-color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_social_icon_color',
            'label'    => __( 'Icon Color', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_social_section',
            'type'     => 'color',
            'default' => '#fff',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.social-navigation a',
                    'property' => 'color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_social_color_hover',
            'label'    => __( 'Color on Hover', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_social_section',
            'type'     => 'color',
            'default' => '#333',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.social-navigation a:hover, .social-navigation a:focus',
                    'property' => 'background-color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_footer_social_icon_color_hover',
            'label'    => __( 'Icon Color on Hover', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_footer_social_section',
            'type'     => 'color',
            'default' => '#fff',
            'priority' => $control_priority++,
            'transport' => 'auto',
            'output' => array(
                array(
                    'element'  => '.social-navigation a:hover, .social-navigation a:focus',
                    'property' => 'color',
                ),
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'settings' => 'ats_custom_code',
            'label'    => __( 'Custom Code', 'advanced-twenty-seventeen' ),
            'section'  => 'ats_custom_code_section',
            'type'     => 'code',
            'default' => __( '<!-- Your Custom HTML Code -->', 'advanced-twenty-seventeen' ),
            'priority' => $control_priority++,
            'transport' => 'refresh',
            'choices'     => array(
                'language' => '',
                'theme'    => 'monokai',
                'height'   => 250,
            ),
        ) );

        Kirki::add_field( 'ats', array(
            'type'        => 'toggle',
            'settings'    => 'ats_home_hide_panel_title',
            'label'       => __( 'Hide Panel Title', 'advanced-twenty-seventeen' ),
            'section'     => 'ats_home_general_section',
            'default'     => '0',
            'priority'    => $control_priority++,
            'description' => __( 'Hide title panel or not', 'advanced-twenty-seventeen' ),
        ) );

		add_action( 'wp_footer', array( $this, 'wp_footer' ) );
		add_filter( 'body_class', array( $this, 'body_class' ) );
	}

	public function wp_footer() {
		if ( $custom_code = get_theme_mod( 'ats_custom_code' ) ) {
			echo $custom_code;
		}
	}

	public function body_class( $classes ) {
		$classes[] = 'ats-layout-' . Kirki::get_option( 'ats', 'ats_site_layout' );

		if ( is_customize_preview() ) {
		    $classes[] = 'ats-preview';
        }

        if ( Kirki::get_option( 'ats', 'ats_home_hide_panel_title' ) ) {
		    $classes[] = 'ats-hide-panel-title';
        }

		return $classes;
	}

	protected function choice_background_repeat() {
	    return array(
            'repeat' => __( 'Repeat', 'advanced-twenty-seventeen' ),
            'repeat-x' => __( 'Repeat Horizontal', 'advanced-twenty-seventeen' ),
            'repeat-y' => __( 'Repeat Vertical', 'advanced-twenty-seventeen' ),
            'no-repeat' => __( 'No Repeat', 'advanced-twenty-seventeen' ),
        );
    }

    protected function choice_background_position() {
        return array(
            'left top' => __( 'Left Top', 'advanced-twenty-seventeen' ),
            'left center' => __( 'Left Center', 'advanced-twenty-seventeen' ),
            'left bottom' => __( 'Left Bottom', 'advanced-twenty-seventeen' ),
            'right top' => __( 'Right Top', 'advanced-twenty-seventeen' ),
            'right center' => __( 'Right Center', 'advanced-twenty-seventeen' ),
            'right bottom' => __( 'Right Bottom', 'advanced-twenty-seventeen' ),
            'center top' => __( 'Center Top', 'advanced-twenty-seventeen' ),
            'center center' => __( 'Center Center', 'advanced-twenty-seventeen' ),
            'center bottom' => __( 'Center Bottom', 'advanced-twenty-seventeen' ),
        );
    }

    protected function choice_background_attachment() {
        return array(
            'scroll' => __( 'Scroll', 'advanced-twenty-seventeen' ),
            'fixed' => __( 'Fixed', 'advanced-twenty-seventeen' ),
            'inherit' => __( 'Inherit', 'advanced-twenty-seventeen' ),
        );
    }

    protected function choice_text_transform() {
        return array(
            'none' => __( 'None', 'advanced-twenty-seventeen' ),
            'capitalize' => __( 'Capitalize', 'advanced-twenty-seventeen' ),
            'uppercase' => __( 'Uppercase', 'advanced-twenty-seventeen' ),
            'lowercase' => __( 'Lowercase', 'advanced-twenty-seventeen' ),
            'inherit' => __( 'Inherit', 'advanced-twenty-seventeen' ),
        );
    }

    public function register_sidebars() {
	    if ( Kirki::get_option( 'ats', 'ats_advanced_widgets' ) ) {
	        $widget_sections = Kirki::get_option( 'ats', 'ats_footer_widgets' );

	        if ( count( $widget_sections ) > 2 ) {
	            for ( $i = 3; $i <= count( $widget_sections ); $i++ ) {

                    register_sidebar( array(
                        'name'          => sprintf( __( 'Footer %d', 'advanced-twenty-seventeen' ), $i ) ,
                        'id'            => 'ats-sidebar-' . $i,
                        'description'   => __( 'Add widgets here to appear in your footer.', 'advanced-twenty-seventeen' ),
                        'before_widget' => '<section id="%1$s" class="widget %2$s">',
                        'after_widget'  => '</section>',
                        'before_title'  => '<h2 class="widget-title">',
                        'after_title'   => '</h2>',
                    ) );

                }
            }
        }

    }
}

return new ATS_Customizer();