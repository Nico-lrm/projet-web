<?php

    /**
     *  - Script PHP pour envoi de mail, à corriger
     *  
     *  Celui ci sera fini plus tard, si vous voulez des explications dessus ou 
     *  si vous avez d'autre idées d'utilisation (autre que pour le support)
     *  Tester des trucs !
    */

    //Configuration du fichier 'php.ini' via la fonction ini_set, pour gérer ce qui est nécéssaire pour l'envoi d'un mail
    ini_set('SMTP', 'smtp.orange.fr');
    ini_set('smtp_port', '25');
    ini_set('sendmail_from', 'test@gmail.com');

    //La regex qui vérifie s'il existe un des caractères, si oui alors le mail n'est pas valide
    $regex_head = '/[\n\r$*\\|`~%<>]/';
    
    $email = $_COOKIE['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $body = "En provenance de : ".$_COOKIE['email']."\r"."\n".$_POST['body'];   

    /* On vérifie qu'il n'y a aucun header dans les champs via la fonction preg_match(regex, variable_a_tester) */ 
    if (preg_match($regex_head, $_POST['subject']) || preg_match($regex_head, $_POST['body'])) {  
        throw new Exception("Des caractères non valides sont présent dans le mail");
    } else {
        //Vu que le mail est envoyé au format français avec accent, on décode les champs en UTF-8 pour obtenir tout les caractères
        mail('test@gmail.fr', utf8_decode($subject), utf8_decode($body));

        //Ici on refera une redirection vers la page d'accueil ou autre chose, un msg etc...
    }
?>