<?php 
/**
 * Pour les views, vous avez juste besoin de créer une fonction qui a la même syntaxe et qui 
 * porte le nom de votre page avec le prefixe 'get'
 * ex: function getNomPage()
 * 
 *  Vous aurez sans doute besoin de plus de chose vu que vous récupérer des infos de la base
 *  sans AJAX, hésiter pas a consulter le dossier "support" pour des exemples
*/

function getHome() {
    require('view/homeView.php');
}
function getLocations() {
    require('view/locationsView.php');
}
