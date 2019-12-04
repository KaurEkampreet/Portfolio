<?php
/** 305/volunteer.php collect database for volunteer
 *
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
    <title>Volunteer Summary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
</head>
<body>
<div class="container">
    <br>
    <h3>Volunteer Summary</h3>


    <?php
    require('/home/eeicoder/connect.php');
    //Define the query
    /*$sql = 'SELECT v.volunteer_id, v.firstName,  v.lastName, v.streetAddress, v.city, v.state, v.zip, v.phone, v.email, v.tshirt, v.skills, i.interests_type,  v.experience, a.availability_type, v.motivated, v.hear, v.mailing
            FROM volunteer v
            INNER JOIN interests i
            ON v.interests_id = i.interests_id
            INNER JOIN availability a
            ON v.availability_Id = a.availability_Id';*/
    $sql = 'SELECT volunteer.volunteer_Id, filling, firstName, lastName, streetAddress, city, state, zip, phone, email, tShirt, skills, experience, motivated, hear, otherhear, mailing, interests_type, otherinterests, availability_type, availability_other
         FROM ((((volunteer INNER JOIN vol_int ON volunteer.volunteer_Id = vol_int.volunteer_Id)
         INNER JOIN vol_avail ON volunteer.volunteer_Id = vol_avail.volunteer_Id)
            INNER JOIN interests ON volunteer.interests_id = interests.interests_id)
            INNER JOIN availability ON volunteer.availability_Id = availability.availability_Id)
            ORDER BY volunteer.volunteer_Id DESC';
    //    $sql ='SELECT volunteer.volunteer_Id, filling, firstName, lastName, streetAddress, city, state, zip, phone, email, tShirt, skills, experience, motivated, hear, otherhear, mailing, otherinterests, availability_other
    //FROM ((volunteer INNER JOIN vol_int ON volunteer.volunteer_Id = vol_int.volunteer_Id)
    //INNER JOIN vol_avail ON volunteer.volunteer_Id = vol_avail.volunteer_Id)
    //ORDER BY volunteer.volunteer_Id DESC';


    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
    //    var_dump($result);
    ?>
    <table id="volunteer-table" class="display">
        <thead>
        <tr>
            <th>Volunteer Id</th>
            <th>Who's Filling</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>T-shirt Size</th>
            <th>Interests</th>
            <th>Skills or Qualifications</th>
            <th>Volunteer Experience</th>
            <th>Volunteer Availability</th>
            <th>Motivated to Volunteer with us</th>
            <th>Hear about Idaydream</th>
            <th>Volunteer Mailing List</th>

        </tr>
        </thead>
        <tbody>
        <pre>

        <?php
        //Print the results
        while ($row = mysqli_fetch_assoc($result)) {
            $volunteer_id = $row['volunteer_Id'];
            $filling = $row['filling'];
            $first = $row['firstName'];
            $last = $row['lastName'];
            $street_address = $row['streetAddress'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip'];
            $phone = $row['phone'];
            $email = $row['email'];
            $t_shirt = $row['tShirt'];
            $interests = $row['interests_type'];
            $otherinterests = $row['otherinterests'];
            $skills = $row['skills'];
            $experience = $row['experience'];
            $volunteerAvailability = $row['availability_type'];
            $availabilityother = $row['availability_other'];
            $motivated = $row['motivated'];
            $hear = $row['hear'];
            $otherhear = $row['otherhear'];
            $mailLists = $row['mailing'];

            echo "<tr>
        <td>$volunteer_id</td>
        <td>$filling</td>
        <td>$first $last</td>
        <td>$street_address $city $state, $zip</td>
        <td>$phone</td>
        <td>$email</td>
        <td>$t_shirt</td>";
            if ($otherinterests == null) {
                echo "<td>$interests</td>";
            } else {
                echo "<td>$otherinterests</td>";
            }
            echo "
        <td>$skills</td>
        <td>$experience</td>";
            if ($availabilityother == null) {
                echo "<td>$volunteerAvailability</td>";
            } else {
                echo "<td>$availabilityother</td>";
            }
            echo "
        <td>$motivated</td>";
            if ($otherhear == null) {
                echo "<td>$hear</td>";
            } else {
                echo "<td>$otherhear</td>";
            }
            echo "
        
        <td>$mailLists</td> 
        </tr>";
        }
        ?>

        </tbody>
    </table>

    <!--    <button onclick="window.location.href = 'guest_book.html';">Email</button>-->
    <!--    <button onclick="href= 'email.php';">Email</button>-->

    <div class="container">
        <a href="email.php" class="p-md-2 mb-auto bg-dark text-white inline">Email</a>


        <a href="../idaydream/index.html" class="p-md-2 mb-auto bg-dark text-white inline">Home</a>
    </div>
    <br>


    <?php
    //    $rows = mysqli_fetch_assoc($result);
    //    var_dump($rows);
    //   foreach ($rows as $row) {
    //        $email_body = $_POST['email'];
    //        $email_body = "Summary --\r\n";
    //        $email_subject = "test subject";
    //
    //        $to = "ekaur@mail.greenriver.edu";
    //
    //        $success = mail($to, $email_subject, $email_body);
    //        $email[] = $row['email'];
    //        echo $row['email'];
    //        $emailto = $email;
    //    }

    //send order by email
    //Note: this will probably go to your junk email
    //            $to = 'imedina_castaneda@mail.greenriver.edu';
    //        $to = $_POST['email'];
    //        $email_body = "Summary --\r\n";
    //        $email_subject = "New form submitted";
    //
    //        $success = mail($to, $email_subject, $email_body);
    //    }
    //    print final confirmation
    //        $msg = $success ? "Your form has been  successfully submitted."
    //            : "We're sorry. There was a problem with your form";
    //       echo "<div class=\"form-group m-5\"><p>$msg</p></div>";
    ?>


</div>
</pre>
<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
    //$('#student-table').DataTable();
    $('#volunteer-table').DataTable({
        order:[0,'desc'],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[0] + ' ' + data[1];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
</script>

</body>
</html>