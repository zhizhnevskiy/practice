<?php
/**
 * Plugin Name: Test 12
 * Description: Test Cron with option!
 * Author: Zhizhnevskiy
 **/

// функция выполнения крон задачи 'rs_cron_event'
add_action('rs_cron_event', 'rs_cron_rebuild_meta_products');
function rs_cron_rebuild_meta_products() {
    // выполняем задачу крон
    $headers = 'From: My Name <myname@mydomain.com>' . "\r\n";
    wp_mail('test@test.com', 'Тема', 'Содержание', $headers );
}

// добавим наш новый интервал для крона
add_filter( 'cron_schedules', 'rs_cron_interval');
function rs_cron_interval( $schedules, $value = '' ){
    // чтобы можно было указать значение жестко
    if( ! $value )
        $value = intval( get_option('options_rs_time_period') ?: 12 );

    $schedules['rs_time_period'] = array(
        'interval' => $value * HOUR_IN_SECONDS ,
        'display' => 'Задаётся в настройках плагина RS'
    );

    return $schedules;
}

// Функция обновления поля
add_filter('acf/update_value/name=rs_time_period', 'my_acf_update_value', 10, 3);
function my_acf_update_value( $new_period, $post_id, $field  ) {

    $old_period = get_option('options_rs_time_period');

    // опция изменилась, перезапишем крон задачу с новой настройкой!
    if( $new_period != $old_period ){
        // удалим имеющуюся крон задачу
        $timestamp = wp_next_scheduled('rs_cron_event');
        wp_unschedule_event( $timestamp, 'rs_cron_event');

        // изменим интервал чтобы задача добавилось правильно...
        add_filter( 'cron_schedules', function( $schedules ) use ( $new_period ){
            return rs_cron_interval( $schedules, $new_period ); // костылёк жестко укажем интервал
        } );

        // добавим крон задача снова
        wp_reschedule_event( time(), 'rs_time_period', 'rs_cron_event' );
    }

    return $new_period;
}