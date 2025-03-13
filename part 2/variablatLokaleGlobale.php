<?php
$x = 10;//variabla globale

function localVariable(){
    $y = 4;//vraiabla lokale
    //echo $x;
    echo "$y";
}

localVariable();
echo "\n, $x";



?>