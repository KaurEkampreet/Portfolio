<?php
$animal = 'Happy Monday';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;  ?></title>
</head>
<body>

<pre>

echo "Username is " . $_SERVER['USER'];

$animal[] = "hyena";
$animal[] = "ostrich";
$animal[] = "kangaroo";
    $animal[] = "hiro";
    $animal[] = "chee";

    print_r($animal);

    echo "The first animal is ".$animal[0]."<br>;
    $animals = array("pig", "duck", "goose");

    for ($i=0; $i<sizeof($animals); $i++) {
    echo $animal[$i]."<br>";
    echo "{animals[$i]}<br>";
    }

    echo "<h3>For-each loop</h3>
    foreach ($animal as $a) {
    echo "$a<br>";
    }

    echo "<h3>Associative array</h3>";
    $todo = array(
    "Mon"=>"Clean house",
    "Tue"=>"Go to library",
    "Wed"=>'Study for midterm"
    );
    $todo['thru'] = "Grocery shopping";

    foreach($todo as $day=>$task) {
    echo "On $day I'll $task<br>";
    }

?>
</pre>
</body>
</html>