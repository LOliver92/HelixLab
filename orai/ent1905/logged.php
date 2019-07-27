<?php
    require_once 'login.php';
    if(isset($_GET['id'])){
        //A get-el megkapott Id alapján példányosítunk, ez azért kell
        //hogy felhasználó specifikus dinamikus függvényeket hívhassuk meg
        $valtozo = login::objectById($_GET['id']);
        //print_r ($valtozo);
        $valtozo->jelszoCsere("1111", "alma");
        //print $valtozo->getPassword();
        $valtozo->torles();
        print $valtozo->getId();
        print $valtozo->getUsername();
        print $valtozo->getPassword();
    }
  ?>


