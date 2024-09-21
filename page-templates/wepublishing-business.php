<?php 
/**
 * Template Name: Business Template
 *
 * Displays Business template.
 *  
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */
?>

<?php




function boxlayout_select_condition(){
    $wepublishingme_settings = wepublishingme_get_theme_option();

    if( $wepublishingme_settings['wepublishingme_design_layout'] != 'wide-layout' && $wepublishingme_settings['wepublishingme_design_layout'] != 'small-boxed-layout' ){
        $box_width = 'class="container"';
        echo $box_width;
    }
    if($wepublishingme_settings['wepublishingme_design_layout'] != 'wide-layout' && $wepublishingme_settings['wepublishingme_design_layout'] != 'boxed-layout' ){
        $small_width = 'class="container_container"';
        echo $small_width;}

    if($wepublishingme_settings['wepublishingme_design_layout'] != 'boxed-layout' && $wepublishingme_settings['wepublishingme_design_layout'] != 'small-boxed-layout' ){
        $full_width = 'class="container" id="primary"';
        echo $full_width;
    }
}

?>

<?php get_header();

$wepublishingme_settings = wepublishingme_get_theme_option();
global $wepublishingme_content_layout;
if( $post ) {
    $layout = get_post_meta( $post->ID, 'wepublishingme_sidebarlayout', true );
}
if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
    $layout = 'default';
}
?>
<main id="main" role="main">
    <div <?php echo boxlayout_select_condition() ?>>
        <h1>Corporate page</h1>

        <?php
        if( have_posts()){
            while( have_posts()):the_post();
            the_title();
            the_excerpt();
        endwhile;
        }
        ?>
    </div>
    <div class="container clearfix">
        <div class="row" style="display:flex; justify-content: space-between;" >
            <div class="col-md-6"><p>Images</p></div>
            <div class="col-md-6"><p>Contents</p></div>
        </div>
    </div>
	</main> <!-- #main -->
	<?php get_template_part( 'navigation', 'none' ); ?>
<?php
	if( 'default' == $layout ) { //Settings from customizer
		if(($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'nosidebar') && ($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}
get_sidebar();
get_footer();