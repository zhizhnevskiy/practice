<?php
/**
 * Plugin Name: Test 03
 * Description: Перехватываем get_the_excerpt фильтр хук и добавляем некоторый текст перед ним!
 * Author: Zhizhnevskiy
 **/

// Перехватываем get_the_excerpt фильтр хук, запускаем функцию mfp_Add_Text_To_Excerpt
add_filter("get_the_excerpt", "mfp_Add_Text_To_Excerpt");

// Берём отрывок, добавляем некоторый текст перед ним и возвращаем изменённый отрывок
function mfp_Add_Text_To_Excerpt($old_Excerpt)
{
    $new_Excerpt = "<b>Excerpt: </b>" . $old_Excerpt;
    return $new_Excerpt;
}