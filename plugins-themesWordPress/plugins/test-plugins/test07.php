<?php
/**
 * Plugin Name: Test 07
 * Description: Установка меню с 'подменю'!
 * Author: Zhizhnevskiy
 **/

// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages()
{
    // Add a new submenu under Options:
    add_options_page('Test Options', 'Test Options', 8, 'testoptions', 'mt_options_page');

    // Add a new submenu under Manage:
    add_management_page('Test Manage', 'Test Manage', 8, 'testmanage', 'mt_manage_page');

    // Add a new top-level menu (ill-advised):
    add_menu_page('Test Toplevel', 'Test Toplevel', 8, __FILE__, 'mt_toplevel_page');

    // Add a submenu to the custom top-level menu:
    add_submenu_page(__FILE__, 'Test Sublevel', 'Test Sublevel', 8, 'sub-page', 'mt_sublevel_page');

    // Add a second submenu to the custom top-level menu:
    add_submenu_page(__FILE__, 'Test Sublevel 2', 'Test Sublevel 2', 8, 'sub-page2', 'mt_sublevel_page2');
}

// mt_options_page() displays the page content for the Test Options submenu
function mt_options_page()
{
    echo "<h2>Test Options</h2>";
}

// mt_manage_page() displays the page content for the Test Manage submenu
function mt_manage_page()
{
    echo "<h2>Test Manage</h2>";
}

// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function mt_toplevel_page()
{
    echo "<h2>Test Toplevel</h2>";
}

// mt_sublevel_page() displays the page content for the first submenu
// of the custom Test Toplevel menu
function mt_sublevel_page()
{
    echo "<h2>Test Sublevel</h2>";
}

// mt_sublevel_page2() displays the page content for the second submenu
// of the custom Test Toplevel menu
function mt_sublevel_page2()
{
    echo "<h2>Test Sublevel 2</h2>";
}


