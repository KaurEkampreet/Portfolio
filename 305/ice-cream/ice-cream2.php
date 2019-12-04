<?php
//start the session
session_start();

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);


//get session data
$name = $_SESSION['name'];
$flavor = $_SESSION['flavor'];

//print message
echo "<p>$name likes $flavor</p>";