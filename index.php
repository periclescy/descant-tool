<?php
// Get the contents of the JSON file
$data_json = file_get_contents("data.json");
// Convert to array
$decoded_json = json_decode($data_json, true);

$gender = $decoded_json["Gender"];
$ethnicity = $decoded_json["Ethnicity"];
$attract = $decoded_json["Attract"];
$trust = $decoded_json["Trust"];
?>

<?php require 'includes/header.php' ?>

    <div class="container">
        <h1 class="display-3 text-center py-5">DESCANT Demonstration Tool</h1>
        <div class="row fs-5">
            <div class="col-md-6">
                <p>
                    This tool was developed in the framework of the DESCANT: “Detecting Stereotypes in Human Computational
                    Tasks” research project funded by the Research and Innovation Foundation of Cyprus under the
                    RESTART 2016-2020-EXCELLENCE HUBS call. For more information about DESCANT visit the project’s website: <br/>
                    <a href="https://www.cyens.org.cy/en-gb/research/projects/descant-detecting-stereotypes-in-human-computati" target="_blank">https://www.cyens.org.cy/en-gb/research/projects/descant-detecting-stereotypes-in-human-computati</a>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    The tool presents the results of the created machine learning models and how the biases caused by annotators affect their performance.
                    By selecting image and classification task, the tool presents the performance results of the machine learning models trained using data
                    annotated by different groups of annotators.
                    <a href="https://www.chicagofaces.org" target="_blank">https://www.chicagofaces.org</a>
                </p>
            </div>

            <div class="py-5">&nbsp;</div>

            <div class="col text-center">
                <a href="result.php" class="btn btn-primary btn-lg w-50 fs-4">Get Started</a>
            </div>
        </div>
    </div>

    <div class="py-5">&nbsp;</div>

<?php require 'includes/footer.html' ?>