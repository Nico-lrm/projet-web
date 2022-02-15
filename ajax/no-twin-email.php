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
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $db = dbConnect();
    $users = $db->prepare('SELECT * FROM user WHERE email = "'.$email.'"');
    $users->execute();
    if ($users->rowCount() > 0) {
        return http_response_code(400);
    } else {
        return http_response_code(200);
    }
?>