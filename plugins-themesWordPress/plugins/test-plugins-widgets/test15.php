<?php
/**
 * Plugin Name: Test 15
 * Description: Course widget!
 * Author: Zhizhnevskiy
 **/

function course_register_widget() {
	register_widget( 'course_widget' );
}

add_action( 'widgets_init', 'course_register_widget' );

class course_widget extends WP_Widget {

// constructor function
	function __construct() {
		parent::__construct(
		// widget ID
			'course_widget',
			// widget name
			__( 'Get course Widget (Zhizhnevskiy)', ' course_widget_domain' ),
			// widget description
			array( 'description' => __( 'Get course widget for WordPress', 'course_widget_domain' ), )
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
		//echo __( 'This is a widget from Zhizhnevskiy', 'course_widget_domain' );
		//echo $args['after_widget'];
		echo '<b>Сегодня ' . date( 'd.m.Y' ) . '</b><br>';

		global $wpdb;
		$courses = $wpdb->get_results(
			"SELECT RUB, USD , EUR
	        FROM {$wpdb->prefix}course ORDER BY id DESC LIMIT 1"
		);
		// take currency rates from the database
		if ( $courses ) {
			foreach ( $courses as $data ) {
				echo 'Доллар США: ' . $data->USD . '<br>' .
				     'Евро: ' . $data->EUR . '<br>' .
				     'Российский рубль(100): ' . $data->RUB . '<br>';
			}
		}
		echo '<br>';
	}

	// defines the widget settings in the WordPress dashboard
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Course Widget', 'course_widget_domain' );
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