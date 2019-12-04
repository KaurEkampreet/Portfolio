<?php
$first = $_POST['firstName'];
$last = $_POST['lastName'];
$address = $_POST['address'];
$method =$_POST['method'];
$size = $_POST['size']
?>
<!DOCTYPE html>
<body>
<h1>Thank you for order!</h1>
<h2>order summary:</h2>
<p>Name: <?php echo "$first $last"; ?>
    <p>Address: <?php echo "$address"; ?>
<p>Method: <?php echo "$method"; ?>
    <p>Size:
    <?php
    $validSizes = array("none", "small,", "medium", "large");
    if(in_array($size, $validSizes))
        echo "$size";
    else
        echo "<p>Invalid size.</p>";
    ?>
</p>
<pre>
<?php
//var_dump($_POST);
//echo "hello world";
//send order by email
//notet this will probably go to ur spam

$email = "ekamthind697@gmail.com";
$email_body = "Order Summary --\r\n";
$email_body .="Name: $first $last\r\n";
$email_subject = "New Order placed";
$to = $email;
$headers = "From: $email\r\n";
$headers .= "Reply-T0: $email \r\n";
$success = mail($to, $email_subject, $email_body, $headers);

//print final confirmation
/*if ($success){
    $msg=
}
else {
    $msg = "We are "
} */
$msg = $success ? "Your order was successfully placed."
    : "We are sorry. there was problem with your order.";
echo "<p>$msg</p>";

?>
</pre>
</body>
</html>
