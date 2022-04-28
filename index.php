<?php require 'includes/header.php' ?>

    <div class="container">
        <h1 class="display-4 text-center py-3">DESCANT Demonstration Tool</h1>
        <div class="row">
            <div class="col-md-6">
                <p>
                    This tool was developed in the framework of the DESCANT: “Detecting Stereotypes in Human Computational
                    Tasks” research project funded by the Research and Innovation Foundation of Cyprus under the
                    RESTART 2016-2020-EXCELLENCE HUBS call. For more information about DESCANT visit the project’s website: <br/>
                    <a href="https://www.cyens.org.cy/en-gb/research/projects/descant-detecting-stereotypes-in-human-computati" target="_blank">https://www.cyens.org.cy/en-gb/research/projects/descant-detecting-stereotypes-in-human-computati</a>
                </p>
                <p>
                    The tool presents the results of the created machine learning models and how the biases caused by annotators affect their performance.
                    By selecting image and classification task, the tool presents the performance results of the machine learning models trained using data
                    annotated by different groups of annotators.
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    The Chicago Face Database (CFD) (<a href="https://www.chicagofaces.org" target="_blank">https://www.chicagofaces.org</a>)
                    was developed at the University of Chicago by Debbie S. Ma, Joshua Correll, and Bernd Wittenbrink. The CFD is intended for use in scientific research.
                    It provides high-resolution, standardized photographs of male and female faces of varying ethnicity between the ages of 17-65.
                    Extensive norming data are available for each individual model. These data include both physical attributes (e.g., face size)
                    as well as subjective ratings by independent judges (e.g., attractiveness).
                </p>
                <p>
                    The main CFD set consists of images of 597 unique individuals. They include self-identified Asian, Black, Latino, and White female and male models,
                    recruited in the United States. All models are represented with neutral facial expressions.
                    A subset of the models is also available with happy (open mouth), happy (closed mouth), angry, and fearful expressions.
                    Norming data are available for all neutral expression images. Subjective rating norms are based on a U.S. rater sample.
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