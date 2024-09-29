<?php 
class wepublishing_achivement_widget extends WP_Widget {

    // Constructor method to initialize the widget
    public function __construct() {        
        parent::__construct(
            'wepublishing_achivement', // Widget ID
            __('WeP: Achievement', 'wepme'), // Widget Name
            [ 'description' => __('This Widget is for the Business Template and will show The Achievements', 'wepme') ] // Widget Description
        );
    }

    // Form method to display widget settings in the admin panel
    public function form($instance) {
        // Set default values
        $defaults = array(
            'logo_'    => '',
            'title_'   => '',
            'content_' => '',
        );
        
        // Merge defaults with current instance values
        $instance = wp_parse_args((array) $instance, $defaults);
        $number = 4;

        // Loop through 3 times for 3 achievements
        for ($i = 1; $i <= $number; $i++) {
            // Get values for each achievement
            $logo    = !empty($instance["logo_$i"]) ? esc_attr($instance["logo_$i"]) : '';
            $title   = !empty($instance["title_$i"]) ? esc_attr($instance["title_$i"]) : '500';
            $content = !empty($instance["content_$i"]) ? esc_attr($instance["content_$i"]) : 'We Already Completed Morethan 5000+ Projects';
            ?>

            <p><strong><?php esc_attr_e("Achievement #$i", 'wepme'); ?></strong></p>
            <p>
                <label for="<?php echo $this->get_field_id("logo_$i"); ?>"><?php esc_attr_e('Logo', 'wepme'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id("logo_$i"); ?>" name="<?php echo $this->get_field_name("logo_$i"); ?>" value="<?php echo $logo; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id("title_$i"); ?>"><?php esc_attr_e('Title', 'wepme'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id("title_$i"); ?>" name="<?php echo $this->get_field_name("title_$i"); ?>" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id("content_$i"); ?>"><?php esc_attr_e('Content', 'wepme'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id("content_$i"); ?>" name="<?php echo $this->get_field_name("content_$i"); ?>" value="<?php echo $content; ?>" />
            </p>

            <?php
        }
    }

    // Update method to save widget settings
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $number = 4;
        
        // Loop through and sanitize each set of inputs for 3 achievements
        for ($i = 1; $i <= $number; $i++) {
            $instance["logo_$i"] = (!empty($new_instance["logo_$i"])) ? sanitize_text_field($new_instance["logo_$i"]) : '';
            $instance["title_$i"] = (!empty($new_instance["title_$i"])) ? sanitize_text_field($new_instance["title_$i"]) : '';
            $instance["content_$i"] = (!empty($new_instance["content_$i"])) ? sanitize_text_field($new_instance["content_$i"]) : '';
        }
        return $instance;
    }

    // Widget method to display the widget on the front end
    public function widget($args, $instance) {
        echo $args['before_widget']; ?>

        <section class="achivement-section clearfix">
            <div class="container">
                <div class="column clearfix">
                    <?php
                    $number = 4;
                        
                    // Loop through and display the 3 achievements
                    for ($i = 1; $i <= $number; $i++) {
                        $logo = !empty($instance["logo_$i"]) ? esc_html($instance["logo_$i"]) : 'Default Logo';
                        $title = !empty($instance["title_$i"]) ? esc_html($instance["title_$i"]) : '5000';
                        $content = !empty($instance["content_$i"]) ? esc_html($instance["content_$i"]) : 'We Already Completed Morethan 5000+ Projects';
                        ?>
                        <div class="four-column">
                            <div class="achivement-content">
                                <div class="ai-ico">                             
                                    <i class="fa-solid fa-arrow-right-long"><?php echo $logo ?></i>
                                </div>
                                <div class="ai-content">
                                    <div class="ai-content-holder">
                                        <h2 class="ai-title"><span class="counter"><?php echo $title ?></span></h2>
                                        <div class="ai-text">
                                            <p><?php echo $content ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </section>
        <?php        
        echo $args['after_widget'];
    }
}
