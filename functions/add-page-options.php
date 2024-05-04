<?php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Page d\'options',
        'menu_title' => 'Options du thème',
        'menu_slug'  => 'options-du-theme',
        'capability' => 'edit_theme_options',
        'redirect'   => false,
    ));
}
