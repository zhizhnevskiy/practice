<?php
/**
 * Plugin Name: Meta Box
 * Description: Add Meta Box
 * Author: Zhizhnevskiy
 **/

// Add a new interval of 5 minutes to Cron through the cron_schedules filter
add_filter( 'cron_schedules', 'cron_add_five_min_for_meta' );
function cron_add_five_min_for_meta( $schedules ) {
	$schedules['five_min_for_meta'] = array(
		'interval' => 60 * 5,
		'display'  => 'Раз в 5 минут'
	);

	return $schedules;
}

register_activation_hook( __FILE__, 'my_activation_meta' );
function my_activation_meta() {
	wp_clear_scheduled_hook( 'my_meta_event' );
	wp_schedule_event( time(), 'five_min_for_meta', 'my_meta_event' );
}

// Adding blocks to the main column on post and post pages
add_action( 'add_meta_boxes', 'status_meta_box' );
function status_meta_box() {
	$screens = array( 'post', 'page' );
	add_meta_box( 'myplugin_sectionid', 'Page Status', 'meta_box_callback', $screens );
}

// HTML block code
function meta_box_callback( $post, $meta ) {
	$screens = $meta['args'];

	// Using nonce for verification
	wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

	// Field value
	$value = get_post_meta( $post->ID, 'my_meta_key', 1 );

	// Form fields for data entry
	?>
    <form action="functions.php">
        <p>Please select your status page:</p>
        <div>
            <input type="radio" id="myplugin_new_field" name="myplugin_new_field" value="open">
            <label for="myplugin_new_field">Open</label>
            <br><br>
            <input type="radio" id="myplugin_new_field" name="myplugin_new_field" value="personal">
            <label for="myplugin_new_field">Personal</label>
            <br><br>
            <input type="radio" id="myplugin_new_field" name="myplugin_new_field" value="password_protected">
            <label for="myplugin_new_field">Password protected</label>
            <br><br>
        </div>
    </form>
	<?php
}

add_action( 'my_meta_event', 'do_this_meta' );
function do_this_meta() {

// Save the data when the post is saved
	add_action( 'save_post', 'myplugin_save_postdata' );
	function myplugin_save_postdata( $post_id ) {
		// Make sure the field is set
		if ( ! isset( $_POST['myplugin_new_field'] ) ) {
			return;
		}

		// Check the nonce of our page, because save_post can be called from somewhere else
		if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename( __FILE__ ) ) ) {
			return;
		}

		// If it's autosave, don't do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check user rights
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// All OK. Now, you need to find and save the data
		// We clear the value of the input field
		$my_data = sanitize_text_field( $_POST['myplugin_new_field'] );

		// Updating the data in the database
		update_post_meta( $post_id, 'my_meta_key', $my_data );
	}
}