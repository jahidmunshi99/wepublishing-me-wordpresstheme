<?php
/**
 * Front Page Hero Section
 * 
 * Displays in Corporate Template
 *
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

/***************************************************************************************/
/* HERO SLIDERS
/***************************************************************************************/
add_action('hero_slider', 'wepme_hero_slider');
if( !function_exists( 'wepmbe_hero_slider' )): 
    $hero_slider = new WP_Query(array(
        'post'          => 'hero-slider',
        'post-stutus'   => 'publish',
        'post-per_page' => 1,
        'order'         => 'DESC'
    ));
    function wepme_hero_slider(){
        global $hero_slider;
        ?>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                <!-- Hero Left Content Start -->
                    <div class="col-md-12 col-xl-7 pe-5 wow slideInLeft my-5">
                        <h1 class="fw-bold display-4">Publish your book with WePublishing</h1>
                        <h5 class="text-white fs-2 fw-bold mt-4 mb-5">Professional Publishing Services for Independent Authors</h5>
                        <!-- <p class="my-4"></p> -->
                        <div class="hero-btn mt-5 pr-5">
                        <button class="btn bg-dark btn-outline-dark px-4 py-2 mb-2" type="submit" style="margin-right: 2rem;"><a class="text-uppercase fw-bold text-white text-decoration-none" href="#contact-us">Get A Quote <i class="fa-solid fa-arrow-right-long mx-2"></i></a></button>
                        <button class="btn bg-theme text-uppercase fw-bold py-2 mb-2" type="submit"><a class="text-white" href="<?php echo home_url( )?>/portfolio">View Portfolio <i class="fa-regular fa-images mx-2"></i></a></button>
                        </div>
                    </div>
                <!-- Hero Left Content End -->
                <!-- Hero Rigt Slider Start -->
                    <div class="col-md-12 col-xl-5 hero-end text-end wow slideInRight my-5">
                        <div class="hero-slider owl-carousel owl-theme">
                            <?php while( $hero_slider->have_posts()): $hero_slider->the_post(); ?>
                                <!-- Hero Slider Start -->
                                 <div class="item pe-3 my-4">
                                    <div class="card">
                                        <?php the_post_thumbnail( 'hero-slider', array('class="w-100 img-fluid"')) ?>
                                    </div>
                                 </div>
                                <!-- Hero Slider End -->
                            <?php endwhile; ?>
                        </div>
                    </div>
                    
                <!-- Hero Rigt Slider End -->
                </div>
            </div>
<?php }endif; ?>