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
function wepublishingme_resp_and_custom_css() {
	$wepublishingme_settings = wepublishingme_get_theme_option();
	$header_display = $wepublishingme_settings['wepublishingme_header_display'];
	if( $wepublishingme_settings['wepublishingme_responsive'] == 'on' ) { ?>
	<meta name="viewport" content="width=device-width" />
	<?php } else{ ?>
	<meta name="viewport" content="width=1070" />
	<?php  }
	if($header_display=='header_logo'){
		$freesia_empire_internal_css = '<!-- Custom CSS -->'."\n";
		$freesia_empire_internal_css .= '<style type="text/css" media="screen">'."\n";
		$freesia_empire_internal_css .= 
				'#site-branding #site-title, #site-branding #site-description{
				clip: rect(1px, 1px, 1px, 1px);
				position: absolute;
			}';
		$freesia_empire_internal_css .= '</style>'."\n";
	}
	if (isset($freesia_empire_internal_css)) {
		echo $freesia_empire_internal_css;
	}
}
add_filter( 'wp_head', 'wepublishingme_resp_and_custom_css');



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
add_filter('excerpt_more', 'wepublishingme_continue_reading');
function wepublishingme_continue_reading(){
    return '&hellip';
}


/***************************************************************************************/
/* WePublishingme CUSTOM PAGINATION
/***************************************************************************************/
function wepublishing_pagination( $pages = '', $range = 2 ){
    $showitems = ( $range * 2 ) + 1; //Number of Pagination items Show
    global $paged;

    if( empty( $paged) ){
        $paged = 1;
    }

    if( $pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if( ! $pages ){
            $pages = 1;
        }
    }

    if( 1 != $pages ){
        echo '<div class="wp-pagenavi role="navigation" clearfix">';

        //Display Back Button
        if( $paged > 1 ){
            echo '<span class="pages"><a class="previouspostslink" href=" ' . get_pagenum_link( $paged - 1) .'">&laquo;</a></span>';
        }

        //Total Number of Pages Display
        for( $i = 1; $i <= $pages; $i++){
            if( 1 != $pages && (!( $i >= $paged + $range + 1  || $i <= $paged - $range -1)) || $pages <= $showitems ){
                echo ( $paged == $i ) ? '<span class="current">' . $i . '</span>' : '<a href="' .get_pagenum_link( $i ) .'" class="page smaller" id="page-'.$i.'">'. $i .'</a>';
            }
        }

        //Display Next Button
        if( $paged < $pages ){
            echo '<span class="pages"><a href=" '. get_pagenum_link( $paged + 1 ).' ">&raquo</a></span>';
        }
        echo '</div>';
    }

}


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
    wp_enqueue_script('wepublishing_jquery', get_template_directory_uri() . '/assets/vendor/js/jquery.cycle.all.js', array('jquery'), '3.0.3', true );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/vendor/genericons/genericons.css', array(), '3.4.1' );


    // Google Fonts Enqueue
    // wp_register_style( 'wepublishingme_google_fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' ); 
    wp_register_style( 'wepublishingme_google_fonts', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap' ); 

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

    /**
     * Sticky Menu JQuery loading
     */
    $wepublishing_sticky = $wepublishingme_settings['wepublishingme_stick_menu'];
    if( $wepublishing_sticky != 1):
        wp_enqueue_script( 'wepublishing-sticky-scroll', get_template_directory_uri() . '/assets/js/wepublishing-sticky-scroll-setting.js', array('jquery'));
        wp_enqueue_script('wepublishing-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
        wp_enqueue_script('main-js', get_template_directory_uri() . '/vendor/js/wepublishingme-main.js', array(), '1.0.0', true );

    endif; 




    /**
     * Comments Enqueue
     */

    if( is_singular() && comments_open() && get_option( 'thread_comments' )){
        wp_enqueue_script( 'comment-reply' );
    }
}




/***************************************************************************************/
/* Importing Custom CSS to the core option added in WordPress 4.7.
/***************************************************************************************/