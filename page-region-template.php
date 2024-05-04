<?php /* Template Name: Page Région */


get_header();
$id = get_the_ID();
$premiere_phrase_titre = get_field('premiere_phrase_titre', $id);
$deuxieme_phrase_titre = get_field('deuxieme_phrase_titre', $id);


?>
<div class="hero">
    <?php $image_mise_en_avant = get_the_post_thumbnail_url(); ?>
    <img src="<?= $image_mise_en_avant; ?>" alt="<?= get_the_title(); ?>">
    <h1 class="internal-section-width">
        <span><?= $premiere_phrase_titre ?></span>
        <span><?= $deuxieme_phrase_titre ?></span>
    </h1>
</div>

<?php /*  require_once(get_template_directory() . '/inc/inc-articles.php');  */ ?>

<?php /* require_once(get_template_directory() . '/inc/inc-newsletter.php'); */ ?>

<main id="primary" class="site-main">

    <?php require_once(get_template_directory() . '/inc/inc-map-region.php'); ?>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();

?>