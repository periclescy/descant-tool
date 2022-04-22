let preloader_time = 3;
let loader_element = document.getElementById("loader");
let results_element = document.getElementById("show-results");

function showResults() {
    results_element.classList.remove("d-none");
}

function preloadF() {
    loader_element.classList.remove("d-none");
    setTimeout(showResults, preloader_time*1000)
}

document.getElementById("results-button").addEventListener("click", preloadF);