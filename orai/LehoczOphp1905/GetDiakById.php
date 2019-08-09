<?php
require_once 'Diak.php';
$db = new Database();
$conn = $db->getConn();
if(isset($_POST['submit'])){
        if(isset($_POST['id']) && !empty($_POST['id'])){
          $obj = Diak::getOneDiakById(Database::safeText($_POST['id'], $conn));
          if($obj->getId()>0){
              header("location:DiakData.php?id=".$obj->getId()."");
          }
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Diák lekérdezése</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
        <link rel="stylesheet" type="text/css" href="createDiak.css">
    </head>
    <body>
       <div class="container">
            <div class="welcomeBox">
            <h1 class="welcomeText">Üdvözöllek a PHP kurzuson számontartott diákok oldalán</h1><br>
            </div>
            <div class="welcome">
            <h2 class="choiceText">Add meg a diák azonosítóját!</h2><br>
            <div class="diakData">
        <form method="post">
            <input type="text" name="id" placeholder="Azonosító"><br><br>
          <input type="submit" value="Ok" name="submit" class="button">
        </form>
      </div>
            </div>   
        </div>
        
    </body>
</html>
