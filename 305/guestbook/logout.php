<?php

//Start the session
session_start();


//Destroy the session
session_destroy();
/* unset($_SESSION['username']);
 unset($_SESSION['password']);*/



//Redirect to login page
header ('location: login.php');



