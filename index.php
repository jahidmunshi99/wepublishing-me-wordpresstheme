<?php
/**
 * The Main Template File
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *  
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

get_header();

 $wepublishingme_settings = wepublishingme_get_theme_option();	
 global $wepublishingme_content_layout;
 if( $post ) {
     $layout = get_post_meta( $post->ID, 'wepublishingme_sidebarlayout', true );
 }
 if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
     $layout = 'default';
 }
 if( 'default' == $layout ) { //Settings from customizer
     if(($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'nosidebar') && ( $wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'fullwidth')){ ?>
<div id="primary">
 <?php }
 }?>
 <main id="main" class="site-main clearfix">
     <?php
     if( have_posts() ) {
         while( have_posts() ) {
             the_post();
             get_template_part( 'content', get_post_format() );
         }
     }
     else { ?>
     <h2 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'wepme' ); ?> </h2>
     <?php } ?>
 </main> <!-- #main -->
 <?php get_template_part( 'navigation', 'none' ); ?>
<?php
 if( 'default' == $layout ) { //Settings from customizer
     if( ( $wepublishingme_settings[ 'wepublishingme_sidebar_layout_options' ] != 'nosidebar' ) && ( $wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'fullwidth' ) ): ?>
</div> <!-- #primary -->
<?php endif;
}
get_sidebar();
get_footer();
