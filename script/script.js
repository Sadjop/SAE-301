console.log("totalSomme: " + totalSomme);

document.addEventListener("DOMContentLoaded", function () {
    updateProgressBar(totalSomme);
});

function updateProgressBar(totalSomme) {
    var progressbar = document.getElementById("progressbar");
    var progresstext = document.getElementById("progress-text");
    var progress = (totalSomme / 500) * 100; 

    progressbar.style.width = progress.toFixed(2) + "%";
    progresstext.innerHTML = progress.toFixed(2) + "%";
}

var percentage = (totalSomme / 500) * 100;
console.log("Percentage: " + percentage.toFixed(2) + "%");
