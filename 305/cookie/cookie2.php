<?php
/** 305/students.php reads students from a database
 *  into a data table
 *  Nov 4, 2019
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_COOKIE['name'])) {
    echo"Hello, ".$_COOKIE['name'];
    } else {
    echo"Hello, Stranger";
}
?>
