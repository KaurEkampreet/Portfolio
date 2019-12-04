<?php
/* This is a demo page fo PHP basics
 * Oct 14, 2019
 * Evgenii Mishkin
*/

// Turn on error reporting - this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Declare variables
$title = "Hello world";
$heading = "Happy Monday";

//Include function file
include "function.php";
include "header.php";
?>


<body>

<?php
/*
    $heading .= '!';
    echo "<h1>$heading</h1>";
    echo "<h1>".$heading."</h1>";
    echo '<h1>'.$heading.'<h1>';

    $heading2 = '<h1>'.$heading.'<h1>';
    echo $heading2;

    $x = 2;
    echo "answer: ".($x + $x);

    echo "<br>Let's go!<br>";
    echo "Columbus arrived on 10/12/1492";
*/
?>

<?php
$email = "jshmo@gmail.com";
$new_email = str_replace("jshmo", "xyz", $email);
echo "<p>$new_email</p>";

$phrase = " I like PHP ";
echo trim($phrase);
echo "<br>";
echo strlen($phrase);
echo "<br>";
echo strpos($phrase, "PHP");
echo "<br>";
echo str_replace("like", "love", $phrase);
echo "<p>Upper-case: ".ucwords($phrase)."</p>";


hello("Bo");
hello("Ekam");

function isValidYear($year)
{
    if (empty($year)
        OR !is_numeric($year)
        OR strlen($year) != 4
        OR $year > 2019
    ) {
        return false;
    } else {
        return true;
    }
}

echo "<p>2010: ".isValidYear("2010")."</p>";
echo "<p>Empty: ".isValidYear("")."</p>";
echo "<p>2OIO: ".isValidYear("2OIO")."</p>";
echo "<p>20101: ".isValidYear("20101")."</p>";
echo "<p>2020: ".isValidYear("2020")."</p>";


average(34, 65);

largest(34, 5);
?>

</body>
</html>