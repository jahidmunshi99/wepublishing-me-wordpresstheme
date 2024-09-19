<?php
/**
 * Theme Customizer Function
 * 
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

/***************************************************************************************/
/* WePublishingme Theme Customization Theme Options
/***************************************************************************************/

/**
 * Layout Section
 */
$wp_customize->add_section( 'wepublishingme_layout_options', array(
    'title'    => __( 'Layout Options', 'wepme' ),
    'priority' => 102,
    'panel'    => 'wepublishingme_options_panel'
    )
);

/**
 * Responsive Settings Option
 */
$wp_customize->add_setting( 'wepublishingme_option_panel[wepublishingme_responsive]', array(
    'default'           => 'on',
    'sanitize_callback' => 'wepublishingme_sanitize_select',
    'type'              => 'option',
    ) 
);

$wp_customize->add_control( 'wepublishingme_option_panel[wepublishingme_responsive]', array(
    'poriority' => 10,
    'label'     => __( 'Responsive Layout', 'wepme' ),
    'section'   => 'wepublishingme_layout_options',
    'settings'  => 'wepublishingme_option_panel[wepublishingme_responsive]',
    'type'      => 'select',
    'checked'   => 'checked',
    'choices'   => array(
        'on'  => __( 'ON', 'wepme' ),
        'off' => __( 'OFF', 'wepme' ),
        )
    ) 
);

/**
 * Animation Settings Option
 */
$wp_customize->add_setting('wepublishingme_theme_options[wepublishingme_animate_css]', array(
        'default'           => 'on',
        'sanitize_callback' => 'wepublishingme_sanitize_select',
        'type'              => 'option',
    )
);

$wp_customize->add_control('wepublishingme_theme_options[wepublishingme_animate_css]', array(
        'priority' => 15,
        'label'    => __('Animation Options', 'wepme'),
        'section'  => 'wepublishingme_layout_options',
        'settings' => 'wepublishingme_theme_options[wepublishingme_animate_css]',
        'type'     => 'select',
        'checked'  => 'checked',
        'choices'  => array(
            'on'  => __('ON ','wepme'),
            'off' => __('OFF','wepme'),
        ),
    )
);

/**
 * Sidebar Layout Option Settings
 */
$wp_customize->add_setting('wepublishingme_theme_options[wepublishingme_sidebar_layout_options]', array(
        'default' => 'right',
        'sanitize_callback' => 'wepublishingme_sanitize_select',
        'type' => 'option',
    )
);

$wp_customize->add_control('wepublishingme_theme_options[wepublishingme_sidebar_layout_options]', array(
        'priority' => 20,
        'label'    => __('Sidebar Layout Options', 'wepme'),
        'section'  => 'wepublishingme_layout_options',
        'settings' => 'wepublishingme_theme_options[wepublishingme_sidebar_layout_options]',
        'type'     => 'select',
        'checked'  => 'checked',
        'choices'  => array(
            'right'     => __('Right Sidebar','wepme'),
            'left'      => __('Left Sidebar','wepme'),
            'nosidebar' => __('No Sidebar','wepme'),
            'fullwidth' => __('Full Width','wepme'),
        ),
    )
);

/**
 * Bolog Image Display Layout Settings
 */
$wp_customize->add_setting('wepublishingme_theme_options[wepublishingme_blog_layout_temp]', array(
        'default'           => 'large_image_display',
        'sanitize_callback' => 'wepublishingme_sanitize_select',
        'type'              => 'option',
    )
);

$wp_customize->add_control('wepublishingme_theme_options[wepublishingme_blog_layout_temp]', array(
        'priority' => 30,
        'label'    => __('Blog Image Display Layout', 'wepme'),
        'section'  => 'wepublishingme_layout_options',
        'settings' => 'wepublishingme_theme_options[wepublishingme_blog_layout_temp]',
        'type'     => 'select',
        'checked'  => 'checked',
        'choices'  => array(
            'large_image_display'  => __('Blog large image display','wepme'),
            'medium_image_display' => __('Blog medium image display','wepme'),
        ),
    )
);

/**
 * Enable or Disable Entry Format Bolog Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_entry_format_blog]', array(
        'default'           => 'show',
        'sanitize_callback' => 'wepublishingme_sanitize_select',
        'type'              => 'option',
    )
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_entry_format_blog]', array(
        'priority' => 40,
        'label'    => __('Disable Entry Format from Blog Page', 'wepme'),
        'section'  => 'wepublishingme_layout_options',
        'settings' => 'wepublishingme_theme_options[wepublishingme_entry_format_blog]',
        'type'     => 'select',
        'choices'  => array(
            'show'        => __('Display Entry Format','wepme'),
            'hide'        => __('Hide Entry Format','wepme'),
            'show-button' => __('Show Button Only','wepme'),
            'hide-button' => __('Hide Button Only','wepme'),
        ),
    )
);

/**
 * Enable or Disable Entry Meta Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_entry_meta_blog]', array(
        'default'           => 'show-meta',
        'sanitize_callback' => 'wepublishingme_sanitize_select',
        'type'              => 'option',
    )
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_entry_meta_blog]', array(
        'priority' => 45,
        'label'    => __('Disable Entry Meta from Blog Page', 'wepme'),
        'section'  => 'wepublishingme_layout_options',
        'settings' => 'wepublishingme_theme_options[wepublishingme_entry_meta_blog]',
        'type'     => 'select',
        'choices'  => array(
            'show-meta' => __('Display Entry Meta','wepme'),
            'hide-meta' => __('Hide Entry Meta','wepme'),
        ),
    )
);

/**
 * Design Layout Settings
 */
$wp_customize->add_setting('wepublishingme_theme_options[wepublishingme_design_layout]', array(
    'default'           => 'wide-layout',
    'sanitize_callback' => 'wepublishingme_sanitize_select',
    'type'              => 'option',
    )
);

$wp_customize->add_control('wepublishingme_theme_options[wepublishingme_design_layout]', array(
        'priority' => 50,
        'label'    => __('Design Layout', 'wepme'),
        'section'  => 'wepublishingme_layout_options',
        'settings' => 'wepublishingme_theme_options[wepublishingme_design_layout]',
        'type'     => 'select',
        'checked'  => 'checked',
        'choices'  => array(
            'wide-layout'        => __('Full Width Layout','wepme'),
            'boxed-layout'       => __('Boxed Layout','wepme'),
            'small-boxed-layout' => __('Small Boxed Layout','wepme'),
        ),
    )
);

/**
 * Display Layout Settings
 */
$wp_customize->add_setting('wepublishingme_theme_options[wepublishingme_blog_header_display]', array(
        'default'           => 'show',
        'sanitize_callback' => 'wepublishingme_sanitize_select',
        'type'              => 'option',
    )
);

$wp_customize->add_control('wepublishingme_theme_options[wepublishingme_blog_header_display]', array(
        'priority' => 50,
        'label'    => __('Design Layout', 'wepme'),
        'section'  => 'wepublishingme_layout_options',
        'settings' => 'wepublishingme_theme_options[wepublishingme_blog_header_display]',
        'type'     => 'select',
        'checked'  => 'checked',
        'choices'  => array(
            'show' => __('Show Blog Header','wepme'),
            'hide' => __('Hide Blog Header','wepme'),
        ),
    )
);
