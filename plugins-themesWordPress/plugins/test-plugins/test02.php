<?php
/**
 * Plugin Name: Test 02
 * Description: Добавление текста после footer!
 * Author: Zhizhnevskiy
 **/

// Хук события 'wp_footer', запуск функции 'mfp_Add_Text()'
add_action("wp_footer", "mfp_Add_Text");

// Хук события 'wp_head', запуск функции 'mfp_Remove_Text()'
add_action("wp_head", "mfp_Remove_Text");

// Определение функции 'mfp_Add_Text()', выводящей текст
function mfp_Add_Text()
{
    echo "<p style='color: black; padding-left: 15%;'>Test 02 : после загрузки футера сайта добавляется мой текст!</p>";
}

// Определение функции 'mfp_Remove_Text()' удаление нашей предыдущей функции из события 'wp_footer'
function mfp_Remove_Text()
{
    if (date("l") === "Monday") {
        // Target the 'wp_footer' action, remove the 'mfp_Add_Text' function from it
        remove_action("wp_footer", "mfp_Add_Text");
    }
}
