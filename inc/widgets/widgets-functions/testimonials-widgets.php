<?php
/**
 * This Page Displayed on The Front Page as a Testimonial section
 */

class wepublishing_testimonial_widget extends WP_Widget{
    public function __construct(){
        parent::__construct(
            'wepublishing_testimonial',
            __('WeP:Testimonial', 'wepme'),[
                'description' => __('Testimonial Widget Based on Testimonial Section for Front Page', 'wepme'),
            ]
            );
    }

    /**
     * Widget Setting Form This Settings Display On the Basckend
     */
    public function form( $instance ){
        if( isset( $instance['title']) ){
            $title = $instance[ 'title' ];
        }else{
            $title = __( 'Title', 'wepme' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php echo esc_attr_e('Title', 'wepme') ?></label>
            <input type="text" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo esc_attr($this->get_field_name('title')) ?>" value="<?php echo esc_attr( $title ) ?>">
        </p>
        
        <?php
        
    }

    /**
     * Display On the Front Page
     */
    public function widget( $args, $instance ){
        echo $args['before_widget'];
        if( ! empty( $instance['title']) ){
            echo '<h2 class="wp-block-heading">' . $instance['title'] . '</h2>';
        }
        echo $args[ 'after_widget' ];
    }

    /**
     * public
     */
    public function update( $new_instance, $old_instance ){
        $instance = array();
        $instance['title'] = (! empty ( $new_instance['title'] )) ? sanitize_text_field( $new_instance[ 'title' ]) : '';
        return $instance;
    }
}