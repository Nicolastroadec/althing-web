<?php
function add_cpt_submenu($parent_slug, $cpt_data)
{
    foreach ($cpt_data as $cpt) {
        $menu_title = $cpt['menu_title'];
        $submenu_title = $cpt['submenu_title'];
        $capability = $cpt['capability'];
        $cpt_slug = $cpt['cpt_slug'];

        add_submenu_page($parent_slug, $menu_title, $submenu_title, $capability, 'edit.php?post_type=' . $cpt_slug);
        remove_menu_page('edit.php?post_type=' . $cpt_slug);
    }
}

add_action('admin_menu', 'custom_menu');

function page_callback_function($cpt_data)
{
    $cpt_data = include get_template_directory() . '/functions/data/cpt-data.php';
    $user = wp_get_current_user();
    $user_roles = $user->roles;
?>
    <div class="wrap">
        <h1>Liste des Articles Régionaux</h1>
        <?php foreach ($cpt_data as $data) : ?>
            <?php if ($data['user_type'] == $user_roles[0]) : ?>
                <a class="lien-articles-regionaux" href="<?= 'edit.php?post_type=' . $data['cpt_slug'] ?>" class="href"><?= $data['menu_title'] ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php
}


function custom_menu()
{
    // Créer votre menu
    $parent_slug = 'articles-regionaux'; // Remplacez 'menu_slug' par le slug de votre menu parent
    add_menu_page(
        'Page Title',
        'Liste des Articles Régionaux',
        'edit_posts',
        $parent_slug,
        'page_callback_function',
        'dashicons-media-spreadsheet'
    );

    $cpt_data = require_once get_template_directory() . '/functions/data/cpt-data.php';

    // Ajouter les CPT en sous-menu
    add_cpt_submenu($parent_slug, $cpt_data);
}
