<?php
/**
 * This Widget Display Services Sections 
 * 
 * For The Corporate Page Templte
 */

 class wepublishing_services_widget extends WP_Widget{
    function __construct()
    {   
        $widget_options = array( 
            'classname'   => 'widget_service_section',
            'description' => 'Displays Blog Widgets On FrontPage',
        );
        $control_options = array();
        parent::__construct(
            false,
            $name = __('WeP: Service Widget', 'wepme'),
            $widget_options,
            $control_options,
        );
    }

    // The widget admin form (for entering title and message)
    public function form( $instance ){
        $instance = wp_parse_args((array) $instance, array(
            'number'          => '',
            'headtitle'       => '',
            'headsubtitle'    => '',
            'servicecategory' => '',
            'servicetitle'    => '',
            'servicedetails'  => '',

        ));
        $number          = absint( $instance[ 'number' ] );
        $header_title    = esc_attr( $instance[ 'headtitle' ]);
        $header_subtitle = esc_attr( $instance[ 'headsubtitle' ]);
        $service_types   = esc_attr( $instance[ 'servicectypes' ]);
        $searvice_title  = esc_attr( $instance[ 'servicetitle' ]);
        $service_details = esc_attr( $instance[ 'servicedetails' ]);
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('number') ); ?>"><?php echo esc_html_e( 'Display Number of Items', 'wepme' )?></label>
            <input id="<?php echo esc_attr( $this_>get_field_id('number') ) ?>" name="<?php echo esc_attr( $this->get_filed_name('headtitle') ) ?>" type="text" value="<?php echo esc_attr( $number ) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('headtitle') ) ?>"><?php esc_html_e( 'Header Title', 'wepme' ) ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id( 'headtitle' ) )?>" name="<?php echo esc_attr( $this->get_field_name( 'headtitle' ) ) ?>" type="text" value="<?php echo esc_attr( $header_title ) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'headsubtitle' ) ) ?>"><?php esc_html_e( 'Header Subtitle', 'wepme' ) ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('headsubtitle') ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'headsubtitle' ) ) ?>" type="text" value="<?php echo esc_attr( $header_subtitle ) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'servicectypes' ) ) ?>"><?php esc_html_e( 'Service Types', 'wepme' ) ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('servicectypes') ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'servicectypes' ) ) ?>" type="text" value="<?php echo esc_attr( $service_types ) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'servicetitle' ) ) ?>"><?php esc_html_e( 'Service Title', 'wepme' ) ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id( 'servicetitle' ) ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'servicetitle' ) ) ?>" type="text" value="<?php echo esc_attr( $searvice_title ) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'servicedetails' ) ) ?>"><?php esc_html_e( 'Details', 'wepme' ) ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id( 'servicedetails' ) ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'servicedetails' ) ) ?>" type="text" value="<?php echo esc_attr( $service_details ) ?>">
        </p>

        <?php
    }

    // Updating widget options
    public function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['number']          = absint( $new_instance['number'] );
        $instance['headtitle']       = sanitize_text_field( $new_instance['headtitle'] );
        $instance['headsubtitle']    = sanitize_text_field( $new_instance['headsubtitle'] );
        $instance['servicecategory'] = sanitize_text_field( $new_instance['servicecategory'] );
        $instance['servicetitle']    = sanitize_text_field( $new_instance['servicetitle'] );
        $instance['servicedetails']  = sanitize_text_field( $new_instance['servicedetails'] );
    }

    // The front-end display of the widget
    public function widget( $args, $instance ){
        $number          = empty( $instance[ 'number' ] ) ? 3 : $instance[ 'number' ];
        $header_title    = ( ! empty ( $instance[ 'headtitle' ])) ? $instance[ 'headtitle' ] : '';
        $header_subtitle = ( ! empty ( $instance[ 'headsubtitle' ])) ? $instance[ 'headsubtitle' ] : '' ;
        $service_types   = ( ! empty ( $instance[ 'servicectypes' ])) ? $instance[ 'servicectypes' ] : '';
        $searvice_title  = ( ! empty ( $instance[ 'servicetitle' ])) ? $instance[ 'servicetitle' ] : '';
        $service_details = ( ! empty ( $instance[ 'servicedetails' ])) ? $instance[ 'servicedetails' ] : '';

        echo '<!-- Service Widget ============================== -->' .$before_widget;
        echo '<section class="our_feature clearfix">' ?>
            <div class="container_container">
                <h2 class="freesia-animation fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><?php echo $header_title ?></h2>
                <p class="feature-sub-title freesia-animation fadeInUp" style="visibility: visible; animation-name: fadeInUp;"></p>
                <div class="column clearfix">
                    <div class="three-column freesia-animation fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                        <div class="feature-content">
                            <a class="feature-icon" href="" title="Customizable Design" alt="Customizable Design">
                                <img width="150" height="150" src="" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" decoding="async">
                            </a>
                                <article>
                                    <h3 class="feature-title">
                                        <a href="" title="Customizable Design" rel="bookmark"></a>
                                    </h3>
                                    <p></p>
                                </article>
                                <a title="Customizable Design" href="" class="more-link">Read More</a>
                            </div> 
                        </div>
                </div>
            </div>
    <?php }
 }