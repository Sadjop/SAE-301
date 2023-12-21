console.log("totalSomme: " + totalSomme);

document.addEventListener("DOMContentLoaded", function () {
    updateProgressBar(totalSomme);
});

function updateProgressBar(totalSomme) {
    var progressbar = document.getElementById("progressbar");
    var progresstext = document.getElementById("progress-text");
    var progress = (totalSomme / 1000) * 100; 

    progressbar.style.width = progress.toFixed(2) + "%";
    progresstext.innerHTML = progress.toFixed(2) + "%";
}

var percentage = (totalSomme / 1000) * 100;
console.log("Percentage: " + percentage.toFixed(2) + "%");
