<?php
/*a házi feladat tizedik megoldása másképp
        $irokKoltok = array (
         array ("veznev" => "Arany", "kernev" => "János", "kor" => 35),
         array ("veznev" => "Petőfi", "kernev" => "Sándor", "kor" => 25),
         array ("veznev" => "Babits", "kernev" => "Mihály", "kor" => 42),
         array ("veznev" => "Ady", "kernev" => "Endre", "kor" => 38),
         array ("veznev" => "Móricz", "kernev" => "Zsigmond", "kor" => 51)
        );
    foreach ($irokKoltok as $index2 => $ertek){
        foreach ($ertek  as $index => $belsoertek){
            print $index . " - ". $belsoertek;
        }
           
    }  */      



$szam = 178.59;
printf("Decimális: %d<br>", $szam);
printf("Bináris: %b<br>", $szam);
printf("Tört: %f<br>", $szam);
printf("8as számrenmdszer: %o<br>", $szam);
printf("String: %s<br>", $szam);
printf("Kis hexa: %x<br>", $szam);
printf("Nagy hexa: %X<br>", $szam);

print $szam . "<br>";
print (gettype ($szam));
$x = settype($szam, "integer");
print "<br>" . $x . "<br>";

printf ('#%X%X%X <br>', 154,68,135);


// ' utáni 1 karakter a kitöltőeszköz, 4 a kitöltés mérete
printf("%04d",17);


$tmb = array ("Pöttyös labda" => 1500, "Vizipisztoly" => 990, "Matchbox" => 1000, "Baba" => 500, "Lézerkard" => 9900, "Diktafon" => 5000);
print '<pre>';
printf('%-30s %-30s <br>','Termék','Ár');
printf("%'-60s <br>","");
foreach($tmb as $key => $value){
    printf('%-30s %-30s <br>',$key,$value);
}
       
print '</pre>';

?>
