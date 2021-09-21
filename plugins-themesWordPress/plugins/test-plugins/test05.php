<?php
/**
 * Plugin Name: Test 05
 * Description: Добавляем опции в раздел Настройки/чтение!
 * Author: Zhizhnevskiy
 **/

// ------------------------------------------------------------------
// Вешаем все блоки, поля и опции на хук admin_init
// ------------------------------------------------------------------
//
add_action( 'admin_init', 'eg_settings_api_init' );
function eg_settings_api_init() {
    // Добавляем блок опций на базовую страницу "Чтение"
    add_settings_section(
        'eg_setting_section', // секция
        'Заголовок для секции настроек (Test 05)',
        'eg_setting_section_callback_function',
        'reading' // страница
    );

    // Добавляем поля опций. Указываем название, описание,
    // функцию выводящую html код поля опции.
    add_settings_field(
        'eg_setting_name',
        'Описание поля опции',
        'eg_setting_callback_function', // можно указать ''
        'reading', // страница
        'eg_setting_section' // секция
    );
    add_settings_field(
        'eg_setting_name2',
        'Описание поля опции2',
        'eg_setting_callback_function2',
        'reading', // страница
        'eg_setting_section' // секция
    );

    // Регистрируем опции, чтобы они сохранялись при отправке
    // $_POST параметров и чтобы callback функции опций выводили их значение.
    register_setting( 'reading', 'eg_setting_name' );
    register_setting( 'reading', 'eg_setting_name2' );
}

// ------------------------------------------------------------------
// Сallback функция для секции
// ------------------------------------------------------------------
//
// Функция срабатывает в начале секции, если не нужно выводить
// никакой текст или делать что-то еще до того как выводить опции,
// то функцию можно не использовать для этого укажите '' в третьем
// параметре add_settings_section
//
function eg_setting_section_callback_function() {
    echo '<p>Текст описывающий блок настроек</p>';
}

// ------------------------------------------------------------------
// Callback функции выводящие HTML код опций
// ------------------------------------------------------------------
//
// Создаем checkbox и text input теги
//
function eg_setting_callback_function() {
    echo '<input 
		name="eg_setting_name" 
		type="checkbox" 
		' . checked( 1, get_option( 'eg_setting_name' ), false ) . ' 
		value="1" 
		class="code" 
	/>';
}
function eg_setting_callback_function2() {
    echo '<input 
		name="eg_setting_name2"  
		type="text" 
		value="' . get_option( 'eg_setting_name2' ) . '" 
		class="code2"
	 />';
}