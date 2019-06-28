<?php

      //első feladat
      print ("Első feladat: <br>");
      $szoveg = "12345678";
      $szovegHossz = strlen($szoveg);

       if ($szovegHossz>3 && $szovegHossz<8){
           print("A szövegünk a feltétel között van <br>");
       }
       else {
           print ("A szövegünk a feltételen kívül esik <br>");
       }
      print ("<br>");
      
      //második feladat
      print ("Második feladat: <br>");
      $janosVitez = "Tüzesen süt le a nyári nap sugára, az ég tetejéről a juhászbojtárra";
      $keresendoSzavak = array ("Ég", "a", "nap", "melegétől", "kopár");
      
      for ($i=0; $i<5; $i++){
          if (strstr($janosVitez, $keresendoSzavak[$i])){
              print_r ($keresendoSzavak[$i]. " --> benne van <br>");
          }
          else {
              print_r ($keresendoSzavak[$i]. " --> nincs benne <br>");
          }
      }
      
      print ("<br>");
      
      //harmadik feladat
      print ("Harmadik feladat: <br>");
      $emailCim = "mostpofazza@joskagyerek.ch";
      //$kukac = "@";
     
      //első vizsgálat
      if (strstr($emailCim, ".")){
      if (strstr($emailCim, "@")){
          print ("A(z) " . $emailCim . " valós e-mail címnek tűnik <br>");
      }
      else {
          print ("A(z) " . $emailCim . " nem valós e-mail cím, mert nem tartalmaz @-ot <br>");
      }
      }
      else {
         print ("A(z) " . $emailCim . " nem tűnik valódinak <br>"); 
      }
      //második vizsgálat 
      if (strstr($emailCim, ".")){
      if (substr($emailCim, -3) === ".hu"){
          print ("A domain .hu-ra végződik <br>");
      }
      elseif (substr($emailCim, -4) === ".com"){
          print ("A domain .com-ra végződik <br>");
       }
       else {
           print ("A domain valami másra végződik <br>");
       }
      }
      else {
          print ("A(z) " . $emailCim . " nem tűnik valódinak <br>");
      }
      /*póbáltam neten böngészni e-mail validálás, illetve valid e-mail vizsgálat témakörben, de azok számomra nem tűntek jónak a feladat megoldásához
       a problémám csak annyi, hogy ha "." pl a "@" előtt van ezesetben is valódinak tartja a program az emailt
       ami okés mert létezik olyan email cím is, de azt nem tudtam megoldani, hogy a "."-ot vizsgálja a "@" után is*/
      
      print ("<br>");
      //negyedik feladat
      //első rész
      print ("Negyedik feladat: <br>");
      $haromMondat = "Mi a szándéka a beszélőnek a következő felkiáltó mondattal? De jó, hogy itt vagy! Meglepetés kifejezése.";
      print (str_replace(" ", "<br>", $haromMondat)); 
      print ("<br>");
      
      //második rész
       $mondatTomb = explode (" ", $haromMondat);
       print_r ($mondatTomb);
       
      
      
?>

