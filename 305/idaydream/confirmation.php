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

    <title>I Day Dream Volunteer Form</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
<div class="form-group m-5">
    <h3 class="mb-2">Thank you for completing this application form and for your interest in volunteering with us.</h3>
    <hr>
    <br>
    <h4 >Summary</h4>
    <br>

    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Connect to db
    require ('/home/eeicoder/connect.php');

    //fields
    $filling= $_POST['filling'];
    //$first= $_POST['firstName'];
    //$last= $_POST['lastName'];
    //$street_address= $_POST['streetAddress'];
    //$city = $_POST['city'];
    //$state = $_POST['state'];
    //$zip = $_POST['zip'];
    //$phone = $_POST['phone'];
    //$email = $_POST['email'];
    //$t_shirt = $_POST['tshirt'];
    //$interests = $_POST['interests'];
    $interestsOther = $_POST['other'];
    //$skills = $_POST['skills'];
    $experience = $_POST['experience'];
    //$references = $_POST['character'];
    //$volunteerAvailability = $_POST['volunteerAvailability[]'];
    //$motivated= $_POST['motivated'];
    $hear= $_POST['hear'];
    //$otherHear= $_POST['otherHear'];
    $mailLists= $_POST['mailing'];

    //Validate the data
    $isValid = true;

    //checking first name
    if (!empty($_POST['firstName'])) {
        $first = mysqli_real_escape_string($cnxn, $_POST['firstName']);
    } else {
        echo "<p class='text-danger'>First name is required</p>";
        $isValid = false;
    }

    //checking last name
    if (!empty($_POST['lastName'])) {
        $last = mysqli_real_escape_string($cnxn, $_POST['lastName']);
    } else {
        echo "<p class='text-danger'>Last name is required</p>";
        $isValid = false;
    }

    //checking street
    if (!empty($_POST['streetAddress'])) {
        $street_address = mysqli_real_escape_string($cnxn, $_POST['streetAddress']);
    } else {
        echo "<p class='text-danger'>Street is required</p>";
        $isValid = false;
    }

    //checking city
    if (!empty($_POST['city'])) {
        $city = mysqli_real_escape_string($cnxn, $_POST['city']);
    } else {
        echo "<p class='text-danger'>City is required</p>";
        $isValid = false;
    }

    //checking state
    if ($_POST['state'] == "none") {
        echo "<p class='text-danger'>State is required</p>";
        $isValid = false;
    } else {
        $state = mysqli_real_escape_string($cnxn, $_POST['state']);
    }

    //checking zip
    if (!empty($_POST['zip'])) {
        $zip = mysqli_real_escape_string($cnxn, $_POST['zip']);
    } else {
        echo "<p class='text-danger'>ZIP is required</p>";
        $isValid = false;
    }

    //checking phone
    if (!empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($cnxn, $_POST['phone']);
    } else {
        echo "<p class='text-danger'>Phone is required</p>";
        $isValid = false;
    }

    //checking email
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($cnxn, $_POST['email']);
    } else {
        echo "<p class='text-danger'>Email is required</p>";
        $isValid = false;
    }

    //checking t-shirt
    if ($_POST['tshirt'] == "none") {
        echo "<p class='text-danger'>T-shirt is required</p>";
        $isValid = false;
    } else {
        $t_shirt = mysqli_real_escape_string($cnxn, $_POST['tshirt']);
    }


    //checking interests
    $arrayInt = array('events', 'fundraising', 'newsletter', 'volunteer', 'mentoring', 'otherDiv');
    if (isset($_POST['interests'])) {
        if (in_array($_POST['interests'], $arrayInt)) {
            $interests[] = mysqli_real_escape_string($cnxn, $_POST['interests']);
        }
    } else {
        echo "<p class='text-danger'>Interests is required</p>";
        $isValid = false;
    }


    /*
    //checking interests
    if (isset($_POST['interests'])) {
        $interests = mysqli_real_escape_string($cnxn, $_POST['interests']);

    } else {
        echo "<p class='text-danger'>Interests is required</p>";
        $isValid = false;
    }

    /*
    //checking other interests
    if(isset($interests)) {
        if(isset($_POST["6"])) {
        }
        if (!empty($interestsOther)) {
            $interestsOther = mysqli_real_escape_string($cnxn, $_POST['otherEthnicity']);
        }else{
            $interestsOther = "";
        }
    }else {
        echo "<p>Please specify your ethnicity</p>";
        $isValid = false;
    }
    */

    //checking other interests
    if (!empty($_POST['other'])) {
        $interestsOther = mysqli_real_escape_string($cnxn, $_POST['other']);
    } else {
        $interestsOther= NULL;
    }


    //checking skills
    if (!empty($_POST['skills'])) {
        $skills = mysqli_real_escape_string($cnxn, $_POST['skills']);
    } else {
        echo "<p class='text-danger'>Skills is required</p>";
        $isValid = false;
    }

    //checking motivated
    if (!empty($_POST['motivated'])) {
        $motivated = mysqli_real_escape_string($cnxn, $_POST['motivated']);
    } else {
        echo "<p class='text-danger'>Motivated is required</p>";
        $isValid = false;
    }

    //checking other hear form
    if (!empty($_POST['otherHear'])) {
        $otherHear = mysqli_real_escape_string($cnxn, $_POST['otherHear']);
    } else {
        $otherHear= NULL;
    }

    //checking volunteerAvailability
    if (!empty($_POST['volunteerAvailability[]'])) {
        $volunteerAvailability = mysqli_real_escape_string($cnxn, $_POST['volunteerAvailability[]']);
    } else {
        $volunteerAvailability = NULL;
    }

    //checking other volunteerAvailability
    if (!empty($_POST['availability_other'])) {
        $otherVolunteerAvailability = mysqli_real_escape_string($cnxn, $_POST['availability_other']);
    } else {
        $otherVolunteerAvailability = NULL;
    }


    /*
   //checking references
   $array = $_POST['character'];
   foreach ($array as $key => $value) {
       if (empty($value)) {
           echo "<p class='text-danger'>Character Field $key is required</p>";
           $isValid = false;
       } else {
           $references[] = mysqli_real_escape_string($cnxn, $value);
       }
   }
   */

    /*
    if (!empty($_POST['character[]'])) {
        $references = mysqli_real_escape_string($cnxn, $_POST['character[]']);
    } else {
        echo "<p class='text-danger'>Character is required</p>";
        $isValid = false;
    }
    */

    /*
    //checking character[]
    $arrayInt = array('events', 'fundraising', 'newsletter', 'volunteer', 'mentoring', 'otherDiv');
    if (isset($_POST['character'])) {
        if (in_array($_POST['character'], $arrayInt)) {
            $interests = mysqli_real_escape_string($cnxn, $_POST['character[]']);
        }
    } else {
        echo "<p class='text-danger'>Character is required</p>";
        $isValid = false;
    }
    */

    //Insert row if data is valid
    if ($isValid) {

        $sql = "INSERT INTO volunteer
                        VALUES (default,'$filling', '$first', '$last','$street_address','$city', '$state','$zip', 
                        '$phone', '$email', '$t_shirt', '$interestsOther', '$skills', '$experience', '$otherVolunteerAvailability', '$motivated', '$hear', '$otherHear', '$mailLists', default, default, '1')";

        $result = mysqli_query($cnxn, $sql);
        $varVolId = mysqli_insert_id($cnxn);

        $interests = $_POST['interests'];
        $interests2 = implode(',', $interests);

        // grab field from interests
        foreach ($interests as $interest) {
            $sql2 = "INSERT INTO vol_int VALUES ('$varVolId', '$interest' )";
        }


        if ($result) {
            echo "<p><strong>Who is filing this form:</strong> $filling</p>";
            echo "<p><strong>Student name:</strong> $first $last</p>";
            echo "<p><strong>Street:</strong> $street_address</p>";
            echo "<p><strong>City:</strong> $city</p>";
            echo "<p><strong>State:</strong> $state</p>";
            echo "<p><strong>ZIP:</strong> $zip</p>";
            echo "<p><strong>Phone:</strong> $phone</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>T-shirt:</strong> $t_shirt</p>";
            echo "<p><strong>Skills:</strong> $skills</p>";
            echo "<p><strong>Experience:</strong> $experience</p>";
            echo "<p><strong>Motivated:</strong> $motivated</p>";
            echo "<p><strong>Hear:</strong> $hear / $otherHear</p>";
            echo "<p><strong>MailLists:</strong> $mailLists</p>";
            echo "<p><strong>Volunteer Availability:</strong> $volunteerAvailability / $otherVolunteerAvailability</p>";
            echo "<p><strong>Interests:</strong> $interests2 / $interestsOther</p>";
            //var_dump($_POST);
        }
    }

    $filling= $_POST['filling'];
    $first= $_POST['firstName'];
    $last= $_POST['lastName'];
    $street_address= $_POST['streetAddress'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $t_shirt = $_POST['tshirt'];
    //$interests = $_POST['interests'];
    $interestsOther = $_POST['other'];
    $experience = $_POST['experience'];
    $references = $_POST['character'];
    //$volunteerAvailability = $_POST['volunteerAvailability[]'];
    $motivated= $_POST['motivated'];
    $hear= $_POST['hear'];
    $otherHear= $_POST['otherHear'];
    $mailLists= $_POST['mailing'];

    //send order by email
    //Note: this will probably go to your junk email
    $email = "emishkin@mail.greenriver.edu";

    $referencesString = implode(",", $references);
    $email_body = "Summary --\r\n";
    $email_body = "Name: $first $last\r\n Filling: $filling\r\n
    Street Address: $street_address\r\n City: $city\r\n State: $state\r\n
    Zip: $zip\r\n Phone: $phone\r\n E-mail: $email\r\n T-shirt: $t_shirt\r\n
    Experience: $experience\r\n
    References: $referencesString\r\n Volunteer Availability: $volunteerAvailability\r\n
    Motivation: $motivated\r\n Add to mailing list: $mailLists \r\n";
    $email_subject = "New form submitted";
    $to = $email;
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $success = mail($to, $email_subject,$email_body,$headers);

    //print final confirmation
    $msg = $success ? "Your form has been  successfully submitted."
        :"We're sorry. There was a problem with your form";
    //or this way
    if($success) {
        $msg = "Your form has been  successfully submitted.";
    } else{
        $msg = "We're sorry. There was a problem with your form";
    }
    echo "<div class=\"form-group m-5\"><p>$msg</p></div>";

    ?>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>