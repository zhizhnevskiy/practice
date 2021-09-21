<?php
/**
 * Plugin Name: Test 09
 * Description: Echo with $args & Cron!
 * Author: Zhizhnevskiy
 **/

$args = array('first', 'second');
if (!wp_next_scheduled('dmx_cron_second', $args)) {
    // проверяем наличие крон-задачи
    wp_schedule_event(time(), 'hourly', 'dmx_cron_second', $args);
    // создаем крон-задачу если такой нет
}

// Добавляем хук на нашу крон-задачу
add_action('dmx_cron_second', 'dmx_cron_callback', 10, 2);
function dmx_cron_callback($arg1, $arg2)
{
    echo "Cron work!";
    //something do
}