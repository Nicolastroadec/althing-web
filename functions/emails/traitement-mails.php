<?php

function inserer_email_dans_table_custom($email)
{

    global $wpdb;

    // Nom de la table dans la base de données WordPress
    $table_name = $wpdb->prefix . 'wp_custom_emails';

    // Tableau des données à insérer
    $data = array(
        'email' => $email,
    );

    // Format des données à insérer
    $format = array('%s');

    // Insérer les données dans la table
    $wpdb->insert($table_name, $data, $format);
}

// Ajouter la fonction à un hook d'action
add_action('init', 'handle_form_submission');

function cleanPost($post)
{
    if (isset($_POST['form_nonce']) && wp_verify_nonce($_POST['form_nonce'], 'test-nonce')) {
        if ($_POST['chatbot-form'] &&  isset($_POST['name']) && isset($_POST['email']) && isset($_POST['textarea']) && isset($_POST['choix-region'])) {
            $_POST['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $_POST['email'] = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
            $_POST['textarea'] = htmlspecialchars($_POST['textarea'], ENT_QUOTES, 'UTF-8');
            $_POST['choix-region'] = htmlspecialchars($_POST['choix-region'], ENT_QUOTES, 'UTF-8');

            // Nettoyage des données du formulaire
            $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $_POST['textarea'] = filter_var($_POST['textarea'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $_POST['choix-region'] = filter_var($_POST['choix-region'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            return $_POST;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Fonction pour gérer la soumission du formulaire
function handle_form_submission()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST = cleanPost($_POST);

        if ($_POST) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $textarea =   $textarea = $_POST['textarea'];
            $choixRegion = $_POST['choix-region'];

            $to = 'nicolas@avousleweb.com';

            if ($choixRegion == 'centre') {
                $to = 'troadecnicolas@hotmail.fr';
            }

            if ($choixRegion == 'bretagne') {
                $to = 'contact@nicolastroadec.fr';
            }

            $subject = "Message from $name";
            $body = "From: $name\nEmail: $email\nMessage: $textarea";
            $headers = "From: $email\r\n"; // Ajoutez \r\n pour séparer les en-têtes
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";



            $subject = "Message de " . esc_html($name);
            $body = "Nom : " . esc_html($name) . "<br>";
            $body .= "Email : " . esc_html($email) . "<br>";
            $body .= "Message : " . esc_html($textarea) . "<br>";
            $headers = "From: " . esc_attr($email) . "\r\n"; // Ajoutez \r\n pour séparer les en-têtes
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";


            if (mail($to, $subject, $body, $headers)) {
                echo "Votre message a bien été envoyé.";
            } else {
                echo "Il y a une erreur, veuillez recommencer.";
            }
        }
    }
}


add_action('rest_api_init', function () {
    register_rest_route('myplugin/v1', '/submit-form', array(
        'methods' => 'POST',
        'callback' => 'handle_form_submission',
        'permission_callback' => '__return_true',
    ));
});
