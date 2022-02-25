<?php

    /**
     * Lorsqu'on fait des requête AJAX, on est OBLIGE d'amener tout les éléments au sein d'un même fichier, car le script PHP se lit en entier, on isole donc
     * - La partie qui est nécéssaire a l'AJAX (comme par exemple, la fonction de connexion a la BDD, essentiel pour récupérer ou vérifié des infos)
     * - Le traitement que nous appliquerons en fonction du retour de la base
    */

    // Connexion à la base de données
    function dbConnect() {
        $srv = "localhost";
        $dbname = "house";
        $user = 'root';
        $password = 'n2411l';
        $db = new PDO('mysql:host='.$srv.';dbname='.$dbname.';charset=utf8', $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    //On vérifie si l'adresse envoyé par la requête en AJAX est bien un e-mail
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $db = dbConnect();

    //On effectue la requête
    $users = $db->prepare('SELECT * FROM user WHERE email = "'.$email.'"');
    $users->execute();

    //Et si on a un retour
    if ($users->rowCount() > 0) {
        //On renvoie soit une erreur
        return http_response_code(400);
    } else {
        //Soit que tout est bon, la personne peut donc utiliser ce mail pour créer son compte
        return http_response_code(200);
    }
?>