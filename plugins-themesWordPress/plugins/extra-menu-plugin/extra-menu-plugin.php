<?php
/**
 * Plugin Name: Extra menu
 * Description: Installing an additional menu in Settings!
 * Author: Zhizhnevskiy
 **/

add_action( 'admin_menu', 'wpschool_api_add_admin_menu' );
add_action( 'admin_init', 'wpschool_api_settings_init' );

function wpschool_api_add_admin_menu( ) {
    add_options_page( 'Дополнительная страница настроек', 'Настройки Innowise', 'manage_options', 'wpschool-settings-page', 'wpschool_api_options_page' );
}

function wpschool_api_settings_init( ) {
    register_setting( 'wpschoolCustom', 'wpschool_api_settings' );
    add_settings_section(
        'wpschool_api_wpschoolCustom_section',
        __( 'Секция 1', 'wordpress' ),
        'wpschool_api_settings_section_callback',
        'wpschoolCustom'
    );

    add_settings_field(
        'wpschool_api_text_field_0',
        __( 'Опция 1', 'wordpress' ),
        'wpschool_api_text_field_0_render',
        'wpschoolCustom',
        'wpschool_api_wpschoolCustom_section'
    );

    add_settings_field(
        'wpschool_api_select_field_1',
        __( 'Опция 2', 'wordpress' ),
        'wpschool_api_select_field_1_render',
        'wpschoolCustom',
        'wpschool_api_wpschoolCustom_section'
    );
}

function wpschool_api_text_field_0_render( ) {
    $options = get_option( 'wpschool_api_settings' );
    ?>
    <input type='text' name='wpschool_api_settings[wpschool_api_text_field_0]' value='<?php echo $options['wpschool_api_text_field_0']; ?>'>
    <?php
}

function wpschool_api_select_field_1_render( ) {
    $options = get_option( 'wpschool_api_settings' );
    ?>
    <select name='wpschool_api_settings[wpschool_api_select_field_1]'>
        <option value='1' <?php selected( $options['wpschool_api_select_field_1'], 1 ); ?>>Значение 1</option>
        <option value='2' <?php selected( $options['wpschool_api_select_field_1'], 2 ); ?>>Значение 2</option>
    </select>
    <?php
}

function wpschool_api_settings_section_callback( ) {
    echo __( 'Описание для секции настроек', 'wordpress' );
}

function wpschool_api_options_page( ) {
    ?>
    <form action='options.php' method='post'>
        <h2>Дополнительная страница настроек</h2>
        <?php
        settings_fields( 'wpschoolCustom' );
        do_settings_sections( 'wpschoolCustom' );
        submit_button();
        ?>
    </form>
    <?php
}
