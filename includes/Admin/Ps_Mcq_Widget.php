<?php

namespace Sagar\Mcq\Admin;


/**
 * Mcq Widget
 */

class Ps_Mcq_Widget extends \WP_Widget
{
    function __construct()
    {
        $widget_opt = array(
            'classname'     => 'ps_mcq',
            'description'   => 'Mcq System Widget.'
        );

        parent::__construct('ps_mcq', esc_html__('Mcq System Widget.', 'ps-mcq'), $widget_opt);
    }

    function widget( $args, $instance )
    {
        $title      = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Mcq System', 'ps-mcq' );

        echo $args['before_widget'];
        if ( !empty( $instance[ 'title' ] ) ) {
            echo wp_kses_post($args[ 'before_title' ]) . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
        }
        ?>
        <div class="ps_mcq">
            <?php echo 'hello'; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }


    function update ( $new_instance, $old_instance )
    {
        return $new_instance;
    }

    function form($instance)
    {
        $title      = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'About Author', 'ps-mcq' );
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'ps-mcq' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }
}