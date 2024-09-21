<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */
/*********** FREESIAEMPIRE ADD THEME SUPPORT FOR INFINITE SCROLL **************************/
function wepublishingme_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'wepublishingme_jetpack_setup' );