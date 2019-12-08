<?php
/** 305/students.php reads data from a database
 *  into a data table
 *  Nov 4, 2019
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);


//Start a session
session_start();


//If user is not logged in, reroute them to the login page
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Guestbook</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
</head>
<body>

<div class="container">

    <h3>Admin</h3>

<?php

require('/home/ekaurgre/connect.php');


        $sql='SELECT guest_id, firstName, lastName, company, linkedIn, email, comment, mailing, meet_type, meetother
                FROM guestbook INNER JOIN meet ON guestbook.meet_id = meet.meet_id';

$result = mysqli_query($cnxn, $sql);
?>

    <table id="guestbook-table" class="display">
        <thead>
        <tr>
            <th>Guest Id</th>
            <th>Name</th>
            <th>Company</th>
            <th>LinkedIn</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Mailing</th>
            <th>Meet</th>
        </tr>
        </thead>
        <tbody>

<?php
//Print the results
        while ($row = mysqli_fetch_assoc($result)) {
    //the parameter names are the same that I have from my database
            $guest_id = $row['guest_id'];
    $firstn = $row['firstName'];
    $lastn = $row['lastName'];
    $company = $row['company'];
    $linkedIn = $row['linkedIn'];
    $email = $row['email'];
    $comment = $row['comment'];
    $mailing = $row['mailing'];
    $meet = $row['meet_type'];
    $meetother = $row['meetother'];
   // $datestamp = date('m-d-Y', strtotime($row['date']));

    echo "<tr>
        <td>$guest_id</td>
        <td>$firstn $lastn</td>
        <td>$company</td>
        <td>$linkedIn</td>
        <td>$email</td>
        <td>$comment</td>
        <td>$mailing</td>";
    if($meetother == null){
        echo"<td>$meet</td>";
    }else{
        echo"<td>$meetother</td>";
    }
    echo"
        </tr>";
}
?>
        </tbody>
    </table>

    <br>
        <a href="guestbook.html">Guestbook</a>
</div>

    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        //$('#student-table').DataTable();
        $('#guestbook-table').DataTable( {
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return 'Details for '+data[0]+' '+data[1];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table'
                    } )
                }
            }
        } );
    </script>

</body>
</html>