<?php
    $al = "almalé";
    print $al[2] . "<br>";
    print $al[5] . "<br>";
    
    // string hossza
    $hossz = strlen($al);
    print $hossz . "<br>";
    //print (strlen($al). "<br>"); -->másik megoldás
    
    if ($hossz>4){
        print "Legalább 5 karakter hosszú az almalé" . "<br>";
    }
    
    $a2 = "aDbKghJlOpt";
    $k1 = "DbK";
    $k2 = "AAA";
    //string adott részletére lehet keresni vele, T/F a visszatérés
    if (strstr($a2, $k1)) {
        print $k1 . " megtalálható a stringben" . "<br>";
        
    }
    if (strstr($a2, $k2)) {
        print $k2 . " megtalálható a stringben" . "<br>";
        
    }
    else {
       print $k2 . " nincs benne" . "<br>";
    }
    
    //strpos
    // stringben keres adott részletet, visszatérési érték a keresett rész eléső karakterének indexe
    $a3 = "almafa";
    $p1 = "maf";
    $re = strpos($a3, $p1); //$re = strpos($a3, "maf"); --> másik megoldás
    print $re . "<br>";
    
    
    //substr
    //stzringben keres adott részletet, pozció megadás alapján visszatérés string egy kivágott részlete
    
    print (substr($a3, 2, 3). "<br>"); //alMAFa
    
    //melyik stringből írjuk, hányadik indextől, hány db-ot
    
    print (substr($a3, 2). "<br>");
    //melyik stringből írjuk, hányadik indextől az összes többit
    
    print (substr($a3, -2). "<br>");
    
    
    //=== típus egyezést is vizsgálja
    if (substr($a3, -2) === "fa") {
        print "ez valóban a fa volt" . "<br>";
    }
    
    
    
    if (strpos($a3, 'fa') ===4){
        print "Ez 4 betű után volt" ."<br>";
    }
    
    $x = "Ez a mondat szavanként jelenik meg.";
    // mit---mire---melyik stringben akarjuk kicserélni
    print (str_replace(" ", "<br>", $x));
    print "<br>";
    
    //tömböt csinál a stringből
    //melyik karakternél törje elemeirem, melyik stringet
    $tomb = explode(" ", $x);
    print_r($tomb);

    print "<br>";
    $emailcim = 'orsospista89@gmail.hu';
    
    if (substr($emailcim, strlen($emailcim)-3 )==='.hu'){
        print "ez .hu-ra végződik";
    }
    elseif (substr($emailcim, strlen($emailcim)-4 )==='.com') {
        print "ez .com-ra végződik";
    }
    else {
        print "valami másra végződik";
    }
    print "<br>";
    
    $labda = 'pöttyöslabda';
    print (strlen($labda) ."<br>");
    print (substr($labda, 0, 6). " ". substr($labda, 6, 4). " " . substr($labda, 4));
    
?>

