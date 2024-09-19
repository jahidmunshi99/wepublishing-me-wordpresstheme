<?php 
/**
 * This Page will define as a header
 */
?>

    <?php get_header() ?>
    <div class="container">
            <div class="row">
                <?php if ( have_posts(  ) ):
                    while( have_posts(  ) ): the_post(  );
                ?>
                    <div class="col-lg-9 mt-4">
                        <!-- Post Start -->
                        <div class="card px-3 shadow-sm mt-4">                        
                            <div class="card-body pb-4">
                                <div class="post-title">
                                    <h2 class="card-title fw-bold mb-3"><?php the_title( )?></h2>
                                </div>
                                <div class="post-info">
                                    <ul class="d-flex list-unstyled text-secondary">
                                        <li class=""><i class="fa-regular fa-comment px-2"></i><?php get_template_part( 'template-parts/comments_number_setting')?></li>
                                        <!-- <li class="mx-3 text-capitalize"><i class="fa-solid fa-list px-2"></i><?php echo category_filtering()?></li> -->
                                        <li class="mx-3 text-capitalize"><i class="fa-solid fa-user px-2"></i>By <?php the_author( )?></li>
                                    </ul>
                                </div>
                                <div class="single-post-image"><?php the_post_thumbnail( '', array('class'=> 'img-fluid w-100') )?></div>
                                <!-- <img src="resources/assets/img/post-image.png" alt="" class="img-fluid w-100"> -->
                                <div class="post-details mt-4">
                                    <?php the_content( )?>
                                </div> 
                            </div>
                        </div>
                        <!-- Post End -->
                        <!-- Comments Section Start -->
                        <div class="comments-area">
                            <div class="card px-3 shadow-sm my-4">                                                
                                <div class="card-body pb-4">  
                                    <?php comments_template( )?>                          
                                </div>
                            </div>
                        </div>
                        <!-- Comments Section Start -->
                    </div>
                <?php 
                    endwhile;
                endif;
                ?>



                <!-- Sidebar Start -->
                <div class="col-lg-3 py-5 single-post-sidebar">
                    <?php echo get_sidebar( 'sidebar-1')?>
                </div>
                <!-- Sidebar End -->
                <!-- Comments Section -->

            </div>
        </div>
    <?php get_footer() ?>