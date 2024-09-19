<?php
/**
 * Displays The Footer Content
 *
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

$wepublishingme_settings = wepublishingme_get_theme_option();

?>

<!-- ***************************************************************************************
 Footer Start
*************************************************************************************** -->
<footer id="colophon" class="site-footer clearfix" role="contentinfo">
	<?php
				$footer_column = $wepublishingme_settings['wepublishingme_footer_column_section'];
					if( is_active_sidebar( 'wepublishingme_footer_1' ) || is_active_sidebar( 'wepublishingme_footer_2' ) || is_active_sidebar( 'wepublishingme_footer_3' ) || is_active_sidebar( 'wepublishingme_footer_4' )) {
    ?>
    <div class="widget-wrap">
		<div class="container">
			<div class="widget-area clearfix">
			<?php
				if($footer_column == '1' || $footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'wepublishingme_footer_1' ) ) :
						dynamic_sidebar( 'wepublishingme_footer_1' );
					endif;
				echo '</div><!-- end .column'.absint($footer_column). '  -->';
				}
				if($footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'wepublishingme_footer_2' ) ) :
						dynamic_sidebar( 'wepublishingme_footer_2' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).'  -->';
				}
				if($footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'wepublishingme_footer_3' ) ) :
						dynamic_sidebar( 'wepublishingme_footer_3' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).'  -->';
				}
				if($footer_column == '4'){
				echo '<div class="column-'.absint($footer_column).'">';
					if ( is_active_sidebar( 'wepublishingme_footer_4' ) ) :
						dynamic_sidebar( 'wepublishingme_footer_4' );
					endif;
				echo '</div><!--end .column'.absint($footer_column).  '-->';
				}
				?>
			</div> <!-- end .widget-area -->
		</div> <!-- end .container -->
	</div> <!-- end .widget-wrap -->
	<?php } ?>
	<div class="site-info">
		<div class="container">
			<?php if(has_nav_menu('footermenu')):
				$args = array(
					'theme_location' => 'footermenu',
					'container'      => '',
					'items_wrap'     => '<ul>%3$s</ul>',
				);
				echo '<nav id="footer-navigation" role="navigation" aria-label="'.esc_attr__('Footer Menu','wepme').'">';
				wp_nav_menu($args);
				echo '</nav><!-- end #footer-navigation -->';
			endif; ?>
			<?php
			if(has_nav_menu('social-link') && $wepublishingme_settings['wepublishingme_buttom_social_icons'] == 0):
				do_action('social_links');
			endif;
				
			if ( is_active_sidebar( 'wepublishingme_footer_options' ) ) :
				dynamic_sidebar( 'wepublishingme_footer_options' );
			else: 
				echo '<div class="copyright">'; ?>
                <?php  echo '&copy; ' . date_i18n(__('Y','freesia-empire')) ; ?>
				<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a> | 
								<?php _e('Designed by:','wepme'); ?> <a title="<?php echo esc_attr__( 'Jahid Munshi', 'wepme' ); ?>" target="_blank" href="<?php echo esc_url( 'https://proghive.com' ); ?>"><?php _e('Jahid Munshi','wepme');?></a> | 
								<?php _e('Powered by:','wepme'); ?> <a title="<?php echo esc_attr__( 'WePublishing', 'wepme' );?>" target="_blank" href="<?php echo esc_url( 'http://www.proghive.com' );?>"><?php _e('WePublishing','wepme'); ?></a>
                              
				</div>
			<?php endif;?>
			<div style="clear:both;"></div>
		</div> <!-- end .container -->
	</div> <!-- end .site-info -->
	<?php
		$disable_scroll = $wepublishingme_settings['wepublishingme_scroll'];
		if($disable_scroll == 0):?>
	<div class="go-to-top"><a title="<?php esc_attr_e('Go to Top','wepublishingme');?>" href="#masthead"></a></div> <!-- end .go-to-top -->
	<?php endif; ?>
</footer> <!-- end #colophon -->
</div> <!-- end #page -->
<?php wp_footer(); ?>
</body>
</html>