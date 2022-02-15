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

        //Préparation et envoie de la requête
        xhttp.open("POST", "ajax/password-verify.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //Une fois chargé, on traite les infos
        xhttp.onload = function() {
            if (this.status == 400) {
                alert("Erreur : L'adresse e-mail et/ou le mot de passe est/sont incorrect(s)");
                document.getElementById('spinner-si').classList.toggle("hidden");
                document.getElementById('button-text-si').innerText = "Se connecter";
                document.getElementById('button-si').removeAttribute("disabled")
            } else {
                document.getElementById("form-si").submit()
            }
        }

        //On envoie la requête
        xhttp.send("email="+email+"&password="+password);
    }
})

document.getElementById("email-si").addEventListener("focusout", function(e) {
    if(document.getElementById("email-si").value != "") {
        if(document.getElementById("email-si").value.match(regexEmail)) {
            if(!(document.getElementById("email-si").classList.contains("is-valid"))) {
                if(document.getElementById("email-si").classList.contains("is-invalid")) {
                    document.getElementById("email-si").classList.remove("is-invalid")
                }
                document.getElementById("email-si").classList.add("is-valid")
            }
        } else {
            if(!(document.getElementById("email-si").classList.contains("is-invalid"))) {
                if(document.getElementById("email-si").classList.contains("is-valid")) {
                    document.getElementById("email-si").classList.remove("is-valid")
                }
                document.getElementById("email-si").classList.add("is-invalid")
            }
        }
    } else {
        if(document.getElementById("email-si").classList.contains("is-valid")) {
            document.getElementById("email-si").classList.remove("is-valid")
        }
        if(document.getElementById("email-si").classList.contains("is-invalid")) {
            document.getElementById("email-si").classList.remove("is-invalid")
        }
    }
})

document.getElementById("password-si").addEventListener("focusout", function(e) {
    if(document.getElementById("password-si").value != "") {
        if(document.getElementById("password-si").value.length >= 8) {
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