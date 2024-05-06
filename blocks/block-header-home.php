<?php
$bloc_header_home = get_field('bloc_header_home'); // Remplacez 'wysiwyg' par le nom du champ WYSIWYG que vous avez créé dans le groupe block_wysiwyg

$titre_bloc = $bloc_header_home['titre_bloc'];
$texte_bloc = $bloc_header_home['texte_bloc'];
$logo = $bloc_header_home['logo'];

?>
<div class="block-wrapper block-header-home fond-bleu">
    <div class="block">
        <div class="texte">
            <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
            <h1><?= $titre_bloc ?></h2>
                <p><?= $texte_bloc ?></p>
        </div>
    </div>
</div>