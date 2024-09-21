<?php
/**
 * The sidebar containing the main Sidebar area.
 *
 *  
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

 // ***************************************************************************************
//  Sidebar Start
// ***************************************************************************************

 $wepublishingme_settings = wepublishingme_get_theme_option(); 
 global $wepublishingme_content_layout;
 if( $post ) {
     $layout = get_post_meta( $post->ID, 'wepublishingme_sidebarlayout', true );
 }
 if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
     $layout = 'default';
 }

if( 'default' == $layout ) { //Settings from customizer
 if(($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'nosidebar') && ($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'fullwidth')){ ?>

<aside id="secondary">
<?php }
}else{ // for page/ post
     if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<aside id="secondary">
<?php }
 }?>
<?php 
 if( 'default' == $layout ) { //Settings from customizer
     if(($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'nosidebar') && ($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'fullwidth')): ?>
<?php dynamic_sidebar( 'wepublishingme_main_sidebar' ); ?>
</aside> <!-- #secondary -->
<?php endif;
 }else{ // for page/post
     if(($layout != 'no-sidebar') && ($layout != 'full-width')){
         dynamic_sidebar( 'wepublishingme_main_sidebar' );
         echo '</aside><!-- #secondary -->';
     }
 }