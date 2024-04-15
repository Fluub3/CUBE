// Obtenez la référence de l'élément de fenêtre modale
var modal = document.getElementById("myModal");

// Obtenez la référence de l'élément de bouton qui ouvre la fenêtre modale
var btn = document.getElementById("openModal");

// Obtenez la référence de l'élément de bouton de fermeture
var span = document.getElementsByClassName("close")[0];

// Quand l'utilisateur clique sur le bouton, ouvrez la fenêtre modale
btn.onclick = function() {
    modal.style.display = "block";
}

// Quand l'utilisateur clique sur le bouton de fermeture, fermez la fenêtre modale
span.onclick = function() {
    modal.style.display = "none";
}

// Quand l'utilisateur clique en dehors de la fenêtre modale, fermez-la
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
