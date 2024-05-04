
<?php
function registerMainScript()
{
    $main_js_timestamp = filemtime(get_template_directory() . '/js/main.js');
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('jquery'),  $main_js_timestamp, true);
}

add_action('wp_enqueue_scripts', 'registerMainScript');

add_theme_support('post-thumbnails');
