<?php
/**
 * Theme Customizer Function
 * 
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */


 /***************************************************************************************/
/* WePublishingme Theme Features Customizer Section and Settings
/***************************************************************************************/

$wepublishingme_settings = wepublishingme_get_theme_option();

/**
 * wepublishingme Featured Content Panel
 * 
 * Slider Settings Section
 */
$wp_customize->add_section( 'featured_content', array(
        'title' => __( 'Slider Settings', 'wepme' ),
        'priority' => 140,
        'panel' => 'wepublishingme_featuredcontent_panel'
        )
    );
$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_enable_slider]', array(
        'default'           => 'frontpage',
        'sanitize_callback' => 'wepublishingme_sanitize_select',
        'type'              => 'option',
        )
    );
$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_enable_slider]', array(
        'priority' => 12,
        'label'    => __( 'Enable Slider', 'wepme' ),
        'section'  => 'featured_content',
        'settings' => 'wepublishingme_theme_options[wepublishingme_enable_slider]',
        'type'     => 'select',
        'checked'  => 'checked',
        'choices'  => array(
        'frontpage'  => __( 'Front Page','wepme' ),
        'enitresite' => __( 'Entire Site','wepme' ),
        'disable'    => __( 'Disable Slider','wepme' ),
        ),
    )
);

/**
 * wepublishingme Featured Content Panel
 * 
 * Display Slider Section
 */
$wp_customize->add_section( 'wepublishingme_page_post_options', array(
	'title'    => __( 'Display Page Slider','wepme' ),
	'priority' => 200,
	'panel'    => 'wepublishingme_featuredcontent_panel'
));
for ( $i=1; $i <= $wepublishingme_settings['wepublishingme_slider_no'] ; $i++ ) {
	$wp_customize->add_setting( 'wepublishingme_theme_options[wepublishingme_featured_page_slider_'. $i .']', array(
		'default'           => '',
		'sanitize_callback' => 'wepublishingme_sanitize_page',
		'type'              => 'option',
		'capability'        => 'manage_options'
	));
	$wp_customize->add_control( 'wepublishingme_theme_options[wepublishingme_featured_page_slider_'. $i .']', array(
		'priority' => 220 . $i,
		'label'    => __(' Page Slider #', 'wepme') . ' ' . $i,
		'section'  => 'wepublishingme_page_post_options',
		'settings' => 'wepublishingme_theme_options[wepublishingme_featured_page_slider_'. $i .']',
		'type'     => 'dropdown-pages',
	));
}