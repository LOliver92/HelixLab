
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'Diak.php';
        require_once 'Osztalyzatok.php';
        require_once 'Tantargy.php';
            //Create new diák meghívása
        //Diak::newDiak("Proba Peti", "13", "7a");
        
        //read meghívása
        /*$d = new Diak('a', 'a', 'a', 'a');
        $d->readDiak(3);
        $d->updateNev("Józsibá");*/
        
        //Diak::deleteDiakById(7);
        
        //Diak::updateAll(8, "porba", "12", "2a");
        
        Diak::getAllDiak();
        ?>
    </body>
</html>
