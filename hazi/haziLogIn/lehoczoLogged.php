<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header('location:lehoczoIndex.php');
        exit();
    }
    print $_SESSION['userdata']['username'];
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
