
        <?php
            $elsoValtozo = 15;
            $masodikValtozo = 3.526;
            $harmadikValtozo = "Ez a harmadik változó";
            
            print($elsoValtozo+$masodikValtozo . "<br>");
            print($masodikValtozo*$elsoValtozo .  "<br>");
            print($elsoValtozo/$masodikValtozo . "<br>"); 
            
            $kerVers = array("Team Katusha"=>"Marcel Kittel", "Ineos"=>"Chris Froome", "Movistar"=>"Mikel Landa", "Bora Hansgrohe"=>"Peter Sagan", "Quickstep"=>"Julian Alaphilippe"); //kerékpár versenyzők tömbje
            print_r($kerVers);
            print("<br>");
            $kerVers["Team Novo Nordisk"] = "Kusztor Péter";
            $kerVers["Trek Segafredo"] = "Gulio Ciccone";
            print_r($kerVers);
            print("<br>");
            $kerVers["Ineos"] = "Goegenhart";
            print_r($kerVers);
            print("<br>");
            // print_r($kerVers [2]); --> ez nem jó, ugyanis a kerVers tömbnek nincs 2-es indexű eleme, mivel az összes elem indexe string típusú
            
            /*$key = array_keys($kerVers)[1];
            print($key);
            print("<br>");                      --> ez a kettő nem jó, mert a tömb indexét (key) írja ki nem pedig az adott indexű elemet
            $key = array_keys($kerVers)[4];
            print($key);*/
            
            print("<br>");
          
        ?>
  