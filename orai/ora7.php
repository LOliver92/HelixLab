<?php

    //elemek alapján rendez A-Z-ig, és az index ezzel azonosan módosul
      $tomb = array ('alma', 'körte', 'barack', 'dinnye');
      sort($tomb);
      foreach ($tomb as $key => $value){
          print $key . ' = ' . $value . ' ';    
      }
      
     print '<br><br>';
     //asszociatív tömböt rendezünk elemei szerint
     //az elemek megtartják a hozzá tartozó indexeket
     $tomb2 = array ( 0 => "kutya", "b" => "tigris", "c" => "oroszlán", 3 =>"antilop");
    asort($tomb2);
    foreach ($tomb2 as $key => $value){
          print $key . ' = ' . $value . ' ';
    }
    print '<br><br>';
    
    //asszociatív tömböt rendezünk elemek alapján Z-A sorrendben
    //ITT NEM MARAD MEG AZ ORIGIN INDEX, HELYETTE GÉP SORSZÁM KERÜL BE HELYETTE
    $tomb3 = array ( "a" => "kutya", "b" => "tigris", "c" => "oroszlán", "d" =>"antilop");
    rsort($tomb3);
    foreach ($tomb3 as $key => $value){
          print $key . ' = ' . $value . ' ';
    }
    print '<br><br>';
    //Ugyanúgy, mint az rsort, elemek alapján rendez asszociatív tömb9öt Z-A sorba
    //ITT MEGMARAD AZ ORIGIN INDEX
    $tomb4 = array ( "a" => "kutya", "b" => "tigris", "c" => "oroszlán", "d" =>"antilop");
    $tomb5 = $tomb4; //tömb lemásolása ha a rostot és az eredeti érték is kell, és nem akarjuk oda-vissza sortolgatni
    $tomb6 =$tomb4;
    arsort($tomb4);
    foreach ($tomb4 as $key => $value){
          print $key . ' = ' . $value . ' ';
    }
    print '<br><br>';
    
    //Index alapján rendez asszociatív tömböt A-Z-ig
    //index és érték megmarad
    ksort($tomb5);
    foreach ($tomb5 as $key => $value){
          print $key . ' = ' . $value . ' ';
    }
    print '<br><br>';
    
    
    //Index alapú rendezés Z-A sorrendben
    krsort($tomb6);
    foreach ($tomb6 as $key => $value){
          print $key . ' = ' . $value . ' ';
    }
    print '<br><br>';
    
    
    $vegysTomb = array (1, 4, 8.25, "alma", 5, false); //boolean típusú változót is hozzáadja
    print array_sum($vegysTomb). '<br>';
    //összeadja az összes szám típusú elemet, és megörzi a tört részt is
    
    print count($vegysTomb). '<br>';
    //megszámolja a tömb elemeit
    
    print '<br><br>';
    
    $c = array (1, 2, 3, 4, 5);
    $d = array_slice($c, 2); //3-4-5
        print_r ($d);
        print '<br>';
    
    $e = array_slice($c, -1); //5
      print_r ($e);
      print '<br>';
    
    $f =array_slice($c, 2,  2); //3-4
     print_r ($f);
     print '<br>';
        
     $g =array_slice($c, -2,  1); //4
     print_r ($g);
     print '<br><br>';
     
     $x = array ("a" => "Dell", "b"=> "Lenovo", "c" => "hp", "d"=> "asus", "e" => "samsung");
     $xa = array_search("asus", $x); // az elem indexével tér vissza
     print $xa . '<br>';
     
     //True /false értékkel tér vissza
     if (in_array("labda", $x)){
         print "Benne van a tömbben";
     }
     else {
     print "nincs benne a tömbben";
     }
     
     
     
     ?>

