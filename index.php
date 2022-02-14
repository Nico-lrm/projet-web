<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('controller/frontend.php');
    // Récupérer la valeur de la variable page pour la gestion des erreurs
    if(isset($_GET['page'])) {
        switch($_GET['page']) {
            default: 
                getHome();
            break;
        }
    } else {
        getHome();
    }
?>