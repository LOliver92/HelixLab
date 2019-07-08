<?php
    session_start();
    
    if(isset($_POST['submit'])){
        
        $db = mysqli_connect('localhost', 'root', '', 'login1905');
        
        if(mysqli_connect_error()){
            die('Hibakód: ' . mysqli_connect_error());
        }
        
        $user = $_POST['username'];
        $pw = $_POST['password'];
        
        $sql = 'SELECT * FROM login WHERE username="'. $user .'" AND password="'. sha1($pw).'"'; //natív eljárás
        $tarolt = 'CALL login ("' .$user.'","'.sha1($pw).'")';     //tárolt eljárás
        $result = mysqli_query($db, $sql);
        
        if(mysqli_num_rows($result)==1){
            $adat = mysqli_fetch_assoc($result); //id => 1, username => admin, password =>
            $_SESSION['userdata']=$adat;  //[userdata][id], [userdata][username], [userdata][password]
            header('location:lehoczoLogged.php');
        }
        else{
            print "Hibás felhasználónév vagy jelszó";
        }
        mysqli_close($db);
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bejelentkezés</title>
    </head>
    <body>
        <form method="post">
            Felhasználónév: <input type="text" name="username"><br>
            Jelszó: <input type="password" name="password"><br>
            <input type="submit" name="submit" value="Küldés"><br>
        </form>
        <a href="lehoczoReg.php">Regisztráció</a>
    </body>
</html>