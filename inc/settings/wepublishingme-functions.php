<?php
/**
 * Custom Functions
 *
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

/********************* Set Default Value if not set ***********************************/
if ( ! get_theme_mod('wepublishingme_theme_options') ) {
    set_theme_mod( 'wepublishingme_theme_options', wepublishingme_get_option_defaults_values() );
}

/***************************************************************************************/
/* WePublishingme RESPONSIVE AND CUSTOM CSS OPTIONS
/***************************************************************************************/




/***************************************************************************************/
/* WePublishingme EXCERPT LENGTH
/***************************************************************************************/
add_filter( 'excerpt_length', 'wepublishingme_excerpt_length' );
function wepublishingme_excerpt_length( $length ){
    $wepublishingme_settings = wepublishingme_get_theme_option();
    $wepublishingme_excerpt_length = $wepublishingme_settings[ 'wepublishingme_excerpt_length' ];
    return absint( $wepublishingme_excerpt_length );
}


/***************************************************************************************/
/* WePublishingme CONTINUE READING LINKS FOR EXCERPT
/***************************************************************************************/





/***************************************************************************************/
/* USED CLASS FOR BODY TAGS
/***************************************************************************************/




/***************************************************************************************/
/* wp_enqueue_script
/***************************************************************************************/




/***************************************************************************************/
/* SOCIAL MENU
/***************************************************************************************/
add_action ('social_links', 'wepublishingme_social_links');
function wepublishingme_social_links(){
    if( has_nav_menu( 'social-link') ): ?>
        <div class="social-links clearfix">
        <?php
        wp_nav_menu( array(
			'container'      => '',
			'theme_location' => 'social-link',
			'depth'          => 1,
			'items_wrap'     => '<ul>%3$s</ul>',
			'link_before'    => '<span class="screen-reader-text">',
			'link_after'     => '</span>',
            ) 
        );
        ?>    
        </div> <!-- end .social links -->
    <?php endif;
}

/***************************************************************************************/
/* DISPLAY BREADCRUMBS
/***************************************************************************************/
function wepublishingme_breadcrumb() {
	if (function_exists('bcn_display')) { ?>
		<div class="breadcrumb home">
			<?php bcn_display(); ?>
		</div> <!-- .breadcrumb -->
	<?php }
}



/***************************************************************************************/
/* PAGE SLIDERS
/***************************************************************************************/



/***************************************************************************************/
/* ENQUEING STYLES AND SCRIPTS
/***************************************************************************************/
add_action( 'wp_enqueue_scripts', 'wepubishingme_scripts' );
function wepubishingme_scripts(){
    $wepublishingme_settings = wepublishingme_get_theme_option();
    wp_enqueue_style( 'wepublishingme_style', get_stylesheet_uri() );

    // wp_register_style( 'wepublishingme_google_fonts', wptt_get_webfont_url('https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' )); 

    // $enable_slider = $wepublishingme_settings[ 'wepublishingme_enable_slider' ];

    if( $wepublishingme_settings['wepublishingme_responsive'] == 'on' ){
        wp_enqueue_style( 'wepublishingme-responsive', get_template_directory_uri().'/assets/css/responsive.css' );
    }
    /**
     * Animate Wow Jquery and Css Loading
     */
    if( $wepublishingme_settings['wepublishingme_animate_css'] == 'on' ) {
		wp_enqueue_style('wepublishingme-animate', get_template_directory_uri().'/assets/vendor/wow/css/animate.min.css');
		wp_enqueue_script('wow', get_template_directory_uri().'/assets/vendor/wow/js/wow.min.js', array('jquery'));
		wp_enqueue_script('wow-settings', get_template_directory_uri().'/assets/vendor/wow/js/wow-settings.js', array('jquery'));
	}

    if( is_singular() && comments_open() && get_option( 'thread_comments' )){
        wp_enqueue_script( 'comment-reply' );
    }
}




/***************************************************************************************/
/* Importing Custom CSS to the core option added in WordPress 4.7.
/***************************************************************************************/