let preloader_time = 3;
let loader_element = document.getElementById("loader-presentation");
let results_element = document.getElementById("results-presentation");

function showResults() {
    results_element.classList.remove("d-none");
}

function preloadF() {
    loader_element.classList.remove("d-none");
    setTimeout(showResults, preloader_time*1000)
}

document.getElementById("results-button").addEventListener("click", preloadF);