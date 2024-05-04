
<?php
function registerMapScript()
{
    $map_script_timestamp = filemtime(get_template_directory() . '/js/main.js');
    wp_enqueue_script('mobin-map-script', get_template_directory_uri() . '/js/map.js', array('jquery'), $map_script_timestamp, true);
}

add_action('wp_enqueue_scripts', 'registerMapScript');
