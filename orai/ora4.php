<?php



    // $x += 10; 10-zel való növelés (10+10 ha az x értéke 10)
    // $x = $x+1; eggyel növeli az értéket
    // $x = $x++; ugyanúgy eggyel növeli az értéket
    // $x = $x--; eggyel csökkenti az értéket



    /*$asszoc = array("nev" => "Olivér", "kor" => 26, "8" => 25, 2 => 50);
    //csak értéket.
    foreach ($asszoc as $telapo) {
        print $telapo . "<br>"; 
    }
    
    //érték és index
    foreach ($asszoc as $key => $value) {
        print $key. " = " . $value. "<br>";
        
}
    // ciklusváltozó ami csak a ciklusban van
    for($i=0; $i<100; $i++){
        print (($i+1)*8) . " ";
    }
    
    print"<br>";
    
    $a = 0;
    while($a < 10){
        
        $a++;
        print $a . " ";
        print "<br>";
        print $a*2 . " ";
        print "<br>";
    }
    print "<br>";
    print $a;
    print "<br>";
    
    $i = 0;
    for(;$i<5;$i++){
        print " ";
    }
    print $i . "<br>";
    
    while ($i<8) {
        print "Itt épp ".$i. " az érték". "<br>";
        $i++;
        
    }
    
    print $i . "<br>";
    

    //hátul tesztelős
    $b = 3;
    do{
        print $b*2;
        $b++;
     }
     while ($b<5);*/
     


     $tomb = array("Kis", "Jani", 1990, "Esztergom", 175, 89, "Erkölcsileg tiszta");
     
     
     for ($i=0;$i<7;$i++){
         print_r ($tomb[$i] ." ");
     }
     print "<br>";
     foreach ($tomb as $key => $value){
         print $key. " ";
     }
     print "<br>";
     
     foreach ($tomb as $key => $value){
         print ("kulcs = " . $key. "<br>"); 
         print ("érték = " . $value. "<br>");
        
     }
     print "<br>";
     
     $a=0;
     while ($a<7) {
         $a++;
         print ($tomb[$a-1]. " ");
     }
     print "<br>";
     
     $b = 5;
     while ($b<30){
         $b++;
         print $b . " ";
     }
     
     print "<br>";
     
     for ($i=10;$i<=24;$i+=2){
         
         print $i. " ";
     }
   
?>
