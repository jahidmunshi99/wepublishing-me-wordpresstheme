<?php
/**
 * The template for displaying content.
 *
 *  
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

 $wepublishingme_settings = wepublishingme_get_theme_option();
 $format = get_post_format(); ?>
 <article <?php post_class('post-format'.' format-'.$format); ?> id="post-<?php the_ID(); ?>">
 <?php
     $wepublishingme_blog_post_image = $wepublishingme_settings['wepublishingme_blog_post_image'];
             if( has_post_thumbnail() && $wepublishingme_blog_post_image == 'on') { ?>
                 <figure class="post-featured-image">
                     <a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
                     <?php the_post_thumbnail(); ?>
                     </a>
                 </figure><!-- end.post-featured-image  -->
             <?php } ?>
     <header class="entry-header">
         <h2 class="entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"> <?php the_title();?> </a> </h2> <!-- end.entry-title -->
     <?php 
         $entry_format_meta_blog = $wepublishingme_settings['wepublishingme_entry_meta_blog'];
         if($entry_format_meta_blog == 'show-meta' ){?>
         <div class="entry-meta">
         <?php	
             $format = get_post_format();
             if ( current_theme_supports( 'post-formats', $format ) ) {
                 printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
                     sprintf( ''),
                     esc_url( get_post_format_link( $format ) ),
                     esc_html(get_post_format_string( $format ))
                 );
             } ?>
         <span class="author vcard"><?php esc_html_e('Author :','wepme')?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>" title="<?php the_title_attribute(); ?>">
                     <?php the_author(); ?> </a></span> 
         <span class="posted-on"><?php esc_html_e('Date  :','wepme')?><a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>"> <?php the_time( get_option( 'date_format' ) ); ?> </a></span>
                     <?php if ( comments_open() ) { ?>
         <span class="comments"><?php esc_html_e('Comment  :','wepme')?>
                         <?php comments_popup_link( __( 'No Comments', 'wepme' ), __( '1 Comment', 'wepme' ), __( '% Comments', 'wepme' ), '', __( 'Comments Off', 'wepme' ) ); ?> </span>
         <?php } ?>
         </div> <!-- end .entry-meta -->
     <?php } ?>
     </header> <!-- end .entry-header -->
     <div class="entry-content">
         <?php $content_display = $wepublishingme_settings['wepublishingme_blog_content_layout'];
             if($content_display == 'fullcontent_display'):
                 the_content();
             else:
                 the_excerpt();
             endif; ?>
     </div> <!-- end .entry-content -->
     <?php 
         $excerpt = get_the_excerpt();
         $content = get_the_content();
         $disable_entry_format = $wepublishingme_settings['wepublishingme_entry_format_blog'];
         if($disable_entry_format =='show' || $disable_entry_format =='show-button' || $disable_entry_format =='hide-button'){ ?>
     <footer class="entry-footer">
         <?php if($disable_entry_format !='show-button'){ ?>
         <span class="cat-links">
         <?php esc_html_e('Category : ','wepme');  the_category(', '); ?>
         </span> <!-- end .cat-links -->
         <?php $tag_list = get_the_tag_list( '', __( ', ', 'wepme' ) );
             if(!empty($tag_list)){ ?>
             <span class="tag-links">
             <?php   echo $tag_list; ?>
             </span> <!-- end .tag-links -->
             <?php } 
         }
         $wepublishingme_tag_text = $wepublishingme_settings['wepublishingme_tag_text'];
         if(strlen($excerpt) < strlen($content) && $disable_entry_format !='hide-button'){ ?>
         <a class="more-link" title="<?php echo the_title_attribute('echo=0');?>" href="<?php the_permalink();?>">
         <?php
             if($wepublishingme_tag_text == 'Read More' || $wepublishingme_tag_text == ''):
                 _e('Read More', 'wepme');
             else:
                 echo esc_attr($wepublishingme_tag_text);
             endif;?></a>
         <?php } ?>
     </footer> <!-- .entry-meta -->
     <?php
     } ?>
     </article>