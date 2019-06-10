<?php

$ertek = 15623;
$alsoHat = 10000;
$felsoHat = 20000;
$elteres = 1000;

if ($ertek > $alsoHat && $ertek < $felsoHat) {
    print ("közé esik" . "<br>");

    if ($ertek - $alsoHat < $elteres || $felsoHat - $ertek < $elteres) {
        print ("kis eltérés");
    } else {
        print ("nagy eltérés");
    }
} else {
    print("Nem esik közé" . "<br>");
}
?>
    
