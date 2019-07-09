<?php
    session_start();
    if(isset($_POST['submit'])){
        
        $db = mysqli_connect('localhost', 'root', '', 'login1905');
        if(mysqli_connect_error()){
            die('Hibakód: ' . mysqli_connect_error());
        }
        
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pw = $_POST['password'];
        $pw2 = $_POST['password2'];
        $firstname = $_POST['firstname'];
        $surename = $_POST['surename'];
        
        
        
        //$birthdate = $_POST['birthdate'];
        
        $true = TRUE;
        
        if (empty($user)){
            $true = FALSE;
            print ('A felhasználónév üres! <br>');
        }
        
        if (empty($email)){
            $true = FALSE;
            print ('Az e-mail cím üres! <br>');
        }
        
        if (empty($pw)){
            $true = FALSE;
            print ('A jelszó üres! <br>');
        }
        
        if (empty($pw2)){
            $true = FALSE;
            print ('A jelszó újra rész üres! <br>');
        }
        
        if($pw != $pw2){
            $true = FALSE;
            print ('A két jelszó nem egyezik! <br>');
        }
        
        if (empty($firstname)){
            $true = FALSE;
            print ('A keresztnév üres! <br>');
        }
        
        if (empty($surename)){
            $true = FALSE;
            print ('A vezetéknév üres! <br>');
        }
        
        /*if (empty($birhdate)){
            $true = FALSE;
            print ('A születési idő üres! <br>');
        }*/
        if ($true = TRUE){
            $user = mysqli_real_escape_string($db, $_POST['username']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $pw = mysqli_real_escape_string($db, $_POST['password']);
            $pw = sha1($pw);
            $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
            $surename = mysqli_real_escape_string($db, $_POST['surename']);
            
            //$birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
            
            //$sqlReg = 'INSERT INTO login (id, username, email, password, firstname, surename) ' . 'VALUES (NULL '$user'","'.$email.'","'.sha1($pw).'","'.$firstname.'","'.$surename.'")';
            $sqlReg = "INSERT INTO login (username, email, password, firstname, surename, regTime) " . "VALUES ('$user', '$email', '$pw', '$firstname', '$surename', NOW())"; 
            $resultReg = mysqli_query($db, $sqlReg);
            if ($resultReg == TRUE){
                print ('Sikeres regisztráció! :D');
            }
            else{
                print ('Sikertelen regisztráció! :(');
            }
        }
       
        
        

        mysqli_close($db);
    }
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Regisztráció</title>
    </head>
    <body>
        <form action="lehoczoReg.php" method="post">
            Felhasználónév: <input type="text" name="username"><br>
            E-mail cím: <input type="text" name="email"><br>
            Jelszó: <input type="password" name="password"><br>
            Jelszó újra: <input type="password" name="password2"><br>
            Keresztnév: <input type="text" name="firstname"><br>
            Vezetéknév: <input type="text" name="surename"><br>
            <input type="submit" name="submit" value="Regisztráció"><br>
        </form>
        <a href="lehoczoIndex.php">Bejelentkezés</a>
    </body>
</html>

