<?php
if (isset($_COOKIE["yourname"]) && isset($_COOKIE["fruit"])) {
    echo $_COOKIE["yourname"]."'s favorite fruit is ".$_COOKIE["fruit"];
}
else
    echo "I dunno your favorite fruit.";

?>
