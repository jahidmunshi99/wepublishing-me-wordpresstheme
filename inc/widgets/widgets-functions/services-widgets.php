<?php
/**
 * This Widget Display Services Sections 
 * 
 * For The Corporate Page Templte
 */

 class wepublishing_services_widget extends WP_Widget{
    function __construct()
    {   
        parent::__construct(
            'wepublishing_service_widget',
            __('WeP: Service Widget', 'wepme'),[
                __('This Widget for the corporate templete page', 'wepme')
            ]
        );
    }

    // The widget admin form (for entering title and message)
    public function form( $instance ){
        $instance = wp_parse_args((array) $instance, array(
            'number_'          => '',
            'sectiontitle_'    => '',
            'sectionsubtitle_' => '',
            'servicetitle_'    => '',
            'servicedetails_'  => '',

        ));

        $number           = ! empty ( $instance[ 'number' ] ) ? absint( $instance[ 'number' ] ) : 3;
        $section_title    = ! empty ( $instance[ 'sectiontitle' ]) ? esc_attr( $instance[ 'sectiontitle' ] ) : 'Our work process';
        $section_subtitle = ! empty ( $instance[ 'sectionsubtitle' ] ) ? esc_attr( $instance[ 'sectionsubtitle' ] ) : 'Navigate with our clear work under-lineprocess'; ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'sectiontitle' ) ?>"><?php echo esc_html__('Section Title', 'wepme') ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'sectiontitle' ) ) ?>" id="<?php echo esc_attr( $this->get_field_id( 'sectiontitle' ) ) ?>" value="<?php echo esc_attr( $section_title ) ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'sectionsubtitle' )?>"><?php echo esc_html__('Section Sub Title', 'wepme') ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'sectionsubtitle' ) ) ?>" id="<?php echo esc_attr( $this->get_field_id( 'sectionsubtitle' ) ) ?>" value="<?php echo esc_attr( $section_subtitle ) ?>">
        </p>
          
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ) ?>"><?php echo esc_html__('Display Number of Services', 'wepme') ?></label>
            <input type="number" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ) ?>" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ) ?>" value="<?php echo esc_attr( $number ) ?>">
        </p>

        <?php      
        for( $i = 1; $number >= $i ; $i++ ){
            $searvice_title   = ! empty ( $instance[ "servicetitle_$i" ] ) ? esc_attr( $instance[ "servicetitle_$i" ]) : 'Amazon KDP Paperback';
            $service_details  = ! empty ( $instance[ "servicedetails_$i" ] ) ? esc_attr( $instance[ "servicedetails_$i" ] ) : "Nemo enim ipsam voluptatem quia voluptas sit asper natur aut oditut fugit Nemo enim ipsam voluptatem .";
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( "servicetitle_$i" ) ?>"><?php echo esc_html__('Service Title #' .$i, 'wepme') ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( "servicetitle_$i" ) ) ?>" id="<?php echo esc_attr( $this->get_field_id( "servicetitle_$i" ) ) ?>" value="<?php echo esc_attr( $searvice_title ) ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( "servicedetails" ) ?>"><?php echo esc_html__('Discription of Service', 'wepme') ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name( "servicedetails_$i" ) )  ?>" id="<?php echo esc_attr( $this->get_field_id( "servicedetails_$i" ) )  ?>" value="<?php echo esc_attr( $service_details ) ?>">
        </p>

        <?php
        }
    }

    // Updating widget options
    public function update( $new_instance, $old_instance ){
        $instance                    = $old_instance;
        $instance['number']          = isset ( $new_instance['number'] ) ? absint( $new_instance['number'] ) : 3;
        $instance['sectiontitle']    = isset ( $new_instance['sectiontitle'] ) ? sanitize_text_field( $new_instance['sectiontitle'] ) : '';
        $instance['sectionsubtitle'] = isset ( $new_instance['sectionsubtitle'] ) ? sanitize_text_field( $new_instance['sectionsubtitle'] ) : '';
        for( $i = 0; $instance['number'] >= $i; $i++){
            $instance["servicetitle_$i"]    = isset ( $new_instance["servicetitle_$i"] ) ? sanitize_text_field( $new_instance["servicetitle_$i"] ) : 'Choose a service';
            $instance["servicedetails_$i"]  = isset ( $new_instance["servicedetails_$i"] ) ? sanitize_text_field( $new_instance["servicedetails_$i"] ) : '';
        }
        return $instance;
    }

    // The front-end display of the widget
    public function widget( $args, $instance ){

        $number           = ! empty( $instance[ 'number' ] ) ? esc_html( $instance[ 'number' ] ) : 3;
        $section_title    = ! empty( $instance[ 'sectiontitle' ] ) ? apply_filters('widget_title', $instance[ 'sectiontitle' ]) : "Our work process'";
        $section_subtitle = ! empty( $instance[ 'sectionsubtitle' ] ) ? esc_html ( $instance[ 'sectionsubtitle' ]) : "Navigate with our clear work under-lineprocess";

        '<!-- Before Widget ============================== -->';
        echo $args[ 'before_widget' ]; 
        ?>
        <section class="our_feature clearfix">
                <div class="container">
                    <h2 class="wepublishing-animation fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><?php echo $section_title ?></h2>
                    <p class="wepublishing-sub-title wepublishing-animation fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><?php echo $section_subtitle ?></p>
                    <div class="column clearfix">
                        <?php 
                        for ( $i = 1; $i <= $number; $i++ ) { 
                            $searvice_title   = ! empty( $instance[ "servicetitle_$i" ] ) ? esc_html ( $instance[ "servicetitle_$i" ]) : "Amazon KDP Paperback";
                            $service_details  = ! empty( $instance[ "servicedetails_$i" ] ) ? esc_html ( $instance["servicedetails_$i" ]) : "Nemo enim ipsam voluptatem quia voluptas sit asper natur auoditut fugit Nemo enim ipsam voluptatem .";
                        ?>
                        <div class="three-column wepublishing-animation fadeInLeft">

                                <div class="feature-content">
                                    <a class="feature-icon" href="" title="Customizable Design" alt="Customizable Design">
                                        <img width="150" height="150" src="" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" decoding="async">
                                    </a>
                                        <article>
                                            <h3 class="feature-title">
                                                <a href="" title="Customizable Design" rel="bookmark"><?php echo $searvice_title ?></a>
                                            </h3>
                                            <p> <?php echo $service_details ?></p>
                                        </article>
                                        <!-- <a title="Customizable Design" href="" class="more-link">Read More</a> -->
                                    </div> 
                                </div>
                        <?php } ?>
                    </div>
                </div>
        </section> 

        <!-- After Widget ============================== -->;
        <?php echo $args[ 'after_widget' ] ?>

    <?php }
 }