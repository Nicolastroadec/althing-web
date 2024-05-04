<?php
// Récupérer l'ID de la page parente
$parent_id = get_the_ID();

// Paramètres pour récupérer les pages enfants
$args = array(
    'post_parent' => $parent_id, // ID de la page parente
    'post_type'   => 'page',     // Type de publication (pages)
    'post_status' => 'publish',  // Statut de publication (publiées)
);

// Récupérer les pages enfants
$children = get_children($args);

?>
<div class="articles-hero internal-section-width">

    <?php
    // Afficher les pages enfants
    if (!empty($children)) {
        foreach ($children as $child) {
            $lien_article = get_permalink();
            $image_mise_en_avant = get_the_post_thumbnail_url($child->ID);
            $date_publication = $child->post_date_gmt;

            // Récupérer le champ ACF "ville" associé à la page enfant

            // Récupérer l'extrait de la page enfant
            $excerpt = get_the_excerpt();


            // Récupérer le lien de la page enfant
            $lien_article = get_permalink($child->ID);

            $title = $child->post_title;

            // Récupérer le texte "En savoir plus" des articles depuis les options de la page d'administration
            $texte_en_savoir_plus_articles = get_field('texte_en_savoir_plus_articles', 'option');
    ?>

            <div class="article">
                <a class="image-link" href="<?= $lien_article; ?>">
                    <img src="<?= $image_mise_en_avant; ?>" alt="<?= get_the_title(); ?>">
                </a>
                <div class="info-article">
                    <p class="date-publication"><?= $date_publication; ?></p>
                    <h3><?= $title ?></h3>
                    <p class="excerpt"><?= $excerpt; ?></p>
                    <a href="<?= $lien_article; ?>" class="lire-la-suite">
                        <?= $texte_en_savoir_plus_articles; ?>
                    </a>
                </div>
            </div> <?php
                }
            }   ?>

</div>