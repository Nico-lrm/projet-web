//Pour changer la couleur du logo des filtres lorsque la souris survole le bouton
//Pour l'entrée
document.getElementById("btn-filtre").addEventListener(("mouseover"), function(){
    document.getElementById("test").style.color = "white"
})
//et la pour la sortie
document.getElementById("btn-filtre").addEventListener(("mouseout"), function(){
    document.getElementById("test").style.color = "black"
})