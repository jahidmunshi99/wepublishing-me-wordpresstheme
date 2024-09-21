<?php 
/**
 * The template for displaying all pages.
 */

 get_header();

// ***************************************************************************************
//  Index Page Start
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
		if(( $wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'nosidebar') && ($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'fullwidth' )){ ?>

<div id="primary">
<?php }
	}else{ // for page/ post
		if(( $layout != 'no-sidebar') && ( $layout != 'full-width' )){ ?>
<div id="primary">
	<?php }
	}?>
	<main id="main" role="main">
	<?php
	if( has_post_thumbnail() && $wepublishingme_settings['wepublishingme_display_page_featured_image']!=0) { ?>
		<figure class="post-featured-image">
			<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
			<?php the_post_thumbnail(); ?>
			</a>
		</figure><!-- end.post-featured-image  -->
	<?php }
	if( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
		<div class="entry-content">
			<?php the_content();
				wp_link_pages( array( 
				'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'wepme' ),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1
				) ); ?>
		</div> <!-- entry-content clearfix-->
		<?php  comments_template(); ?>
	<?php }
	} else { ?>
	<h1 class="entry-title"> <?php esc_html_e( 'No Posts Found.', 'wepme' ); ?> </h1>
	<?php
	} ?>
	</main> <!-- #main -->
	<?php 
if( 'default' == $layout ) { //Settings from customizer
	if(($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'nosidebar') && ($wepublishingme_settings['wepublishingme_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}else{ // for page/post
	if(($layout != 'no-sidebar') && ($layout != 'full-width')){
		echo '</div><!-- #primary -->';
	} 
}
get_sidebar();
get_footer();