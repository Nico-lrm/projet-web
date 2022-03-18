<?php

    /**
     * Regarder le fichier 'no-twin-email.php' pour avoir les infos, qui sont globalement les mêmes que celui-ci
     * Ce script est pour vérifié le mot de passe lorsque qqun essaie de se connecter, si le mdp est bon alors il se connecte
     * sinon il doit taper de nouveau son mot de passe
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
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $db = dbConnect();
    $users = $db->prepare('SELECT * FROM user WHERE email = "'.$email.'"');
    $users->execute();
    if ($users->rowCount() > 0) {
        $user = $users->fetchAll(PDO::FETCH_ASSOC);

        // La fonction password_verify(mot de passe récuépérer, mot de passe de l'utilisateur trouvé) permet de décrypter le message
        // Vu qu'il est jamais enregistrer en lettre bien claire, il es tjr hasher
        if (!password_verify($password, $user[0]['password'])) {
            return http_response_code(400);
        } else {
            return http_response_code(200);
        }
            
    } else {
        return http_response_code(400);
    }
?>