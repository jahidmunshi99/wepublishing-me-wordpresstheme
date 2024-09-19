<?php
/**
 * Theme Customizer Function
 * 
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */
/***************************************************************************************/
/* WePublishingme Theme Customizer Section and Settings and Controls
/***************************************************************************************/

/**
 * Wordpress Default Panel
 * 
 * Site Tile and Logo section
 */
$wp_customize->add_section( 'title_tagline', array(
		'title'    => __('Site Title & Logo Options', 'wepme'),
		'priority' => 10,
		'panel'    => 'wepublishingme_wordpress_default_panel'
        )
    );

/**
 * Site Tile and Logo section
 * 
 * Site Logo upload Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme-img-upload-header-logo]', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'type'              => 'option',
        ) 
    );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wepublishingme_theme_options[wepublishingme-img-upload-header-logo]', array(
		'label'    => __('Site Logo','wepme'),
		'priority' => 101,
		'section'  => 'title_tagline',
		'settings' => 'wepublishingme_theme_options[wepublishingme-img-upload-header-logo]'
		)
	)
);

/**
 * Site Tile and Logo section
 *
 * [Enable or Disable] Site Logo or Text
 */
$wp_customize->add_setting('wepublishingme_theme_options[wepublishingme_header_display]', array(
	'capability'        => 'edit_theme_options',
	'default'           => 'header_text',
	'sanitize_callback' => 'wepublishingme_select',
	'type'              => 'option',
));
$wp_customize->add_control('wepublishingme_theme_options[wepublishingme_header_display]', array(
	'label'    => __('Site Logo/ Text Options', 'wepme'),
	'priority' => 102,
	'section'  => 'title_tagline',
	'settings' => 'wepublishingme_theme_options[wepublishingme_header_display]',
	'type'     => 'select',
	'checked'  => 'checked',
	'choices'  => array(
		'header_text'  => __('Display Site Title Only','wepme'),
		'header_logo'  => __('Display Site Logo Only','wepme'),
		'show_both'    => __('Show Both','wepme'),
		'disable_both' => __('Disable Both','wepme'),
	),
));

/**
 * Wordpress Default Panel Header Image section
 */
$wp_customize->add_section('header_image', array(
	'title'    => __('Header Image', 'wepme'),
	'priority' => 20,
	'panel'    => 'wepublishingme_wordpress_default_panel'
	)
);

/**
 * Header Image section
 * 
 * Header Images Position Select Settings
 */
$wp_customize->add_setting('wepublishingme_theme_options[wepublishingme_display_header_image]', array(
	'capability'        => 'edit_theme_options',
	'default'           => 'top',
	'sanitize_callback' => 'wepublishingme_sanitize_select',
	'type'              => 'option',
));

$wp_customize->add_control('wepublishingme_theme_options[wepublishingme_display_header_image]', array(
	'label'    => __('Display Header Image', 'wepme'),
	'priority' => 5,
	'section'  => 'header_image',
	'settings' => 'wepublishingme_theme_options[wepublishingme_display_header_image]',
	'type'     => 'select',
	'checked'  => 'checked',
	'choices'  => array(
		'below' => __('Display below Site Title','wepme'),
		'top'   => __('Display above Site Title','wepme'),
		),
	)
);

/**
 * Header Image section
 * 
 * [Enable or Disable] Custom Image Settings
 */
$wp_customize->add_setting('wepublishingme_theme_options[wepublishingme_custom_header_options]', array(
	'default'           => 'homepage',
	'sanitize_callback' => 'wepublishingme_sanitize_select',
	'type'              => 'option',
	'capability'        => 'manage_options'
	)
);
$wp_customize->add_control('wepublishingme_theme_options[wepublishingme_custom_header_options]', array(
	'label'    => __('Enable Custom Header Image', 'wepme'),
	'section'  => 'header_image',
	'type'     => 'select',
	'settings' => 'wepublishingme_theme_options[wepublishingme_custom_header_options]',
	'checked'  => 'checked',
	'choices'  => array(
		'homepage'       => __('Front Page','wepme'),
		'enitre_site'    => __('Entire Site','wepme'),
		'header_disable' => __('Disable','wepme'),
		),
	)
);

/**
 * Wordpress Default Panel
 * 
 * Colors Section, Background Image Section, Navigation Section, Static Font Page Section
 */
$wp_customize->add_section('colors', 
	array(
		'title' => __('Colors', 'wepme'),
		'priority' => 30,
		'panel' => 'wepublishingme_wordpress_default_panel'
		)
	);
	$wp_customize->add_section('background_image', 
		array(
		'title' => __('Background Image', 'wepme'),
		'priority' => 40,
		'panel' => 'wepublishingme_wordpress_default_panel'
		)
	);
	$wp_customize->add_section('nav', 
		array(
		'title' => __('Navigation', 'wepme'),
		'priority' => 50,
		'panel' => 'wepublishingme_wordpress_default_panel'
		)
	);
	$wp_customize->add_section('static_front_page', 
		array(
		'title' => __('Static Front Page', 'wepme'),
		'priority' => 60,
		'panel' => 'wepublishingme_wordpress_default_panel'
		)
	);


/***************************************************************************************
 * Theme Options Panel 
***************************************************************************************/

/*
 * WePublishing Options Section
*/
$wp_customize->add_section('wepublishingme_custom_header', array(
	'title'    => __('WePublishing Settings', 'wepme'),
	'priority' => 503,
	'panel'    => 'wepublishingme_options_panel'
	)
);

/**
 * WePublishing Options Section 
 * 
 * [Enable or Disable] Search Form
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_search_custom_header]', array(
	'default'           => 0,
	'sanitize_callback' => 'wepublishingme_checkbox_integer',
	'type'              => 'option',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_search_custom_header]', array(
	'priority' => 20,
	'label'    => __('Disable Search Form', 'wepme'),
	'section'  => 'wepublishingme_custom_header',
	'settings' => 'wepublishingme_theme_options[wepublishingme_search_custom_header]',
	'type'     => 'checkbox',
	)
);

/**
 * WePublishing Options Section 
 * 
 * [Enable or Disable] Stick Menu
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_stick_menu]', array(
	'default'           => 0,
	'sanitize_callback' => 'wepublishingme_checkbox_integer',
	'type'              => 'option',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_stick_menu]', array(
	'priority' => 30,
	'label'    => __('Disable Stick Menu', 'wepme'),
	'section'  => 'wepublishingme_custom_header',
	'settings' => 'wepublishingme_theme_options[wepublishingme_stick_menu]',
	'type'     => 'checkbox',
	)
);

/**
 * WePublishing Options Section 
 * 
 * [Enable or Disable] Go To Top
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_scroll]', array(
	'default'           => 0,
	'sanitize_callback' => 'wepublishingme_checkbox_integer',
	'type'              => 'option',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_scroll]', array(
	'priority' => 40,
	'label'    => __('Disable Goto Top', 'wepme'),
	'section'  => 'wepublishingme_custom_header',
	'settings' => 'wepublishingme_theme_options[wepublishingme_scroll]',
	'type'     => 'checkbox',
	)
);

/**
 * WePublishing Options Section 
 * 
 * [Enable or Disable] Top Social Icons
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_top_social_icons]', array(
	'default'           => 0,
	'sanitize_callback' => 'wepublishingme_checkbox_integer',
	'type'              => 'option',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_top_social_icons]', array(
	'priority' => 43,
	'label'    => __('Disable Top Social Icons', 'wepme'),
	'section'  => 'wepublishingme_custom_header',
	'settings' => 'wepublishingme_theme_options[wepublishingme_top_social_icons]',
	'type'     => 'checkbox',
	)
);

/**
 * WePublishing Options Section 
 * 
 * [Enable or Disable] Bottom Social Icons
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_buttom_social_icons]', array(
	'default' => 0,
	'sanitize_callback' => 'wepublishingme_checkbox_integer',
	'type' => 'option',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_buttom_social_icons]', array(
	'priority' => 46,
	'label'    => __('Disable Buttom Social Icons', 'wepme'),
	'section'  => 'freesiaempire_custom_header',
	'settings' => 'wepublishingme_theme_options[wepublishingme_buttom_social_icons]',
	'type'     => 'checkbox',
	)
);

/**
 * WePublishing Options Section 
 * 
 * [Enable or Disable] Display Page Featured Image
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_display_page_featured_image]', array(
	'default'           => 0,
	'sanitize_callback' => 'wepublishingme_checkbox_integer',
	'type'              => 'option',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_display_page_featured_image]', array(
	'priority' => 48,
	'label'    => __('Display Page Featured Image', 'wepme'),
	'section'  => 'wepublishingme_custom_header',
	'settings' => 'wepublishingme_theme_options[wepublishingme_display_page_featured_image]',
	'type'     => 'checkbox',
	)
);

/**
 * WePublishing Options Section 
 * 
 * [Enable or Disable] Excerpt length by text
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_crop_excerpt_length]', array(
	'default'           => 1,
	'sanitize_callback' => 'wepublishingme_checkbox_integer',
	'type'              => 'option',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_crop_excerpt_length]', array(
	'priority' => 49,
	'label'    => __('Crop Excerpt length by text', 'wepme'),
	'section'  => 'wepublishingme_custom_header',
	'settings' => 'wepublishingme_theme_options[wepublishingme_crop_excerpt_length]',
	'type'     => 'checkbox',
	)
);

/**
 * WePublishing Options Section 
 * 
 * Reset All Default Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_reset_all]', array(
	'default'           => 0,
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'wepublishingme_reset_alls',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_reset_all]', array(
	'priority' => 50,
	'label'    => __('Reset all default settings. (Refresh it to view the effect)', 'wepme'),
	'section'  => 'wepublishingme_custom_header',
	'settings' => 'wepublishingme_theme_options[wepublishingme_reset_all]',
	'type'     => 'checkbox',
	)
);

/**
 * Theme Options Panel 
 * 
 * Custom CSS Section
 */
$wp_customize->add_section( 'wepublishingme_custom_css', array(
	'title'    => __('Enter your custom CSS', 'wepme'),
	'priority' => 507,
	'panel'    => 'wepublishingme_options_panel'
	)
);

/**
 * Custom CSS Section
 * 
 * Custom CSS Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_custom_css]', array(
	'default'           => '',
	'sanitize_callback' => 'wepublishingme_sanitize_custom_css',
	'type'              => 'option',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_custom_css]', array(
	'label'    => __('Custom CSS','wepme'),
	'section'  => 'wepublishingme_custom_css',
	'settings' => 'wepublishingme_theme_options[wepublishingme_custom_css]',
	'type'     => 'textarea'
	)
);

/**
 * Theme Options Panel 
 * 
 * Footer Copyright Text Customization
 */
$wp_customize->add_section( 'wepublishingme_footer_text', array(
	'title'    => __('Footer Copyright', 'wepme'),
	'priority' => 550,
	'panel'    => 'wepublishingme_options_panel'
	)
);

/**
 * Footer Copyright Text Customization Section
 * 
 * Copyright Text Settings
 */
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_copyright]', array(
	'default'           => '',
	'sanitize_callback' => 'wepublishingme_text_field',
	)
);
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_copyright]', array(
	'label'       => __('Copyright Text','wepme'),
	'section'     => 'wepublishingme_footer_text',
	'settings'    => 'wepublishingme_theme_options[wepublishingme_copyright]',
	'type'        => 'input',
	'input_attrs' => array(
		'copyright_text' => "Copyright Text"
	)
	)
);


