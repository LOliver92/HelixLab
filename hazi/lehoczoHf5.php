
<?php
        //első feladat
        $tomb = array("Kis", "Jani", 1990, "Esztergom", 175, 89, "Erkölcsileg tiszta");
     
     //második feladat
        print "Második feladat:" . "<br>";
     for ($i=0;$i<7;$i++){
         print_r ($tomb[$i] ." ");
     }
     print "<br>";
     print "<br>";
     //Harmadik feladat
     print "Harmadik feladat:" . "<br>";
     foreach ($tomb as $key => $value){
         print $key. " ";
     }
     print "<br>";
     print "<br>";
     //negyedik feladat
     print "Negyedik feladat:" . "<br>";
     foreach ($tomb as $key => $value){
         print ("kulcs = " . $key. "<br>"); 
         print ("érték = " . $value. "<br>");
        
     }
     print "<br>";
     print "<br>";
     //ötötdik feladat
     print "Ötödik feladat:" . "<br>";
     $a=0;
     while ($a<7) {
         $a++;
         print ($tomb[$a-1]. " ");
     }
     print "<br>";
     print "<br>";
     //hatodik feladat
     print "Hatodik feladat:" . "<br>";
     $b = 5;
     while ($b<30){
         $b++;
         print $b . " ";
     }
     
     print "<br>";
     print "<br>";
     //hetedik feladat
     print "Hetedik feladat:" . "<br>";
     for ($i=10;$i<=24;$i+=2){
         
         print $i. " ";
     }
     print "<br>";
     print "<br>";
     //nyolcadik feladat
     print "Nyolcadik feladat:" . "<br>";
     $b=0;
     for (;$b<=60;$b+=3){
         print $b . " ";
     }
     print "<br>";
     print $b . "-szor/-szer/-ször futott le a ciklus";
     
     print "<br>";
     print "<br>";
     //kilencedik feladat
     print "Kilencedik feladat:" . "<br>";
     print ("<table border=1>");
        for ($i=1;$i<=10;$i++){
            print ("<tr>");
            for ($j=1;$j<=10;$j++){
                print ("<td>");
                print($i*$j);
                print ("</td>");
            }
           print ("</tr>"); 
        }
     print ("</table>");
     print "<br>";
     print "<br>";
     //tizedik feladat
     print "Tizedik feladat:" . "<br>";
     $irokKoltok = array (
         array ("veznev" => "Arany", "kernev" => "János", "kor" => 35),
         array ("veznev" => "Petőfi", "kernev" => "Sándor", "kor" => 25),
         array ("veznev" => "Babits", "kernev" => "Mihály", "kor" => 42),
         array ("veznev" => "Ady", "kernev" => "Endre", "kor" => 38),
         array ("veznev" => "Móricz", "kernev" => "Zsigmond", "kor" => 51)
     );
    foreach ($irokKoltok as $rows => $row) {
        echo $row['veznev']. " ";
        echo $row['kernev']. " ";
        echo $row['kor']. "<br>";
}
 ?>
   
