<?php
/*
 * Добавляю новое меню в Админ Консоль
 */

// Хук событие 'admin_menu', запускаю функцию 'Add_My_Admin_Link()'
add_action('admin_menu', 'Add_My_Admin_Link');

// Добавляю новую ссылку в меню Админ Консоли
function Add_My_Admin_Link()
{
    add_menu_page(
        'Page', // Название страниц (Title)
        'Status page', // Текст ссылки в меню
        'manage_options', // Требование к возможности видеть ссылку
        'status-page-plugin/includes/page-status.php' // 'slug' - файл отобразится по нажатию на ссылку
    );
}
