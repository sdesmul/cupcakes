<?php
/**
 * Created by PhpStorm.
 * User: Samantha DeSmul
 * Date: 4/8/2019
 * Time: 10:01 AM
 * URL: http://sdesmul.greenriverdev.com/IT328/cupcakes/index.php
 * Description: This is a website for a cupcake fundraiser. The purpose
 * of this website is to practice PHP
 */
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//create associative array for flavors
$flavors = array("grasshopper" => "The Grasshopper", "maple" => "Whiskey Maple Bacon",
    "carrot" => "Carrot Walnut", "caramel" => "Salted Caramel Cupcake", "velvet" => "Red Velvet",
    "lemon" => "Lemon Drop", "tiramisu" => "Tiramisu");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //create an errors array
    $errors = [];

    //validate that at least one flavor was chosen
    if (empty($_POST['flavor'])) {
        $errors['flavor'] = "Please choose at least one flavor";
    }
    //validate that a name was input
    if (empty($_POST['name'])) {
        $errors['name'] = "Please enter your name";
    }
    $count = 0;

    //if there are no errors
    if (empty($errors)) {

        //print out the order summary
        $selected = $_POST['flavor'];
        echo "Thank you," . $_POST['name'] . ", for your order!";
        echo "<br>";
        echo "Order Summary:";

        //echo out all the flavors chosen
        foreach ($flavors as $key => $value) {
            echo '<ul>';
            if (in_array($key, $_POST['flavor'])) {
                $count++;
                echo '<li>' . $key . '</li>';
            }
            echo '</ul>';
        }
        echo 'Order Total: $' . (float)$count * 3.50;

    }


}
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

<form action="index.php" method="post">

    <p><?php echo !empty($errors['name']) ? $errors['name'] : ""; ?></p>
    <label for="name">Your Name:</label>
    <input type="text" name="name" id="name" placeholder="Please Input Your Name"
           value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
    <br>
    <p><?php echo !empty($errors['flavor']) ? $errors['flavor'] : ""; ?></p>
    <p>Cupcake Flavors:</p>
    <?php
    //print out the flavors array as checkboxes, make them sticky
    $selected = array();
    foreach ($flavors as $key => $value) {
        echo '<label><input type="checkbox" name="flavor[]" value="' . $key . '" ' . (in_array($key, isset($_POST['flavor']) ? $_POST['flavor'] : $selected) ? "checked" : "x") . '>';
        echo $value . '</label><br>';
    }


    ?>

    <input type="submit" name="formSubmit" value="Submit">

</form>
</body>
</html>