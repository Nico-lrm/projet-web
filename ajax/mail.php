<?php
    ini_set('SMTP', 'smtp.orange.fr');
    ini_set('smtp_port', '25');
    ini_set('sendmail_from', 'lormiernicolas60@gmail.com');
    $regex_head = '/[\n\r$*\\|`~%<>]/';
    /* On vérifie qu'il n'y a aucun header dans les champs */ 
    $email = $_COOKIE['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $subname = $_POST['subname'];
    $body = "En provenance de : ".$_COOKIE['email']."\r"."\n".$_POST['body'];   
    if ($subname == '') {
        if (preg_match($regex_head, $_POST['subject']) || preg_match($regex_head, $_POST['body'])) {  
            echo 'Erreur';
        } else {
            mail('webmaster@nicolaslormier.fr', utf8_decode($subject), utf8_decode($body));
            echo $_SESSION['email'];
            echo 'Votre mail à bien été envoyé.';
        }
    } else {
        echo "Erreur";
    }
?>