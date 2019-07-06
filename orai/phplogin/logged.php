<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header('location:index.php');
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
        <a href="logout.php">Kijelentkezés</a>
         
    </body>
</html>
