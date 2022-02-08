window.onload = function() {
    document.body.appendChild(document.getElementById("test"))
    if(document.body.clientHeight < screen.height) {
        footer = document.getElementById("footer")
        footer.style.position = "absolute"
        footer.style.bottom = 0
        footer.style.width = "100%"
    }
}