<?php
/** 305/new-students.php collect database fro new student
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
    <title>GRC Student Summary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
</head>
<body>

<div class="container">
    <br>

    <h3>Dreamer Summary</h3>

    <?php

    require('/home/eeicoder/connect.php');
    //Define the query
    //    $sql = 'SELECT dreamer.dreamer_Id, name, phone, e_mail, birth, gender, grad, interest,
    //            career, favfood, parentNAme, parentPhone, parentEmail, ethnicity_type, otherEthnicity
    //            FROM dreamer,ethnicity
    //            WHERE dreamer.ethnicity_id = ethnicity.ethnicity_id';

    $sql='SELECT dreamer.dreamer_Id, name, phone, e_mail, birth, gender, grad, interest, 
            career, favfood, parentNAme, parentPhone, parentEmail, ethnicity_type, otherEthnicity,active
            FROM dreamer INNER JOIN ethnicity ON dreamer.ethnicity_Id =
            ethnicity.ethnicity_Id
            ORDER BY dreamer.dreamer_Id DESC';


    //    $sql = 'SELECT DISTINCT dreamer_Id, name, phone, e_mail, birthdate, gender, graduation_class,
    //            ethnicity_type, ethnicity_other, interest, career, food
    //        FROM ethnicity INNER JOIN dreamer ON dreamer.ethnicity_Id =
    //        ethnicity.ethnicity_Id';


    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);


    //    $rs = mysqli_query('SELECT email from dreamers LIMIT 0, 10');
    //
    //    while(list($email) = mysqli_fetch_row($rs)
    //    {
    //     Send Email
    //        mail($email, 'Your Subject', 'Your Message');
    //    }
    ?>

    <table id="dreamer-table" class="display">
        <thead>
        <tr>
            <th>Dreamer Id</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Ethnicity</th>
            <th>Birthdate</th>
            <th>Graduating class</th>
            <th>College of Interest</th>
            <th>Career Aspiration</th>
            <th>Favorite Food/Snack</th>
            <th>Tutor or Parent Name</th>
            <th>Tutor or Parent Phone </th>
            <th>Tutor or Parent Email</th>
            <!--            <th>Active</th>-->
        </tr>
        </thead>
        <tbody>

        <?php
        //Print the results
        while ($row = mysqli_fetch_assoc($result)) {
            //the parameter names are the same that I have from my database
            $dreamer_Id = $row['dreamer_Id'];
            $name = $row['name'];
            $phone = $row['phone'];
            $e_mail = $row['e_mail'];
            $gender = $row['gender'];
            $ethnicityOther = $row['otherEthnicity'];
            $ethnicity = $row['ethnicity_type'];
            $birthdate = date('m-d-Y', strtotime($row['birth']));
            $graduation_class = $row['grad'];
            $interest = $row['interest'];
            $career = $row['career'];
            $food = $row['favfood'];
            $parentNAme = $row['parentNAme'];
            $parentPhone = $row['parentPhone'];
            $parentEmail = $row['parentEmail'];
//            $active = $row['active'];

            echo "<tr>
        <td>$dreamer_Id</td>
        <td>$name</td>
        <td>$phone</td>
        <td>$e_mail</td>
        <td>$gender</td>";
            if($ethnicityOther == null){
                echo"<td>$ethnicity</td>";
            }else{
                echo"<td>$ethnicityOther</td>";
            }
            echo"
        <td>$birthdate</td>
        <td>$graduation_class</td>
        <td>$interest</td>
        <td>$career</td>
        <td>$food</td>
        <td>$parentNAme</td>
        <td>$parentPhone</td>
        <td>$parentEmail</td>
        </tr>";
        }
        ?>
        </tbody>
    </table>


    <div class="container">
        <a href="email.php?a=b" class="p-md-2 mb-auto bg-dark text-white">Email</a>
        <a href="../idaydream/index.html" class="p-md-2 mb-auto bg-dark text-white inline">Home</a>
    </div>

    <br>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    // $('#dreamer-table').DataTable();
    // $('#dreamer-table').DataTable({"order":[0,'desc']});
    $('#dreamer-table').DataTable( {
        order:[0,'desc'],
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
        },
    } );
</script>

</body>
</html>


