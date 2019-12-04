<?php
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
    <title>Thank you</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

</head>
<body>

<?php
require('/home/eeicoder/connect.php');

$sql = "SELECT DB_NAME(dbid) AS DBName,
    COUNT(dbid) AS NumberOfConnections,loginame
    FROM    sys.sysprocesses
    GROUP BY dbid, loginame
    ORDER BY DB_NAME(dbid)";

$to = 'imedina_castaneda@mail.greenriver.edu';
//        $to = $_POST['email'];
$email_body = "Summary --\r\n";
$email_subject = "New form submitted";
//
$success = mail($to, $email_subject, $email_body);
//    }
//    print final confirmation
$msg = $success ? "Your email has been successfully sent."
    : "We're sorry. There was a problem with your email";
echo "<div class=\"form-group m-5\"><p>$msg</p></div>";


?>

<pre>
    <div>
        <a href="dreamersummary.php" class="p-md-3 mb-auto bg-dark text-white">Go to Summary Page</a>
    </div>
    </pre>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

</body>
</html>
