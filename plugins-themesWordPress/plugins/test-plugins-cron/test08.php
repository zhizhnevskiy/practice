<?php
/**
 * Plugin Name: Test 08
 * Description: Delete page with Cron!
 * Author: Zhizhnevskiy
 **/

// time() - текущее время в UNIX-формате, то есть в первый раз задача выполнится моментально
if( !wp_next_scheduled('true_hook_1') )
	wp_schedule_event( time(), 'hourly', 'true_hook_1');

//wp_schedule_single_event( hourly, 'true_my_hook_1');

add_action( 'true_my_hook_1', 'test');

function test() {
	wp_trash_post( 1 );
}