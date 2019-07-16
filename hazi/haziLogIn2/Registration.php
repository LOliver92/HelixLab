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
        $birthdate = $_POST['birthdate'];
        
        $true = 1;
        
        if (empty($user)){
            $true = 0;
            print "A felhasználónév üres! <br>";
        }
        
        if (empty($email)){
            $true = 0;
            print "Az e-mail üres! <br>";
        }
        
        if (empty($pw)){
            $true = 0;
            print "A jelszó üres! <br>";
        }
        if (strlen($pw)<8 && strlen($pw)>16){
            $true = 0;
            print "A jelszó 8-16 karakter hosszú legyen! <br>";
        }
        
        if (empty($pw2)){
            $true = 0;
            print "A jelszó megerősítése üres! <br>";
        }
        
        if($pw != $pw2){
            $true = 0;
            print "A két jelszó nem egyezik! <br>";
        }
        
        if (empty($firstname)){
            $true = 0;
            print "A keresztnév üres! <br>";
        }
        
        if (empty($surename)){
            $true = 0;
            print "A vezetéknév üres! <br>";
        }
        
        /*$sqlReg2 ='SELECT * FROM login WHERE username="'. $user .'"';
          $resultReg2 = mysqli_query($db, $sqlReg2);
         * if ($resultReg2 == TRUE){
         * $true = 0;
         * print "A felhasználónév már létezik <br>";
         * }                   */
        
        
        if ($true == 1){
            $user = mysqli_real_escape_string($db, $_POST['username']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $pw = mysqli_real_escape_string($db, $_POST['password']);
            $pw = sha1($pw);
            $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
            $surename = mysqli_real_escape_string($db, $_POST['surename']);
           
            $sqlReg = "INSERT INTO login (username, email, password, firstname, surename, birthdate, regTime) " . "VALUES ('$user', '$email', '$pw', '$firstname', '$surename','$birthdate', NOW())"; 
            $resultReg = mysqli_query($db, $sqlReg);
            
            if ($resultReg == TRUE){
            
            print "A regisztráció sikeres! <br>";
            header('location:LoggedIn.php');
            }
            else{
                print "A regisztráció sikertelen! <br>";
            }
            
        }
       
        
        

        mysqli_close($db);
    }
    ?>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Registration</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
                            <form action="Registration.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                                            <input type="text" class="form-control" placeholder="username" name="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                                            <input type="password" class="form-control" placeholder="password" name="password">
					</div>
                                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                                            <input type="password" class="form-control" placeholder="password again" name="password2">
						
					</div>
                                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                                            <input type="text" class="form-control" placeholder="e-mail" name="email">
						
					</div>
                                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                                            <input type="text" class="form-control" placeholder="firstname" name="firstname">
						
					</div>
                                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                                            <input type="text" class="form-control" placeholder="surename" name="surename">
						
					</div>
                                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
                                            <input type="date" class="form-control" placeholder="birthdate (YYYY-MM-DD)" name="birthdate">
						
					</div>
					<div class="form-group">
                                            <input type="submit" value="Register" class="btn float-right login_btn" name="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>