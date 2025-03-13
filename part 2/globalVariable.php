<?php
$x = 10;

function localVariable(){
    global $x; 
    $y = 4;
    echo $x;
    echo $y;
}

localVariable();
echo "\n, $x";



?>