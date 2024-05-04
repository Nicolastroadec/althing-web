
<?php
// Fonction pour créer une page personnalisée dans le back office
function ajouter_page_entrees_mail()
{
    add_menu_page(
        'Entrées mail', // Titre de la page
        'Entrées mail', // Texte du menu
        'manage_options', // Capacité requise pour accéder à cette page
        'entrees_mail', // Slug de la page
        'afficher_entrees_mail' // Fonction pour afficher le contenu de la page
    );
}
add_action('admin_menu', 'ajouter_page_entrees_mail');
