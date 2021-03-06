<?php
    require_once 'login.php';
     $db = new Database();
     $conn = $db->getConn();
    
    
    //megnézzük meg van-e nyomva a submit
    if (isset($_POST['submit'])){
        // megnézzük mindkét mező ki van-e töltve
        if (isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password'])){
            
            //az adatok biztonságossá tétele, regisztráció függvény meghívása
            login::regisztracio(Database::safeText($_POST['username'], $conn), Database::safeText($_POST['password'], $conn));
        }
    }
    if (isset($_POST['submit2'])){
        // megnézzük mindkét mező ki van-e töltve
        if (isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password'])){
            
            //az adatok biztonságossá tétele, regisztráció függvény meghívása
            $obj = login::login(Database::safeText($_POST['username'], $conn), Database::safeText($_POST['password'], $conn));
            
            if($obj->getId()>0){
                header("location:logged.php?id=".$obj->getId()."");
            }
        }
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
                            <form action="index.php" method="post">
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
                                            <input type="submit" value="Sign Up" class="btn float-right login_btn" name="submit">
                                        </div><br>
                                        <div class="form-group">
                                            <input type="submit" value="Sign In" class="btn float-right login_btn" name="submit2">
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