<?php

// Fonction pour afficher le contenu de la page "Entrées mail"
function afficher_entrees_mail()
{
    global $wpdb;

    // Nom de la table dans la base de données WordPress
    $table_name = $wpdb->prefix . 'wp_custom_emails';

    // Récupérer les entrées de la table
    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    // Afficher les entrées dans un tableau
    echo '<div class="wrap"><h2>Entrées mail</h2>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>ID</th><th>Email</th><th>Date de création</th></tr></thead>';
    echo '<tbody>';
    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['date_created'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table></div>';
}
