<?php
//meghívjuk a database osztályt, hogy tudjuk használni
require_once 'Database.php';

//meghívjuk az ide tartozó modell osztályt
require_once 'User.modell.php';

//példányosítjuk a database osztályt, a dinamikus függvényei miatt
$d = new Database();
$db = $d->getConn();


    if(isset($_POST)){
        //Login kérés ellenőrzése
        if(isset($_POST['login'])){
            // Megkapott adatok ki vannak-e töltve
            if(isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password'])){
                //Ha ide beléptünk, a mezők ki vannak mehet az ellenőrzés
                
                //egyéb vizsgálatok ha vannak: pl email cím
                
                //safeText meghívása midnen adatra, a modell számára átadandó adattömb létrehozása
                $data = array();
                $data['user'] = $d->safeText($_POST['username']);
                $data['pw'] = $d->safeText($_POST['password']);
                
                //modelbeli függvény meghívása:
                //$u = new User();
                User::login($db, $data);
            }
            else {
                print ('A mezők nincsenek megfelelően kitöltve');
        }
       
       }
    }
?>

