//Fonction pour calculer l'age en javascript - https://www.w3resource.com/javascript-exercises/javascript-date-exercise-18.php
function calculate_age(dob) { 
    var diff_ms = Date.now() - dob.getTime();
    var age_dt = new Date(diff_ms); 
  
    return Math.abs(age_dt.getUTCFullYear() - 1970);
}

//AJAX pour le formulaire d'inscription, éviter les doublons d'email
document.getElementById("form-su").addEventListener("submit", function(e) {
    e.preventDefault();

    //Variables
    var email_su = document.getElementById("email-su").value
    var name_su = document.getElementById("name-su").value
    var firstname_su = document.getElementById("firstname-su").value
    var birthday_su = document.getElementById("birthday-su").value
    var password_su = document.getElementById("password-su").value
    var confirm_password_su = document.getElementById("confirm-password-su").value

    //Grosse condition pour vérifié tout les champs d'un coup vu que la gestion d'erreur s'affiche en direct chez l'utilisateur, c'est des modifs qu'il doit faire lui même
    if(email_su.match(regexEmail) && name_su.length > 0 && firstname_su.length > 0 && calculate_age(new Date(birthday_su)) >= 18 && password_su.match(regex) && password_su.length >= 8 && password_su == confirm_password_su) {
        //Modification des éléments du bouton
        document.getElementById('spinner-su').classList.toggle("hidden");
        document.getElementById('button-text-su').innerText = "Création du compte..."
        document.getElementById('button-su').setAttribute("disabled", true);

        //Requête HTTP
        var xhttp = new XMLHttpRequest();

        //Préparation et envoie de la requête
        xhttp.open("POST", "ajax/no-twin-email.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //Une fois chargé, on traite les infos
        xhttp.onload = function() {
            if (this.status == 400) {
                //Si l'email existe déjà, on réactive les boutons pour que l'utilisateur corrige son erreur et puisse renvoyer le formulaire
                alert("Erreur : L'adresse e-mail existe déjà");
                document.getElementById('spinner-su').classList.toggle("hidden");
                document.getElementById('button-text-su').innerText = "Créer son compte";
                document.getElementById('button-su').removeAttribute("disabled")
            } else {
                document.getElementById("form-su").submit()
            }
        }
        //On envoie la requête
        xhttp.send("email="+email_su);
    } else {
        //Si l'un des champs est mal renseigné, on fait une petite pop-up en JS via alert(message)
        alert("Erreur : l'un des champs est mal renseigné, veuillez-vous référer aux erreurs sur le formulaire")
    }
})

/* Vérification des champs du formulaire d'inscription, voir le fichier "login.js" pour les explications (sachant que c'est exactement la même chose) */
document.getElementById("email-su").addEventListener("focusout", function(e) {
    if(document.getElementById("email-su").value != "") {
        if(document.getElementById("email-su").value.match(regexEmail)) {
            if(!(document.getElementById("email-su").classList.contains("is-valid"))) {
                if(document.getElementById("email-su").classList.contains("is-invalid")) {
                    document.getElementById("email-su").classList.remove("is-invalid")
                }
                document.getElementById("email-su").classList.add("is-valid")
            }
        } else {
            if(!(document.getElementById("email-su").classList.contains("is-invalid"))) {
                if(document.getElementById("email-su").classList.contains("is-valid")) {
                    document.getElementById("email-su").classList.remove("is-valid")
                }
                document.getElementById("email-su").classList.add("is-invalid")
            }
        }
    } else {
        if(document.getElementById("email-su").classList.contains("is-valid")) {
            document.getElementById("email-su").classList.remove("is-valid")
        }
        if(document.getElementById("email-su").classList.contains("is-invalid")) {
            document.getElementById("email-su").classList.remove("is-invalid")
        }
    }
})

document.getElementById("name-su").addEventListener("focusout", function(e) {
    if(document.getElementById("name-su").value != "") {
        if(!(document.getElementById("name-su").classList.contains("is-valid"))) {
            document.getElementById("name-su").classList.add("is-valid")
        }
    } else {
        if(document.getElementById("email-su").classList.contains("is-valid")) {
            document.getElementById("email-su").classList.remove("is-valid")
        }
    }
})

document.getElementById("firstname-su").addEventListener("focusout", function(e) {
    if(document.getElementById("firstname-su").value != "") {
        if(!(document.getElementById("firstname-su").classList.contains("is-valid"))) {
            document.getElementById("firstname-su").classList.add("is-valid")
        }
    } else {
        if(document.getElementById("firstname-su").classList.contains("is-valid")) {
            document.getElementById("firstname-su").classList.remove("is-valid")
        }
    }
})
document.getElementById("birthday-su").addEventListener("focusout", function(e) {
    //Pour calculer l'âge de l'utilisateur (> 18 ans), on est obligé de transformer en type Date la valeur du champ "birthday-su" qui est en texte
    if(calculate_age(new Date(document.getElementById("birthday-su").value)) >= 18) {
        if(!(document.getElementById("birthday-su").classList.contains("is-valid"))) {
            if(document.getElementById("birthday-su").classList.contains("is-invalid")) {
                document.getElementById("birthday-su").classList.remove("is-invalid")
            }
            document.getElementById("birthday-su").classList.add("is-valid")
        }
    } else {
        if(!(document.getElementById("birthday-su").classList.contains("is-invalid"))) {
            if(document.getElementById("birthday-su").classList.contains("is-valid")) {
                document.getElementById("birthday-su").classList.remove("is-valid")
            }
            document.getElementById("birthday-su").classList.add("is-invalid")
        }
    }
})

document.getElementById("password-su").addEventListener("focusout", function(e) {
    if(document.getElementById("password-su").value != "") {
        if(document.getElementById("password-su").value.length >= 8 && document.getElementById("password-su").value.match(regex)) {
            if(!(document.getElementById("password-su").classList.contains("is-valid"))) {
                document.getElementById("password-su").classList.remove("is-invalid")
                document.getElementById("password-su").classList.add("is-valid")
            }
        } else {
            if(document.getElementById("password-su").value.length < 8) {
                document.getElementById("password-su-i-fb").innerText = "Le mot de passe doit faire au minimum 8 caractères"
            } else {
                document.getElementById("password-su-i-fb").innerText = "Le mot de passe contient des caractères non autorisé"
            }
            if(!(document.getElementById("password-su").classList.contains("is-invalid"))) {
                document.getElementById("password-su").classList.remove("is-valid")
                document.getElementById("password-su").classList.add("is-invalid")
            }
        }
    } else {
        if(document.getElementById("password-su").classList.contains("is-valid")) {
            document.getElementById("password-su").classList.remove("is-valid")
        }
        if(document.getElementById("password-su").classList.contains("is-invalid")) {
            document.getElementById("password-su").classList.remove("is-invalid")
        }
    }
    //Ici, en fonction du champ password, on fait un vérification du côté de la confirmation pour éviter d'avoir 2 mdp différents mais qui peuvent tout les deux avoir la classe
    //is-valid
    if(document.getElementById("confirm-password-su").value != "") {
        if(document.getElementById("confirm-password-su").value == document.getElementById("password-su").value) {
            if(!(document.getElementById("confirm-password-su").classList.contains("is-valid"))) {
                if(document.getElementById("confirm-password-su").classList.contains("is-invalid")) {
                    document.getElementById("confirm-password-su").classList.remove("is-invalid")
                }
                document.getElementById("confirm-password-su").classList.add("is-valid")
            }
        } else {
            if(!(document.getElementById("confirm-password-su").classList.contains("is-invalid"))) {
                if(document.getElementById("confirm-password-su").classList.contains("is-valid")) {
                    document.getElementById("confirm-password-su").classList.remove("is-valid")
                }
                document.getElementById("confirm-password-su").classList.add("is-invalid")
            }
        }
    }
})

document.getElementById("confirm-password-su").addEventListener("focusout", function(e) {
    if(document.getElementById("confirm-password-su").value != "") {
        if(document.getElementById("confirm-password-su").value == document.getElementById("password-su").value) {
            if(!(document.getElementById("confirm-password-su").classList.contains("is-valid"))) {
                document.getElementById("confirm-password-su").classList.remove("is-invalid")
                document.getElementById("confirm-password-su").classList.add("is-valid")
            }
        } else {
            if(!(document.getElementById("confirm-password-su").classList.contains("is-invalid"))) {
                document.getElementById("confirm-password-su").classList.remove("is-valid")
                document.getElementById("confirm-password-su").classList.add("is-invalid")
            }
        }
    } else {
        if(document.getElementById("confirm-password-su").classList.contains("is-valid")) {
            document.getElementById("confirm-password-su").classList.remove("is-valid")
        }
        if(document.getElementById("confirm-password-su").classList.contains("is-invalid")) {
            document.getElementById("confirm-password-su").classList.remove("is-invalid")
        }
    }
})