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
            header('location:Logged.php');
        }
        else{
            print "Hibás felhasználónév vagy jelszó!";
        }
        mysqli_close($db);
    }
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
                            <form action="LogIn.php" method="post">
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
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
                                            <input type="submit" value="Login" class="btn float-right login_btn" name="submit">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
                                    Don't have an account?<a href="Registration.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
