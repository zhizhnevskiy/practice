<?php
/**
 * Plugin Name: Test 03
 * Description: Автоматическое исправление двойного пробела!
 * Author: Zhizhnevskiy
 **/

// Перехват хука-фильтра 'the_content' (содержимое любого поста), запуск функции 'mfp_Fix_Text_Spacing'
add_filter("the_content", "mfp_Fix_Text_Spacing");

// Автоматическое исправление двойного пробела
function mfp_Fix_Text_Spacing($the_Post)
{
    $the_New_Post = str_replace("  ", " ", $the_Post);

    return $the_New_Post;
}