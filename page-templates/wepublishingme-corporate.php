<?php
/**
 * Template Name: Corporate Template
 *
 * Displays Corporate template.
 *  
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */


$wepublishingme_settings = wepublishingme_get_theme_option();
	echo '<main id="main" role="main">';
	if($wepublishingme_settings['wepublishingme_disable_features'] != 1){
		echo '<!-- Our Feature ============================================= -->';
		$wepublishingme_features = '';
		$wepublishingme_total_page_no = 0; 
		$wepublishingme_list_page	= array();
		for( $i = 1; $i <= $wepublishingme_settings['wepublishingme_total_features']; $i++ ){
			if( isset ( $wepublishingme_settings['wepublishingme_frontpage_features_' . $i] ) && $wepublishingme_settings['wepublishingme_frontpage_features_' . $i] > 0 ){
				$wepublishingme_total_page_no++;

				$wepublishingme_list_page	=	array_merge( $wepublishingme_list_page, array( $wepublishingme_settings['wepublishingme_frontpage_features_' . $i] ) );
			}

		}
		if (( !empty( $wepublishingme_list_page ) || !empty($wepublishingme_settings['wepublishingme_features_title']) || !empty($wepublishingme_settings['wepublishingme_features_description']) )  && $wepublishingme_total_page_no > 0 ) {
				$wepublishingme_features 	.= '<section class="our_feature">
						<div class="container clearfix">
							<div class="container_container">';
								$get_featured_posts 		= new WP_Query(array(
								'posts_per_page'      	=> absint($wepublishingme_settings['wepublishingme_total_features']),
								'post_type'           	=> array('page'),
								'post__in'            	=> $wepublishingme_list_page,
								'orderby'             	=> 'post__in',
							));
				if($wepublishingme_settings['wepublishingme_features_title'] != ''){
					$wepublishingme_features .= '<h2 class="freesia-animation fadeInUp">'. esc_html($wepublishingme_settings['wepublishingme_features_title']).'</h2>';
				}
				if($wepublishingme_settings['wepublishingme_features_description'] != ''){
					$wepublishingme_features .= '<p class="feature-sub-title freesia-animation fadeInUp">'. esc_html($wepublishingme_settings['wepublishingme_features_description']).'</p>';
				}
					$wepublishingme_features .= '<div class="column clearfix">';
				$j = 1;
				while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
				$attachment_id = get_post_thumbnail_id();
				$image_attributes = wp_get_attachment_image_src($attachment_id,'full');
							$title_attribute       	 	 = apply_filters('the_title', get_the_title($post->ID));
							$excerpt               	 	 = get_the_excerpt();
					if( $j % 3 == 1 && $j >= 1 ) {
						$delay_value = "0.1s";
					}
					elseif ( $j % 3 == 2 && $j >= 1 ) {
						$delay_value = "0.2s";
					}	
					else {
						$delay_value = "0.3s";
					}
					$wepublishingme_features .= '<div class="three-column freesia-animation fadeInLeft" data-wow-delay="'.$delay_value .'">
					<div class="feature-content">';
					if ($image_attributes) {
						$wepublishingme_features 	.= '<a class="feature-icon" href="'.esc_url(get_permalink()).'" title="'.the_title('', '', false).'"' .' alt="'.the_title('', '', false).'">'.get_the_post_thumbnail($post->ID, 'thumbnail').'</a>';
					}
					$wepublishingme_features 	.= '<article>';
					if ($title_attribute != '') {
								$wepublishingme_features .= '<h3 class="feature-title"><a href="'.esc_url(get_permalink()).'" title="'.the_title('', '', false).'" rel="bookmark">'.get_the_title().'</a></h3>';
					}
					if ($excerpt != '') {
						$excerpt_text = $wepublishingme_settings['wepublishingme_tag_text'];
						$excerpt_length = substr(get_the_excerpt(), 0 , 85);
						if($wepublishingme_settings['wepublishingme_crop_excerpt_length'] ==1){
							$wepublishingme_features .= '<p>'.wp_strip_all_tags($excerpt_length).' </p>';
						}else{
							$wepublishingme_features .= '<p>'.wp_strip_all_tags(get_the_excerpt()).' </p>';
						}
					}
					$wepublishingme_features 	.= '</article>';
					$excerpt = get_the_excerpt();
					$content = get_the_content();
					if( strlen($excerpt) < strlen($content) ){
						$excerpt_text = $wepublishingme_settings['wepublishingme_tag_text'];
						if($excerpt_text == '' || $excerpt_text == 'Read More') :
							$wepublishingme_features 	.= '<a title='.'"'.get_the_title(). '"'. ' '.'href="'.esc_url(get_permalink()).'"'.' class="more-link">'.__('Read More', 'freesia-empire').'</a>';
						else:
						$wepublishingme_features 	.= '<a title='.'"'.get_the_title(). '"'. ' '.'href="'.esc_url(get_permalink()).'"'.' class="more-link">'.esc_html($wepublishingme_settings[ 'wepublishingme_tag_text' ]).'</a>';
						endif;
					}
					$wepublishingme_features 	.='</div> <!-- end .feature-content -->
					</div><!-- end .three-column -->';
					$j++;
					endwhile;
					$wepublishingme_features 	.='</div><!-- .end column-->';
					$wepublishingme_features 	.='</div><!-- end .container_container -->';
					$wepublishingme_features 	.='</div><!-- .container -->
					</section><!-- end .our_feature -->';
				}
		echo $wepublishingme_features;
	}
		wp_reset_postdata();
   if( is_active_sidebar( 'wepublishingme_corporate_page_sidebar' ) ) {
			dynamic_sidebar( 'wepublishingme_corporate_page_sidebar' );
	} ?>
</main>
<!-- end #main -->
<?php get_footer();