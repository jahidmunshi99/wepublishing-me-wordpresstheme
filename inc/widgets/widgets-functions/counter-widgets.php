<?php 
class wepublishing_counter_widget extends WP_Widget{
    public function __construct()
    {
        parent::__construct(
            'wepublishing_counter_widget',
            __('WeP: Counter Widget', 'wepme'),
        );
    }
    public function form( $instance ){
        $instance = wp_parse_args( (array) $instance, array(
            'name' => '',
            'text' => '',
        ));
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('name') ) ?>"><?php echo esc_attr_e( 'Name', 'wepme' ) ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('name') ) ?>" id="<?php echo esc_attr( $this->get_field_id('name')) ?>" value="<?php echo esc_attr( $instance['name'] ) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('text') ) ?>"><?php echo esc_attr_e( 'Text', 'wepme' ) ?></label>
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('text') ) ?>" id="<?php echo esc_attr( $this->get_field_id('text')) ?>" value="<?php echo esc_attr( $instance['text'] ) ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['name'] = isset( $new_instance[ 'name' ]) ? sanitize_text_field( $new_instance[ 'name' ] ) : '';
        $instance['text'] = isset( $new_instance[ 'text' ]) ? sanitize_text_field( $new_instance[ 'text' ] ) : '';
        return $instance;
    }

    public function widget( $args, $instance ){
        $name = esc_html( $instance['name'] );
        $text = esc_html( $instance['text'] );
        echo $args['before_widget']?>
        <div class="container">
            <h2><?php echo $name ?></h2>
            <p><?php echo $text ?></p>
        </div>
        <?php
        echo $args['after_widget'];
    }
}