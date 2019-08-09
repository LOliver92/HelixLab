<?php
require_once 'Diak.php';
$db = new Database();
$conn = $db->getConn();
if(isset($_GET['id'])){
    if(isset($_POST['submit'])){
        $upObj = Diak::updateDiak(Database::safeText($_GET['id'], $conn), Database::safeText($_POST['nev'], $conn), Database::safeText($_POST['kor'], $conn), Database::safeText($_POST['osztaly'], $conn));
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Diák adatainak módosítása</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
        <link rel="stylesheet" type="text/css" href="createDiak.css">
    </head>
    <body>
        <div class="container">
            <div class="welcomeBox">
            <h1 class="welcomeText">Üdvözöllek a PHP kurzuson számontartott diákok oldalán</h1><br>
            </div>
            <div class="welcome">
            <h2 class="choiceText">Diák adatainak módosítása</h2><br>
            <div class="diakData">
        <form method="post">
            <input type="text" name="nev" placeholder="Név"><br><br>
            <input type="text" name="kor" placeholder="Kor"><br><br>
            <input type="text" name="osztaly" placeholder="Osztály"><br><br><br>
          <input type="submit" value="Módosít" name="submit" class="button">
        </form>
                <br><br>
                 <a type="button" href="LehoczOIndex.php" value="newdiak" target="_self" class="button">Vissza a Főoldalra</a><br><br>
      </div>
            </div>   
        </div>
        
    </body>
</html>
