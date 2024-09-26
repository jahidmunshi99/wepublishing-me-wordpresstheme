<?php
/**
 * Display all wepublishinghme functions and definitions
 *
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

/***************************************************************************************/
/* WePublishing After Theme Setup Function
/***************************************************************************************/
add_action( 'after-setup_theme', 'wepublishingme_setup' );
if( ! function_exists( 'wepublishingme_setup') ):
    function wepublishingme_setup(){
    /**
	 * Set the content width based on the theme's design and stylesheet.
	 */
    global $content_width;
    if( ! isset( $content_width ) ){
        $content_width = 790;
    }

    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wepublishing, use a find and replace
	 * to change 'wepublishing-me' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wepublishing-me', get_template_directory() . '/languages' );

    }

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');

    /*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Custom Header Image for Header
	 */
	add_theme_support( 'custom-header' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in three location.
	register_nav_menus( array(
		'primary'     => __( 'Main Menu', 'wepme' ),
		'footer'      => __( 'Footer Menu', 'wepme' ),
		'social-link' => __( 'Add Social Icons Only', 'wepme' ),
	) );
	add_image_size('wepublishingme_slider_image', 1920, 1080, true);

    /*
	 * Switch default core markup for comment form, and comments
	 * to output valid HTML5.
	 */
    add_theme_support( 'html5', array(
        'comment-form', 
		'comment-list', 
		'gallery', 
		'caption',
    ) );

    // Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'gutenberg', array(
			'colors' => array(
				'#6897e5',
			),
		) );
	add_theme_support( 'align-wide' );

    /**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 
		'aside', 
		'gallery', 
		'link', 
		'image', 
		'quote', 
		'video', 
		'audio' 
		) 
	);

    // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wepublishingme_custom_background_args', 
        array(
            'default-color' => 'ffffff',
            'default-image' => '',
	    ) 
    ) );

    add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700' ) );

    /**
	* Making the theme Woocommrece compatible
	*/
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

endif; //wepublishingme_setup

/***************************************************************************************/
/* WePublishing Contents Width
/***************************************************************************************/
add_action( 'template_redirect', 'wepublishingme_content_width' );
function wepublishingme_content_width(){
    if( is_page_template( ' ' ) || is_attachment() ){
        global $content_width;
        $content_width = 1170;
    }
}

/***************************************************************************************/
/* WePublishing Theme Option Function
/***************************************************************************************/
if( ! function_exists( 'wepublishingme_get_theme_option' ) ):
    function wepublishingme_get_theme_option(){
        return wp_parse_args( get_option( 'wepublishingme_theme_options', array() ), wepublishingme_get_option_defaults_values() );
    }
endif;

if( ! is_child_theme() ){
    require get_template_directory() . '/inc/welcome-notice.php';
}

/***************************************************************************************/
/* WePublishingme Theme Option Customization Functions
/***************************************************************************************/
require get_template_directory() . '/inc/customizer/wepublishingme-default-values.php';
require get_template_directory() . '/inc/settings/wepublishingme-functions.php';
require get_template_directory() . '/inc/settings/wepublishingme-common-functions.php';
require get_template_directory() . '/inc/jetpack.php';

/***************************************************************************************/
/* WePublishingme Widgets 
/***************************************************************************************/
require get_template_directory() . '/inc/widgets/widgets-functions/contactus-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/hero-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/post-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/testimonials-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/portfolio-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/counter-widgets.php';

/***************************************************************************************/
/* WePublishingme Customizer
/***************************************************************************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';
/**
 * Create a Customize Register Function
 */
add_action( 'customize_register', 'wepublishingme_customize_register');
function wepublishingme_customize_register( $wp_customize ){
    if( ! class_exists( 'WePublishingme_Plus_Features' ) && ! class_exists( 'WePublishingme_Business_Customize_upgrade' ) && ! class_exists( 'WePublishingme_Corporate_Customize_upgrade' )){
		class wepublishingme_upgrade extends WP_Customize_Control{
			public function render_content() { ?>
				<a title = "<?php esc_attr_e( 'Review WePublishing', 'wepme' ) ?>" href = "<?php echo esc_url( 'https://wepublishing.me' ) ?>" target="__blank" id="about_wepublishingme"> <?php esc_html_e( 'Review WePublishing', 'wepme' ) ?></a><br>
				<a href = "<?php echo esc_url( 'https://wepublishing.me') ?>" title = "<?php esc_attr_e( 'Support Ticket', 'wepme' ) ?>" target="__blank" id="supportticket_wepublishingme" ><?php esc_html_e( 'Forum', 'wepme' ) ?></a>
			<?php 
			}
		}
	}

	/**
	 * Wp Customize About WePublishing Section
	 */
	$wp_customize->add_section( 'wepublishing_update_links', array(
		'title'    => __( 'About WePublishing', 'wepme' ),
		'priority' => 2,
	) );
	/**
	 * Wp Customize About WePublishing Settings
	 */
	$wp_customize->add_setting( 'wepublishing_update_links', array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	/**
	 * Wp Customize About WePublishing Settings
	 */
	$wp_customize->add_control(
		new wepublishingme_upgrade(
			$wp_customize,
			'wepublishing_update_link',
			array(
				'section'  => 'wepublishing_update_links',
				'settings' => 'wepublishing_update_links',
			)
			)
	);

	/**
	 * Theme Customizer design options file calling
	 */
	require get_template_directory() . '/inc/customizer/functions/design-options.php';
	require get_template_directory() . '/inc/customizer/functions/theme-options.php';
	require get_template_directory() . '/inc/customizer/functions/frontpage-features.php';
	require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php';
	require get_template_directory() . '/inc/customizer/functions/single-post-page-features.php';

}

/**************************************************************************************/
/* Add Post Class Clearfix
/**************************************************************************************/
add_filter( 'post_class', 'wepublishingme_post_class_clearfix' );
function wepublishingme_post_class_clearfix(){
	$classes[] = 'clearfix';
	return $classes;
}

/**************************************************************************************/
/* WePublishing Front Page
/**************************************************************************************/
add_action( 'wepublishing_show_front_page', 'wepublishing_display_frontpage');
function wepublishing_display_frontpage(){
	require get_template_directory() . '/index.php';
}

/**************************************************************************************/
/* WePublishingme Header Display
/**************************************************************************************/
/**
 * Site Branding
 */
add_action( 'wepublishingme_site_branding', 'wepublishingme_display_header' );
function wepublishingme_display_header(){
	echo '<div id="site-branding">';
		wepublishing_custom_logo();
		if( is_home() || is_front_page() ){ ?>
			<h1 id="site-title">
		<?php }else{ ?>
			<h2 class="site-title"> <?php } ?>
			<a href=" <?php echo esc_url( home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' )) ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
			<?php if( is_home() || is_front_page() ){
				'</h1> <!-- end site title -->';
			}else{
				'</h2> <!-- end site title -->';
			}
	echo '</div> <!-- site branding end -->';
}

/**
 * Custom Logo
 */
if( ! function_exists( 'wepublishing_custom_logo' )):
	function wepublishing_custom_logo(){
		if( function_exists( 'the_custom_logo' )){
			the_custom_logo( );
		}
	}
endif;

/**
 * Corporate Template
 */
require get_template_directory() . '/inc/front-page/front-page-hero.php';


