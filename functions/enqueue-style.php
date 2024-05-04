<?php function enqueue_custom_styles()
{
    // Enqueue the style
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
