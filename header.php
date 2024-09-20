<?php
/**
 * Displays The Header Content
 *
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

?>
<!DOCTYPE html>
<html lang="<?php language_attributes() ?>" class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' )?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head()?>

</head>
<body <?php body_class() ?> >
    <?php
        if( function_exists( 'wp_body_open' ) ){
            wp_body_open(  );
        }
    ?>

<!-- ***************************************************************************************
 Master Head
*************************************************************************************** -->
<header id="master-head" class="site-header">
    <!-- Main Header -->
    <div id="sticky_header">
		<div class="container clearfix">
			<!-- Main Nav ============================================= -->
			<?php
				if ( has_nav_menu( 'primary' ) ) { ?>
			<?php $args = array(
				'theme_location' => 'primary',
				'container'      => '',
				'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
				); ?>
			<nav id="site-navigation" class="main-navigation clearfix" role="navigation" aria-label="<?php esc_attr_e('Main Menu','wepme');?>">
				<button class="menu-toggle-2" aria-controls="primary-menu" aria-expanded="false"></button>
					  	<!-- end .menu-toggle -->
				<?php wp_nav_menu( $args );//extract the content from apperance-> nav menu ?>
			</nav> <!-- end #site-navigation -->
			<?php } else {// extract the content from page menu only ?>
			<nav id="site-navigation" class="main-navigation clearfix" role="navigation" aria-label="<?php esc_attr_e('Main Menu','freesia-empire');?>">
				<button class="menu-toggle-2" aria-controls="primary-menu" aria-expanded="false"></button>
					  	<!-- end .menu-toggle -->
				<?php	wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>')); ?>
			</nav> <!-- end #site-navigation -->
			<?php } ?>
		</div> <!-- end .container -->
	</div> <!-- end #sticky_header -->
</header>