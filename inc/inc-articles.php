<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC',
);

$query = new WP_Query($args);


?>
<div class="articles-hero internal-section-width">


    <?php
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Récupérer l'image mise en avant
            $image_mise_en_avant = get_the_post_thumbnail_url();

            // Récupérer la date de publication au format 25/01/2024
            $date_publication = get_the_date('d/m/Y');

            // Récupérer le champ ACF "ville" associé à l'article
            $ville = get_field('ville');

            // Récupérer l'excerpt
            $excerpt = get_the_excerpt();

            // Récupérer le lien de l'article
            $lien_article = get_permalink();

            $texte_en_savoir_plus_articles = get_field('texte_en_savoir_plus_articles', 'option');
    ?>
            <div class="article">
                <a class="image-link" href="<?= $lien_article; ?>">
                    <img src="<?= $image_mise_en_avant; ?>" alt="<?= get_the_title(); ?>">
                </a>
                <div class="info-article">
                    <p class="date-publication"><?= $date_publication; ?></p>
                    <p class="ville"><?= $ville; ?></p>
                    <p class="excerpt"><?= $excerpt; ?></p>
                    <a href="<?= $lien_article; ?>" class="lire-la-suite">
                        <?= $texte_en_savoir_plus_articles; ?>
                    </a>
                </div>
            </div>
    <?php
        endwhile;
    endif; ?>
</div>
<?php

// Réinitialiser la requête WordPress pour éviter les problèmes avec d'autres requêtes
wp_reset_postdata();
?>