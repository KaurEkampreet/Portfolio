<?php
$title = 'Buckle My Shoe';
//
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<body lang="en">
<head>
    <body>
    <meta charset="UTF-8">
    <title><?php echo $title;  ?></title>
    <h2>Buckle my shoes</h2>
    <h3> Enter a number 1-10 to see what you should do!</h3>
    <form method="post" action="#">
        <label>Number: <input type="'text" name="number"</label>
            <input type="submit" value="Go">
    </form>

<?php

include("../function.php");

 if(isset($_POST ['number'])) {
     $num = (int)$_POST['number'];
     $msg = buckleConverter($num);
        echo "<p>$num</p>";
    }
    ?>



</head>
</body>