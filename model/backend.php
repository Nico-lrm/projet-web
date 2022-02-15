<?php
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
    // Créer l'utilisateur dans la BDD
    function createUser($firstname, $name, $birthday, $email, $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $db = dbConnect();
        $users = $db->prepare('INSERT INTO user(firstname, name, birthday, email, password, role) VALUES(:firstname, :name, :birthday, :email, :password, "user")');
        $users->bindParam(':firstname', $firstname);
        $users->bindParam(':name', $name);
        $users->bindParam(':birthday', $birthday);
        $users->bindParam(':email', $email);
        $users->bindParam(':password', $password);
        $users->execute();
    }
    //Fonction pour éviter les doublons de compte
    function noTwinEmail($email) {
        $db = dbConnect();
        $users = $db->prepare('SELECT EXISTS(SELECT email FROM user WHERE email = :email) AS email');
        $users->bindParam(':email', $email);
        $users->execute();
        $user = $users->fetchAll(PDO::FETCH_ASSOC);
        return $user[0];
    }
    // Vérifier que l'utilisateur existe bien
    function connectUser($email) {
        $db = dbConnect();
        $users = $db->prepare('SELECT * FROM user WHERE email = :email');
        $users->bindParam(':email', $email);
        $users->execute();
        if ($users ->rowCount() > 0) {
            $user = $users->fetchAll(PDO::FETCH_ASSOC);
            return $user[0];
        } else {
            throw new Exception('Pas d\'utilisateur trouvé.');
        }
    }
?>