<?php 

function maximum($x,$y){
    if($x>$y){
        return $x;
    }else{
        return $y;
    }
}

echo maximum(6,9);
echo "<br>";
echo maximum(2,5);
echo "<br>";
echo maximum(5833,3993);
echo "<br>";
echo maximum(49,5);



?>