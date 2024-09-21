<?php
/**
 * The template for displaying 404 pages.
 *
 *  
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

// ***************************************************************************************
//  For the Comments
// ***************************************************************************************

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
	if(($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'nosidebar') && ($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'fullwidth')){ ?>

<div id="primary">
	<?php }
}?>
<div class="site-content" role="main">
	<article id="post-0" class="post error404 not-found">
		<?php if ( is_active_sidebar( 'wepublishingme_404_page' ) ) :
			dynamic_sidebar( 'wepublishingme_404_page' );
		else:?>
		<section class="error-404 not-found">
			<header class="page-header">
				<h2 class="page-title"> <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'freesia-empire' ); ?> </h2>
			</header> <!-- .page-header -->
			<div class="page-content">
				<p> <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'freesia-empire' ); ?> </p>
					<?php get_search_form(); ?>
			</div> <!-- .page-content -->
		</section> <!-- .error-404 -->
	<?php endif; ?>
	</article> <!-- #post-0 .post .error404 .not-found -->
</div> <!-- #content .site-content -->
<?php 
if( 'default' == $layout ) { //Settings from customizer
	if(($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'nosidebar') && ($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}
get_sidebar();
get_footer();