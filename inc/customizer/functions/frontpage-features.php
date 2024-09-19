<?php
/**
 * Theme Customizer Function
 * 
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */


 /***************************************************************************************/
/* WePublishingme Theme Theme Options Front Page Feature
/***************************************************************************************/
$wepublishingme_settings = wepublishingme_get_theme_option();

/**
 * WePublishingme Theme options Panel
 * 
 * Front Page features section
 */
$wp_customize->add_section('wepublishingme_frontpage_features', array(
    'title'    => __( 'FrontPage Features', 'wepme' ),
    'priority' => 400,
    'panel'    => 'wepublishingme_options_panel'
    )
);

/**
 * Front Page features section
 * 
 * Front Page [Enable or Disable] Settings 
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_disable_features]', array(
        'default'           => 0,
        'sanitize_callback' => 'freesiaempire_checkbox_integer',
        'type'              => 'option',
    )
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_disable_features]', array(
	'priority' => 405,
	'label'    => __('Disable in Front Page', 'wepme'),
	'section'  => 'wepublishingme_frontpage_features',
	'settings' => 'wepublishingme_theme_options[wepublishingme_disable_features]',
	'type'     => 'checkbox',
    )
);

/**
 * Front Page features section
 * 
 * Front Page Title Text Settings 
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_features_title]', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_textarea_field',
	'type' => 'option',
	'capability' => 'manage_options'
	)
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_features_title]', array(
	'priority' => 412,
	'label'    => __( 'Title', 'wepme' ),
	'section'  => 'wepublishingme_frontpage_features',
	'settings' => 'wepublishingme_theme_options[wepublishingme_features_title]',
	'type'     => 'text',
	)
);

/**
 * Front Page features section
 * 
 * Front Page Descriptions Settings 
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_features_description]', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_textarea_field',
	'type'              => 'option',
	'capability'        => 'manage_options'
	)
);

$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_features_description]', array(
	'priority' => 415,
	'label'    => __( 'Description', 'freesia-empire' ),
	'section'  => 'wepublishingme_frontpage_features',
	'settings' => 'wepublishingme_theme_options[wepublishingme_features_description]',
	'type'     => 'textarea',
	)
);

/**
 * Front Page features section
 * 
 * Front Page Numbers of Settings 
 */
for ( $i=1; $i <= $wepublishingme_settings['wepublishingme_total_features'] ; $i++ ) {
	$wp_customize->add_setting('wepublishingme_theme_options[wepublishingme_frontpage_features_'. $i .']', array(
		'default'           => '',
		'sanitize_callback' => 'wepublishingme_sanitize_page',
		'type'              => 'option',
		'capability'        => 'manage_options'
	    )
    );

	$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_frontpage_features_'. $i .']', array(
		'priority' => 420 . $i,
		'label'    => __(' Feature #', 'wepme') . ' ' . $i,
		'section'  => 'wepublishingme_frontpage_features',
		'settings' => 'wepublishingme_theme_options[wepublishingme_frontpage_features_'. $i .']',
		'type'     => 'dropdown-pages',
	    )
    );
}