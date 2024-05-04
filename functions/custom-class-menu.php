<?php

// Ajouter une métabox pour les liens personnalisés
// Ajouter une métabox pour les liens personnalisés
function custom_menu_item_custom_fields($id, $item, $depth, $args)
{
    // Vérifier si l'élément de menu est un lien personnalisé
    $custom_class = get_post_meta($item->ID, '_menu_item_custom_class', true);
?>
    <p class="field-custom description description-wide">
        <label for="menu-item-custom-class">
            <?php esc_html_e('Class:', 'textdomain'); ?><br />
            <input type="text" id="menu-item-custom-class" class="widefat code menu-item-custom-class" name="menu-item-custom-class[<?php echo esc_attr($id); ?>]" value="<?php echo esc_attr($custom_class); ?>" />
        </label>
    </p>
<?php
}
add_action('wp_nav_menu_item_custom_fields', 'custom_menu_item_custom_fields', 10, 4);



// Enregistrer la valeur du champ de classe personnalisée pour les liens personnalisés
function save_custom_menu_item_custom_fields($menu_id, $menu_item_db_id, $args)
{
    if (isset($_POST['menu-item-custom-class'][$menu_item_db_id])) {
        $custom_class = sanitize_text_field($_POST['menu-item-custom-class'][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, '_menu_item_custom_class', $custom_class);
    }
}
add_action('wp_update_nav_menu_item', 'save_custom_menu_item_custom_fields', 10, 3);


function add_custom_menu_class($classes, $item, $args)
{
    // Récupérer la valeur de la classe personnalisée enregistrée en base de données
    $custom_class = get_post_meta($item->ID, '_menu_item_custom_class', true);
    // Ajouter la classe personnalisée à l'objet $item
    $item->custom_class = $custom_class;
    // Vérifier si l'élément de menu a une classe personnalisée
    if (isset($item->custom_class)) {
        // Ajouter la classe personnalisée aux classes CSS existantes
        $classes[] = $item->custom_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_custom_menu_class', 10, 3);


add_filter('walker_nav_menu_start_el', 'custom_nav_menu_link', 10, 4);
function custom_nav_menu_link($items_wrap, $item, $depth, $args)
{
    if ('custom' === $item->type && empty($item->url)) {
        $items_wrap = preg_replace('/<a[^>]+>(.*)<\/a>/iU', '$1', '<div class="menu-etage-2-title">' . $item->title . '</div>');
    }
    return $items_wrap;
}
