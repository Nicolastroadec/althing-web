<?php
// Filtrer les éléments du menu du back-office
function filters_articles_for_users()
{
    global $menu;
    $user = wp_get_current_user();
    $user_roles = $user->roles;

    $regions_roles_data = require_once get_template_directory() . '/functions/data/regions-roles-data.php';

    foreach ($regions_roles_data as $data) {
        $role_region = $data['user_type'];
        if (in_array($role_region, $user_roles)) {
            remove_menu_page('edit.php'); // Retirer le menu "Articles"
            //  remove_menu_page('edit.php?post_type=articles-occitanie'); // Retirer le CPT "article-occitanie"

            foreach ($regions_roles_data as $data) {
                if ($data['user_type'] !== $role_region) {
                    remove_submenu_page('articles-regionaux', 'edit.php?post_type=' . $data['cpt_slug']);
                }
            }

            $taxonomies = get_taxonomies(array('public' => true), 'objects');
            foreach ($taxonomies as $taxonomy) {
                remove_meta_box($taxonomy->name . 'div', 'page', 'side');
            }
        }
    }
}
add_action('admin_menu', 'filters_articles_for_users', 11);


function filter_pages_for_users($query)
{
    if (is_admin() && $query->is_main_query() && $query->get('post_type') == 'page') {
        $user = wp_get_current_user();
        $user_roles = $user->roles;

        $tax_query = array();

        foreach ($user_roles as $user_role) {

            $terms = get_terms(array(
                'taxonomy' => 'region',
                'slug' => $user_role
            ));

            if (!empty($terms)) {
                $tax_query[] = array(
                    'taxonomy' => 'region',
                    'field' => 'slug',
                    'terms' => $user_role
                );
            }
        }

        if (!empty($tax_query)) {
            $query->set('tax_query', $tax_query);
        }
    }
}
add_action('pre_get_posts', 'filter_pages_for_users');
