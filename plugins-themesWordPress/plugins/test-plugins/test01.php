<?php
/**
 * Plugin Name: Test 01
 * Description: Установка cookie с текущим временем дня!
 * Author: Zhizhnevskiy
 **/

// Хук события 'init', вызывается после того, как WordPress завершает загрузку кода ядра
add_action('init', 'add_Cookie');

// Установка cookie с текущим временем дня
function add_Cookie()
{
    echo 'test01';
    setcookie("last_visit_time", date("r"), time() + 60 * 60 * 24 * 30, "/");
}