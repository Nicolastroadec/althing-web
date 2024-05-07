<?php function enqueue_custom_styles()
{
    // Enqueue the style
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


function enqueue_admin_styles()
{
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri() . '/css/admin.css', array(), '1.0.0');

    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/main.css', array(), '1.0', 'all');


    wp_enqueue_script('admin-scripts', get_stylesheet_directory_uri() . '/js/admin.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'enqueue_admin_styles');
