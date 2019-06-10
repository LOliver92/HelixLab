
        <?php
            //Nem lehet benne: Nem kezdődhet _-lal és számmal, ékezetes betű, spec char
            /*$elsoValtozo = 1;
            
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
            $asszoc = array("nev" => "Olivér", "kor" => 26, "8" => 25, 2 => 50);
            print_r($asszoc);
            print("<br>");
            print_r($asszoc ["nev"]);
            print("<br>");
            print_r($asszoc [8]);
            print("<br>");
            
            $utolsó = $int;*/
            
             //töbdimenziós tömb
            
           /* $tobbd = array(
                        "előétel" => array("húsleves", "sajttál"),
                        "főétel" => array("frissensült" =>array("rántott hús", "rántott sajt"),"tészta" =>array("spaghetti")),
                        "desszert" => array()
                        );
            /*print_r($tobbd);
            print("<br>");
            print_r($tobbd["előétel"]);*/
            /*print("<br>");
            print_r($tobbd ["főétel"]["frissensült"][1]);
            print("<br>");
            
            $szam = 5;
            //logikai elágazások
            
            //első blokk
            if($szam == 2){
                print 'A változó értéke 2 ' .'<br>';
            }
            elseif($szam == 4){
                print "a szám";
            }
            else {
               print 'A változó értéke nem 2 és nem négy'. '<br>';
           }*/
           //első blokk vége
           
           //logikai feltéltelek összefűzése
           // ÉS típus, jele &&--> minden része igaz
           // VAGY típus, jele ||, ha 1 része igaz akkor az egész igaz
           
           // további fontos jelek: 
           // összefűzés: .
           // parancs lezárása: ;
           // string: "" vagy ''
           // értékadáás: =
           // egyezés vizsgálata: ==
           // nem egyezés vizsgálata: !=
           // logikai érték megfordítása: !
           
           $hangulat = "Boldog";
           
           if($hangulat == "Boldog"){
               print ('Ma jó kedvem van'. "<br>");
              
           }
           elseif ($hangulat == "Szomorú") {
                print 'Ma rossz kedvem van'. "<br>";
           }
           else {
               print ('Nem vagyok szomorú se boldog, a hangulatom: ' .$hangulat . "<br>");
           }
           
           
           $egySzam = 5263;
           
           if ($egySzam%2 == 1){
              print 'A szám páratlan'. "<br>";
           }                                //---> egy szám vizsgálata (páratlan vagy páros)
           else {
               print 'a szám páros';
           }
          
            // milyen szögű a 3szög
           
           $a = 70;
           $b = 50;
           $c = 60;
           
           //validálás
           
           if($a+$b+$c == 180) {
               // segéd változó
               $max = $a;
               if ($b > $max){$max = $b;}
               if ($c > $max){$max = $c;}
               
               // a szög típusának a megválaszolása
               if($max>90){print("a háromszög hegyesszögű");}
               elseif ($max<90){print("A háromszög tompaszögű");}
               else{print("a háromszög derékszögű");}
           }
           else {
               print 'A szögek összege nem 180 ezért ez nem egy 3szög';
           }
           
          
           print("<br>");
           $osztalyzat = 1;
           //valid-e
           //ha igen kiírni az osztályzatot
           
           if ($osztalyzat<6 && $osztalyzat>0){
               if($osztalyzat==1){
               print('Elégtelen');}
                   elseif($osztalyzat==2){print('Elégséges');}
                   elseif($osztalyzat==3){print('Közepes');}
                   elseif($osztalyzat==4){print('Jó');}
                   elseif($osztalyzat==5){print('Jeles');}
               
               
           }
           else {print('Ez nem valós osztályzat, kérem írjon be egy valós osztályzatot'); }
           //print '<h1>'. 'MI AZ HOGY KETTŰ?!' . '</h1>'
        ?>
   