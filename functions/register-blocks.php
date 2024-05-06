<?php
function deactivate_wp_blocks($allowed_blocks, $post)
{
    // Désactiver tous les blocs sauf "Custom HTML" et "Bloc Titre et Texte"
    $allowed_blocks = array(
        'core/html',
        'core/paragraph',
        'acf/titre-texte',
        'acf/header-home',
    );

    return $allowed_blocks;
}
add_filter('allowed_block_types_all', 'deactivate_wp_blocks', 10, 2);



// Déclarer un bloc Gutenberg avec ACF
function register_acf_block_types()
{

    acf_register_block_type(array(
        'name'              => 'titre-texte',
        'title'             => 'Bloc Titre et Texte',
        'description'       => 'Un bloc dans lequel écrire des titres et des paragraphes',
        'render_template'   => 'blocks/block-titre-texte.php',
        'mode'    => 'edit',
    ));
    acf_register_block_type(array(
        'name'              => 'header-home',
        'title'             => 'Header home',
        'description'       => 'Le bloc du header de la home',
        'render_template'   => 'blocks/block-header-home.php',
        'mode'    => 'edit',
    ));
}

add_action('acf/init', 'register_acf_block_types');


function disable_preview_mode_by_default($settings)
{
    $settings['isPreview'] = false;
    return $settings;
}
add_filter('editor_default_settings', 'disable_preview_mode_by_default');
