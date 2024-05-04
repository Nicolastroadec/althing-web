<?php
function deactivate_wp_blocks($allowed_blocks, $post)
{
    // Désactiver tous les blocs sauf "Custom HTML"
    $allowed_blocks = array(
        'core/html',
        'acf/plugin',
    );

    return $allowed_blocks;
}

add_filter('allowed_block_types', 'deactivate_wp_blocks', 10, 2);



// Déclarer un bloc Gutenberg avec ACF
function register_acf_block_types()
{

    acf_register_block_type(array(
        'name'              => 'plugin',
        'title'             => 'Extension',
        'description'       => "Présentation d'une extension WordPress",
        'render_template'   => 'blocks/plugin.php',
        'category'          => 'formatting',
        'icon'              => 'admin-plugins',
        'keywords'          => array('plugin', 'extension', 'add-on'),
        'enqueue_assets'    => function () {
            wp_enqueue_style(
                'capitaine-blocks',
                get_template_directory_uri() . '/css/blocks.css'
            );
        }
    ));
}

add_action('acf/init', 'register_acf_block_types');
