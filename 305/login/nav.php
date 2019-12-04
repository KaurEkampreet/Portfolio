<?php

    //Start the session


    //If user is logged in, get username




?>

<a href="page1.php">Page 1</a>
<a href="page2.php">Page 2</a>
<a href="page3.php">Page 3</a>



<a href="logout.php">Logout</a> <br>

<?php
if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];
}
echo '<br>';

//Display a welcome message
echo "Welcome";
?>




