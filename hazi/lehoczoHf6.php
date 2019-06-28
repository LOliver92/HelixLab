<?php
    $etelek = array (
        $eloEtelek = array ("Májgombóc leves" => 950, "Tojásrantotta" =>750 ),
        $foEtelek = array ("Marhapörkölt" => 1150, "Rántott sertésszelet rizzsel" => 1350),
        $desszertek = array ("Somlói galuska" => 850, "Palacsinta" => 450)
    );
       print '<pre>';
            printf ('%30s <br>', 'Előételek');
            print ('<br>');
            printf ('%-45s %-45s <br>', 'Étel neve', 'Ár');
            printf ("%'x90s <br>", "");
            foreach ($eloEtelek as $key => $value){
                printf ('%-45s %-45s <br>', $key,$value);
            }
            print ('<br>');
            
            printf ('%30s <br>', 'Főételek');
            print ('<br>');
            printf ('%-45s %-45s <br>', 'Étel neve', 'Ár');
            printf ("%'x90s <br>", "");
            foreach ($foEtelek as $key => $value){
                printf ('%-45s %-45s <br>', $key,$value);
            }
            print ('<br>');
            
             printf ('%30s <br>', 'Desszertek');
            print ('<br>');
            printf ('%-45s %-45s <br>', 'Étel neve', 'Ár');
            printf ("%'x90s <br>", "");
            foreach ($desszertek as $key => $value){
                printf ('%-45s %-45s <br>', $key,$value);
            }
            print ('<br>');
       print '</pre>';
       print ('<br>');
       

?>
