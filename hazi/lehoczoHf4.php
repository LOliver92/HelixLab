<?php
    $eredmeny = 1.1;
    print('A dolgozat eredménye ' . $eredmeny*100 . '%-os' . '<br>');
    if ($eredmeny>=0 && $eredmeny<=1) {
        if ($eredmeny>=0 && $eredmeny<0.2){
            print ('Elégtelen');
        }
        elseif ($eredmeny>=0.2 && $eredmeny<0.4){
            print('Elégséges');
        }
        elseif ($eredmeny>=0.4 && $eredmeny<0.6){
            print('Közepes');
        }
        elseif ($eredmeny>=0.6 && $eredmeny<0.8){
            print('Jó');
        }
        elseif ($eredmeny>=0.8 && $eredmeny<=1){
            print('Jeles');
        }
    }
    else { print ('Ilyen eredmény nem érhető el, kérem írja be a megfelelő eredményt!');}
?>

