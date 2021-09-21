<?php
/**
 * Plugin Name: Test 13
 * Description: Message Widget!
 * Author: Zhizhnevskiy
 **/

function message_register_widget() {
	register_widget( 'message_widget' );
}

add_action( 'widgets_init', 'message_register_widget' );

class message_widget extends WP_Widget {

// constructor function
	function __construct() {
		parent::__construct(
		// widget ID
			'message_widget',
			// widget name
			__( 'Message Widget (Zhizhnevskiy)', ' message_widget_domain' ),
			// widget description
			array( 'description' => __( 'Message widget for WordPress', 'message_widget_domain' ), )
		);
	}

// contains the output of the widget
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		//if title is present
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		//output
		//echo __( 'This is a widget from Zhizhnevskiy', 'message_widget_domain' );
		//echo $args['after_widget'];
		?>

        <form class="wrap" action="" method="post">
            <span>Please write your name:</span> <br>
            <input type="text" name="name">
            <br>
            <span>Please write your message:</span> <br>
            <input type="text" name="message">
            <br><br>
            <button type="submit">Write</button>
        </form><br>

		<?php

		$message = $_POST['message'] ?? '';
		$name    = $_POST['name'] ?? '';
		global $wpdb;
		if ( ! empty( $message && $name ) ) {
			$wpdb->insert(
				$wpdb->prefix . 'messages', // indicate the table
				array( // 'column_name' => 'value'
					'name'    => $name,
					'message' => $message
				)
			);
		}
	}

// defines the widget settings in the WordPress dashboard
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Message Widget', 'message_widget_domain' );
		}
		?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/>
        </p>

		<?php
	}

// updates widget settings
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}