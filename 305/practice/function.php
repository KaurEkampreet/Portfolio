<?php
function hello($name)
{
    echo "<h1>Hello, $name</h1>";
}

function average ($one, $two)
{
    $three = ($one + $two) / 2;
    echo "<p> Average of $one and $two: ".$three."</p>";
}

function largest ($one, $two)
{
    $three = $one;
    if ($three < $two) {
        $three = $two;
    }
    echo "<p> The largest number of $one and $two is: ".$three."</p>";
}

function printX()
{
    global $x;
    echo "x is $x<br>";
}

function buckleConverter($num)
{
    switch ((int)$num) {
        case 1:
        case 2:
            $msg = "Buckle my shoe";
            break;
        case 3:
        case 4:
            $msg = "Knock at the door";
            break;
        case 5:
        case 6:
            $msg = "Pick up sticks";
            break;
        case 7:
        case 8:
            $msg = "Lay them straight";
            break;
        case 9:
        case 10:
            $msg = "A big fat hen!";
            break;
        default:
            $msg = "Sorry, that number is not valid. Please try again!";
    }
    return $msg;
}

function isPalindrome($pol) {
    $resStr = strtolower($pol);
    $polFix = str_replace(' ', '', $resStr);
    $text = preg_replace("#[[:punct:]]#", "", $polFix);
    if (strrev($text) == $text){
        return true;
    }
    else{
        return false;
    }
}

?>