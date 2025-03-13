<?php 

function plot($n){

    if(($n % 2)==0){
        return "numri eshte i plotpjestueshem me 2";
    }else{
        return "numri nuk eshte i plotpjestueshem me 2";
    }
}

print_r(plot(20). "<br>");
print_r(plot(13). "<br>");
print_r(plot(18). "<br>");
print_r(plot(11). "<br>");

?>