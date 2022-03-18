//A l'envoie du formulaire de connexion, on doit faire des vérification du côté front avant
// l'envoi au côté back (tjr 2 vérifs au fianl, une front et une back)
document.getElementById('form-si').addEventListener("submit", function(e) {
    //On annule l'envoi du formulaire pour le vérifier côté client
    e.preventDefault();

    //Récupération des données pour la requête HTTP
    var email = document.getElementById("email-si").value;
    var password = document.getElementById("password-si").value;

    if(email.match(regexEmail) && password.length >= 8) {
        //Modification des éléments du bouton
        document.getElementById('spinner-si').classList.toggle("hidden");
        document.getElementById('button-text-si').innerText = "Connexion..."
        document.getElementById('button-si').setAttribute("disabled", true);

        //Requête HTTP
        var xhttp = new XMLHttpRequest();

        //Préparation et envoie de la requête xhttp.open(methode_envoie, le script utilisé, et ça je sais plus, mettre a true dans le doute mdr)
        xhttp.open("POST", "ajax/password-verify.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //On précise a la requête http que, une fois chargé, on traite les infos via une fonction anonyme( qui n'a pas de nom donc qui ne peut être appelé en dehors de ça )
        xhttp.onload = function() {
            //Si on a un code erreur, on modifie le CSS de plusieurs elements pour ajouter du dynamisme a la page
            if (this.status == 400) {
                alert("Erreur : L'adresse e-mail et/ou le mot de passe est/sont incorrect(s)");
                document.getElementById('spinner-si').classList.toggle("hidden");
                document.getElementById('button-text-si').innerText = "Se connecter";
                document.getElementById('button-si').removeAttribute("disabled")
            } else {
                //Sinon, c'est que le formulaire est valide donc on l'envoie au back en traitement
                document.getElementById("form-si").submit()
            }
        }

        //On envoie la requête !
        xhttp.send("email="+email+"&password="+password);
    }
})

/* 
    Vérification des champs du formulaire de connexion
    - Le format ici est a peu près le même partout, ici c'est principalement de l'esthétique vu que la gestion
    du formulaire se fait au dessus
    - L'objectif de la gestion ici est de gérer les classe "is-valid" et "is-invalid", en faite
    le but est d'ajouter "is invalid" si le champs contient du texte mais qui ne correponds pas
    et, si le champs est valide, vérifié si "is-invalid" n'est pas mis (ou le retirer) et ajouter "is-valid"
    - Pour vérifier les champs, on ajoute un EventListener("type d'action a vérifié", function a lancer si la condition a vérifié est vrai)
*/

//Ajout d'un eventListener sur l'élement qui a l'id "email-si", et lorsqu'on quitte la selection, on lance une fonction
document.getElementById("email-si").addEventListener("focusout", function(e) {
    //Si le champs n'est pas vide, on applique d'autre test
    if(document.getElementById("email-si").value != "") {
        //Si le texte saisi n'est conforme a la regexEmail (defini dans script, qui lui est tjr appelé dans les pages du site)
        if(document.getElementById("email-si").value.match(regexEmail)) {
            //On évite d'avoir deux fois la même classe ou les deux en même temps
            if(!(document.getElementById("email-si").classList.contains("is-valid"))) {
                if(document.getElementById("email-si").classList.contains("is-invalid")) {
                    document.getElementById("email-si").classList.remove("is-invalid")
                }
                //On ajoute a la fin la classe pour dire "c'est good mec"
                document.getElementById("email-si").classList.add("is-valid")
            }
        } else {
            //Sinon, on affiche le champ comme étant incorrect
            if(!(document.getElementById("email-si").classList.contains("is-invalid"))) {
                if(document.getElementById("email-si").classList.contains("is-valid")) {
                    document.getElementById("email-si").classList.remove("is-valid")
                }
                document.getElementById("email-si").classList.add("is-invalid")
            }
        }
    } else {
        //Si le champs est vide, alors on retire toute les classes, vu que sans texte, c'est ni vrai, ni faux
        if(document.getElementById("email-si").classList.contains("is-valid")) {
            document.getElementById("email-si").classList.remove("is-valid")
        }
        if(document.getElementById("email-si").classList.contains("is-invalid")) {
            document.getElementById("email-si").classList.remove("is-invalid")
        }
    }
})

//On applique le même style de traitement sur le mot de passe, mais pas les même test (on va pas tester un email ici mais la longueur)
document.getElementById("password-si").addEventListener("focusout", function(e) {
    if(document.getElementById("password-si").value != "") {
        if(document.getElementById("password-si").value.length >= 8 && document.getElementById("password-si").value.match(regex)) {
            if(!(document.getElementById("password-si").classList.contains("is-valid"))) {
                document.getElementById("password-si").classList.remove("is-invalid")
                document.getElementById("password-si").classList.add("is-valid")
            }
        } else {
            if(!(document.getElementById("password-si").classList.contains("is-invalid"))) {
                document.getElementById("password-si").classList.remove("is-valid")
                document.getElementById("password-si").classList.add("is-invalid")
            }
        }
    } else {
        if(document.getElementById("password-si").classList.contains("is-valid")) {
            document.getElementById("password-si").classList.remove("is-valid")
        }
        if(document.getElementById("password-si").classList.contains("is-invalid")) {
            document.getElementById("password-si").classList.remove("is-invalid")
        }
    }
})