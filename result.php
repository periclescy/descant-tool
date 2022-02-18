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
    $user = null;
    $classification = null;
    $classification_array = null;
    $user_array = null;
    http_response_code(500);
}

// Calculate cell background color based on value
function classColor($str_value) {

    switch ($str_value) {
        case "Male":
            $return_class = "bg-primary";
            break;
        case "Latino":
        case "High":
        case "Female":
            $return_class = "bg-danger";
            break;
        case "Low":
        case "Asian":
            $return_class = "bg-warning";
            break;
        case "Black":
            $return_class = "bg-secondary";
            break;
        case "White":
            $return_class = "bg-white";
            break;
        case "Medium":
            $return_class = "bg-success";
            break;
        default:
            $return_class = "";
    }
    return $return_class;
}


$i = 0;

?>

<?php require 'includes/header-result.php' ?>

<header>
    <h1 class="display-3 text-center p-3"><?php echo $classification;?></h1>
</header>

<div class="container p-3">
    <h2 class="display-6">Results</h2>
	<div class="row">
		<div class="col-sm-1 col-md-2 col-xl-3"></div>
		<div class="col-sm-10 col-md-8 col-xl-6">
			<img src="img/<?php echo $user;?>.jpg" class="img-fluid" alt="user-image">
		</div>
			<div class="col-sm-1 col-md-2 col-xl-3"></div>
	</div>	
    <table class="table table-light text-center">
        <?php foreach($user_array as $key => $val) {?>
            <?php if ($key == "Ground Truth") { ?>
                <tr>
                    <th scope="row" class="w-50"><?php echo $key;?></th>
                    <td class="w-50" id=""><?php echo $val;?></td>
                </tr>
            <?php } ?>
        <?php } ?>

    </table>

    <br/>

    <table class="table table-striped table-bordered text-center">
        <thead>Models</thead>
        <tbody>
    <?php foreach($user_array as $key => $val) { ?>
        <?php if ($key != "Ground Truth") { $i++; ?>
            <tr>
                <th scope="row" class="w-50"><?php echo $key;?></th>
                <td class="w-50 <?php echo classColor($val); ?>" id="<?php echo $i;?>"><?php echo $val;?></td>
            </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require 'includes/footer.html' ?>