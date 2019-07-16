<?php
    session_start();
    if(isset($_POST['submit'])){
    $db = mysqli_connect('localhost', 'root', '', 'login1905');
     if(mysqli_connect_error()){
            die('Hibakód: ' . mysqli_connect_error());
        }
        $user = $_POST['username'];
        $pw = $_POST['oldpassword'];
        $pw2 = $_POST['newpassword'];
        $pw3 = $_POST['newpassword2'];
        
        $true = 1;
        
        $sql = 'SELECT * FROM login WHERE username="'. $user .'" AND password="'. sha1($pw) .'"';
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result)==1){
            $adat = mysqli_fetch_assoc($result);
            $_SESSION['userdata']=$adat; 
        }
        else{
            $true = 0;
            print "Hibás felhasználónév vagy jelszó! <br>";
        }
        
        if ($pw2 != $pw3){
            $true =0;
            print "A két új jelszó nem egyezik! <br>";
        }
        
        if ($true == 1){
            $sql2 = 'UPDATE login SET password="' . sha1($pw2) . '" WHERE username="'. $user .'"';
            $result2 = mysqli_query($db, $sql2);
            header('location:LogIn.php');
        }
        else {
            print "A jelszó frissítés sikertelen! <br>";
        }
        mysqli_close($db);
    }
   
        ?>
<html>
<head>
	<title>New password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Please refresh your password</h3>
			</div>
			<div class="card-body">
                            <form action="LoggedIn.php" method="post">
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
                                            <input type="password" class="form-control" placeholder="old password" name="oldpassword">
					</div>
                                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                                            <input type="password" class="form-control" placeholder="new password" name="newpassword">
					</div>
                                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                                            <input type="password" class="form-control" placeholder="new password again" name="newpassword2">
					</div>
					<div class="form-group">
                                            <input type="submit" value="Refresh" class="btn float-right login_btn" name="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>