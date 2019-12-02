<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/idaydream.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

</head>
<body>


<div class="container">

    <h3>Confirmation</h3>
<?php
$id = $_POST['id'];
$first = $_POST['firstName'];
$last = $_POST['lastName'];
$company = $_POST['company'];
$linkedIn = $_POST['linkedIn'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$mailing = $_POST['mailing'];
$meet = $_POST['meet'];
$meetother =$_POST['othermeet'];


ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connect to db
require('/home/ekaurgre/connect.php');

//Validate the data
$isValid = true;


/*//checking the first name
if (empty($first)) {
    echo "<p>First name is required</p><br>";
} else {
    echo "<strong>First Name: </strong>$first<br>";
}*/

//checking first name
if (!empty($first)) {
    $first = mysqli_real_escape_string($cnxn, $_POST['firstName']);
} else {
    echo "<p>Firstname is required</p>";
    $isValid = false;
}
//checking last name
if (!empty($last)) {
    $last = mysqli_real_escape_string($cnxn, $_POST['lastName']);
} else {
    echo "<p>Lastname is required</p>";
    $isValid = false;
}


////check for linkedin url
if (!empty($linkedIn)) {
    if (filter_var($linkedIn, FILTER_VALIDATE_URL) == true) {
        $linkedIn = mysqli_real_escape_string($cnxn, $_POST['linkedIn']);
    } else {
        echo '<p>Please enter a valid url</p>';
        $isValid = false;
    }
}
//checking email
if (!empty($email)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = mysqli_real_escape_string($cnxn, $_POST['email']);
    } else {

        echo '<p>Please enter a valid Email</p>';
        $isValid = false;
    }
}

/*if(isset($_POST['meet'])) {
   echo "<strong>How did we meet: ".htmlspecialchars($_POST['meet']);
}*/

//checking ethnicity
/*if(isset($meet)) {
    $meet= mysqli_real_escape_string($cnxn, $_POST['meet']);
} else {
    echo "<p>Meet is required</p>";
    $isValid = false;
}*/

//   checking ethnicity for other ethnicity
if(isset($meet)) {
    if(isset($_POST["4"])) {
    }
    if (!empty($meetother)) {
        $meetother = mysqli_real_escape_string($cnxn, $_POST['othermeet']);

    }else{
        $meetother = "";
    }
}else {
    echo "<p>Please select how did we meet</p>";
    $isValid = false;
}

//Insert row if data is valid
if ($isValid) {
    $sql = "INSERT INTO guestbook
                    VALUES (default,'$first', '$last', 
                    '$company', '$linkedIn',
                    '$email', '$comment','$mailing','$meet','$meetother')";
    //Print SQL statement, for testing purposes only
    //copy/paste into phpMyAdmin to test
   // echo $sql;
    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
    //If successful, print summary
    if ($result) {
       // echo "<p>ID: $id</p>";
        echo "<p>Name: $first $last</p>";
        echo "<p>Company: $company</p>";
        echo "<p>LinkedIn: $linkedIn</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Comment: $comment</p>";
        echo "<p>Mailing: $mailing</p>";
        if(!empty($meetother)){
            echo"<p>Meet: $meetother </p>";
        }else{
            //Get Ethnicity Name:
            $sql = "(SELECT meet_type from meet WHERE meet_id = $meet)";
            $result = mysqli_query($cnxn, $sql);

            foreach($result as $row) {
                $meet = implode($row);
            }

            echo '<p>How we meet: '.$meet.'</p>';
            //END Get Ethnicity Name

        }

    }
}
?>
<br>
<a href="guestbook.html">Guestbook Form</a>

</div>


</body>
</html>