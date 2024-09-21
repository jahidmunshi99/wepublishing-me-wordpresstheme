<?php
/**
 * The template for displaying Searchform
 *
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */
?>
 <form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<?php
		$wepublishingme_settings = wepublishingme_get_theme_option();
		$wepublishingme_search_form = $wepublishingme_settings['wepublishingme_search_text'];
		if($wepublishingme_search_form !='Search &hellip;'): ?>
	<label class="screen-reader-text"><?php echo esc_html ($wepublishingme_search_form); ?> </label>
	<input type="search" name="s" class="search-field" placeholder="<?php echo esc_attr($wepublishingme_search_form); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><i class="search-icon"></i></button>
	<?php else: ?>
	<input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search ...', 'wepme' ); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><i class="search-icon"></i></button>
	<?php endif; ?>
</form> <!-- end .search-form -->