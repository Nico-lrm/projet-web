<?php
    // Connexion à la base de données
    function dbConnect() {
        $srv = "localhost";
        $dbname = "";
        $user = 'root';
        $password = '';
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
        if (!password_verify($password, $user[0]['password'])) {
            return http_response_code(400);
        } else {
            return $user;
        }
            
    } else {
        return http_response_code(400);
    }
?>