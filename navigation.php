<?php
/**
 * The template for displaying navigation.
 *
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

 if ( !class_exists( 'Jetpack') || class_exists( 'Jetpack') && !Jetpack::is_module_active( 'infinite-scroll' ) ){
	if ( function_exists('wp_pagenavi' ) ) :
		wp_pagenavi();
	else: 
	global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul class="default-wp-page clearfix">
			<li class="previous">
				<?php next_posts_link( __( '&laquo; Previous Page', 'wepme' ) ); ?>
			</li>
			<li class="next">
				<?php previous_posts_link( __( 'Next Page &raquo;', 'wepme' ) ); ?>
			</li>
		</ul>
		<?php  endif;
	endif; 
}