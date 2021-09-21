<?php
/**
 * Plugin Name: Test 14
 * Description: Read widget!
 * Author: Zhizhnevskiy
 **/

function read_register_widget() {
	register_widget( 'read_widget' );
}

add_action( 'widgets_init', 'read_register_widget' );

class read_widget extends WP_Widget {

// constructor function
	function __construct() {
		parent::__construct(
		// widget ID
			'read_widget',
			// widget name
			__( 'Read message Widget (Zhizhnevskiy)', ' read_widget_domain' ),
			// widget description
			array( 'description' => __( 'Read message widget for WordPress', 'read_widget_domain' ), )
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
		//echo __( 'This is a widget from Zhizhnevskiy', 'read_widget_domain' );
		//echo $args['after_widget'];

		global $wpdb;
		$message = $wpdb->get_results(
			"SELECT name, message 
	        FROM {$wpdb->prefix}messages"
		);
		/* take headers and content from the database
        all posted messages */
		if ( $message ) {
			foreach ( $message as $data ) {
				echo 'Сообщение: "' . $data->message .
				     '" От пользователя: ' . $data->name . '<br>';
			}
		}
		echo '<br>';
	}

	// defines the widget settings in the WordPress dashboard
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Message Widget', 'read_widget_domain' );
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