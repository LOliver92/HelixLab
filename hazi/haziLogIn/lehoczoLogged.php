<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header('location:lehoczoIndex.php');
        exit();
    }
    print ($_SESSION['userdata']['username'] . '<br>');
    print ('Regisztráció időpontja: ' . $_SESSION ['userdata']['regTime'] . '<br>');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bejelentkezve</title>
    </head>
    <body>
        <a href="lehoczoLogOut.php">Kijelentkezés</a>
         
    </body>
</html>
