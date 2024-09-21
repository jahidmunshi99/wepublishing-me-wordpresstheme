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
<html <?php language_attributes(); ?>>
<?php
$wepublishingme_settings = wepublishingme_get_theme_option(); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php 
	if ( function_exists( 'wp_body_open' ) ) {

		wp_body_open();

	} ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content','wepme');?></a>
<!-- Masthead ============================================= -->
<header id="masthead" class="site-header" role="banner">
	<?php
				if($header_image = $wepublishingme_settings['wepublishingme_display_header_image'] == 'top'){
					do_action('wepublishingme_header_image');
				}
				echo '<div class="top-header">
						<div class="container clearfix">';
						do_action('wepublishingme_site_branding');

						echo '<button class="menu-toggle" type="button">      
								<div class="line-one"></div>
								<div class="line-two"></div>
								<div class="line-three"></div>
							</button>';

						echo '<div class="header-info clearfix">';
							if(has_nav_menu('social-link') && $wepublishingme_settings['wepublishingme_top_social_icons'] == 0):
								echo '<div class="header-social-block">';
									do_action('social_links');
								echo '</div>'.'<!-- end .header-social-block -->';
							endif;
							if( is_active_sidebar( 'wepublishingme_header_info' )) {
								dynamic_sidebar( 'wepublishingme_header_info' );
							}
						echo ' </div> <!-- end .header-info -->';
						$search_form = $wepublishingme_settings['wepublishingme_search_custom_header'];
						if (1 != $search_form) { ?>
							<button id="search-toggle" class="header-search" type="button"></button>
							<div id="search-box" class="clearfix">
								<?php get_search_form();?>
							</div>  <!-- end #search-box -->
						<?php } 

					echo '</div> <!-- end .container -->
				</div> <!-- end .top-header -->';
			if($header_image = $wepublishingme_settings['wepublishingme_display_header_image'] == 'below'){
				do_action('wepublishingme_header_image');
			} 
			?>
	<!-- Main Header============================================= -->
	<div id="sticky_header">
		<div class="container clearfix">
			<!-- Main Nav ============================================= -->
			<?php
				if (has_nav_menu( 'primary' )) { ?>
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
			<nav id="site-navigation" class="main-navigation clearfix" role="navigation" aria-label="<?php esc_attr_e('Main Menu','wepme');?>">
				<button class="menu-toggle-2" aria-controls="primary-menu" aria-expanded="false"></button>
					  	<!-- end .menu-toggle -->
				<?php	wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>')); ?>
			</nav> <!-- end #site-navigation -->
			<?php } ?>
		</div> <!-- end .container -->
	</div> <!-- end #sticky_header -->

	
</header> <!-- end #masthead -->
<!-- Main Page Start ============================================= -->
<div id="content">
<?php if ( ! is_page_template('page-templates/wepublishingme-business.php') ){ 
  if( is_page_template('three-column-blog-template.php') || is_page_template('our-team-template.php') || is_page_template( 'about-us-template.php' ) || is_page_template( 'portfolio-template.php' ) ){

	}else{?>
<div class="container clearfix">
<?php }
	}