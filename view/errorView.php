<?php $title = 'Erreur' ?>
<?php $stylesheet = 'error' ?>
<?php $stylesheet2 = 'error' ?>
<?php $script = '' ?>
<?php ob_start(); ?>
    <span>Erreur :</span>&nbsp;<?= $e->getMessage() ?>
    <button class="btn btn-dark" onclick="history.back()">Précédent</button>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>