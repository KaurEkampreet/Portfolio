<?php
if (!empty($_POST["fruit"]))
{
//make persistent cookie for one day
    setcookie("fruit",$_POST["fruit"], mktime()+60*60*24);
}
//redirect
header("Location: showFruit.php");



if (!empty($_POST["yourname"]))
{
//make persistent cookie for one day
    setcookie("yourname",$_POST["yourname"], mktime()+60*60*24);
}
//redirect
header("Location: showFruit.php");
?>
