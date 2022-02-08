<?php $title = 'Accueil' ?>
<?php ob_start(); ?>
    <p>lorem*60</p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>