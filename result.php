<?php
// Get the contents of the JSON file
$data_json = file_get_contents("data.json");
// Convert to array
$decoded_json = json_decode($data_json, true);

// Get variables from POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $classification = $_POST['classification'];
    $classification_array = $decoded_json[$classification];
    $user_array = $classification_array[$user];
}
else {
    // Calculate first classification and user.
    $firstKey = array_key_first($decoded_json);
    $array_firstKey = $decoded_json[$firstKey];
    $firstKey_in_array_firstKey = array_key_first($array_firstKey);

    $user = $firstKey_in_array_firstKey;
    $classification = $firstKey;
    $classification_array = $decoded_json[$classification];
    $user_array = $classification_array[$user];

}

// Calculate cell background color based on value
function classColor($str_value): string
{

    switch ($str_value) {
        case "Male":
            $return_class = "bg-primary text-light";
            break;
        case "Latino":
        case "High":
        case "Female":
            $return_class = "bg-danger text-light";
            break;
        case "Low":
        case "Asian":
            $return_class = "bg-warning";
            break;
        case "Black":
            $return_class = "bg-dark text-light";
            break;
        case "White":
            $return_class = "bg-light";
            break;
        case "Medium":
            $return_class = "bg-success text-light";
            break;
        default:
            $return_class = "";
    }
    return $return_class;
}

// Calculate tooltip text based on value
function classTooltip($str_value): string
{

    switch ($str_value) {
        case "All Annotators":
            $return_class = "Model created using data annotated by all annotators.";
            break;
        case "Males":
            $return_class = "Model created using data annotated by male annotators.";
            break;
        case "Females":
            $return_class = "Model created using data annotated by female annotators.";
            break;
        case "Black":
            $return_class = "Model created using data annotated by black annotators.";
            break;
        case "Asian":
            $return_class = "Model created using data annotated by asian annotators.";
            break;
        case "White":
            $return_class = "Model created using data annotated by white annotators.";
            break;
        case "Latino":
            $return_class = "Model created using data annotated by latino annotators.";
            break;
        case "Random":
            $return_class = "Model created using data annotated by random annotators.";
            break;
        default:
            $return_class = "";
    }
    return $return_class;
}

// Calculate classification paragraph text based on classification task
function classParagraph($str_value): string
{
    switch ($str_value) {
        case "Gender":
            $return_class = 'The “female probability” (number of participants who indicated female gender, divided by number of people who rated the person depicted in the image) was compared to the “male probability” (vice versa for male gender) as indicated in the original Chicago Face Database, from where this image was retrieved. The average number of raters per image across the whole dataset was 47. The higher probability gender was selected as <span class="fw-bold">ground</span> truth for the <span class="fw-bold">gender</span> of the person in the image.';
            break;
        case "Race":
            $return_class = 'The “Asian probability” (number of participants who indicated Asian race divided by number of people who rated the person depicted in the image) was compared to the “Black”, “Latino”, and “White probability” scores (which consist of the same calculation, for each respective race) as indicated in the original Chicago Face Database, from where this image was retrieved. The average number of raters per image across the whole dataset was 47. The highest probability race was selected as <span class="fw-bold">ground truth</span> for the <span class="fw-bold">race</span> of the person in the image.';
            break;
        case "Trustworthiness":
            $return_class = 'When creating the original Chicago Face Database, from where this image was retrieved, participants were asked to rate the person in the image for how trustworthy they seemed “with respect to other people of the same race and gender” on a Likert scale (1 = Not at all; 7 = Extremely). The mean score for the image, as reported in the CFD, was selected as the <span class="fw-bold">ground truth</span> for the <span class="fw-bold">trustworthiness</span> of the person in the image. The average number of raters per image across the whole dataset was 47. A score of 1-3 is categorized as Low, 3-5 as Medium, and 5-7 as High.';
            break;
        case "Attractiveness":
            $return_class = ' When creating the original Chicago Face Database, from where this image was retrieved, participants were asked to rate the person in the image for how attractive they seemed “with respect to other people of the same race and gender” on a Likert scale (1 = Not at all; 7 = Extremely). The mean score for the image, as reported in the CFD, was selected as <span class="fw-bold">the ground truth</span> for the <span class="fw-bold">attractiveness</span> of the person in the image. The average number of raters per image across the whole dataset was 47. A score of 1-3 is categorized as Low, 3-5 as Medium, and 5-7 as High. ';
            break;
        default:
            $return_class = '';
    }
    return $return_class;
}

// Calculate results paragraph text based on classification task
function resultsParagraph($str_value): string
{
    switch ($str_value) {
        case "Gender":
            $return_class = "The same input image (above) was passed through each of the eight models, resulting in the following outputs (possible outputs: Male, Female):";
            break;
        case "Race":
            $return_class = "The same input image (above) was passed through each of the eight models, resulting in the following outputs (possible outputs: Asian, Black, Latino, White):";
            break;
        case "Trustworthiness":
        case "Attractiveness":
            $return_class = "The same input image (above) was passed through each of the eight models, resulting in the following outputs (possible outputs: Low, Medium, High):";
            break;
        default:
            $return_class = "";
    }
    return $return_class;
}
?>

<?php require 'includes/header.php' ?>

<div class="container-xxl p-3">
    <div class="row">
        <div class="col-md-6">
            <h2>1. Input image:</h2>
            <blockquote>Click on the image to select another image.</blockquote>
            <div class="text-center">
                <div class="text-center hover-effect">
                    <a href="gallery.php"><img src="img/<?php echo $user;?>.jpg" class="img-fluid mx-auto" alt="user-image" width="500"></a>
                </div>
                <h6 class="display-6"><?php echo $user;?></h6>
            </div>
            <div class="display-4 py-3">&nbsp;</div>
        </div>

        <div class="col-md-6">
            <h2>2. Classification task:</h2>
            <blockquote>Select a classification task.</blockquote>
            <div class="row row-cols-2 row-cols-xl-4 g-2">
                <?php foreach($decoded_json as $class_2 => $val_2)  { ?>
                    <?php if($class_2 == $classification)  { ?>
                        <div class="col">
                            <form method='post' action="result.php">
                                <input type='hidden' name='user' value='<?php echo $user;?>' />
                                <input type='hidden' name='classification' value='<?php echo $class_2;?>' />
                                <input class="btn btn-md btn-outline-secondary w-100" type="submit" value='<?php echo $class_2?>'>
                            </form>
                        </div>
                    <?php } else {?>
                        <div class="col">
                            <form method='post' action="result.php">
                                <input type='hidden' name='user' value='<?php echo $user;?>' />
                                <input type='hidden' name='classification' value='<?php echo $class_2;?>' />
                                <input class="btn btn-md btn-secondary border-0 w-100" type="submit" value='<?php echo $class_2?>'>
                            </form>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <p class="pt-2"><?php echo classParagraph($classification); ?></p>
            <div class="py-3">&nbsp;</div>
        </div>

    </div>


    <h2>3. Results:</h2>
    <button class="btn btn-primary" type="button" id="results-button">
        Train models and show Results
    </button>

    <div class="py-3">&nbsp;</div>
    <div class="d-none text-center py-5" id="loader-presentation">
        <div class="spinner-border" role="status"></div>
    </div>


    <div class="d-none" id="results-presentation">

        <p>Eight different models were trained on the same images for each task, with different (sub)sets of crowd-worker annotations. One model was trained using all the annotations for all images (# of annotations), and another one using a random subset of annotations (# of annotations). The other four were trained with annotations only from a subset of crowdworkers; e.g., the “Men” model was trained using annotations which were created by crowd-workers who identified as men, while the “White” model used only those from crowdworkers who identified as White.</p>
        <p><?php echo resultsParagraph($classification); ?></p>

        <div class="row">
            <div class="col-1">&nbsp;</div>
            <div class="col-11">
                <table class="table table-light text-center">
                    <?php foreach($user_array as $key => $val) {?>
                        <?php if ($key == "Ground Truth") { ?>
                            <tr>
                                <th scope="row" class="w-50"><?php echo $key;?></th>
                                <td class="w-50 <?php echo classColor($val); ?>"><?php echo $val;?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="py-2">&nbsp;</div>

        <div class="row">
            <div class="col-1"><h3 class="vertical-text fs-2">Models</h3></div>
                <div class="col-11">
                    <table class="table table-bordered text-center">
                        <tbody>
                            <?php $i = 0; ?>
                            <?php foreach($user_array as $key => $val) { ?>
                                <?php if ($key != "Ground Truth") { $i++; ?>
                                <tr>
                                    <td class="w-50" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo classTooltip($key);?>"><?php echo $key;?></td>
                                    <td class="w-50 <?php echo classColor($val);?>" id="<?php echo $i;?>" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo classTooltip($key);?>"><?php echo $val;?></td>
                                </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="py-5">&nbsp;</div>
        </div>
    </div>

<?php require 'includes/footer.html' ?>