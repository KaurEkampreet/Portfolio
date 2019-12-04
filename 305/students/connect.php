<?php
//Connect to db --> ADD YOUR OWN CREDENTIALS!
$username = 'ekaurgre_grcuser';
$password = '0fo[BQ-NE-s,';
$hostname = 'localhost';
$database = 'ekaurgre_grc';
$cnxn = mysqli_connect($hostname, $username, $password, $database);
//Test connection
if ($cnxn) {
    echo "<p>Connected!</p>";
} else {
    echo mysqli_connect_error();
}