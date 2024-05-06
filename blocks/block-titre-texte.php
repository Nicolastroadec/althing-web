<?php
$bloc_titre_texte = get_field('bloc_titre_texte'); // Remplacez 'wysiwyg' par le nom du champ WYSIWYG que vous avez créé dans le groupe block_wysiwyg

$titre_bloc = $bloc_titre_texte['titre_bloc'];
$texte_bloc = $bloc_titre_texte['texte_bloc'];

$position_du_texte = $bloc_titre_texte['position_du_texte'];
$couleur_du_fond = $bloc_titre_texte['couleur_du_fond'];
?>
<div class="block-wrapper block-titre-texte fond-<?= $couleur_du_fond ?> position-<?= $position_du_texte ?>">
    <div class="block">
        <div class="texte">
            <h2><?= $titre_bloc ?></h2>
            <p><?= $texte_bloc ?></p>
        </div>
    </div>
</div>