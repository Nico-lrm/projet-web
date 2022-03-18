//Pour changer la couleur du logo des filtres lorsque la souris survole le bouton
//Pour l'entrée
document.getElementById("btn-filtre").addEventListener(("mouseover"), function(){
    document.getElementById("test").style.color = "white"
})
//et la pour la sortie
document.getElementById("btn-filtre").addEventListener(("mouseout"), function(){
    document.getElementById("test").style.color = "black"
})

/* On charge la valeur par défaut de la range */
document.getElementById("price-range-value").innerText = document.getElementById("price-range").value + '€'

/* Modification de la valeur de l'affichage du prix a chaque nouvelle valeur */
document.getElementById("price-range").addEventListener("input", function() {
    document.getElementById("price-range-value").innerText = document.getElementById("price-range").value + '€'

})