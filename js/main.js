/** Pre-loader time in seconds **/
let preloader_time = 3;

/** Set variables for elements **/
let loader_element = document.getElementById("loader-presentation");
let results_element = document.getElementById("results-presentation");
let results_button = document.getElementById("results-button");

/** Ple-loader functionality **/
if (results_button) {
    function showResults() {
        loader_element.classList.add("d-none");
        results_element.classList.remove("d-none");
    }
    function preloadF() {
        loader_element.classList.remove("d-none");
        setTimeout(showResults, preloader_time*1000);
        results_button.classList.remove("btn-success");
        results_button.classList.add("btn-outline-success");
        results_button.disabled = true;
    }
    results_button.addEventListener("click", preloadF);
}