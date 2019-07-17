
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'Diak.php';
            //Create new diák meghívása
        //Diak::newDiak("Proba Peti", "13", "7a");
        
        //read meghívása
        $d = new Diak('a', 'a', 'a', 'a');
        $d->readDiak(3);
        $d->updateNev("Józsibá");
        ?>
    </body>
</html>
