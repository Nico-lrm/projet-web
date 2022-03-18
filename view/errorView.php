<?php $title = 'Erreur' ?>
<?php $style = 'error' ?>
<?php $script = '' ?>
<?php ob_start(); ?>
    <span>Erreur :</span>&nbsp;<?= $e->getMessage() ?> <!-- Par exemple ici, on a une fonction de base des Exceptions qui est getMessage(), donc on affiche la valeur de e qui récupère les données de getMessage() -->
    <button class="btn btn-dark" onclick="history.back()">Précédent</button>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>