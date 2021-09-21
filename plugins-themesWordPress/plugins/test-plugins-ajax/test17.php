<?php
/**
 * Plugin Name: Test 17
 * Description: Test AJAX!
 * Author: Zhizhnevskiy
 **/

add_action( 'wp_ajax_hello', 'say_hello' );
add_action( 'wp_ajax_nopriv_hello', 'say_hello' );

function say_hello() {
	if ( empty( $_GET['name'] ) ) {
		$name = 'user';
	} else {
		$name = esc_attr( $_GET['name'] );
	}
	echo "Hello, $name!";
	wp_die();
}

// launch in admin
add_action( 'admin_print_footer_scripts', 'my_action_javascript' );
function my_action_javascript() {
	?>
    <script>
        jQuery(document).ready(function () {
            var data = {
                action: 'hello',
                name: 'Yuriy'
            };
            jQuery.get(ajaxurl, data, function (response) {
                alert('Получено из файла test17.php: ' + response);
            });
        });
    </script>
	<?php
}

// launch in front with file 'custom01.js'
add_action( 'wp_enqueue_scripts', 'my_assets' );
function my_assets() {

	// add js and css
	wp_enqueue_script( 'sweetalert', plugins_url( 'assets/sweetalert.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_style( 'sweetalert', plugins_url( 'assets/sweetalert.css', __FILE__ ) );

	wp_enqueue_script( 'custom01', plugins_url( 'custom01.js', __FILE__ ), array( 'jquery' ) );

	wp_localize_script( 'custom01', 'myPlugin', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'name'    => wp_get_current_user()->display_name
		)
	);
}