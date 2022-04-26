<?php
// Get the contents of the JSON file
$data_json = file_get_contents("data.json");
// Convert to array
$decoded_json = json_decode($data_json, true);

$gender = $decoded_json["Gender"];
$ethnicity = $decoded_json["Ethnicity"];
$attract = $decoded_json["Attract"];
$trust = $decoded_json["Trust"];

$chosen_classification = "Gender";
?>

<?php require 'includes/header.php' ?>

<!--<header>-->
<!--    <h1 class="display-3 py-3 text-center">DESCANT Demo Tool</h1>-->
<!--</header>-->

<div class="container-fluid p-3">
    <h2>1. Input image:</h2>
    <blockquote>Please select an image from below.</blockquote>
    <div class="row row-cols-2 row-cols-xl-5 row-cols-xxl-6 g-1 text-center">
        <?php foreach($gender as $key => $val)  { ?>
			<div class="col">
				<div class="card">
					<div class="card-body">
                        <form method='post' action="result.php">
                            <input type='hidden' name='user' value='<?php echo $key;?>' />
                            <input type='hidden' name='classification' value='<?php echo $chosen_classification;?>' />
                            <button class="btn hover-effect" type="submit">
                                <img src="img/<?php echo $key;?>_thumb.webp" class="card-img-top" alt="<?php echo $key;?>">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="py-5">&nbsp;</div>

<?php require 'includes/footer.html' ?>