console.log("totalSomme: " + totalSomme);

document.addEventListener("DOMContentLoaded", function () {
    // Mettez à jour la barre de progression en fonction de totalSomme
    updateProgressBar(totalSomme);
});

function updateProgressBar(totalSomme) {
    var progressbar = document.getElementById("progressbar");
    var progresstext = document.getElementById("progress-text");
    var progress = (totalSomme / 8000) * 100; // Supposons que 100 est la valeur maximale

    // Mettez à jour la largeur de la barre de progression
    progressbar.style.width = progress.toFixed(2) + "%";

    // Mettez à jour le texte du pourcentage
    progresstext.innerHTML = progress.toFixed(2) + "%";
}

var percentage = (totalSomme / 8000) * 100;
console.log("Percentage: " + percentage.toFixed(2) + "%");
