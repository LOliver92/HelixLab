<?php

$ertek = 15623;
$alsoHat = 10000;
$felsoHat = 20000;
$elteres = 1000;

if ($ertek > $alsoHat && $ertek < $felsoHat) {
    print ("k�z� esik" . "<br>");

    if ($ertek - $alsoHat < $elteres || $felsoHat - $ertek < $elteres) {
        print ("kis elt�r�s");
    } else {
        print ("nagy elt�r�s");
    }
} else {
    print("Nem esik k�z�" . "<br>");
}
?>
    
