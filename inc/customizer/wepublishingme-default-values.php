<?php
/**
 * Theme Customizer Default Valuses Function
 * 
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */
if(!function_exists('wepublishingme_get_option_defaults_values')):
	/******************** wepublishingme DEFAULT OPTION VALUES ******************************************/
	function wepublishingme_get_option_defaults_values() {
		global $wepublishingme_default_values;
		$wepublishingme_default_values = array(
			'wepublishingme_responsive'                  => 'on',
			'wepublishingme_animate_css'                 => 'on',
			'wepublishingme_design_layout'               => 'wide-layout',
			'wepublishingme_sidebar_layout_options'      => 'right',
			'wepublishingme_blog_layout_temp'            => 'large_image_display',
			'wepublishingme_enable_slider'               => 'frontpage',
			'wepublishingme_transition_effect'           => 'fade',
			'wepublishingme_transition_delay'            => '4',
			'wepublishingme_transition_duration'         => '1',
			'wepublishingme_search_custom_header'        => 0,
			'wepublishingme-img-upload-header-logo'      => '',
			'wepublishingme_header_display'              => 'header_text',
			'wepublishingme_categories'                  => array(),
			'wepublishingme_custom_css'                  => '',
			'wepublishingme_scroll'                      => 0,
			'wepublishingme_custom_header_options'       => 'homepage',
			'wepublishingme_slider_link'                 => 0,
			'wepublishingme_tag_text'                    => esc_html__('Read More','wepme'),
			'wepublishingme_excerpt_length'              => '65',
			'wepublishingme_single_post_image'           => 'off',
			'wepublishingme_reset_all'                   => 0,
			'wepublishingme_stick_menu'                  => 0,
			'wepublishingme_blog_post_image'             => 'on',
			'wepublishingme_entry_format_blog'           => 'excerptblog_display',
			'wepublishingme_search_text'                 => esc_html__('Search &hellip;','wepme'),
			'wepublishingme_slider_type'                 => 'default_slider',
			'wepublishingme_slider_textposition'         => 'right',
			'wepublishingme_slider_no'                   => '4',
			'wepublishingme_slider_button'               => 0,
			'wepublishingme_total_features'              => '3',
			'wepublishingme_features_title'              => '',
			'wepublishingme_features_description'        => '',
			'wepublishingme_disable_features'            => 0,
			'wepublishingme_display_header_image'        => 'top',
			'wepublishingme_disable_features_alterpage'  => 0,
			'wepublishingme_footer_column_section'       => '4',
			'wepublishingme_entry_format_blog'           => 'show',
			'wepublishingme_entry_meta_blog'             => 'show-meta',
			'wepublishingme_slider_content'              => 'on',
			'wepublishingme_top_social_icons'            => 0,
			'wepublishingme_buttom_social_icons'         => 0,
			'wepublishingme_menu_position'               => 'middle',
			'wepublishingme_logo_display'                => 'left',
			'wepublishingme_blog_content_layout'         => '',
			'wepublishingme_blog_header_display'         => 'show',
			'wepublishingme_display_page_featured_image' => 0,
			'wepublishingme_crop_excerpt_length'         => 1,
			'wepublishingme_copyright' 					 => '',
			'wepublishingme_single_post_image' 			 => 'on',
			);
		return apply_filters( 'wepublishingme_get_option_defaults_values', $wepublishingme_default_values );
	}
endif;