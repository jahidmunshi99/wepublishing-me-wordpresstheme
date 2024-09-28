<?php
class wepublishing_contact_widget extends WP_Widget{
    public function __construct()
    {
        parent::__construct(
            'wepublishing_contact_widget',
            __('Contact Us Widget', 'wepme'),
            array('description' => __( 'A Custom Plugin displays a title and message', 'wepme' ))
        );
    }

    //Front end Display of the Widget
    public function widget( $args, $instance ){
        //Output before widget
        echo $args['before_widget'];

        //Display Widget Title
        if( ! empty( $instance['title'])){
            //Output Before Widget (Provided By Theme)
            echo $args['before_widget'];

            //Display Widget Title
            if( !empty( $instance['title'] )){
                echo '<div class="container"><h2 style="text-transform: uppercase">'. apply_filters('widget_title', $instance['title']) . '</h2>';
            }

            //Display Message
            if( ! empty( $instance['message'] )){
                echo '<p>' . esc_html($instance['message'] ) . '</p> </div?';
            }

            /**
             * Output After Widget
             */
            echo $args['after_widget'];
        }
    }

    // The widget admin form (for entering title and message)
    public function form( $instance ){
        $title = !empty( $instance['title'] ) ? $instance['title'] : __( 'Default Title', 'wepme' );
        $message = !empty( $instance['message']) ? $instance['message'] : __('Default Message', 'wepme' );
        ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'wepme'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('message')); ?>"><?php _e('Message:', 'wepme'); ?></label>
                <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('message')); ?>" name="<?php echo esc_attr($this->get_field_name('message')); ?>"><?php echo esc_html( $message ); ?></textarea>
            </p>
        </div>
        <?php
    }

    public function update( $new_instance, $old_instance ){
        $instance =  array();
        $instance['title'] = (! empty( $new_instance['title'])) ? sanitize_title( $new_instance['title']) : ''; 
        $instance['message'] = (! empty( $new_instance['message'])) ? sanitize_title( $new_instance['message']) : ''; 
        return $instance;
    }
}