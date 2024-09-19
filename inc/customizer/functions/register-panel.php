<?php
/**
 * Theme Customizer Function
 * 
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

/***************************************************************************************/
/* WePublishingme Customize Register Panels
/***************************************************************************************/

if( ! function_exists( 'wepublishingme_business_customize_register_wordpress_default' ) && ! function_exists( 'wepublishingme_corporate_customize_register_wordpress_default' ) ){

    /**
     * WordPress Settings Panel
     */
    add_action( 'customize_register','wepublishingme_customize_register_wordpress_default' );
    function wepublishingme_customize_register_wordpress_default( $wp_customize ){
        $wp_customize->add_panel( 'wepublishingme_wordpress_default_panel', array(
            'priority'       => 5,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'WordPress Settings', 'wepme' ),
            'description'    => '',
		    ) 
        );
    }

    /**
     * WePublishing Theme Customization Panel
     */
    add_action( 'customize_register', 'wepublishingme_customize_register_option');
    function wepublishingme_customize_register_option( $wp_customize ){
        $wp_customize->add_panel( 'wepublishingme_options_panel', array(
            'priority'      => 6,
            'capability'    => 'edit_theme_options',
            'theme_support' => '',
            'title'         => __( 'WePTheme Option', 'wepme' ),
            'description'   => '',
            ) 
        );
    }

    /**
     * WePublishing Sliders Cutomization Panel
     */
    add_action( 'customize_register', 'wepublishingme_customize_register_featuredcontent' );
	function wepublishingme_customize_register_featuredcontent( $wp_customize ) {
		$wp_customize->add_panel( 'wepublishingme_featuredcontent_panel', array(
			'priority' => 7,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Slider Options', 'wepme' ),
			'description' => '',
		) );
	}

    /**
     * WePublishing Widgets Cutomization Panel
     */
	add_action( 'customize_register', 'wepublishingme_customize_register_widgets' );
	function wepublishingme_customize_register_widgets( $wp_customize ) {
		$wp_customize->add_panel( 'widgets', array(
			'priority'       => 8,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'WePublishing Widgets', 'wepme' ),
			'description'    => '',
		    ) 
        );
	}
 }