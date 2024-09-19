<?php
/**
 * Theme Customizer Function
 * 
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */


/***************************************************************************************/
/* WePublishingme Theme Customer Sanitize Functions
/***************************************************************************************/
 function wepublishingme_customize_preview_js() {
	wp_enqueue_script( 'wepublishingme_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
function wepublishingme_checkbox_integer( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}
function wepublishingme_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
function wepublishingme_numeric_value( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}
function wepublishingme_sanitize_custom_css( $input ) {
	if ( $input != '' ) { 
		$input = str_replace( '<=', '&lt;=', $input ); 
		$input = wp_kses_split( $input, array(), array() ); 
		$input = str_replace( '&gt;', '>', $input ); 
		$input = strip_tags( $input ); 
		return $input;
	}
	else {
		return '';
	}
}
function wepublishingme_reset_alls( $input ) {
	if ( $input == 1 ) {
		delete_option( 'wepublishingme_theme_options');
		$input=0;
		return $input;
	} 
	else {
		return '';
	}
}
function wepublishingme_sanitize_page( $input ) {
	if(  get_post( $input ) ){
		return $input;
	}
	else {
		return '';
	}
}

function wepublishingme_text_field( $input_text ) {
    // Allowed HTML tags (e.g., <b>, <i>, <p>, <a>, <strong>, etc.)
    $allowed_tags = '<b><i><p><a><strong><em><ul><ol><li><br><hr>';
    
    // Strip out all tags except the allowed ones
    $sanitized_text = strip_tags($input_text, $allowed_tags);
    
    // Remove any attributes containing 'on' (for event handlers like onclick, onload, etc.) or javascript:
    // $sanitized_text = preg_replace('/(<[^>]+)(on\w+|javascript:[^"]+)([^>]*>)/i', '$1$3', $sanitized_text);
    
    // Trim to remove extra spaces
    // $sanitized_text = trim($sanitized_text);
    
    return $sanitized_text;
}

