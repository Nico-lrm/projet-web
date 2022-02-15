<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('controller/frontend.php');
    require('controller/backend.php');
    // Récupérer la valeur de la variable page pour la gestion des erreurs
    try {
        if(isset($_GET['page'])) {
            switch($_GET['page']) {
                case "signin" :
                    if(!isset($_SESSION["loggedin"])) {
                        loginUser(filter_input(INPUT_POST, 'email-si', FILTER_VALIDATE_EMAIL), $_POST['password-si']);
                    } else {
                        throw new Exception("Impossible de se connecter 2 fois");
                    }
                break;
                case "signup" :
                    if(!isset($_SESSION["loggedin"])) {
                        if($_POST["password-su"] == $_POST["confirm-password-su"]) {
                            addUser(htmlspecialchars($_POST['firstname-su']), htmlspecialchars($_POST['name-su']), $_POST['birthday-su'], filter_input(INPUT_POST, 'email-su', FILTER_VALIDATE_EMAIL), $_POST['password-su']);
                        } else {
                            throw new Exception("Le mots de passe sont différents");
                        }
                    } else {
                        throw new Exception("Impossible de créer un compte une fois connecté(e)");
                    }
                break;
                case "dc" :
                    sessionDestroy();
                default: 
                    getHome();
                break;
            }
        } else {
            getHome();
        }
    } catch(Exception $e) {
        $e->getMessage();
        require('view/errorView.php');
    }
?>