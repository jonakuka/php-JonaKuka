<?php 
//Open file named "ds.txt" for writing
//nese file nuk ekziston, krijohet nje i ri me te njejtin emer
//nese file ekziston, mbishkruhet kontenti apo te dhenat dhe file paraprak fshihet



// w - e qel file per read and write, nese nuk ekziston e krijon nje te ri
// r - eshte vetem read only mode
// a - eshte vetem rad only mode edhe pointer shkon ne fund te filet
//W+ - 
// r+ - file is open ne read edhe write mode
//a+ - mundesh me shtu text ne fund te filet
//x - krijohet nje file i ri for write only mode

$myfile = fopen("ds.txt", "w");

//$filesize = filesize($myfile);

$mytext = "Hey this is my first file manipulation in php what are you doing right now areyou good";

fwrite($myfile, $mytext);

$myfile2 = fopen("myfile2.txt", "w");

fwrite($myfile2 , "veq dy sekonda");

$myfile3 = fopen("myfile3.txt" , "a+");
fwrite($myfile3 , "\n Added one more line" );

fclose();




?>