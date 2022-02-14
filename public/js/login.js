document.getElementById('form-si').addEventListener("submit", function(e) {
    //On annule l'envoi du formulaire pour le vérifier côté client
    e.preventDefault();

    //Modification des éléments du bouton
    document.getElementById('spinner-si').classList.toggle("hidden");
    document.getElementById('button-text-si').innerText = "Connexion..."
    document.getElementById('button-si').setAttribute("disabled", true);
    
    
    
    /*
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "ajax/password-verify.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onload = function() {
        if (this.status == 400) {
        } else {
            document.getElementById("form-connect").submit();
        }
    }
    xhttp.send("email="+email+"&password="+password);*/
})

document.getElementById("email-si").addEventListener("focusout", function(e) {
    if(document.getElementById("email-si").value != "") {
        if(document.getElementById("email-si").value.match(regexEmail)) {
            if(!(document.getElementById("email-si").classList.contains("is-valid"))) {
                document.getElementById("email-si").classList.remove("is-invalid")
                document.getElementById("email-si").classList.add("is-valid")
            }
        } else {
            if(!(document.getElementById("email-si").classList.contains("is-invalid"))) {
                document.getElementById("email-si").classList.remove("is-valid")
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