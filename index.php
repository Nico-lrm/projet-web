<?php
    //On a toujours un session_start() au tout début, et dans l'index car on commence toujours pas l'index sur un site (et dans notre cas celui-ci charge les autres pages)
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('controller/frontend.php');
    require('controller/backend.php');

    //try/Catch pour la gestion de nos erreur, dès qu'il y a une Exception il renvoie le msg associé
    try {

        // Récupérer la valeur de la variable page pour rediriger sur une vue via sa fonction associé dans controller/frontend.php
        if(isset($_GET['page'])) {

            //Un switch pour éviter un vieux if/else if/ else
            //N'oubliez pas de mettre votre page ici et d'ajouter son lien dans la navbar ! (et renvoyer une exception par exemple pour les zones restreinte a un utilisateur connecté, s'il n'est pas co -> alors Exception)
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
                case "locations" : 
                    if(isset($_SESSION["loggedin"])) {
                        //Vu que les locations sont au même endroit, autant juste rajouter une variable a vérifié pour la redirection, la page changera de contenu a la fin en regardant la valeur de l'ID de la location (Pareil pour les réservations/locations)
                        if(isset($_GET['id'])) {
                            getLocationsUnique();
                        } else {
                            getLocations();
                        }
                    } else {
                        throw new Exception("Veuillez-vous connecter avant de parcourir le site");
                    }
                break;
                case "dc" :
                    sessionDestroy();
                break;
                case "profil" :
                    getProfil();
                    break;

                //Par défault, on renvoie la page d'accueil (on renverra plus tard l'erreur ici pour la jolie page d'Alex et Cora !)
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