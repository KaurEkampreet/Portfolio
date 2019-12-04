<?php
//delete the cookied
$_COOKIE = array();

//DELETE A SINGLE COOKIE (BY KEY)
setcookie("name");

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete cookie</title>
    </head>
    <body>
<?php
if(isset($_COOKIE['name'])) {
    echo"Hello, ".$_COOKIE['name'];
} else {
    echo"Hello, Stranger";
}
?>