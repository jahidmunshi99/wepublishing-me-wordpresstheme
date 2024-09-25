<?php
/**
 * The template for displaying content.
 *  
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */
?>


<div class="three-column">
    <div class="latest-blog-content">
        <article id="post-<?php the_ID() ?>" class="<?php post_class() ?>">
            <div class="latest-blog-image">
                <figure class="post-featured-image">
                    <a title="<?php echo the_title_attribute() ?>" href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a> <!-- Ready for your next project close -->
                </figure> <!-- post fitured image close -->
            </div> <!-- latest blog image close -->
            <div class="latest-blog-text">
                <div class="post-<?php the_ID() ?>">
                    <header class="entry-header">
                        <h2 class="entry-title">
                        <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        </h2> <!-- end post title -->
                        <div class="entry-meta">
                            <?php $format = get_post_format();
                                if( current_theme_supports('post-formats', $format )){
                                    sprintf(
                                        '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
                                        sprintf( '' ),
                                        esc_url( get_post_format( $format ) ),
                                        esc_html( get_post_format( $format )),
                                    );
                                }?>                 
                                <span class="author vcard"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ), $protocols, $_context) ?>" title="<?php the_title_attribute() ?>"><?php the_author(); ?></a></span>
                                <!-- <span class="posted-on"><a title="<?php echo esc_attr( get_the_time() ) ?>" href="<?php the_permalink(); ?>"> <?php esc_html( the_time( get_option( 'date_format' ) ) ) ?><?php the_author() ?></a></span> -->
                                <?php if( comments_open( )) {?>
                                    <span class="comments"><i class="fa-regular fa-comments"></i><?php comments_popup_link(__( 'No Comments', 'wepme'), __('1 Comment', 'wepme'), __('% Comments', 'wepme'), '', __('Comments Off', 'wepme')) ?></span>
                                <?php } ?>
                            </div> <!-- end meta -->
                    </header> <!-- 'entry header close' -->
                    <!-- Post contents Start -->
                        <div class="entry-content">
                            <?php the_excerpt() ?>
                            <a class="more-link" title="<?php the_title_attribute() ?>" href="<?php the_permalink() ?>"><?php esc_html_e( 'Read More', 'wepme' ) ?></a>
                        </div> <!-- entry content close -->
                    <!-- Post contents end -->
                </div> <!-- category latest post -->
            </div> <!-- latest blog text close -->
        </article> <!-- article close -->
    </div> <!-- latest blog content -->
</div>


