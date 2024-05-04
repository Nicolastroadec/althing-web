<?php
function theme_support_menu()
{
    add_theme_support('menus');
}
add_action('after_setup_theme', 'theme_support_menu');


function register_custom_menus()
{
    register_nav_menus(array(
        'primary_menu' => esc_html__('Primary Menu', 'textdomain'), // Menu principal
        'footer_menu' => esc_html__('Footer Menu', 'textdomain') // Menu du pied de page
    ));
}
add_action('init', 'register_custom_menus');
