<?php
require('model/backend.php');

//Ajouter un utilisateur - Controller
function addUser($firstname, $name, $birthday, $email, $password) {
    $regex = "/^[A-Za-z0-9À-ÖØ-öø-ÿ\-\&_.\^]+$/";
    //Vérifié si les champs sont bien rempli
    if(!empty($firstname) && !empty($name) && !empty($birthday) && !empty($email) && !empty($password)) {
        //Vérifier si les champs ne contiennent pas de caractères bizarre
        if(preg_match($regex, $password) && preg_match($regex, $firstname) && preg_match($regex, $name)) {
            //Vérifié s'il est majeur
            if(verifAge($birthday)) {
                //Vérifié les doublons
                $data = noTwinEmail($email); 
                if ($data['email'] == true) {
                    throw new Exception('Erreur : Adresse e-mail déjà utilisée');
                } else {
                    $users = createUser($firstname, $name, $birthday, $email, $password);
                    if ($users === false) {
                        throw new Exception("Erreur lors de l'insertion dans la BDD"); 
                    } else {
                        echo '<script>alert("Votre compte à bien été créer.")</script>';
                        echo '<script>document.location.href= "/"</script>';
                    }
                }
            } else {
                throw new Exception("Vous devez avoir 18 ans ou plus pour vos inscrire sur le site");
            }
        } else {
            throw new Exception("Caractères indésirables dans l'un des champs");
        }
    } else {
        throw new Exception("L'un des champs n'a pas été saisie");
    }
}

function verifAge($date) { 
    $date_birthday = date_create($date);
    $date_local = date_create("now");
    date_sub($date_local, date_interval_create_from_date_string("18 years"));
    return ($date_local > $date_birthday);
} 

//Connexion d'un utilisateur - Controller - Les vérifications se font du côté asynchrone de la fonction (cf. ajax/password-verify.php)
function loginUser($email, $password) {
    $user[0] = connectUser($email);
    if ($user[0] === null) {
        throw new Exception("Connexion Impossible.");
    } else {
        if (password_verify($password, $user[0]['password'])) {
            $_SESSION['loggedin'] = true;
            header('Location: /');
        }
    }
}

function sessionDestroy() {
    session_destroy();
    header('Location: ?page=home');
}
?>