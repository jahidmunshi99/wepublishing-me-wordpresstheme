<?php
/*********************** Portfolio Widget ************************/
if( ! class_exists('wepublishing_portfolio_widget')){
    require ABSPATH . 'wp-includes/class-wp-widget.php';
}

class wepublishing_portfolio_widget extends WP_Widget{
    public function __construct(){
        parent::__construct();
        // $this->id_base = false;
        // $this->name = __( 'TF: FP Portfolio Widget', 'wepme' );
        $widget_options = array(
            'classname'   => 'widget_portfolio clearfix',
            'description' => __( 'Portfolio Widget (Front Page)', 'wepme' ),
        );
        $control_options = array(
            'width'  => 200,
            'height' => 250,
        );
        parent::__construct(
            false,
            $name = __('TF: FP Portfolio Widget', 'wepme'),
            $widget_options,
            $control_options,
        );
    }
    function form( $instance ){
        $instance = wp_parse_args( (array) $instance, array(
            'number'      => '6',
            'title'       => '',
            'text'        => '',
            'button_text' => '',
            'button_url'  => '',
            'page_id1'    => '',
            'page_id0'    => '',
            'page_id2'    => '',
            'page_id3'    => '',
            'page_id4'    => '',
            'page_id5'    => '',
            'page_id6'    => '',
            'page_id7'    => '',
        ));
        $number = absint( $instance[ 'number' ] );
        $title = esc_attr( $instance[ 'title' ] );
        $text = esc_attr( $instance[ 'text' ] );
        $button_text = esc_attr( $instance[ 'button_text' ] );
        $button_url = esc_attr( $instance[ 'button_url' ] );

        for( $i = 0; $i < $number; $i++ ){
            $var = 'page_id'.$i;
            $defaults[$var] = '';
        }

        $instance = wp_parse_args( (array) $instance, $defaults );

        for( $i = 0; $i < $number; $i++ ){
            $var = 'page_id'.$i;
            $var = absint( $instance[$var] );
        }?>

        <!--- Number Filed Start -->
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ) ?>"><?php esc_html_e( 'Number of Works:', 'wepme' ) ?></label>
            <input id="<?php echo get_field_id( 'number' ) ?>" name="<?php echo $this->get_field_name('number') ?>" type="text" value="<?php echo absint( $number ) ?>" size="3">
        </p>
        <!--- Number Filed End-->

        <!--- Title Filed Start -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ) ?>"><?php echo esc_html_e( 'Title:', 'wepme') ?></label>
            <input type="text" name="<?php echo get_field_name('title') ?>" id="<?php echo $this->get_field_id( 'title' ) ?>" value="<?php echo esc_attr( $title )  ?>">
            <!--- Title Filed End -->
        </p>
        <!--- Text Filed Start -->
        <p>
            <label for="<?php echo $this->get_field_id( 'text' ) ?>"><?php echo esc_html_e( 'Description:', 'wepme' ) ?></label>
            <textarea rows="10" cols="20" type="text" id="<?php echo $this->get_field_id('text') ?>" name="<?php echo $this->get_filed_name( 'text' ) ?>" value="<?php echo esc_attr( $text ) ?>">
        </p>
        <!--- Text Filed End -->

        <!--- Button Text Filed Start -->
        <p>
            <label for="<?php echo $this->get_field_id( 'button_text' ) ?>"><?php echo esc_html_e( 'Button Text:', 'wepme' ) ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'button_text' ) ?>" name="<?php echo $this->get_filed_name( 'button_text' ) ?>" value="<?php echo esc_attr( $button_text ) ?>">
        </p>
        <!--- Button Text Filed End -->
        <!--- Button Url Filed Start -->
        <p>
            <label for="<?php echo $this->get_field_id( 'button_url' ) ?>"><?php echo esc_html_e( 'Button Url:', 'wepme' ) ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'button_url' ) ?>" name="<?php echo $this->get_filed_name( 'button_url' ) ?>" value="<?php echo esc_attr( $button_url ) ?>">
        </p>  
        <!--- Button Url Filed End -->
      
        <?php
        for( $i = 0; $i < $number; $i++ ){
        ?>
            <p>
                <label for="<?php echo $this->get_filed_id( key( $defaults )) ?>"><?php esc_html_e( 'Page', 'wepme' ) ?>:</label>
                <?php wp_dropdown_pages( array( 'show_option_none' => '', 'name' => $this->get_field_name( key( $defaults ) ), 'selected' => $instance[key( $defaults )] ) ); ?>
            </p>
        <?php
            next( $defaults );
        }
    }

    /**
     * Update Function
     */
    function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance[ 'number' ] = absint( $new_instance[ 'number' ] );        
        $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title'] );      
        $instance[ 'text' ] = sanitize_text_field( $new_instance[ 'text' ] );
        $instance[ 'button_text' ] = sanitize_text_field( $new_instance[ 'button_text' ] );
        $instance[ 'button_url' ] = esc_url_raw(( $new_instance[ 'button_url' ] ) );

        for( $i = 0; $i < $instance[ 'number' ]; $i++ ){
            $var = 'page_id'.$i;
            $instance[ $var ] = absint( $new_instance[ $var ] );
        }
        return $instance;
    }

    /**
     * Widgets Internal Settings
     */
    function widget( $args, $instance){
        global $post;
        extract( $args);
        extract( $instance );
        $number = empty( $instance['number'] ) ? 7 : $instance['number'];
		$page_array = array();
		$title = isset( $instance['title'] )?$instance['title']:'';
		$text  = apply_filters('widget_text', empty( $instance['text'] )?'':$instance['text'], $instance);
		$button_text = isset( $instance['button_text'] )?$instance['button_text']:'';
		$button_url = isset( $instance['button_url'] )?$instance['button_url']:'';
		$page_array = array();
		for ($i = 0; $i < $number; $i++) {
			$var = 'page_id'.$i;
			$page_id = isset( $instance[$var] )?$instance[$var]:'';
			if (!empty( $page_id) ) {
				array_push( $page_array, $page_id );
			}
			// Push the page id in the array
		}
        $get_featured_pages = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type'      => array('page'),
            'post__in'       => $page_array,
            'orderby'        => 'post__in'
        ));
        echo '<!-- Portfolio Widget ============================================= -->' .$before_widget;
		echo '<div class="portfolio-container clearfix">'; ?>
        <div class="">
            <?php if ( !empty( $title )) { echo $before_title . esc_html( $title ) . $after_title; }
                    if( !empty( $text )){ ?>
            <p class="widget-highlighted-sub-title"><?php echo esc_html( $text ); ?></p>
            <?php }
            if( !empty( $button_text )){ ?>
            <a title="<?php echo esc_attr( $button_text );?>" href="<?php echo esc_url( $button_url );?>" class="btn-default light-color"><?php echo esc_html( $button_text );?></a>
            <?php } ?>
        </div>
        <?php
            while ( $get_featured_pages->have_posts()):$get_featured_pages->the_post(); ?>
                <div class="four-column-full-width freesia-animation zoomIn">
                <?php $page_title = get_the_title();
                        if ( has_post_thumbnail() ) { ?>
                            <?php echo get_the_post_thumbnail($post->ID, 'post-thumbnails');
                        } ?>
        <div class="portfolio-content">
            <h3><a href="<?php the_permalink();?>" title="<?php echo esc_attr( $page_title ); ?>"><?php echo esc_html( $page_title ); ?></a></h3>
            <?php if(get_the_excerpt() != ''): ?>
                <p>
                    <?php the_excerpt() ?>;
                </p>
            <?php endif; ?>
        </div>
        <!-- end .portfolio-content -->
        </div>
        <!-- end .four-column-full-width -->
        <?php
        endwhile;
                // Reset Post Data
                wp_reset_query();
                echo '</div> <!-- end .container -->';
                echo $after_widget .'<!-- end .widget_portfolio -->';
	}
}
