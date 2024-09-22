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
		wepublishing_pagination();
	endif; 
}