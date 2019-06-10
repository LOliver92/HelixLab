
        <?php
            //Nem lehet benne: Nem kezdődhet _-lal és számmal, ékezetes betű, spec char
            $elsoValtozo = 1;
            
            // integer--> int egész számok tárolása
            // string--> szöveges változó " " vagy ' '
            // booolean--> (logikai érték) true vagy false
            // float--> 3.978 törtszámos változót lehet benne tárolni
            
            $int = 158;
            $string1 = "Első stringünk";
            $string2 = 'Ez is string változó';
            $stringszám = "24";
            $bool = true;
            $bool2 = false;
            $float = 3.14;
            
            print(165 . "<br>" . 165);
            print("<br>");
            print($elsoValtozo+$int . "<br>");
            
            
            //sima vagy klasszikus tömb
            $elsoTomb = array(12.14,15,16,true,"alma");    //--> ez egy tömb változó
            //több dimenziós tömb
            $elsoTomb[50] = "utólag";
            $elsoTomb[] = "utólag hozzáadva";
            $elsoTomb[2] = "Kicserélve";  //utólag módosít felülírva a korábbi n-edik elemet
            print_r($elsoTomb); //---> csak a print_r -rel lehet tömböt kiiratni      
            //echo-t nem zárójelbe, hanem ''-> közé kell tenni
              //echo "Helló világ!" . "<br>";
              //echo "cső";
            print("<br>");
            //asszociatív tömb vagy társításos tömb
            $asszoc = array("nev" => "Olivér", "kor" => 21, "8" => 25, 2 => 50);
            print_r($asszoc);
            print("<br>");
            print_r($asszoc ["nev"]);
            print("<br>");
            print_r($asszoc [8]);
            print("<br>");
            
            $utolsó = $int;
            
            
        ?>
   