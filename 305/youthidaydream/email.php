<?php
/** 305/volunteer.php collect database for volunteer
 *
 *  Nov 4, 2019
 */
$subject =  $_POST['subject'];
$message =  $_POST['message'];
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">

</head>
<body>
<!--<pre>-->
<form action="thanks.php" method="POST">
    <!--      To(email): <input type=" text"name="to"><br>-->
    <!--    From(email): <input type="text" name="from"><br>-->
    <!--    $email_subject= Subject: <input type=" text"name="subject"><p>-->
    <!--     $email_body=   Message: <br><textarea name="message"></textarea><p>-->

    <div class="shadow-none p-3 mb-5 bg-light rounded">
        Subject: <input type=" text" name="subject"><br>
        <!--        <span class="err" id="err-subject">Please enter a subject</span>-->
        Message: <br><textarea cols="30" rows="10" name="message"></textarea><br>
        <!--        <span class="err" id="err-message">Please enter a message</span>-->
        <input type="submit" name="submit" value="Send">

    </div>
    <!--        </pre>-->
</form>

<?php

require('/home/eeicoder/connect.php');

//Validate the data];
$isValid = true;


if(!empty($subject)){
    $subject = mysqli_real_escape_string($cnxn, $_POST['subject']);
}

if (!empty($message)) {
    $message = mysqli_real_escape_string($cnxn, $_POST['message']);
}
//    } else {
//        echo "<p> please enter valid data</p>";
//        $isValid = false;
//    }
//} else {
//    echo "<p>Please enter a valid data</p>";
//    $isValid = false;
//}



//$to = 'imedina_castaneda@mail.greenriver.edu';
////        $to = $_POST['email'];
//$email_body = "Summary --\r\n";
//$email_subject = "New form submitted";
////
//$success = mail($to, $subject, $message);
////    }
////    print final confirmation
//$msg = $success ? "Your form has been  successfully submitted."
//    : "We're sorry. There was a problem with your form";
//echo "<div class=\"form-group m-5\"><p>$msg</p></div>";
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<!--<div class="form-group" id="form5">-->
<!--<label for="subject">subject</label>-->
<!--<input type="text" class="form-control" id="subject" name="subject">-->
<!--</div>-->
<!--<br>-->
<!--<div class="form-group" id="form5">-->
<!--    <label for="body">Message</label>-->
<!--    <br>-->
<!---->
<!--    <textarea class="form-control" id="body" rows="20" name="body"></textarea>-->
<!--</div>-->
<!--<button onclick="href = 'email.php';">Send</button>-->
</body>
</html>

