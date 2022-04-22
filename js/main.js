let preloader_time = 3;
let loader_element = document.getElementById("loader-presentation");
let results_element = document.getElementById("results-presentation");
let results_button = document.getElementById("results-button")

function showResults() {
    loader_element.classList.add("d-none");
    results_element.classList.remove("d-none");
}

function preloadF() {
    loader_element.classList.remove("d-none");
    setTimeout(showResults, preloader_time*1000);
    results_button.disabled = true;
}

results_button.addEventListener("click", preloadF);