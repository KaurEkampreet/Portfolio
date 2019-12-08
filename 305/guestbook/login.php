<?php
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);


//Start a session
session_start();

//If the user is already logged in


//Redirect to page 1
if (isset($_SESSION['username'])) {
    header('location: admin.php');
}




//If the login form has been submitted
if (isset($_POST['submit'])) {


    //Include creds.php (eventually, passwords should be moved to a secure location
    //or stored in a database)
    include('cred.php');


    //Get the username and password from the POST array
    $username = $_POST["username"];
    $password = $_POST["password"];


    //If the username and password are correct
    if (array_key_exists($username, $logins) &&
        $logins["$username"] = $password) {


        //Store login name in a session variable
        $_SESSION['username'] = $username;


        //Redirect to page 1
        header('location: admin.php');
    }


    //Login credentials are incorrect
    echo "<p>Invalid Login</p>";
}



?>

<!--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Log In</title>
</head>
<body>
<form method="post" action="#">
    <label>Username:
        <input type="text" name="username">
    </label><br>

    <label>Password:
        <input type="password" name="password">
    </label><br>

    <input type="submit" name="submit" value="Submit">
</form>

 Optional JavaScript
 jQuery first, then Popper.js, then Bootstrap JS
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>-->



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/guestbook.css">

    <title>Log In</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="image/icon.png">
</head>
<body>
<form method="post" action="#">
    <h3>Admin Page</h3>

    <div class="container" id="main">
        <div class="row">
            <div class="col">
                <label>Username:</label>
                <input type="text" name="username" id="username" class="form-control">
                <br>
            </div>

            <div class="col">
                <label>Password:</label>
                <input type="password" name="password" class="form-control">
                <br>
            </div>

        </div>

        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

    </div>



</form>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="scripts/guestbook.js"></script>

</body>
</html>




