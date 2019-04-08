<?php
/**
 * Created by PhpStorm.
 * User: Samantha DeSmul
 * Date: 4/8/2019
 * Time: 10:01 AM
 */

$flavors =array("grasshopper"=> "The Grasshopper", "maple" => "Whiskey Maple Bacon",
    "carrot" => "Carrot Walnut", "caramel" => "Salted Caramel Cupcake", "velvet" => "Red Velvet",
    "lemon" => "Lemon Drop", "tiramisu" => "Tiramisu");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cupcake Fundraiser</title>
</head>
<body>

<h1>Cupcake Fundraiser</h1>

<form>

    <label for="name">Your Name:</label>
    <input type="text" name="name" id="name" placeholder="Please Input Your Name">
    <br>

    <p>Cupcake Flavors:</p>
    <?php
    foreach($flavors as $key => $value){
        echo '<label><input type="checkbox" name="charges" value="' . $key . '">';
        echo ''.$value.'</label><br>';
    }
    ?>

</form>
</body>
</html>