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

<?php require 'includes/header.php' ?>

<div class="container p-3">
    <h2>Select image:</h2>
    <div class="text-center">
        <div class="text-center hover-effect">
            <a href="gallery.php"><img src="img/<?php echo $user;?>.jpg" class="img-responsive mx-auto" alt="user-image" width="500"></a>
            <div class="overlay">
                <a class="info" href="gallery.php">Click to change</a>
            </div>
        </div>
    </div>

    <div class="py-5"></div>

    <h2>Select classification task:</h2>
    <div class="row text-center">
    <?php foreach($decoded_json as $class_2 => $val_2)  { ?>
        <?php if($class_2 == $classification)  { ?>
            <div class="col">
                <form method='post' action="result.php">
                    <input type='hidden' name='user' value='<?php echo $user;?>' />
                    <input type='hidden' name='classification' value='<?php echo $class_2;?>' />
                    <input class="btn btn-outline-secondary w-100" type="submit" value='<?php echo $class_2?>'>
                </form>
            </div>
        <?php } else {?>
            <div class="col">
                <form method='post' action="result.php">
                    <input type='hidden' name='user' value='<?php echo $user;?>' />
                    <input type='hidden' name='classification' value='<?php echo $class_2;?>' />
                    <input class="btn btn-secondary border-0 w-100" type="submit" value='<?php echo $class_2?>'>
                </form>
            </div>
        <?php } ?>
    <?php } ?>

    </div>

    <div class="py-5"></div>

    <h2>Results:</h2>

    <table class="table table-light text-center">
        <?php foreach($user_array as $key => $val) {?>
            <?php if ($key == "Ground Truth") { ?>
                <tr>
                    <th scope="row" class="w-50"><?php echo $key;?></th>
                    <td class="w-50 <?php echo classColor($val); ?>" id=""><?php echo $val;?></td>
                </tr>
            <?php } ?>
        <?php } ?>

    </table>

    <br/>

    <table class="table table-striped table-bordered text-center">
        <thead><span class="fw-bold">Models</span></thead>
        <tbody>
        <?php foreach($user_array as $key => $val) { ?>
            <?php if ($key != "Ground Truth") { $i++; ?>
                <tr>
                    <td class="w-50"><?php echo $key;?></td>
                    <td class="w-50 <?php echo classColor($val); ?>" id="<?php echo $i;?>"><?php echo $val;?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>

    <div class="py-5"></div>

</div>

<?php require 'includes/footer.html' ?>