<?php


require_once get_template_directory() . '/functions/enqueue-style.php';

require_once get_template_directory() . '/functions/register-blocks.php';

require_once get_template_directory() . '/functions/add-page-options.php';

/* require_once get_template_directory() . '/functions/role-editor.php';
 */
require_once get_template_directory() . '/functions/custom-class-menu.php';

require_once get_template_directory() . '/functions/add-menu-support-and-register-menus.php';

/* 
require_once get_template_directory() . '/functions/register-main-script.php';

require_once get_template_directory() . '/functions/custom-sub-menu-cpt-backoffice.php';

require_once get_template_directory() . '/functions/emails/afficher-entree-mail-back-office.php'; */

// require_once get_template_directory() . '/functions/emails/ajout-page-entree-mail.php';

// require_once get_template_directory() . '/functions/emails/traitement-mails.php';


function load_admin_styles()
{
    // Chemin vers votre fichier CSS spécifique pour l'administration
    $admin_css_url = get_template_directory_uri() . '/css/admin-styles.css';

    // Enregistrez votre fichier CSS pour l'administration
    wp_enqueue_style('admin-styles', $admin_css_url, array(), '1.0');
}

// Ajouter l'action pour charger les styles dans l'administration
add_action('admin_enqueue_scripts', 'load_admin_styles');
