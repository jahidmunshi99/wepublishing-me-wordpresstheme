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
    $wepublishingme_settings =wepublishingme_get_theme_option();

    if( $wepublishingme_settings['wepublishingme_design_layout'] != 'wide-layout' && $wepublishingme_settings['wepublishingme_design_layout'] != 'small-boxed-layout' ){
        $box_width = 'class="container"';
        echo $box_width;
    }
    if($wepublishingme_settings['wepublishingme_design_layout'] != 'wide-layout' && $wepublishingme_settings            ['wepublishingme_design_layout'] != 'boxed-layout' ){
        $small_width = 'class="container_container"';
        echo $small_width;}

    if($wepublishingme_settings['wepublishingme_design_layout'] != 'boxed-layout' && $wepublishingme_settings           ['wepublishingme_design_layout'] != 'small-boxed-layout' ){
        $full_width = 'class="container" id="primary"';
        echo $full_width;
    }
}

?>

<?php get_header();

$wepublishingme_settings =wepublishingme_get_theme_option();
?>
<main id="main" role="main">
    <h1>Corporate page</h1>
    <div <?php boxlayout_select_condition() ?>>
        <?php
        if( have_posts()){
            while( have_posts()):the_post();
            the_title();
            the_excerpt();
        endwhile;
        }
        ?>
    </div>
</main>
<!-- end #main -->
<?php get_footer() ?>