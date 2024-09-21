<?php
/**
 * Theme Customizer Function
 * 
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */


 /***************************************************************************************/
/* WePublishingme Theme Single Post Page Customizer Section and Settings
/***************************************************************************************/

$wepublishingme_settings = wepublishingme_get_theme_option();

/**
 * Single Post Option Section
 */
$wp_customize->add_section( 'wepublishingme_single_post', array(
    'title'    => __( 'Single Post Options', 'wepme' ),
    'priority' => 103,
    'panel'    => 'wepublishingme_options_panel'
    )
);

/**
 * Single Post Option Section
 * 
 * Post Thumbnails [on/off] Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_single_post_image]', array(
    'default'           => 'on',
    'sanitize_callback' => 'wepublishingme_sanitize_select',
    'type'              => 'option',
    ) 
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_single_post_image]', array(
    'poriority' => 10,
    'label'     => __( 'Display Featured Image', 'wepme' ),
    'section'   => 'wepublishingme_single_post',
    'settings'  => 'wepublishingme_theme_options[wepublishingme_single_post_image]',
    'type'      => 'select',
    'checked'   => 'checked',
    'choices'   => array(
        'on'  => __( 'ON', 'wepme' ),
        'off' => __( 'OFF', 'wepme' ),
        )
    ) 
);

/**
 * Single Post Option Section
 * 
 * Post Meta info [on/off] Settings
 */
 $wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_single_post_meta]', array(
    'default'           => 'on',
    'sanitize_callback' => 'wepublishingme_sanitize_select',
    'type'              => 'option',
    ) 
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_single_post_meta]', array(
    'poriority' => 12,
    'label'     => __( 'Display Meta Info', 'wepme' ),
    'section'   => 'wepublishingme_single_post',
    'settings'  => 'wepublishingme_theme_options[wepublishingme_single_post_meta]',
    'type'      => 'select',
    'checked'   => 'checked',
    'choices'   => array(
        'on'  => __( 'ON', 'wepme' ),
        'off' => __( 'OFF', 'wepme' ),
        )
    ) 
);

/**
 * Single Post Option Section
 * 
 * Post Meta info Author Name display [on/off] Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_single_post_meta_author]', array(
    'default'           => 'on',
    'sanitize_callback' => 'wepublishingme_sanitize_select',
    'type'              => 'option',
    ) 
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_single_post_meta_author]', array(
    'poriority' => 12,
    'label'     => __( 'Display Author', 'wepme' ),
    'section'   => 'wepublishingme_single_post',
    'settings'  => 'wepublishingme_theme_options[wepublishingme_single_post_meta_author]',
    'type'      => 'checkbox',
    ) 
);

/**
 * Single Post Option Section
 * 
 * Post Meta info Date Name display [on/off] Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_single_post_meta_date]', array(
    'default'           => 'on',
    'sanitize_callback' => 'wepublishingme_sanitize_select',
    'type'              => 'option',
    ) 
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_single_post_meta_date]', array(
    'poriority' => 12,
    'label'     => __( 'Display Date', 'wepme' ),
    'section'   => 'wepublishingme_single_post',
    'settings'  => 'wepublishingme_theme_options[wepublishingme_single_post_meta_date]',
    'type'      => 'checkbox',
    ) 
);

/**
 * Single Post Option Section
 * 
 * Post Meta info Date Number of Comments display [on/off] Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_single_post_meta_data]', array(
    'default'           => 'on',
    'sanitize_callback' => 'wepublishingme_sanitize_select',
    'type'              => 'option',
    ) 
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_single_post_meta_data]', array(
    'poriority' => 15,
    'label'     => __( 'Display Number of Comments', 'wepme' ),
    'section'   => 'wepublishingme_single_post',
    'settings'  => 'wepublishingme_theme_options[wepublishingme_single_post_meta_data]',
    'type'      => 'checkbox',
    ) 
);