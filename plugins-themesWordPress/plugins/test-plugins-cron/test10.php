<?php
/**
 * Plugin Name: Test 10
 * Description: Echo with new interval & Cron!
 * Author: Zhizhnevskiy
 **/

// Добавляем новый интервал 5 минут в Cron через фильтр cron_schedules.
add_filter( 'cron_schedules', 'cron_add_five_min' );
function cron_add_five_min( $schedules ) {
    $schedules['five_min'] = array(
        'interval' => 60 * 5,
        'display' => 'Раз в 5 минут'
    );
    return $schedules;
}

register_activation_hook(__FILE__, 'my_activation');
function my_activation() {
    // удалим на всякий случай все такие же задачи cron, чтобы добавить новые с "чистого листа"
    // это может понадобиться, если до этого подключалась такая же задача неправильно (без проверки что она уже есть)
    wp_clear_scheduled_hook( 'my_hourly_event' );

    // Проверим нет ли уже задачи с таким же хуком
    // этот пункт не нужен, потому что мы выше удалил все задачи.
    // if( ! wp_next_scheduled( 'my_hourly_event' ) )

    // добавим новую cron задачу
    wp_schedule_event( time(), 'five_min', 'my_hourly_event');
}

add_action( 'my_hourly_event', 'do_this_hourly' );
function do_this_hourly() {
   echo "Cron Work!!!!";
}

// При деактивации плагина, обязательно нужно удалить задачу:
register_deactivation_hook( __FILE__, 'my_deactivation' );
function my_deactivation(){
    wp_clear_scheduled_hook( 'my_hourly_event' );
}