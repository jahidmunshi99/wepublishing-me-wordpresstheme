<?php
/**
 * This Page will display on the Hero Section
 */

 class wepublishing_hero_section_widgets extends WP_Widget{
    public function __construct()
    {
        parent::__construct(
            'hero_section_widget',
            __( 'WeP: Hero Section Widget', 'wepme' ),
        );
    }

    public function form( $instance ){
        $instance = wp_parse_args( (array) $instance, array(
            'heading'    => '',
            'subheading' => '',
            'btn_1'      => '',
            'btn_1_url'  => '',
            'btn_2'      => '',
            'btn_2_url'  => '',
        ));
        $heading    = esc_attr( $instance['heading'] );
        $subheading = esc_attr( $instance['subheading'] );
        $btn_1      = esc_attr( $instance['btn_1'] );
        $btn_url_1  = esc_url( $instance['btn_1_url'] );
        $btn_2      = esc_attr( $instance['btn_2'] );
        $btn_url_2  = esc_url( $instance['btn_2_url'] );

        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'heading' ) ) ?>"><?php echo esc_attr_e( 'Heading Title', 'wepme' ) ?></label>
                <input id="<?php esc_attr( $this->get_field_id( 'heading' ) ) ?>" name="<?php esc_attr( $this->get_field_name( 'heading' ) ) ?>" value="<?php esc_attr( $heading ) ?>" type="text">
            </p>            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'subheading' ) ) ?>"><?php echo esc_attr_e( 'Subheading', 'wepme' ) ?></label>
                <input id="<?php esc_attr( $this->get_field_id( 'subheading' ) ) ?>" name="<?php esc_attr( $this->get_field_name( 'subheading' ) ) ?>" value="<?php esc_attr( $subheading ) ?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'btn_1' ) ) ?>"><?php echo esc_attr_e( 'Button#1', 'wepme' ) ?></label>
                <input id="<?php esc_attr( $this->get_field_id( 'btn_1' ) ) ?>" name="<?php esc_attr( $this->get_field_name( 'btn_1' ) ) ?>" value="<?php esc_attr( $btn_1 ) ?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'btn_1_url' ) ) ?>"><?php echo esc_attr_e( 'Button#1 URL', 'wepme' ) ?></label>
                <input id="<?php esc_attr( $this->get_field_id( 'btn_1_url' ) ) ?>" name="<?php esc_attr( $this->get_field_name( 'btn_1_url' ) ) ?>" value="<?php esc_attr( $btn_url_1 ) ?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'btn_2' ) ) ?>"><?php echo esc_attr_e( 'Button#2', 'wepme' ) ?></label>
                <input id="<?php esc_attr( $this->get_field_id( 'btn_2' ) ) ?>" name="<?php esc_attr( $this->get_field_name( 'btn_2' ) ) ?>" value="<?php esc_attr( $btn_2 ) ?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'btn_2_url' ) ) ?>"><?php echo esc_attr_e( 'Button#2 URL', 'wepme' ) ?></label>
                <input id="<?php esc_attr( $this->get_field_id( 'btn_2_url' ) ) ?>" name="<?php esc_attr( $this->get_field_name( 'btn_2_url' ) ) ?>" value="<?php esc_attr( $btn_url_2 ) ?>" type="text">
            </p>
            
        <?php
    }

    public function update( $old_instance, $new_instance ){

    }

    public function widget( $args, $instance ){

    }
 }