<?php
/**
 * Display all wepublishinghme functions and definitions
 *
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

/***************************************************************************************/
/* WePublishingme DISPLAY COMMENT NAVIGATION
/***************************************************************************************/

function wepublishingme_comment_nav() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'wepme' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'wepme' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;
				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'wepme' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
/******************** Remove div and replace with ul**************************************/
add_filter('wp_page_menu', 'wepublishingme_wp_page_menu');
function wepublishingme_wp_page_menu($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
	$divclass   = $matches[1];
	$replace    = array('<div class="'.$divclass.'">', '</div>');
	$new_markup = str_replace($replace, '', $page_markup);
	$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
	return $new_markup;
}
/*******************************wepublishingme MetaBox *********************************************************/
global $wepublishingme_layout_options;
$wepublishingme_layout_options = array(
'default-sidebar'=> array(
						'id'			=> 'wepublishingme_sidebarlayout',
						'value' 		=> 'default',
						'label' 		=> __( 'Default Layout Set in', 'wepme' ).' '.'<a href="'.wp_customize_url() .'?autofocus[section]=wepublishingme_layout_options" target="_blank">'.__( 'Customizer', 'wepme' ).'</a>',
						'thumbnail' => ' '
					),
	'no-sidebar' 	=> array(
							'id'			=> 'wepublishingme_sidebarlayout',
							'value' 		=> 'no-sidebar',
							'label' 		=> __( 'No sidebar Layout', 'wepme' )
						), 
	'full-width' => array(
									'id'			=> 'wepublishingme_sidebarlayout',
									'value' 		=> 'full-width',
									'label' 		=> __( 'Full Width Layout', 'wepme' )
								),
	'left-sidebar' => array(
							'id'			=> 'wepublishingme_sidebarlayout',
							'value' 		=> 'left-sidebar',
							'label' 		=> __( 'Left sidebar Layout', 'wepme' )
						),
	'right-sidebar' => array(
							'id' 			=> 'wepublishingme_sidebarlayout',
							'value' 		=> 'right-sidebar',
							'label' 		=> __( 'Right sidebar Layout', 'wepme' )
						)
			);
/*************************** Add Custom Box **********************************/
function wepublishingme_add_custom_box() {
	add_meta_box(
		'siderbar-layout',
		__( 'Select layout for this specific Page only', 'wepme' ),
		'wepublishingme_layout_options',
		'page', 'side', 'default'
	); 
	add_meta_box(
		'siderbar-layout',
		__( 'Select layout for this specific Post only', 'wepme' ),
		'wepublishingme_layout_options',
		'post','side', 'default'
	);
}
add_action( 'add_meta_boxes', 'wepublishingme_add_custom_box' );
function wepublishingme_layout_options() {
	global $wepublishingme_layout_options;
	// Use nonce for verification  
	wp_nonce_field( basename( __FILE__ ), 'wepublishingme_custom_meta_box_nonce' ); // for security purpose ?>
	<?php
				foreach ($wepublishingme_layout_options as $field) {  
					$wepublishingme_layout_meta = get_post_meta( get_the_ID(), $field['id'], true );
					if(empty( $wepublishingme_layout_meta ) ){
						$wepublishingme_layout_meta='default';
					} ?>
				<input type="radio" class ="post-format" name="<?php echo $field['id']; ?>" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $wepublishingme_layout_meta ); ?>/>
				&nbsp;&nbsp;<?php echo $field['label']; ?> <br/>
				<?php
				} // end foreach  ?>
<?php }
/******************* Save metabox data **************************************/
add_action('save_post', 'wepublishingme_save_custom_meta');
function wepublishingme_save_custom_meta( $post_id ) { 
	global $wepublishingme_layout_options, $post; 
	// Verify the nonce before proceeding.
	if ( !isset( $_POST[ 'wepublishingme_custom_meta_box_nonce' ] ) || !wp_verify_nonce( $_POST[ 'wepublishingme_custom_meta_box_nonce' ], basename( __FILE__ ) ) )
		return;
	// Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
		return;
	if ('page' == $_POST['post_type']) {  
		if (!current_user_can( 'edit_page', $post_id ) )  
			return $post_id;  
	} 
	elseif (!current_user_can( 'edit_post', $post_id ) ) {  
		return $post_id;  
	}
	foreach ($wepublishingme_layout_options as $field) {  
		//Execute this saving function
		$old = get_post_meta( $post_id, $field['id'], true); 
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {  
			update_post_meta($post_id, $field['id'], $new);  
		} elseif ('' == $new && $old) {  
			delete_post_meta($post_id, $field['id'], $old);  
		}
	} // end foreach   
}
/***************Pass slider effect  parameters from php files to jquery file ********************/
function wepublishingme_slider_value() {
	$wepublishingme_settings = wepublishingme_get_theme_options();
	$wepublishingme_transition_effect   = esc_attr($wepublishingme_settings['wepublishingme_transition_effect']);
	$wepublishingme_transition_delay    = absint($wepublishingme_settings['wepublishingme_transition_delay'])*1000;
	$wepublishingme_transition_duration = absint($wepublishingme_settings['wepublishingme_transition_duration'])*1000;
	wp_localize_script(
		'wepublishingme_slider',
		'wepublishingme_slider_value',
		array(
			'transition_effect'   => $wepublishingme_transition_effect,
			'transition_delay'    => $wepublishingme_transition_delay,
			'transition_duration' => $wepublishingme_transition_duration,
		)
	);
}
/**************************** Display Header Title ***********************************/
function wepublishingme_header_title() {
	$format = get_post_format();
	if( is_archive() ) {
		if ( is_category() ) :
			$wepublishingme_header_title = single_cat_title( '', FALSE );
		elseif ( is_tag() ) :
			$wepublishingme_header_title = single_tag_title( '', FALSE );
		elseif ( is_author() ) :
			the_post();
			$wepublishingme_header_title =  sprintf( __( 'Author: %s', 'wepme' ), '<span class="vcard">' . get_the_author() . '</span>' );
			rewind_posts();
		elseif ( is_day() ) :
			$wepublishingme_header_title = sprintf( __( 'Day: %s', 'wepme' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) :
			$wepublishingme_header_title = sprintf( __( 'Month: %s', 'wepme' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif ( is_year() ) :
			$wepublishingme_header_title = sprintf( __( 'Year: %s', 'wepme' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		elseif ( $format == 'audio' ) :
			$wepublishingme_header_title = __( 'Audios', 'wepme' );
		elseif ( $format =='aside' ) :
			$wepublishingme_header_title = __( 'Asides', 'wepme');
		elseif ( $format =='image' ) :
			$wepublishingme_header_title = __( 'Images', 'wepme' );
		elseif ( $format =='gallery' ) :
			$wepublishingme_header_title = __( 'Galleries', 'wepme' );
		elseif ( $format =='video' ) :
			$wepublishingme_header_title = __( 'Videos', 'wepme' );
		elseif ( $format =='status' ) :
			$wepublishingme_header_title = __( 'Status', 'wepme' );
		elseif ( $format =='quote' ) :
			$wepublishingme_header_title = __( 'Quotes', 'wepme' );
		elseif ( $format =='link' ) :
			$wepublishingme_header_title = __( 'links', 'wepme' );
		elseif ( $format =='chat' ) :
			$wepublishingme_header_title = __( 'Chats', 'wepme' );
		elseif ( class_exists('WooCommerce') && (is_shop() || is_product_category()) ):
  			$wepublishingme_header_title = woocommerce_page_title( false );
  		elseif ( class_exists('bbPress') && is_bbpress()) :
  			$wepublishingme_header_title = get_the_title();
		else :
			$wepublishingme_header_title = get_the_archive_title();
		endif;
	} elseif (is_home()){
		$wepublishingme_header_title = get_the_title( get_option( 'page_for_posts' ) );
	} elseif (is_404()) {
		$wepublishingme_header_title = __('Page NOT Found', 'wepme');
	} elseif (is_search()) {
		$wepublishingme_header_title = __('Search Results', 'wepme');
	} elseif (is_page_template()) {
		$wepublishingme_header_title = get_the_title();
	} else {
		$wepublishingme_header_title = get_the_title();
	}
	return $wepublishingme_header_title;
}

/********************* Header Image ************************************/
function wepublishingme_header_image_display(){
	$wepublishingme_settings = wepublishingme_get_theme_options();
	$wepublishingme_header_image = get_header_image();
	$wepublishingme_header_image_options = $wepublishingme_settings['wepublishingme_custom_header_options'];
	if($wepublishingme_header_image_options == 'homepage'){
		if(is_front_page() || (is_home() && is_front_page())) :
			if (!empty($wepublishingme_header_image)): ?>
			<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php echo esc_url($wepublishingme_header_image);?>" class="header-image" width="<?php echo get_custom_header()->width;?>" height="<?php echo get_custom_header()->height;?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"> </a>
			<?php
			endif;
		endif;
	}elseif($wepublishingme_header_image_options == 'enitre_site'){
		if (!empty($wepublishingme_header_image)):?>
			<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php echo esc_url($wepublishingme_header_image);?>" class="header-image" width="<?php echo get_custom_header()->width;?>" height="<?php echo get_custom_header()->height;?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"> </a>
			<?php
			 endif;
	}
}
add_action ('wepublishingme_header_image','wepublishingme_header_image_display');
/********************* Custom Header setup ************************************/
function wepublishingme_custom_header_setup() {
	$args = array(
		'default-text-color'     => '',
		'default-image'          => '',
		'height'                 => apply_filters( 'wepublishingme_header_image_height', 400 ),
		'width'                  => apply_filters( 'wepublishingme_header_image_width', 2500 ),
		'random-default'         => false,
		'max-width'              => 2500,
		'flex-height'            => true,
		'flex-width'             => true,
		'random-default'         => false,
		'header-text'			 => false,
		'uploads'				 => true,
		'wp-head-callback'       => '',
		'admin-preview-callback' => 'wepublishingme_admin_header_image',
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'wepublishingme_custom_header_setup' );