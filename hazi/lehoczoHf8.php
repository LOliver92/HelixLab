<?php
    $simaTomb = array ("Jóska", "Pista", 1, 6, "víz", 3.14, "true");
    $asszocTomb = array ("nev" => "Jóska Pista", "IQ" => 1, "kor" => 6, "piSta" => 3.14, "Ja" => "true");
    
    
    $simaTomb3Fel = $simaTomb;
    $simaTomb6Fel = array_search ("víz", $simaTomb);
    $asszocTomb7Fel = array_slice($asszocTomb, 0, 3);
    $simaTomb8Fel = array_slice($simaTomb, 2, 2);
    $simaTomb9Fel = array_slice($simaTomb, 4, 1);
    $simaTomb9Fel2 = $simaTomb;
    //$asszocTombFel10 = asort($asszocTomb);
    
    //első feladat
    print "Első feladat: <br>";
    krsort($asszocTomb);
    foreach ($asszocTomb as $key => $value){
        print $key . " --> ". $value . "<br>";
    }
    
    print "<br><br>";
    
    
    //második feladat
    print "Második feladat: <br>";
    sort ($simaTomb);
        foreach ($simaTomb as $key => $value){
            print ($key . ' = '. $value . '<br>');
        }
    
    print "<br><br>";
    
    //Harmadik feladat
    print "Harmadik feladat: <br>";
    arsort ($simaTomb3Fel);
    foreach ($simaTomb3Fel as $key => $value){
            print ($key . ' = '. $value . '<br>');
    }
    print "<br><br>";
    
    //negyedik feladat
    print "Negyedik feladat: <br>";
    print "Az asszociatív tömbünk elemeinek száma: " . count($asszocTomb);
    print "<br><br>";
    
    //ötödik feladat
    print "Ötödik feladat: <br>";
    if (in_array("budha", $asszocTomb)){
        print "A tömbnek eleme budha";  
    }
    else {
        print "A tömbnek nem eleme budha";
    }
    print "<br><br>";
    
    //Hatodik feladat
    print "Hatodik feladat: <br>";
    print "A sima tömbünk ". $simaTomb6Fel. ". eleme a víz szó";
    print "<br><br>";
    
    
    //Hetedik feladat
    print "Hetedik feladat: <br>";
    print_r($asszocTomb7Fel);
    print "<br><br>";
    
    //Nyolcadik feladat
    print "Nyolcadik feladat: <br>";
    print_r($simaTomb8Fel);
    print "<br><br>";
    
    //Kilencedik feladat
    print "Kilencedik feladat: <br>";
    foreach ($simaTomb9Fel as $key => $value){
       print "A sima tömbünk 4. eleme a ". $value;                        //print_r ($simaTomb9Fel);--> ezzel próbáltam először, de az nem ugyanaz :D
   }
    print "<br>";
    print ("A sima tömbünk 4. eleme a " . $simaTomb9Fel2[4]);
    print "<br><br>";
    
    //Tizedik feladat
    print "Tizedik feladat: <br>";
    $asszocTombFel10 = array ("nev" => "Jóska Pista", "IQ" => 1, "kor" => 6, "piSta" => 3.14, "Ja" => "true");
    arsort($asszocTombFel10);
    foreach ($asszocTombFel10 as $key => $value){
        print ($key . ' = '. $value . '<br>');
    }
    
    print "<br><br>";
    //Tizenegyedik feladat
     print "Tizenegyedik feladat: <br>";
     $simaTomb11Fel = array ("Jóska", "Pista", 1, 6, "víz", 3.14, "true");
     print "A sima tömbünk elmeinek összege: " . array_sum($simaTomb11Fel);
    

?>
