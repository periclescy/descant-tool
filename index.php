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

<?php require 'includes/header-index.php' ?>

<header>
    <h1 class="display-1 p-3 text-center">DESCANT Demo Tool</h1>
</header>
    <h2 class="display-6 p-3">Please choose input image:</h2>
<div class="container-fluid p-3">
    <div class="row row-cols-2 row-cols-xl-5 row-cols-xxl-6 g-1 text-center">
        <?php foreach($gender as $key => $val)  { ?>
			<div class="col">
				<div class="card">
					<div class="card-body">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $key;?>" aria-expanded="false" aria-controls="collapseExample">
                            <img src="img/<?php echo $key;?>_thumb.jpg" class="card-img-top" alt="<?php echo $key;?>">
                        </button>
						<div class="collapse" id="collapseExample<?php echo $key;?>">
							<h5>Choose classification task:</h5>
							<div class="row">
                                <?php foreach ($decoded_json as $classification => $classification_array)  { ?>
								    <div class="col-12 g-1">
                                        <form method='post' action="/result.php">
                                            <input type='hidden' name='user' value='<?php echo $key;?>' />
                                            <input type='hidden' name='classification' value='<?php echo $classification;?>' />
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <input class="btn btn-outline-secondary" type="submit" value="<?php echo $classification?>">
                                            </div>
                                        </form>
								    </div>
                                <?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php }?>
		</div>
    </div>

<?php require 'includes/footer.html' ?>