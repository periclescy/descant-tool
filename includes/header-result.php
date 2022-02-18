<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DESCANT Demo Tool</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link href="../css/main.css"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Periklis Perikleous for CYENS Ltd.">

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">DESCANT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php foreach($decoded_json as $class_2 => $val_2)  { ?>
                    <?php if($class_2 == $classification)  { ?>
                        <li class="nav-item">
                            <form method='post' action="/result.php">
                                <input type='hidden' name='user' value='<?php echo $user;?>' />
                                <input type='hidden' name='classification' value='<?php echo $class_2;?>' />
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="nav-link active" href="#"><input class="btn btn-outline-light" type="submit" value='<?php echo $class_2?>'></a>
                                </div>
                            </form>
                        </li>
                    <?php } else {?>
                        <li class="nav-item">
                            <form method='post' action="/result.php">
                                <input type='hidden' name='user' value='<?php echo $user;?>' />
                                <input type='hidden' name='classification' value='<?php echo $class_2;?>' />
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="nav-link" href="#"><input class="btn btn-outline-light border-0" type="submit" value='<?php echo $class_2?>'></a>
                                </div>
                            </form>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>