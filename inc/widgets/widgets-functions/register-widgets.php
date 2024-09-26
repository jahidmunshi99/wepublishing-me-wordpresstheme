<?php
/**
 * * 
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

 /***************************************************************************************/
/* WePublishingme Register Widgets
/***************************************************************************************/
add_action( 'widgets_init', 'wepublishingme_widgets_init' );
function wepublishingme_widgets_init(){
    register_widget( 'wepublishing_contact_widget' );
    register_widget( 'wepublishing_hero_section_widgets' );
    register_widget( 'wepublishing_counter_widget' );
    // register_widget( 'wepublishing_post_widget' );
    register_widget( 'wepublishing_testimonial_widget' );
    // register_widget( 'wepublishing_portfolio_widget' );

    /**
     * Register Main Sidebar
     */
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'wepme' ),
        'id'            => 'wepublishingme_main_sidebar',
        'description'   => __( 'Shows widgets at Main Sidebar.', 'wepme' ),
        'before_widget' => '<aside id="%1$s" class=" widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '</h2 class="widget-title">',
        'after_title'   => '</h2',
        ) 
    );

    /**
     * Register Display Contact Info at Header Widget
     */
    register_sidebar( array(
        'name'          => __( 'Display Contact Info at Header', 'wepme' ),
        'id'            => 'wepublishingme_header_info',
        'description'   => __( 'Shows widgets on all page.', 'wepme' ),
        'before_widget' => '<div id="%1$s" class="info clearfix">',
        'after_widget'  => '</div>',
        ) 
    );

    /**
     * Register Front Page Section Widget
     */
    register_sidebar( array(
        'name'          => __( 'Front Page Section', 'wepme' ),
        'id'            => 'wepublishingme_corporate_page_sidebar',
        'description'   => __( 'Shows widgets on Front Page. You may use some of this widgets: WEPUBLISH: Featured Recent Work, WEPUBLISH: Testimonial, WEPUBLISH: Slogan', 'wepme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ) 
    );

    /**
     * Register Contact Page Widget
     */
    register_sidebar( array(
        'name'          => __( 'Contact Page', 'wepme' ),
        'id'            => 'wepublishingme_contact_page_sidebar',
        'description'   => __( 'Shows widgets on Contact Page Template.', 'wepme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ) 
    );

    /**
     * Register Shortcode For Contact Page Widget
     */
    register_sidebar( array(
        'name'          => __( 'Shortcode For Contact Page', 'wepme' ),
        'id'            => 'wepublishingme_form_for_contact_page',
        'description'   => __( 'Add Contact Form 7 Shortcode using text widgets Ex: [contact-form-7 id="137" title="Contact form 1"]', 'wepme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ) 
    );

    /**
     * Register Footer Column Widget
     */
    global $wepublishingme_settings;
    $wepublishingme_settings = wepublishingme_get_theme_option();
    for( $i = 1; $i<= $wepublishingme_settings[ 'wepublishingme_footer_column_section' ]; $i++ ){
        register_sidebar( array(
			'name'          => __('Footer Column ', 'wepme') . $i,
			'id'            => 'freesiaempire_footer_'.$i,
			'description'   => __('Shows widgets at Footer Column ', 'wepme').$i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
            ) 
        );
    }

    /**
     * Register WooCommarce Sidebar Widget
     */
    register_sidebar( array(
        'name'          => __( 'WooCommarce Sidebar', 'wepme' ),
        'id'            => 'wepublishingme_woocommarce_sidebar',
        'description'   => __( 'Add WooCommerce Widgets Only', 'wepme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ) 
    );


}