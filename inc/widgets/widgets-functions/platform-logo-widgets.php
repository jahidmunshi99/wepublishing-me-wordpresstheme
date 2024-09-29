<?php
class platform_logo_widgets extends WP_Widget{
    public function __construct()
    {
        parent::__construct(
            'platform-logo-widget',
            __( 'WeP: Platform Logo', 'wepme' ),
        );
    }

    public function form( $instance ){
        $defaults = [
            'name' => ''
        ];
        $instance = wp_parse_args( (array) $instance, $defaults);
        $name = ! empty( $instance['name']) ? esc_attr( $instance['name'] ) : 'Platform Name';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'name' ) ?>"><?php echo esc_attr_e( 'Name', 'name' ) ?></label>
            <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'name') ) ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) )  ?>" value="<?php echo esc_attr( $name )  ?>">
        </p>

        <?php
    }

    public function update ( $new_instance, $old_instance){
        $instance = $old_instance;
        $instance['name'] = isset( $new_instance['name']) ? sanitize_text_field( $new_instance['name'] ) : '';
        return $instance;
    }

    public function widget( $args, $instance ){
        echo $args['before_widget'];
        ?>

    <div class="container">
        <div class="all-platform-logos owl-carousel owl-loaded owl-drag">      
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(-1567px, 0px, 0px); transition: 0.25s; width: 4180px;">
                    <div class="owl-item cloned" style="width: 251.2px; margin-right: 10px;">
                        <div class="item">
                            <img class="w-100 img-fluid" src="" alt="">
                        </div>
                    </div>           
                </div>
            </div>
            <div class="owl-nav disabled">
                <button type="button" role="presentation" class="owl-prev">
                    <span aria-label="Previous">‹</span>
                </button>
                <button type="button" role="presentation" class="owl-next">
                    <span aria-label="Next">›</span>
                </button>
            </div>
            <div class="owl-dots">
                <button role="button" class="owl-dot active">
                    <span></span>
                </button>
                <button role="button" class="owl-dot">
                    <span></span>
                </button>
            </div>
        </div>
    </div>
    <?php echo $args['after_widget'];
    }
}