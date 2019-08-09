<?php
require_once 'Diak.php';
if(isset($_GET['id'])){
    $valtozo = Diak::getOneDiakById($_GET['id']);
}
if(isset($_POST['update'])){
    header("location:UpdateDiak.php?id=".$valtozo->getId()."");
}
if(isset($_POST['delete'])){
    $valtozo->deleteDiak();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Diák</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
        <link rel="stylesheet" type="text/css" href="mainpage.css">
    </head>
    <body>
        <div class="container">
            <div class="welcomeBox"><h1 class="welcomeText">Üdvözöllek a PHP kurzuson számontartott diákok oldalán</h1></div><br>
            <div class="welcome">
            <h2 class="choiceText">Az általad lekérdezett diák</h2><br>
            <h2 class="choiceText">Diák neve: <?php print($valtozo->getNev()); ?></h2><br>
            <h2 class="choiceText">Diák kora: <?php print($valtozo->getKor()); ?></h2><br>
            <h2 class="choiceText">Diák osztálya: <?php print($valtozo->getOsztaly()); ?></h2><br>
            <div class="choiceButtons">
                <form method="post">
                    <input type="submit" value="Módosítás" name="update" class="button"><br><br>
                    <input type="submit" value="Törlés" name="delete" class="button">
                </form>
                <br><br>
                 <a type="button" href="LehoczOIndex.php" value="newdiak" target="_self" class="button">Vissza a Főoldalra</a><br><br>
            </div>
            
        </div>
       </div>
        
    </body>
</html>

